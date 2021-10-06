<?php

namespace App\Http\Controllers;

use App\PersonalTed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PersonalTedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal_teds = PersonalTed::paginate(10);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Personal_teds',
            'Accion' => 'El usuario ' . Auth::user()->name . ' consultó la lista de autoridades del personal del TED LA PAZ',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return view('personal.index', compact('personal_teds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personalted = PersonalTed::create($request->all());
        return redirect()->route('personal.index', $personalted->IdPersonalTed)->with('info', 'Personal TED Guardado con exito!!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersonalTed  $personalTed
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalTed $personalTed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonalTed  $personalTed
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalTed $nacion)
    {
        return view('personal.edit', compact('nacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonalTed  $personalTed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalTed $nacion)
    {
        $nacion->update($request->all());
        $personal_teds = PersonalTed::paginate(10);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Personal_teds',
            'Accion' => 'El usuario ' . Auth::user()->name . ' actualizó la autoridad del personal del TED LA PAZ con IdPersonalTed ' . $nacion->IdPersonalTed,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('personal.index', $nacion->IdPersonalTed)->with('info', 'personal TED Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonalTed  $personalTed
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalTed $personalTed)
    {
        $segment_users = url('/') . '/' . request()->segment(1);
        $personalTed->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
