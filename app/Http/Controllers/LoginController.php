<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == '1') {
                return redirect()->intended('home-user');
            } elseif ($user->level == '2') {
                return redirect()->route('index');
            }
        }

        return view('login.user_login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
                'email.required' => 'Harap isi email Anda.',
                'password.required' => 'Harap isi password Anda.',
            ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == '1') {
                // !Home User yang digunakan masih pakai home Dashboard
                return redirect()->route('home');
            } elseif ($user->level == '2') {
                return redirect()->route('index');
            }

            return redirect()->route('login-user');
        }

        return back()->withErrors([
            'email' => 'Maaf, username atau password Anda salah.',
        ]);
    }

    public function proses_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login-user');
    }

    public function store(StoreLoginRequest $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ], [
            'name.required' => 'Harap isi username anda',
            'email.required' => 'Harap isi emal anda',
            'password.required' => 'Harap isi password anda',
            'password.min' => 'Password harus lebih dari 5 huruf',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['level'] = '1';

        if ($data) {
            User::create($data);

            return redirect()->route('login-user');
        }

        return back()->withError([
            'name' => 'Pendaftaran Gagal. Silahkan Isi dengan benar',
            ]);
    }
}