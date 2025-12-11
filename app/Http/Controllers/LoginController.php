<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function loginview()
    {
        return view('login');
    }

    public function logincheck(Request $request)
    {
        try {
            $student = Student::where('email', $request->email)->first();
            if ($student && Hash::check($request->password, $student->password)) {
                Auth::guard('student')->login($student);
                return redirect()->route('student.welcome');
            }
            return redirect()->route('login.loginwindow')->withErrors(['Invalid Email or Password']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
