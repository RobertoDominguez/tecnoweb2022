<?php

namespace App\Http\Controllers;

use App\Models\contador;
use Illuminate\Http\Request;
use App\Models\nota_venta;
use App\Models\mensualidad;
use App\Models\detalle_venta;

class NotaVentaController extends Controller
{
    public function create()
    {
        $contador = contador::find('notaventa.registrar');
        $contador->update(['count' => $contador->count + 1]);

        return view('notaventa.registrar', compact('contador'));
    }

    public function listar()
    {
        $nota_ventas = nota_venta::join('usuario', 'nota_venta.id_user', '=', 'usuario.u_id')
            ->select('nota_venta.*', 'usuario.*')
            ->get();
        //return $nota_ventas;

        $contador = contador::find('notaventa.listar');
        $contador->update(['count' => $contador->count + 1]);

        return view('notaventa.listar', compact('nota_ventas', 'contador'));
    }

    public function listarUser()
    {
        $nota_ventas = nota_venta::where('id_user', auth()->user()->usuario->u_id)->get();
        //return $nota_ventas;

        $contador = contador::find('notaventa.listarUser');
        $contador->update(['count' => $contador->count + 1]);

        return view('notaventa.listarUser', compact('nota_ventas', 'contador'));
    }

    public function listarDetalle($notaventaId)
    {
        $nota_venta = nota_venta::findOrFail($notaventaId);
        if ($nota_venta->mensualidad) { // la nota de venta pertenece a una mensualidad
            $mensualidad = mensualidad::findOrFail($nota_venta->id_men);

            $contador = contador::find('notaventa.verDetalleMensualidad');
            $contador->update(['count' => $contador->count + 1]);

            return view('notaventa.verDetalleMensualidad', compact('nota_venta', 'mensualidad'), compact('contador'));
        } else {
            $detalle_ventas = detalle_venta::where('id_nv', $nota_venta->nv_id)->get();

            $contador = contador::find('notaventa.verDetalleVenta');
            $contador->update(['count' => $contador->count + 1]);

            return view('notaventa.verDetalleVenta', compact('nota_venta', 'detalle_ventas'),compact('contador'));
        }
    }
}
