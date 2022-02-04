<?php

namespace App\Http\Controllers;

use App\Models\acceso;
use App\Models\contador;
use App\Models\producto;
use App\Models\usuario;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function verPerfil($usuarioId)
    {
        $usuario = usuario::findOrFail($usuarioId);

        $contador = contador::find('usuario.perfil');
        $contador->update(['count' => $contador->count + 1]);

        return view('usuario.perfil', compact('usuario', 'contador'));
    }

    public function guardarModificacion($usuarioId, Request $request)
    {
        $usuario = usuario::findOrFail($usuarioId);
        $usuario->u_ci = $request->ci;
        $usuario->u_nom = $request->nombre;
        $usuario->u_app = $request->apellido;
        $usuario->u_sex = $request->sexo;
        $usuario->u_telf = $request->telefono;
        $usuario->u_fecnac = $request->nacimiento;
        $usuario->u_dir = $request->direccion;
        $usuario->u_email = $request->email;

        if ($usuario->acceso->a_tipo = "administrador") {
            $acceso = acceso::findOrFail($usuario->id_acc);
            $acceso->a_tipo = $request->tipo;
            $acceso->save();
            if ($request->tipo == 'entrenador' && !$usuario->producto) {
                $producto = producto::create([
                    'p_nom' => 'training',
                    'p_pre' => '250',
                    'p_des' => 'Mejora tus habilidades con la ayuda de un guia que te entrene',
                    'p_stock' => '20',
                    'id_entrenador' => $usuario->u_id
                ]);
            }
        }
        $usuario->save();

        return redirect()
            ->route('usuario.verPerfil', $usuario->u_id)
            ->with('mensaje', 'Los datos han sido modificados');
    }

    public function create()
    {
        $contador = contador::find('usuario.reguser');
        $contador->update(['count' => $contador->count + 1]);

        return view('usuario.reguser', compact('contador'));
    }

    public function registrar(Request $request)
    {
        $login = acceso::create([
            'a_email' => $request->correoCorporativo,
            'a_password' => $request->password,
            'a_tipo' => $request->tipo
        ]);

        $usuario = usuario::create([
            'u_ci' => $request->ci,
            'u_nom' => $request->nombre,
            'u_app' => $request->apellido,
            'u_sex' => $request->sexo,
            'u_telf' => $request->telefono,
            'u_fecnac' => $request->nacimiento,
            'u_dir' => $request->direccion,
            'id_tipo' => $request->tipo,
            'u_email' => $request->email,
            'id_acc' => $login->a_id
        ]);

        //por si es un usuario entrenador
        if ($request->tipo == 'entrenador') {
            $producto = producto::create([
                'p_nom' => 'training',
                'p_pre' => '250',
                'p_des' => 'Mejora tus habilidades con la ayuda de un guia que te entrene',
                'p_stock' => '20',
                'id_entrenador' => $usuario->u_id
            ]);
        }

        return redirect()
            ->route('usuario.registrar')
            ->with('mensaje', 'Usuario registrado');
    }

    public function listar()
    {
        $usuarios = usuario::all();

        $contador = contador::find('usuario.listar');
        $contador->update(['count' => $contador->count + 1]);

        return view('usuario.listar', compact('usuarios', 'contador'));
    }

    public function editar($usuarioId)
    {
        $usuario = usuario::findOrFail($usuarioId);

        $contador = contador::find('usuario.editar');
        $contador->update(['count' => $contador->count + 1]);

        return view('usuario.editar', compact('usuario','contador'));
    }

    public function eliminar($usuarioId)
    {
        $usuario = usuario::findOrFail($usuarioId);
        $acceso = acceso::findOrFail($usuario->acceso->a_id);
        //si existe relacion usuario con producto quiere decir que es un entrenador
        if ($usuario->producto) {
            $producto = producto::findOrFail($usuario->producto->p_id);
            $producto->delete();
        }
        $acceso->delete();
        $usuario->delete();
        return redirect()->route('usuario.listar')
            ->with('mensaje', 'El usuario a sido eliminado');
    }
}
