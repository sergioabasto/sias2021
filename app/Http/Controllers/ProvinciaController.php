<?php

namespace App\Http\Controllers;

use App\Provincia;
use App\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Redirect,Response;
use \stdClass;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos['provincia']=DB::table('provincias')
        ->join('departamentos','provincias.IdDepartamento','=','departamentos.IdDepartamento')
        ->select('provincias.IdProvincia','provincias.NombreProvincia','departamentos.NombreDepartamento')
        ->paginate(10);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Provincias',
            'Accion' => 'El usuario '.Auth::user()->name. ' consultó la lista de provincias',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);  
        return view('provincias.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincia = new StdClass();
        $provincia->IdDepartamento = "";
        $departamentos = Departamento::all();
        return view('provincias.create', compact('departamentos', 'provincia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provincia=provincia::create($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Provincias',
            'Accion' => 'El usuario '.Auth::user()->name. ' creó la provincia con ID-PROVINCIA '.$provincia->IdProvincia,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);    
        return redirect()->route('provincias.index',$provincia->IdProvincia)->with('info','Tipo de Provincia guardada con exito!!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show(provincia $provincia)
    {
        $departamentos = Departamento::all();
        return view('provincias.show',compact('provincia','departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit(provincia $provincia)
    {
        $departamentos = Departamento::all();
        return view('provincias.edit',compact('provincia','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *  @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provincia $provincia)
    {
        $provincia->update($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Provincias',
            'Accion' => 'El usuario '.Auth::user()->name. ' actualizó la provincia con ID-PROVINCIA '.$provincia->IdProvincia,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);          
        return redirect()->route('provincias.index', $provincia->IdProvincia)->with('info','Provincia Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provincia $provincia)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $provincia->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }

    public function buscar(Request $request)
    {
    	$name  = $request->get('NombreProvincia');
       	$provincias = Provincia::orderBy('IdProvincia', 'DESC')
    		->name($name)
    		->paginate(10);
    	return view('provincias.index', compact('provincias'));
    }
}
