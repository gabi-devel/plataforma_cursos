<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDato;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        /* $this->middleware('auth')->only('logout'); */
    }

    public function username() {
        return 'name'; 
    }

    public function login(Request $request) {
        $this->validate($request, [
            'name' => 'required|string', 
            'password' => 'required|string',
        ]);

        // Buscar el usuario por nombre
        $user = User::where('name', $request->name)->first();

        // Verificar la contraseña
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); 

            // Verificar si ya completó la declaración jurada
            $userDato = UserDato::firstOrCreate(
                ['user_id' => $user->id],
                ['declaracion_jurada' => false]
            );
            if (!$userDato->declaracion_jurada) {
                //return redirect()->route('auth.declaracion_jurada')->with('user_name', $request->name);         
                //return view('auth.declaracion_jurada', ['user_name' => $request->name]);
                return redirect()->route('auth.declaracion_jurada');
            }

            // Rol
            /* if ($user->rol === 'admin') {
                return redirect()->intended('/admin/dashboard'); // Ruta para admin
            } else {
                return redirect()->intended(route('cursos.index'));
            } */
           // La redirección la maneja el middleware
           return redirect()->intended('/');
        }

        return back()->withErrors([
            'name' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }
}
