<?php

namespace App\Http\Controllers;

use App\Models\contador;
use Illuminate\Http\Request;
use App\Models\mensualidad;

class MensualidadController extends Controller
{
    public function listar()
    {
        $mensualidades = mensualidad::all();
        
        $contador=contador::find('mensualidad.listar');
        $contador->update(['count'=>$contador->count+1]);

        return view('mensualidad.listar', compact('mensualidades','contador'));
    }

    public function editar($mensualidadId)
    {
        $mensualidad = mensualidad::findOrFail($mensualidadId);

        $contador=contador::find('mensualidad.editar');
        $contador->update(['count'=>$contador->count+1]);

        return view('mensualidad.editar', compact('mensualidad','contador'));
    }

    public function guardarModificacion($mensualidadId, Request $request)
    {
        $mensualidad = mensualidad::findOrFail($mensualidadId);
        $mensualidad->m_dur = $request->duracion;
        $mensualidad->m_pre = $request->precio;
        $mensualidad->m_des = $request->descuento;
        $mensualidad->save();

        return redirect()
            ->route('mensualidad.listar')
            ->with('mensaje', 'Los datos han sido modificados');
    }

    public function eliminar($mensualidadId)
    {
        $mensualidad = mensualidad::findOrFail($mensualidadId);
        $mensualidad->delete();
        return redirect()->route('mensualidad.listar')
            ->with('mensaje', 'La mensualidad a sido eliminada');
    }

    public function create()
    {
        $contador=contador::find('mensualidad.registrar');
        $contador->update(['count'=>$contador->count+1]);

        return view('mensualidad.registrar',compact('contador'));
    }

    public function registrar(Request $request)
    {
        $mensualidad = mensualidad::create([
            'm_dur' => $request->duracion,
            'm_pre' => $request->precio,
            'm_des' => $request->descuento,
        ]);
        return redirect()
            ->route('mensualidad.registrar')
            ->with('mensaje', 'producto registrado');
    }
}
