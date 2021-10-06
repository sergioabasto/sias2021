<?php

namespace App\Http\Controllers;

use App\ResolucionCredencial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ResolucionCredencialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Resolucion_credencials',
            'Accion' => 'El usuario '.Auth::user()->name. ' consultó la resolución de la credencial',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);     
        $resolucion_credencials=ResolucionCredencial::paginate(10);
        return view('resolucion.crear', compact('resolucion_credencials'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ResolucionCredencial  $resolucionCredencial
     * @return \Illuminate\Http\Response
     */
    public function show(ResolucionCredencial $resolucionCredencial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResolucionCredencial  $resolucionCredencial
     * @return \Illuminate\Http\Response
     */
    public function edit(ResolucionCredencial $resolucion_credencials)
    {
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Resolucion_credencials',
            'Accion' => 'El usuario '.Auth::user()->name. ' actualizó la resolución de la credencial',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);             
        return view('resolucion.edit',compact('resolucion_credencials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResolucionCredencial  $resolucionCredencial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResolucionCredencial $resolucion_credencials)
    {
        $datosResolucion = request()->except(['_token','_method']);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Resolucion_credencials',
            'Accion' => 'El usuario '.Auth::user()->name. ' actualizó la resolución de la credencial',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);           
        ResolucionCredencial::where('IdResolucionCredencial','=',$resolucion_credencials->IdResolucionCredencial)->update($datosResolucion);
        return redirect()->route('resolucion.index')->with('info','Autoridad Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResolucionCredencial  $resolucionCredencial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResolucionCredencial $resolucionCredencial)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $resolucionCredencial->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
