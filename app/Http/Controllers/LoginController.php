<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request){

        $user = new User();
        $user->name=$request->nombre;
        $user->email=$request->email;
        $user->password= Hash::make($request->contrasena);

        $user->save();

        Auth::loginUsingId($user->id);

        return redirect()->route('login');

    }
   
    public function login(Request $request)
    {
        $credentials = $request->only('usuario', 'contrasena');

        $user = User::where('email', $credentials['usuario'])->first();

        if (!$user) {
            
            return redirect()->route('login')->withErrors(['usuario' => 'El usuario no existe']);
        }

        
        if (password_verify($credentials['contrasena'], $user->password)) {
            Auth::login($user);
            return redirect()->intended('/clientes'); 
        }

        return redirect()->route('login')->withErrors(['contrasena' => 'Contraseña incorrecta']);
    }
    
    public function logout(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');

    }
}
