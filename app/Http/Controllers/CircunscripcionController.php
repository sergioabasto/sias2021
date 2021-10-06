<?php

namespace App\Http\Controllers;

use App\Circunscripcion;
use Illuminate\Http\Request;

class CircunscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Circunscripcion  $circunscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Circunscripcion $circunscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Circunscripcion  $circunscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Circunscripcion $circunscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Circunscripcion  $circunscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Circunscripcion $circunscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Circunscripcion  $circunscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Circunscripcion $circunscripcion)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $circunscripcion->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
