<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use \stdClass;
use Illuminate\Support\Facades\Auth;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Cargos',
            'Accion' => 'El usuario '.Auth::user()->name. ' consultó la lista de cargos',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);         
        $cargos=Cargo::paginate(10);
        return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargo = new StdClass();
        $cargo->Ambito = "";
        $cargo->Genero = "";
        $cargo->Titularidad = "";
        $cargo->Posicion = "";
        $cargo->NombreCargo = "";
        $cargo->IdCargo = "";
        return view('cargos.create', compact('cargo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cargo=Cargo::create($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Cargos',
            'Accion' => 'El usuario '.Auth::user()->name. ' creó el cargo con ID-CARGO ' . $cargo->IdCargo,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
        return redirect()->route('cargos.index',$cargo->IdCargo)->with('info','Tipo de Cargo guardada con exito!!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        return view('cargos.show',compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        return view('cargos.edit',compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {    
        $cargo->update($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Cargos',
            'Accion' => 'El usuario '.Auth::user()->name. ' actualizó el cargo con ID-CARGO ' . $cargo->IdCargo,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);             
        return redirect()->route('cargos.index', $cargo->IdCargo)->with('info','Cargo Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $cargo->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }

    public function buscar(Request $request)
    {
    	$name  = $request->get('NombreCargo');
       	$cargos = Cargo::orderBy('IdCargo', 'DESC')
    		->name($name)
    		->paginate(10);
    	return view('cargos.index', compact('cargos'));
    }

}
