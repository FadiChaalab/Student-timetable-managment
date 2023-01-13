<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PasswordMail;
use App\Models\EtatCivil;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminStudentController extends Controller
{
    public function show()
    {
        $students = Etudiant::with('user')->orderBy('created_at', 'desc')->paginate(4);
        return view('admin.student.index', compact('students'));
    }

    public function show_store()
    {
        $etat_civils = EtatCivil::all();
        return view('admin.student.store', compact('etat_civils'));
    }

    public function show_edit($id)
    {
        $student = Etudiant::find($id);
        $etat_civils = EtatCivil::all();
        return view('admin.student.update', compact('etat_civils', 'student'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'matricule' => 'required|string|max:255',
            'cin' => 'required|integer',
            'tel' => 'required|integer',
            'adresse' => 'required|string|max:255',
            'parent_tel' => 'required|integer',
            'parent_email' => 'required|string|max:255',
            'id_etat_civil' => 'required'
        ]);

        $data = $request->all();
        if ($request->has('avatar')) {
            $avatar = $request->file('avatar');
            $uniqueid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
            $filename = 'profile_' . $uniqueid . '.' . $avatar->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs('public/uploads/students/avatars', $filename);

            if (file_exists(public_path($name =  $path))) {
                unlink(public_path($name));
            }

            $user = new User();
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->email = $data['email'];
            $user->avatar = $filename;
            $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
            $password = substr($random, 0, 10);
            $user->password = Hash::make($password);
            $user->id_role = 2;
            $user->administrateur = 0;
            $user->save();
            $student = new Etudiant();
            $student->matricule = $data['matricule'];
            $student->cin = $data['cin'];
            $student->tel = $data['tel'];
            $student->adresse = $data['adresse'];
            $student->parent_tel = $data['parent_tel'];
            $student->parent_email = $data['parent_email'];
            $student->id_etat_civil = intval($data['id_etat_civil']);
            $student->id_user = $user->id;
            $student->save();

            $username = $user->lastname . ' ' . $user->firstname;
            $email = $user->email;

            Mail::to($user->email)->send(new PasswordMail($username, $email, $password));

            Session::flash('success', 'You added a new student');
            return back();
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'nullable',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'matricule' => 'required|string|max:255',
            'cin' => 'required|integer',
            'tel' => 'required|integer',
            'adresse' => 'required|string|max:255',
            'parent_tel' => 'required|integer',
            'parent_email' => 'required|string|max:255',
            'id_etat_civil' => 'required'
        ]);

        $data = $request->all();
        $student = Etudiant::find($id);
        $user = User::find($student->id_user);
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];

        if ($request->has('avatar')) {
            $avatar = $request->file('avatar');
            $exploded = explode('.', $user->avatar);
            $filename = end($exploded) . '.' . $avatar->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs('public/uploads/students/avatars', $filename);

            if (file_exists(public_path($name =  $path))) {
                unlink(public_path($name));
            }

            $user->avatar = $filename;
        }
        $user->save();

        $student->matricule = $data['matricule'];
        $student->cin = $data['cin'];
        $student->tel = $data['tel'];
        $student->adresse = $data['adresse'];
        $student->parent_tel = $data['parent_tel'];
        $student->parent_email = $data['parent_email'];
        $student->id_etat_civil = intval($data['id_etat_civil']);
        $student->save();

        Session::flash('success', 'Record was successfully updated');
        return redirect('/admin/student');
    }

    public function deactivate($id)
    {
        $student = Etudiant::find($id);
        $user = User::find($student->id_user);
        $user->active = $user->active == 1 ? 0 : 1;
        $user->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/student");
    }

    public function delete($id)
    {
        $student = Etudiant::find($id);
        $user = User::find($student->id_user);
        $user->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/student");
    }
}