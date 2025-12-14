<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $req->validate(['email'=>'required|email','password'=>'required']);
        $user = User::where('email',$req->email)->first();
        if ($user && Hash::check($req->password, $user->password)) {
            session(['user_id' => $user->id]);
            return redirect()->route('spk.index');
        }
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
