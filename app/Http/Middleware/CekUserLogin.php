<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, \Closure $next, $rules): Response
    {
        if (!Auth::check()) {
            return redirect('dashboard');
        }

        $user = Auth::user();
        if ($user->level == $rules) {
            return $next($request);
        }

        return redirect('login-user')->with('error', 'Anda Tidak memiliki Akses');
    }
}