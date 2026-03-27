<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $user = User::where('username', $request->username)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['Username atau password salah.'],
            ]);
        }

        Auth::login($user, $request->boolean('remember'));

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Tampilkan halaman register
     */
    public function showRegister()
    {
        // Maksimal hanya 2 user (untuk sepasang kekasih 💕)
        $userCount = User::count();
        if ($userCount >= 2) {
            return redirect()->route('login')->with('error', 'Maaf, slot sudah penuh. Aplikasi ini hanya untuk 2 orang saja 💕');
        }

        return view('auth.register');
    }

    /**
     * Proses register
     */
    public function register(Request $request)
    {
        // Cek lagi di server side
        if (User::count() >= 2) {
            return redirect()->route('login')->with('error', 'Maaf, slot sudah penuh. Aplikasi ini hanya untuk 2 orang saja 💕');
        }

        $request->validate([
            'name'     => 'required|string|max:50',
            'username' => 'required|string|min:3|max:20|unique:users,username|alpha_dash',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required'           => 'Nama wajib diisi.',
            'name.max'                => 'Nama maksimal 50 karakter.',
            'username.required'       => 'Username wajib diisi.',
            'username.min'            => 'Username minimal 3 karakter.',
            'username.max'            => 'Username maksimal 20 karakter.',
            'username.unique'         => 'Username sudah dipakai, pilih yang lain.',
            'username.alpha_dash'     => 'Username hanya boleh huruf, angka, - dan _.',
            'password.required'       => 'Password wajib diisi.',
            'password.min'            => 'Password minimal 6 karakter.',
            'password.confirmed'      => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Selamat datang, ' . $user->name . '! 🎉');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}