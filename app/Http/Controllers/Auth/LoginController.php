<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        if ($user && $request->password === $user->password) {
            Auth::login($user); // Iniciar sesión manualmente

            // Rol
            if ($user->rol === 'admin') {
                return redirect()->intended('/admin/dashboard'); // Ruta para admin
            } else {
                return redirect()->intended(route('cursos.index'));
            }
        }

        return back()->withErrors([
            'name' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }
}
