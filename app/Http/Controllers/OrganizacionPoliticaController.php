<?php

namespace App\Http\Controllers;

use App\OrganizacionPolitica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrganizacionPoliticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizacion_politicas=Organizacionpolitica:: paginate(10);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Organizacion_politicas',
            'Accion' => 'El usuario '.Auth::user()->name. ' consultó la lista de organizaciones políticas',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);           
        return view('organizacionpoliticas.index', compact('organizacion_politicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizacionpoliticas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $organizacionpolitica=organizacionpolitica::create($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Organizacion_politicas',
            'Accion' => 'El usuario '.Auth::user()->name. ' creó una organización política con ID-ORGANIZACION-POLITICA '.$organizacionpolitica->IdOrganizacionPolitica,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);      
        return redirect()->route('organizacionpoliticas.edit',$organizacionpolitica->IdOrganizacionPolitica)->with('info','Tipo de Provincia guardada con exito!!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrganizacionPolitica  $organizacionPolitica
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizacionPolitica $organizacionpolitica)
    {
        return view('organizacionpoliticas.show',compact('organizacionpolitica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrganizacionPolitica  $organizacionPolitica
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizacionPolitica $organizacionpolitica)
    {
        return view('organizacionpoliticas.edit',compact('organizacionpolitica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrganizacionPolitica  $organizacionPolitica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizacionPolitica $organizacionpolitica)
    {
        $organizacionpolitica->update($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Organizacion_politicas',
            'Accion' => 'El usuario '.Auth::user()->name. ' actualizó la organización política con ID-ORGANIZACION-POLITICA '.$organizacionpolitica->IdOrganizacionPolitica,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);           
        return redirect()->route('organizacionpoliticas.index', $organizacionpolitica->IdOrganizacionPolitica)->with('info','Organizacion Politica Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrganizacionPolitica  $organizacionPolitica
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizacionPolitica $organizacionPolitica)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $organizacionPolitica->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
