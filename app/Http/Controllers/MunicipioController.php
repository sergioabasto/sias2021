<?php

namespace App\Http\Controllers;

use App\Municipio;
use App\Provincia;
use App\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \stdClass;
class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos['municipios']=DB::table('municipios')
        ->join('departamentos','municipios.IdDepartamento','=','departamentos.IdDepartamento')
        ->join('provincias','municipios.IdProvincia','=','provincias.IdProvincia')
        ->select('municipios.IdMunicipio','municipios.NombreMunicipio','provincias.NombreProvincia','departamentos.NombreDepartamento')
        ->paginate(10);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Municipios',
            'Accion' => 'El usuario '.Auth::user()->name. ' consultó la lista de municipios',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);   
    return view('municipios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipio = new StdClass();
        $municipio->IdDepartamento = "";
        $municipio->IdProvincia = "";
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        return view('municipios.create', compact('departamentos','provincias','municipio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipio=Municipio::create($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Municipios',
            'Accion' => 'El usuario '.Auth::user()->name. ' creó el municipio con ID-MUNICIPIO'.$municipio->IdMunicipio,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
        return redirect()->route('municipios.index',$municipio->IdMunicipio)->with('info','Tipo de Municipio guardada con exito!!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        return view('municipios.show', compact('departamentos','provincias','municipio'));
        //return view('municipios.show',compact('municipio'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        return view('municipios.edit',compact('municipio','provincias','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        $municipio->update($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Municipios',
            'Accion' => 'El usuario '.Auth::user()->name. ' actualizó el municipio con ID-MUNICIPIO'.$municipio->IdMunicipio,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);         
        return redirect()->route('municipios.index', $municipio->IdMunicipio)->with('info','Municipio Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $municipio->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }

    public function buscar(Request $request)
    {
    	$name  = $request->get('NombreMunicipio');
       	$municipios = Municipio::orderBy('IdMunicipio', 'DESC')
    		->name($name)
    		->paginate(10);


    	return view('municipios.index', compact('municipios'));
    }

}
