<?php

namespace App\Http\Controllers;

use App\HisAutoridad;
use App\Candidato;
use App\cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Auth;
class HisAutoridadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        DB::table('auditorias')->insert([
            'NombreTabla' => 'His_autoridads',
            'Accion' => 'El usuario consultó la lista de históricos de cambio de escaños de autoridades',            
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);        
        if ($request->ajax()) {
            $data = DB::table('his_autoridads')
                    ->join('candidatos','his_autoridads.HisIdCandidato','=','candidatos.IdCandidato')
                    ->join('cargos','his_autoridads.HisIdCargo','=','cargos.IdCargo')
                    ->select(
                        'his_autoridads.IdHistorico',
                        'his_autoridads.HisIdCandidato',
                        'his_autoridads.HisIdAutoridad',
                        'candidatos.Nombres',
                        'candidatos.PrimerApellido',
                        'candidatos.SegundoApellido',
                        'cargos.NombreCargo',
                        'his_autoridads.HisDocumentoAdjunto',
                        'cargos.Posicion',
                        'cargos.Titularidad',
                        'his_autoridads.HisFechaSolicitud',
                        'his_autoridads.HisFechaRespuesta',
                        'his_autoridads.HisIdCargo',
                        'his_autoridads.HisIsHabilitado',
                        'his_autoridads.HisObservaciones',
                        'his_autoridads.HisIsActivo',
                        'his_autoridads.HisDetalleIsHabilitado'
                        )
                    ->get();
            return Datatables::of($data)
                // ->addIndexColumn()
                ->make(true);
        }
        return view('historico.index');
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
     * @param  \App\HisAutoridad  $hisAutoridad
     * @return \Illuminate\Http\Response
     */
    public function show(HisAutoridad $hisAutoridad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HisAutoridad  $hisAutoridad
     * @return \Illuminate\Http\Response
     */
    public function edit(HisAutoridad $hisAutoridad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HisAutoridad  $hisAutoridad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HisAutoridad $hisAutoridad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HisAutoridad  $hisAutoridad
     * @return \Illuminate\Http\Response
     */
    public function destroy(HisAutoridad $hisAutoridad)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $hisAutoridad->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
