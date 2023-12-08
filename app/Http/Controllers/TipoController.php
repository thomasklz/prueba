<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
class TipoController extends Controller
{
    public function index(){

        $tipos = Tipo::where('estado',true)->get();
        return view('productos.tipo', compact('tipos'));
    }
    public function store(Request $request){
        $tipo= new Tipo();
        $tipo->tipo=$request->tipo;
        $tipo->save();
        return back();
    }
}
