<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asistencia;
use App\Models\contador;
use App\Models\rutina;
use App\Models\usuario;

class AsistenciaController extends Controller
{
    public function usuarios()
    {
        $usuarios = usuario::join('acceso', 'acceso.a_id', 'usuario.id_acc')->where('a_tipo', 'cliente')->get();

        $contador=contador::find('asistencia.usuarios');
        $contador->update(['count'=>$contador->count+1]);
        
        return view('asistencia.usuarios', compact('usuarios','contador'));
    }

    public function listar($usuarioId)
    {
        $asistencias = asistencia::join('rutina', 'rutina.r_id', 'asistencia.id_rut')->where('id_user', $usuarioId)->get();
        $usuario = usuario::find($usuarioId);
        $rutinas = rutina::all();

        $contador=contador::find('asistencia.listar');
        $contador->update(['count'=>$contador->count+1]);

        return view('asistencia.listar', compact('asistencias', 'usuario'), compact('rutinas','contador'));
    }


    public function eliminar($asistenciaId)
    {
        
        $asistencia = asistencia::findOrFail($asistenciaId);
        $usuarioId=$asistencia->id_user;
        $asistencia->delete();
        return redirect()->route('asistencia.listar',$usuarioId)
            ->with('mensaje', 'La asistencia a sido eliminada');
    }


    public function registrar(Request $request,$usuarioId)
    {
        $asistencia = asistencia::create([
            "a_fec"=>now(),
            "a_pres"=>true,
            "id_user"=>$usuarioId,
            "id_rut"=>$request->id_rut,
        ]);
        return redirect()
            ->route('asistencia.listar',$usuarioId)
            ->with('mensaje', 'producto registrado');
    }
}
