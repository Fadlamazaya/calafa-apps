<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $param1 = '')
    {
        if (!Auth::check()) {
            return view('login');

            // return redirect()->route('dashboard');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => [
            'required', // Wajib diisi
            ],
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            Session::flush();
            $result = 'error';
        }

        // return redirect('dashboard')->with('result', $result);
        return redirect('/auth')->with('result', $result);

        // if (!Auth::check()) {
        //     return redirect()->route('dashboard');
        // }
        //$pageData['result'] = $result;
        //return view('login-from', $pageData);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth');

        // return redirect('/auth')->with('result', $result);

        // Redirect ke halaman login
        // ...
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}


public function handleGoogleCallback()
{
    $googleUser = Socialite::driver('google')->stateless()->user();
    $email_user = $googleUser->email;
    // dd($email_user);

    $user = User::where('email', $email_user)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            Session::flush();
            $result = 'error';
        }

        // return redirect('dashboard')->with('result', $result);
        return redirect('/auth')->with('result', $result);

    /** Kode untuk autentikasi dan redirect */
}
}
