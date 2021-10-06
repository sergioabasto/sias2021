<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Redirect,Response;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = Departamento::latest()->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
        $action = '<a class="btn btn-info" id="show-user" data-toggle="modal" data-id='.$row->IdDepartamento.'>Mostrar</a>
        <a class="btn btn-success" id="edit-user" data-toggle="modal" data-id='.$row->IdDepartamento.'>Editar </a>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <a id="delete-user" data-id='.$row->IdDepartamento.' class="btn btn-danger delete-user">Borrar</a>';

        return $action;

        })
        ->rawColumns(['action'])
        ->make(true);
        }
        return view('departaments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $r=$request->validate([
            'name' => 'required',
        ]);
        $uid = $request->user_id;
        // Departamentos::updateOrCreate(['IdDepartamento' => $uid],['NombreDepartamento' => $request->name]);
        $dep = Departamento::orderBy('IdDepartamento', 'desc')->first();
        if(isset($dep->IdDepartamento))
        {
            $last_id = $dep->IdDepartamento;
        }
        else{
            $last_id = 0;
        }

        if(empty($request->user_id))
        {
            $id = Departamento::create(['IdDepartamento' => $last_id+1, 'NombreDepartamento' => $request->name]);
            $msg = 'Departamento ha sido creado con éxito.';

        }
        else
        {
            $depto = Departamento::find($uid);
            $data = $request->except('_method','_token','submit');
            $depto->update(['NombreDepartamento' => $request->name]);
            $msg = 'Departamento ha sido actualizado con éxito';

        }
        return redirect()->route('departaments.index')->with('success',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        $where = array('IdDepartamento' => $id);
        $depto = Departamento::where($where)->first();
        return Response::json($depto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('IdDepartamento' => $id);
        $user = Departamento::where($where)->first();
        return Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $departamento->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
    public function destruir($id)
    {
        $user = Departamento::where('IdDepartamento',$id)->delete();
        return Response::json($user);
        //return redirect()->route('users.index');
    }
}
