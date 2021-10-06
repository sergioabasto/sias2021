<?php

namespace App\Http\Controllers;
use App\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \stdClass;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Departamentos',
            'Accion' => 'El usuario consultó la lista de departamentos',            
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);           
        $departamentos=Departamento::paginate(10);
        return view('departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamentos=departamento::create($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Departamentos',
            'Accion' => 'El usuario creo el departamento con ID-DEPARTAMENTO '.$departamentos->IdDepartamento,            
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);    
        return redirect()->route('departamentos.index',$departamentos->IdDepartamento)->with('info','Departamento  Guardado con exito!!.');
    }

    /**
     * Display the specified resource.
     *
     *@param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(departamento $departamento)
    {
        return view('departamentos.show',compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(departamento $departamento)
    {
        return view('departamentos.edit',compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, departamento $departamento)
    {
        $departamento->update($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Departamentos',
            'Accion' => 'El usuario modificó el departamento con ID-DEPARTAMENTO '.$departamento->IdDepartamento,            
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);           
        return redirect()->route('departamentos.index', $departamento->IdDepartamento)->with('info','Departamento Actualizado con exito!!.');

    }

    /**
     * Remove the specified resource from storage.
     *
     *@param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(departamento $departamento)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $departamento->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
