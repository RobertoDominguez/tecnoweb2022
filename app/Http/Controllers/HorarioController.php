<?php

namespace App\Http\Controllers;

use App\Models\asistencia;
use App\Models\contador;
use Illuminate\Http\Request;
use App\Models\horario;
use App\Models\reporte_horario;
use App\Models\rutina;
use App\Models\usuario;

class HorarioController extends Controller
{
    public function usuarios()
    {
        $usuarios = usuario::join('acceso', 'acceso.a_id', 'usuario.id_acc')->where('a_tipo', 'cliente')->get();

        $contador=contador::find('horario.usuarios');
        $contador->update(['count'=>$contador->count+1]);

        return view('horario.usuarios', compact('usuarios','contador'));
    }

    public function listar($usuarioId)
    {
        $horarios = reporte_horario::join('asistencia', 'asistencia.a_id', 'reporte_horario.id_asistencia')->where('id_user', $usuarioId)->get();
        $usuario = usuario::find($usuarioId);
        $asistencias = asistencia::join('rutina', 'rutina.r_id', 'asistencia.id_rut')->where('id_user', $usuarioId)->get();

        $contador=contador::find('horario.listar');
        $contador->update(['count'=>$contador->count+1]);

        return view('horario.listar', compact('horarios', 'usuario'), compact('asistencias','contador'));
    }


    public function eliminar($horarioId,$usuarioId)
    {

        $horario = reporte_horario::findOrFail($horarioId);
        $horario->delete();
        return redirect()->route('horario.listar', $usuarioId)
            ->with('mensaje', 'La horario a sido eliminada');
    }


    public function registrar(Request $request, $usuarioId)
    {
        $horario = reporte_horario::create([
            "rh_hini"=>$request->rh_hini,
            "rh_hfin"=>$request->rh_hfin,
            "rh_des"=>$request->rh_des,
            "id_asistencia"=>$request->id_asistencia,
        ]);
        return redirect()
            ->route('horario.listar', $usuarioId)
            ->with('mensaje', 'horario registrado');
    }
}
