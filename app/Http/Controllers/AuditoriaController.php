<?php

namespace App\Http\Controllers;
use DataTables;
use App\Auditoria;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if ($request->ajax()) {
            $data=DB::table('auditorias')
            ->join
            (
                'users','users.id','=','auditorias.IdUsuario'
            )
            ->select
            (
                'auditorias.NombreTabla','auditorias.Accion','auditorias.created_at','auditorias.updated_at','users.id','users.name'
            )
            ->get();
            return Datatables::of($data)
                // ->addIndexColumn()
                ->make(true);
        }
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Candidatos',
            'Accion' => 'El usuario '.Auth::user()->name. ' consultó la lista de auditorias - logs de las acciones del sistema',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);          
        return view('auditorias.index');

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
     * @param  \App\Auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function show(Auditoria $auditoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Auditoria $auditoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auditoria $auditoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auditoria $auditoria)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $auditoria->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
