<?php

namespace App\Http\Controllers;
use App\Models\producto;
use App\Models\usuario;
use App\Models\acceso;
use App\Models\contador;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function create()
    {
        $contador=contador::find('producto.registrar');
        $contador->update(['count'=>$contador->count+1]);

        return view('producto.registrar',compact('contador'));
    }

    public function registrar(Request $request)
    {
        $producto = producto::create([
            'p_nom' => $request->nombre,
            'p_pre' => $request->precio,
            'p_des' => $request->decripcion,
            'p_stock'=> $request->sotck,
        ]);
        return redirect()
            ->route('producto.registrar')
            ->with('mensaje', 'producto registrado');
    }

    public function listar()
    {
        $productos = producto::all();
        
        $contador=contador::find('producto.listar');
        $contador->update(['count'=>$contador->count+1]);

        return view('producto.listar', compact('productos','contador'));
    }

    public function editar($productoId)
    {
        $producto = producto::findOrFail($productoId);

        $contador=contador::find('producto.editar');
        $contador->update(['count'=>$contador->count+1]);

        return view('producto.editar', compact('producto','contador'));
    }

    public function guardarModificacion($productoId, Request $request)
    {
        $producto = producto::findOrFail($productoId);
        $producto->p_nom = $request->nombre;
        $producto->p_pre = $request->precio;
        $producto->p_des = $request->decripcion;
        $producto->p_stock = $request->sotck;
        $producto->save();

        return redirect()
            ->route('producto.listar')
            ->with('mensaje', 'Los datos han sido modificados');
    }

    public function eliminar($productoId)
    {
        $producto = producto::findOrFail($productoId);
        if($producto->usuario){
            $acceso = acceso::findOrFail($producto->usuario->id_acc);
            $acceso->a_tipo='cliente';
            $acceso->save();
        }
        $producto = producto::findOrFail($productoId);
        $producto->delete();
        return redirect()->route('producto.listar')
            ->with('mensaje', 'El producto a sido eliminado');
    }


}
