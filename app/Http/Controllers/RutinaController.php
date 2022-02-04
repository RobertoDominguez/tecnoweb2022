<?php

namespace App\Http\Controllers;

use App\Models\contador;
use App\Models\dias;
use App\Models\ejercicio;
use Illuminate\Http\Request;
use App\Models\rutina;

class RutinaController extends Controller
{
    public function listar()
    {
        $rutinas = rutina::join('dias','rutina.id_dias','dias.d_id')->get();
        
        $contador=contador::find('rutina.listar');
        $contador->update(['count'=>$contador->count+1]);

        return view('rutina.listar', compact('rutinas','contador'));
    }

    public function editar($rutinaId)
    {
        $rutina = rutina::join('dias','rutina.id_dias','dias.d_id')->where('r_id',$rutinaId)->get()->first();

        $contador=contador::find('rutina.editar');
        $contador->update(['count'=>$contador->count+1]);

        return view('rutina.editar', compact('rutina','contador'));
    }

    public function guardarModificacion($rutinaId, Request $request)
    {
        $rutina = rutina::findOrFail($rutinaId);
        
        $data=[
            "r_nom"=>$request->r_nom,
            "r_mus"=>$request->r_mus,
            "r_dif"=>$request->r_dif,
            "r_des"=>$request->r_des,
            "id_dias"=>$request->d_id,
        ];

        $rutina->update($data);

        return redirect()
            ->route('rutina.listar')
            ->with('mensaje', 'Los datos han sido modificados');
    }

    public function eliminar($rutinaId)
    {
        $rutina = rutina::findOrFail($rutinaId);
        $rutina->delete();
        return redirect()->route('rutina.listar')
            ->with('mensaje', 'La rutina a sido eliminada');
    }

    public function create()
    {
        $dias=dias::all();

        $contador=contador::find('rutina.registrar');
        $contador->update(['count'=>$contador->count+1]);

        return view('rutina.registrar',compact('dias','contador'));
    }

    public function registrar(Request $request)
    {
        
        $rutina = rutina::create([
            "r_nom"=>$request->r_nom,
            "r_mus"=>$request->r_mus,
            "r_dif"=>$request->r_dif,
            "r_des"=>$request->r_des,
            "id_dias"=>$request->d_id,
        ]);
        return redirect()
            ->route('rutina.listar')
            ->with('mensaje', 'producto registrado');
    }

    public function ejercicios($rutinaId){
        $rutina=rutina::findOrFail($rutinaId);
        $ejercicios=ejercicio::where('id_rutina',$rutinaId)->get();

        $contador=contador::find('rutina.ejercicios');
        $contador->update(['count'=>$contador->count+1]);

        return view('rutina.ejercicios',compact('ejercicios','rutina'),compact('contador'));
    }

    public function registrarEjercicio(Request $request,$rutinaId){

        $ejercicio = ejercicio::create([
            "id_rutina"=>$rutinaId,
            "e_nom"=>$request->e_nom,
            "e_serie"=>$request->e_serie,
            "e_rep"=>$request->e_rep,
        ]);

        return redirect(route('rutina.ejercicio.listar',$rutinaId));
    }

    public function eliminarEjercicio($ejercicioId,$rutinaId)
    {
        $ejercicio = ejercicio::findOrFail($ejercicioId);
        $ejercicio->delete();
        return redirect()->route('rutina.ejercicio.listar',$rutinaId)
            ->with('mensaje', 'El ejercicio ha sido eliminada');
    }
}
