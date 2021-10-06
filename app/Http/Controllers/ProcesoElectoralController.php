<?php

namespace App\Http\Controllers;

use App\ProcesoElectoral;
use Illuminate\Http\Request;

class ProcesoElectoralController extends Controller
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
     * @param  \App\ProcesoElectoral  $procesoElectoral
     * @return \Illuminate\Http\Response
     */
    public function show(ProcesoElectoral $procesoElectoral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProcesoElectoral  $procesoElectoral
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcesoElectoral $procesoElectoral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProcesoElectoral  $procesoElectoral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProcesoElectoral $procesoElectoral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProcesoElectoral  $procesoElectoral
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcesoElectoral $procesoElectoral)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $procesoElectoral->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
