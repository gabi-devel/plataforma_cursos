<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserDato;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile-edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

         // Preparar los datos
        $data = [
            'name' => $user->name,
            'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
        ];

        // Realizar la actualización usando DB::table()
        DB::table('users')
            ->where('id', $user->id)
            ->update($data);

        return redirect('/')->with('success', 'Perfil actualizado.');
    }

    public function confirmarDeclaracion(Request $request)
    {
        $request->validate([
            'confirmCheckbox' => 'accepted',
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();
    
        $userDato = UserDato::where('user_id', Auth::id())->first();
        $userDato->declaracion_jurada = true;
        $userDato->save();
    
        // Redireccionar según el rol del usuario
        if ($user->rol === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->intended(route('cursos.index'));
        }
        //return redirect()->intended(Auth::user()->rol === 'admin' ? '/admin/dashboard' : route('cursos.index'));
    }

    public function mostrarDeclaracion() {
        $user = Auth::user(); // Obtén el usuario autenticado
        return view('auth.declaracion_jurada', ['user_name' => $user->name]);
    }
}
