<?php

namespace App\Http\Controllers;

use App\Models\acceso;
use App\Models\contador;
use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccesoController extends Controller
{
    public function loginView()
    {
        $contador=contador::find('acceso.login');
        $contador->update(['count'=>$contador->count+1]);

        return view('acceso.login',compact('contador'));
    }

    public function ingresar(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
        ]);
        //return "hola mundo cruel";
        $user = acceso::where('a_email', $request['email'])->first();
        if (!$user) { //si el usuario existe
            return back()->withErrors([
                'Direccion de correo incorrecto.',
            ]);
        }

        if ($user->a_password != $request['password']) { //si la contraseña es correcta
            return back()->withErrors([
                'Contraseña incorrecta.',
            ]);
        }
        Auth::login($user, true);

        $usuario = Usuario::where('id_acc', $user->a_id)->first();
        if ($user->a_tipo == 'administrador') {
            return redirect(route('reporte.administrador'));
        } else if ($user->a_tipo == 'entrenador') {
            return redirect(route('reporte.entrenador'));
        } else {
            return redirect(route('reporte.cliente'));
        }
    }

    public function guardarSession($loginId, Request $request)
    {
        if ($request->newpassword == $request->renewpassword) {
            $acceso = acceso::findOrFail($loginId);
            $acceso->a_email =  $request->email;
            $acceso->a_password =  $request->newpassword;
            $acceso->save();
            Auth::logout();
        }
        return redirect()
            ->route('acceso.login')
            ->with('mensaje', 'Cuenta de seccion cambiada');
    }


    public function logout()
    {
        Auth::logout();

        return redirect()
            ->route('index');
    }

    public function listar()
    {
        $accesos = acceso::all();

        $contador=contador::find('acceso.listar');
        $contador->update(['count'=>$contador->count+1]);

        return view('acceso.listar', compact('accesos','contador'));
    }
}
