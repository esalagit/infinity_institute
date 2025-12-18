<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;



class LoginController extends Controller
{
    public function loginview()
    {
        return view('login');
    }

    public function logincheck(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['Invalid credentials']);
        }

        Auth::login($user);

        switch($user->user_type) {
            case 'student':
                return redirect()->route('student.sregiform');
            case 'teacher':
                return redirect()->route('teacher.teacherlistview');
            case 'admin':
                return redirect()->route('dashboard.welcome');
        }


   }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.loginwindow'); 
    }


}
