<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        if (!$check) {
            Session::flash('error', 'Couldn\'t create account!');
            return
                redirect()->back();
        }

        auth()->login($check);
        $request->session()->put('user', $check);

        Session::flash('success', 'You have Successfully logged in');
        return redirect("/admin");
    }

    public function create(array $data)
    {
        $user = new User();
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->id_role = 1;
        $user->administrateur = 1;
        $user->save();
        return $user;
    }

    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Session::flash('success', 'You have Successfully logged in');
            return redirect('/admin');
        }

        Session::flash('error', 'Oppes! You have entered invalid credentials');
        return redirect("/admin/login");
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Session::flash('success', 'You have been logged out!');
        return redirect('admin/login');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function profile_update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]);

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->save();

        return back()->with('success', 'Profile updated');
    }

    public function profile_update_image(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'avatar' => 'required',
        ]);

        if ($request->has('avatar')) {
            $avatar = $request->file('avatar');
            $filename = 'profile_' . $user->id . '.' . $avatar->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs('public/uploads/admins/avatars', $filename);

            if (file_exists(public_path($name =  $path))) {
                unlink(public_path($name));
            }
            $user->avatar = $filename;
            $user->save();
            return back()->with('success', 'Image updated');
        } else {
            return back()->with('error', 'Image not updated');
        }
    }

    public function home()
    {
        $nb_students = Etudiant::count();
        $nb_teachers = Enseignant::count();
        return view('admin.home', compact('nb_students', 'nb_teachers'));
    }
}