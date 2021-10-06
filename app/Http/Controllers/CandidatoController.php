<?php

namespace App\Http\Controllers;

use DataTables;
use App\Municipio;
use App\Provincia;
use App\Departamento;
use App\Candidato;
use App\Cargo;
use App\OrganizacionPolitica;
use App\ProcesoElectoral;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('candidatos')
                ->join(
                    'organizacion_politicas',
                    'candidatos.IdOrganizacionPolitica',
                    '=',
                    'organizacion_politicas.IdOrganizacionPolitica'
                )
                ->select(
                    'candidatos.IdCandidato',
                    'candidatos.Nombres',
                    'candidatos.PrimerApellido',
                    'candidatos.SegundoApellido',
                    'candidatos.DocumentoIdentidad',
                    'candidatos.Genero',
                    'candidatos.FechaNacimiento',
                    'candidatos.Telefono',
                    'candidatos.ComplementoSegip',
                    'candidatos.LugarExpedido',
                    'organizacion_politicas.Sigla'
                )
                ->get();
            return Datatables::of($data)
                // ->addIndexColumn()
                ->make(true);
        }
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Candidatos',
            'Accion' => 'El usuario ' . Auth::user()->name . ' consultó la lista de candidatos',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return view('candidatos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();
        $organizacionpoliticas = Organizacionpolitica::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $municipios = Municipio::all();

        return view('candidatos.create', compact('cargos', 'organizacionpoliticas', 'departamentos', 'provincias', 'municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidato = candidato::create($request->all());
        $procesoelectorals = ProcesoElectoral::all();

        return redirect()->route('provincias.index', $candidato->IdCandidato)->with('info', 'Candidato/a guardado con exito!!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        $cargos = Cargo::all();
        $organizacionpoliticas = Organizacionpolitica::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $municipios = Municipio::all();
        $procesoelectorals = ProcesoElectoral::all();
        return view('candidatos.show', compact('cargos', 'organizacionpoliticas', 'departamentos', 'provincias', 'municipios', 'candidato', 'procesoelectorals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        $cargos = Cargo::all();
        $organizacionpoliticas = Organizacionpolitica::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $municipios = Municipio::all();
        $procesoelectorals = ProcesoElectoral::all();

        return view('candidatos.edit', compact('candidato', 'cargos', 'organizacionpoliticas', 'departamentos', 'provincias', 'municipios', 'procesoelectorals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Candidatos',
            'Accion' => 'El usuario ' . Auth::user()->name . ' modificó el candidato con ID-CANDIDATO ' . $candidato->IdCandidato,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $candidato->update($request->all());
        return redirect()->route('candidatos.index', $candidato->IdCandidato)->with('info', 'Candidato Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        $segment_users = url('/') . '/' . request()->segment(1);
        $candidato->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
    public function buscar(Request $request)
    {
        $name  = $request->get('Nombres');
        $appat = $request->get('PrimerApellido');
        $apmat   = $request->get('SegundoApellido');
        $ci   = $request->get('DocumentoIdentidad');

        $candidatos = Candidato::orderBy('IdCandidato', 'DESC')
            ->nombre($name)
            ->appat($appat)
            ->apmat($apmat)
            ->ci($ci)
            ->paginate(10);

        return view('candidatos.index', compact('candidatos'));
    }
}
