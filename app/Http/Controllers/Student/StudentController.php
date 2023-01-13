<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function login()
    {
        return view('student.login');
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
            return redirect('/student');
        }

        Session::flash('error', 'Oppes! You have entered invalid credentials');
        return redirect("/student/login");
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Session::flash('success', 'You have been logged out!');
        return redirect('student/login');
    }

    public function home()
    {
        return view('student.home');
    }

    public function profile()
    {
        return view('student.profile');
    }
}