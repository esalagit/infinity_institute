<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->user_type === 'admin') {
                return redirect()->route('dashboard.welcome');
            }

            if ($user->user_type === 'teacher') {
                return redirect()->route('teacher.teacherlistview');
            }

            if ($user->user_type === 'student') {
                return redirect()->route('student.sregiform');
            }


        }
        return $next($request);
    }
}
