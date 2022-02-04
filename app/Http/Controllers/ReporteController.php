<?php

namespace App\Http\Controllers;

use App\Models\contador;
use App\Models\nota_venta;
use App\Models\producto;
use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function administrador()
    {

        $reportes = [
            'ganancia_mensual' => nota_venta::where(DB::raw("extract(MONTH FROM nv_fecha)::integer"),DB::raw("extract(MONTH FROM NOW())::integer"))->sum('nv_monto'),
            
            'ganancia_anual' => nota_venta::where(DB::raw("extract(YEAR FROM nv_fecha)::integer"),DB::raw("extract(YEAR FROM NOW())::integer"))->sum('nv_monto'),

            'total_clientes' => usuario::join('acceso','acceso.a_id','usuario.id_acc')
            ->where('a_tipo','cliente')->count(),

            'producto_mas_vendido'=>producto::join('detalle_venta','detalle_venta.id_proy','producto.p_id')
            ->groupBy('p_id','p_nom')->select(DB::raw('sum(dv_cant) as sum, p_id,p_nom'))->orderBy(DB::raw("sum(dv_cant)"),"desc")->first(),

            'producto_mayor_ganancia'=>producto::join('detalle_venta','detalle_venta.id_proy','producto.p_id')
            ->groupBy('p_id','p_nom')->select(DB::raw('sum(dv_prev) as sum, p_id,p_nom'))->orderBy(DB::raw("sum(dv_prev)"),"desc")->first(),
        ];


        $contador=contador::find('acceso.administrador');
        $contador->update(['count'=>$contador->count+1]);

        return view('acceso.administrador', compact('reportes','contador'));
    }

    public function chart(){
        $data=[];

        $productos=producto::join('detalle_venta','detalle_venta.id_proy','producto.p_id')
        ->groupBy('p_id','p_nom')->select(DB::raw('sum(dv_cant) as sum, p_id,p_nom'))->orderBy(DB::raw("sum(dv_cant)"),"desc")->get();

        foreach ($productos as $producto){
            
            array_push($data,[
                'value'=> $producto->sum,
                'name'=>$producto->p_nom
            ]);
        }

        return response()->json($data, 200);
    }

    public function entrenador()
    {
        $contador=contador::find('acceso.entrenador');
        $contador->update(['count'=>$contador->count+1]);

        return view('acceso.entrenador',compact('contador'));
    }

    public function cliente()
    {
        $contador=contador::find('acceso.cliente');
        $contador->update(['count'=>$contador->count+1]);

        return view('acceso.cliente',compact('contador'));
    }
}
