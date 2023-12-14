<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register() {
        return view('auth.register');
    }

    public function login() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $request->validate([
            "username" => "required|max:250",
            "email" => "required|max:250|unique:users",
            "password" => "required|min:8|confirmed"
        ]);

        User::create([
            "id" => Str::random(13),
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $msg = "Selamat Datang Kembali";
            if (auth()->user()->role == "admin") {
                $msg .= " Sepuh ".auth()->user()->username;
            }
    
            return redirect()->intended(route('dashboard'))
                ->withSuccess($msg);
        }
    
        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        if(Auth::check())
        {
            $posts = Post::all();
            return view('auth.dashboard', compact('posts'));
        }

        return redirect()->route('login')
            ->withErrors([
            'email' => 'Minimal Login dulu ya bre',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }    
}
