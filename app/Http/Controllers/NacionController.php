<?php

namespace App\Http\Controllers;

use App\Nacion;
use Illuminate\Http\Request;

class NacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nacions=Nacion::paginate(10);
        return view('nacions.index', compact('nacions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nacions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nacions=Nacion::create($request->all());

        return redirect()->route('nacions.index',$nacions->IdNacion)->with('info','Departamento  Guardado con exito!!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nacion  $nacion
     * @return \Illuminate\Http\Response
     */
    public function show(Nacion $nacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nacion  $nacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Nacion $nacion)
    {
        return view('nacions.edit',compact('nacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nacion  $nacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nacion $nacion)
    {
        $nacion->update($request->all());
        return redirect()->route('nacions.index', $nacion->IdNacion)->with('info','Nacion Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nacion  $nacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nacion $nacion)
    {
        //
    }
}
