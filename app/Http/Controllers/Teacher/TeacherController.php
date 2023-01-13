<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    public function login()
    {
        return view('teacher.login');
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
            return redirect('/teacher');
        }

        Session::flash('error', 'Oppes! You have entered invalid credentials');
        return redirect("/teacher/login");
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Session::flash('success', 'You have been logged out!');
        return redirect('teacher/login');
    }

    public function home()
    {
        return view('teacher.home');
    }

    public function profile()
    {
        return view('teacher.profile');
    }
}