<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('login', ['title'=>'Login']);
    }

    public function registrasi(){
        return view('registrasi', ['title'=>'registrasi']);
    }

    public function registrasiUser(UserRequest $request){    
        $nomor = User::where('nomorTelfon', $request->nomorTelfon)->first();
        $email = User::where('email', $request->email)->first();

        if ($nomor) {
            return back()->withErrors(['nomorTelfon' => 'Nomor telfon ini sudah teregistrasi.']);
        }elseif($email){
            return back()->withErrors(['email' => 'Email ini sudah teregistrasi.']);
        }

        $user = User::create([
            'namaUser' => $request->namaUser,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'nomorTelfon' => $request->nomorTelfon,
        ]);

        $user -> UserId = 'U' . str_pad($user->id,5,'0',STR_PAD_LEFT);
        $user->save();

        return redirect('/login');
    }

    public function authenticateUser(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/halamanUtama');
        }
        
        return back()->withErrors([
            'email' => 'Kredensial tidak cocok'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
