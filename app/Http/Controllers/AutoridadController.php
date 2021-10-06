<?php

namespace App\Http\Controllers;

use DataTables;
use App\Autoridad;
use App\Candidato;
use App\cargo;
use App\HisAutoridad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AutoridadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Autoridads',
            'Accion' => 'El usuario ' . Auth::user()->name . ' consultó la lista de autoridades',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $habilitado = 'Habilitado';
        if ($request->ajax()) {
            $data = DB::table('autoridads')
                ->join('candidatos', 'autoridads.IdCandidato', '=', 'candidatos.IdCandidato')
                ->join('cargos', 'autoridads.IdCargo', '=', 'cargos.IdCargo')
                ->where('autoridads.IsHabilitado', 'like', $habilitado)
                ->select(
                    'autoridads.IdAutoridad',
                    'candidatos.IdCandidato',
                    'candidatos.Nombres',
                    'candidatos.PrimerApellido',
                    'candidatos.SegundoApellido',
                    'cargos.NombreCargo',
                    'DocumentoAdjunto',
                    'autoridads.IsHabilitado',
                    'autoridads.Observaciones',
                    'cargos.Posicion',
                    'cargos.Titularidad',
                    'autoridads.FechaSolicitud',
                    'autoridads.FechaRespuesta',
                    'autoridads.DetalleIsHabilitado',
                    'autoridads.IsActivo',
                    'autoridads.IdCargo',
                    'autoridads.FechaIngresoTic'
                )
                ->get();
            return Datatables::of($data)
                // ->addIndexColumn()
                ->make(true);
        }
        return view('autoridads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();
        $candidatos = Candidato::all();
        return view('autoridads.create', compact('cargos', 'candidatos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'IdAutoridad'=>'required|numeric',
            'DocumentoAdjunto'=>'required|mimes:pdf|unique:autoridads,archivo',
            'Obsevaciones'=>'required|max:500',
            'FechaSolicitud'=>'required|date',
            'FechaRespuesta'=>'required|date',
            'IsHabilitado'=>'required|max:120',
            'DetalleIsHabilitado'=>'required|max:500',
            'IdCandidato'=>'required|numeric',
            'IdCargo'=>'required|numeric',
            'IdDocumento'=>'required|numeric',
            'IsACtivo'=>'required|max:500',

        ]);*/
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Autoridads',
            'Accion' => 'El usuario ' . Auth::user()->name . ' creó una autoridad',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $autoridad = request()->except('_token');

        if ($request->hasFile('DocumentoAdjunto')) {
            $autoridad['DocumentoAdjunto'] = $request->file('DocumentoAdjunto')->store('uploads', 'public');
        }
        Autoridad::create($autoridad);
        return redirect()->route('autoridads.index')->with('info', 'autoridad guardada con exito!!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function show(Autoridad $autoridad)
    {
        return view('autoridads.show', compact('autoridad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function edit(Autoridad $autoridad)
    {
        $cargos = Cargo::all();
        $hisautoridad = Hisautoridad::all();
        $candidatos = Candidato::all();
        return view('autoridads.edit', compact('autoridad', 'cargos', 'candidatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autoridad $autoridad)
    {
        $auto = Autoridad::get()->find($autoridad->IdAutoridad);
        DB::table('his_autoridads')->insert([
            'HisIdAutoridad' => $auto->IdAutoridad,
            'HisDocumentoAdjunto' => $auto->DocumentoAdjunto,
            'HisObservaciones' => $auto->Observaciones,
            'HisFechaSolicitud' => $auto->FechaSolicitud,
            'HisFechaRespuesta' =>  $auto->FechaRespuesta,
            'HisFechaIngresoTic' => $auto->FechaIngresoTic,
            'HisIsHabilitado' => $auto->IsHabilitado,
            'HisDetalleIsHabilitado' => $auto->DetalleIsHabilitado,
            'HisIdCandidato' => $auto->IdCandidato,
            'HisIdCargo' => $auto->IdCargo,
            'HisIdDocumento' => $auto->IdDocumento,
            'HisIsActivo' => $auto->IsActivo,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'His_autoridads y Autoridads',
            'Accion' => 'El usuario ' . Auth::user()->name . ' modificó la autoridad con ID-AUTORIDAD ' . $auto->IdAutoridad . ' del candidato con ID-CANDIDATO ' .  $auto->IdCandidato,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($request->Habilitado === "InHabilitado") {
            DB::table('his_autoridads')->insert([
                'HisIdAutoridad' => $autoridad->IdAutoridad,
                'HisDocumentoAdjunto' => $autoridad->DocumentoAdjunto,
                'HisObservaciones' => $autoridad->Observaciones,
                'HisFechaSolicitud' => $autoridad->FechaSolicitud,
                'HisFechaRespuesta' =>  $autoridad->FechaRespuesta,
                'HisFechaIngresoTic' => $autoridad->FechaIngresoTic,
                'HisIsHabilitado' => $autoridad->IsHabilitado,
                'HisDetalleIsHabilitado' => $autoridad->DetalleIsHabilitado,
                'HisIdCandidato' => $autoridad->IdCandidato,
                'HisIdCargo' => $autoridad->IdCargo,
                'HisIdDocumento' => $autoridad->IdDocumento,
                'HisIsActivo' => $autoridad->IsActivo,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            DB::table('auditorias')->insert([
                'NombreTabla' => 'his_autoridads',
                'Accion' => 'El usuario ' . Auth::user()->name . ' modificó e inhabilitó la autoridad con ID ' . $auto->IdAutoridad,
                'IdUsuario' => (int)Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        $hisautoridad = Hisautoridad::all();
        $datosAutoridad = request()->except(['_token', '_method']);
        if ($request->hasFile('DocumentoAdjunto')) {
            $autoridad = Autoridad::findOrFail($autoridad->IdAutoridad);
            /*Storage::delete('public/'.$autoridad->DocumentoAdjunto);*/
            $datosAutoridad['DocumentoAdjunto'] = $request->file('DocumentoAdjunto')->store('uploads', 'public');
        }
        Autoridad::where('IdAutoridad', '=', $autoridad->IdAutoridad)->update($datosAutoridad);
        return redirect()->route('autoridads.index')->with('info', 'Autoridad Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autoridad $autoridad)
    {
        $segment_users = url('/') . '/' . request()->segment(1);
        $autoridad->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }

    public function buscar(Request $request)
    {

        $name  = $request->get('IdAutoridad');
        $idcand = $request->get('IdCandidato');
        $autoridads = Autoridad::orderBy('IdAutoridad', 'DESC')
            ->nombre($name)
            ->cand($idcand)
            ->paginate(10);


        return view('autoridads.index', compact('autoridads'));
    }
}
