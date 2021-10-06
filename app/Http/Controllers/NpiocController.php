<?php

namespace App\Http\Controllers;

use App\Autoridad;
use App\Municipio;
use App\Provincia;
use App\Departamento;
use App\Candidato;
use App\Cargo;
use App\OrganizacionPolitica;
use App\Npioc;
use App\ProcesoElectoral;
use \stdClass;
use App\Http\Controllers\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NpiocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['npiocs'] = DB::table('candidatos')
            ->join('organizacion_politicas', 'candidatos.IdOrganizacionPolitica', '=', 'organizacion_politicas.IdOrganizacionPolitica')
            ->join('cargos', 'candidatos.IdCargo', '=', 'cargos.IdCargo')
            ->select(
                'candidatos.IdCandidato',
                'candidatos.Nombres',
                'candidatos.PrimerApellido',
                'candidatos.SegundoApellido',
                'candidatos.DocumentoIdentidad',
                'candidatos.Genero',
                'candidatos.FechaNacimiento',
                'candidatos.IsElecto',
                'organizacion_politicas.Sigla'
            )
            ->where('cargos.NombreCargo', 'like', '%NACIÓN Y PUEBLO INDÍGENA ORIGINARIO%')
            ->paginate(10);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Candidatos',
            'Accion' => 'El usuario ' . Auth::user()->name . ' consultó la lista de candidatos npio',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return view('npioc.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::where('cargos.NombreCargo', 'like', '%NACIÓN Y PUEBLO INDÍGENA ORIGINARIO%')->get();
        $organizacionpoliticas = Organizacionpolitica::all();
        $procesoelectoral = ProcesoElectoral::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $municipios = Municipio::all();
        $npioc = new StdClass();
        $npioc->LugarExpedido = "";
        $npioc->Genero = "";
        $npioc->IsElecto = "";
        $npioc->IdCargo = "";
        $npioc->IdProcesoElectoral  = "";
        $npioc->IdOrganizacionPolitica  = "";
        $npioc->IdDepartamento  = "";
        $npioc->IdProvincia  = "";
        $npioc->IdMunicipio  = "";
        return view('npioc.create', compact('npioc', 'cargos', 'organizacionpoliticas', 'departamentos', 'provincias', 'municipios', 'procesoelectoral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $npioc = Candidato::create($request->except(['_token', '_method']));
        $autoridad = new Autoridad();
        $autoridad->DocumentoAdjunto = null;
        $autoridad->Observaciones = 'Ninguna';
        $autoridad->FechaSolicitud = null;
        $autoridad->FechaRespuesta = null;
        $autoridad->IsHabilitado = 'Habilitado';
        $autoridad->DetalleIsHabilitado = 'Candidato Electo 2021';
        $autoridad->FechaSolicitud = null;
        $autoridad->IdCandidato = $npioc->IdCandidato;
        $autoridad->IdCargo = $npioc->IdCargo;
        $autoridad->IsActivo = 'si';
        $autoridad->save();
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Candidatos y Autoridads',
            'Accion' => 'El usuario ' . Auth::user()->name . ' creó la autoridad npio con ID-AUTORIDAD ' . $autoridad->IdAutoridad . ' del candidato npio con ID-CANDIDATO ' .  $npioc->IdCandidato,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('npiocs.index', $npioc->IdCandidato)->with('info', 'Candidato/a guardado/a con exito!!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Npioc  $npioc
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $npioc)
    {
        return view('npioc.show', compact('npioc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Npioc  $npioc
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $npioc)
    {
        //$cargos = Cargo::all();
        $cargos = Cargo::where('cargos.NombreCargo', 'like', '%NACIÓN Y PUEBLO INDÍGENA ORIGINARIO%')->get();
        $organizacionpoliticas = Organizacionpolitica::all();
        $procesoelectoral = ProcesoElectoral::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $municipios = Municipio::all();
        return view('npioc.edit', compact('procesoelectoral', 'npioc', 'cargos', 'organizacionpoliticas', 'departamentos', 'provincias', 'municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Npioc  $npioc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $npioc)
    {
        $npioc->update($request->all());
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Candidatos',
            'Accion' => 'El usuario ' . Auth::user()->name . ' actualizó el candidato npio con ID-CANDIDATO ' . $npioc->IdCandidato,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('npiocs.index', $npioc->IdCandidato)->with('info', 'Candidato Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Npioc  $npioc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $npioc)
    {
        $segment_users = url('/') . '/' . request()->segment(1);
        $npioc->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }

    public function buscar(Request $request)
    {
        $name  = $request->get('Nombres');
        $appat = $request->get('PrimerApellido');
        $apmat = $request->get('SegundoApellido');
        $ci   = $request->get('DocumentoIdentidad');
        $npioc = Npioc::orderBy('IdCandidato', 'DESC')
            ->nombre($name)
            ->appat($appat)
            ->apmat($apmat)
            ->ci($ci)
            ->paginate(10);
        return view('npiocs.index', compact('npioc'));
    }
}
