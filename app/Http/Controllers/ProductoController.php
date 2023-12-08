<?php

namespace App\Http\Controllers;
use App\Models\Tipo;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ProductoController extends Controller
{
    public function index(){
        $tipos = Tipo::where('estado',true)->get();

        $productos = DB::table('tipos')
        ->join('productos', 'tipos.id', '=', 'productos.tipo_id')
        ->select('productos.*', 'tipos.tipo')
        ->where('productos.estado',true)
        ->get();
        return view('productos.productos', compact('tipos','productos'));
    }
    public function store(Request $request){
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->fecha_vencimiento = $request->fecha_vencimiento;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->tipo_id = $request->tipo_id;
        $producto->save();
        return back();
    }

    public function showProductoVenta($id){
        $tipos = Tipo::where('estado',true)->get();
        $producto = Producto::where('id',$id)->first();
        return view('productos.ventas', compact('tipos','producto'));
    }
    public function venta($id, Request $request){
        $producto = Producto::where('id',$id)->first();
        $alm=0;
        $message="";
        if( $request->cantidadComprar > $producto->cantidad){
            $message="La cantidad que desea comprar no existe en stock";
        }else{
            $alm=  $producto->cantidad -$request->cantidadComprar ;
            $message="Comprado con 'extido";
        }
        $producto->cantidad=$alm;
        $producto->save();
        return redirect('/producto')->with('status', $message);;
    }
}
