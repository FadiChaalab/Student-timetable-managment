<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PasswordMail;
use App\Models\Enseignant;
use App\Models\EtatCivil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminTeacherController extends Controller
{
    public function show()
    {
        $teachers = Enseignant::with('user')->orderBy('created_at', 'desc')->paginate(4);
        return view('admin.teacher.index', compact('teachers'));
    }

    public function show_store()
    {
        $etat_civils = EtatCivil::all();
        return view('admin.teacher.store', compact('etat_civils'));
    }

    public function show_edit($id)
    {
        $teacher = Enseignant::find($id);
        $etat_civils = EtatCivil::all();
        return view('admin.teacher.update', compact('etat_civils', 'teacher'));
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
            'type' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'id_etat_civil' => 'required'
        ]);

        $data = $request->all();
        if ($request->has('avatar')) {
            $avatar = $request->file('avatar');
            $uniqueid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
            $filename = 'profile_' . $uniqueid . '.' . $avatar->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs('public/uploads/teachers/avatars', $filename);

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
            $user->id_role = 3;
            $user->administrateur = 0;
            $user->save();
            $teacher = new Enseignant();
            $teacher->matricule = $data['matricule'];
            $teacher->cin = $data['cin'];
            $teacher->tel = $data['tel'];
            $teacher->adresse = $data['adresse'];
            $teacher->type = $data['type'];
            $teacher->niveau = $data['niveau'];
            $teacher->id_etat_civil = intval($data['id_etat_civil']);
            $teacher->id_user = $user->id;
            $teacher->save();

            $username = $user->lastname . ' ' . $user->firstname;
            $email = $user->email;

            Mail::to($user->email)->send(new PasswordMail($username, $email, $password));

            Session::flash('success', 'You added a new teacher');
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
            'type' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'id_etat_civil' => 'required'
        ]);

        $data = $request->all();
        $teacher = Enseignant::find($id);
        $user = User::find($teacher->id_user);
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];

        if ($request->has('avatar')) {
            $avatar = $request->file('avatar');
            $exploded = explode('.', $user->avatar);
            $filename = end($exploded) . '.' . $avatar->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs('public/uploads/teachers/avatars', $filename);

            if (file_exists(public_path($name =  $path))) {
                unlink(public_path($name));
            }

            $user->avatar = $filename;
        }
        $user->save();

        $teacher->matricule = $data['matricule'];
        $teacher->cin = $data['cin'];
        $teacher->tel = $data['tel'];
        $teacher->adresse = $data['adresse'];
        $teacher->type = $data['type'];
        $teacher->niveau = $data['niveau'];
        $teacher->id_etat_civil = intval($data['id_etat_civil']);
        $teacher->save();

        Session::flash('success', 'Record was successfully updated');
        return redirect('/admin/teacher');
    }

    public function deactivate($id)
    {
        $teacher = Enseignant::find($id);
        $user = User::find($teacher->id_user);
        $user->active = $user->active == 1 ? 0 : 1;
        $user->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/teacher");
    }

    public function delete($id)
    {
        $teacher = Enseignant::find($id);
        $user = User::find($teacher->id_user);
        $user->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/teacher");
    }
}