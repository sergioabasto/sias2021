<?php

namespace App\Http\Controllers;

use App\Antecedente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Auth;
use \stdClass;

class AntecedenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = DB::table("municipios")
            ->orderBy('municipios.NombreMunicipio', 'asc')
            ->get();
        $provincias = DB::table("provincias")
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->get();

        view()->share(['municipios' => $municipios, 'provincias' => $provincias]);
        return view('antecedentes.filtros');
    }

    public function searchAntecedente(Request $request)
    {
        if ($request->antecedente === "Seleccionar tipo de antecedente") {
            return redirect()->route('antecedente')->with('info', 'Elegir el tipo de antecedente!!.');;
        }
        $provincia_request = 0;
        if ($request->has('provincia')) {
            if ($request->provincia !== "Seleccionar provincia") {
                $provincia_request = $request->provincia;
            }
        }
        if ($request->has('municipioajax')) {
            $municipio_request = $request->municipioajax;
        } else {
            $municipio_request = "";
        }
        if ($request->has('antecedente')) {
            $antecedente_request = $request->antecedente;
        } else {
            $antecedente_request = "";
        }

        $titularidad_request = '';
        $autoridades = DB::table('candidatos')
            ->join('autoridads', 'autoridads.IdCandidato', '=', 'candidatos.IdCandidato')
            ->join('cargos', 'cargos.IdCargo', '=', 'autoridads.IdCargo')
            ->join('municipios', 'municipios.IdMunicipio', '=', 'candidatos.IdMunicipio')
            ->join('provincias', 'provincias.IdProvincia', '=', 'candidatos.IdProvincia')
            ->join('organizacion_politicas', 'organizacion_politicas.IdOrganizacionPolitica', '=', 'candidatos.IdOrganizacionPolitica')
            // ->leftJoin('his_autoridads as ha', 'ha.HisIdCandidato', '=', 'candidatos.IdCandidato')
            // ->leftJoin('his_autoridads as ha', function ($leftJoin) {
            //     $leftJoin->on('ha.HisIdCandidato', '=', 'candidatos.IdCandidato')
            //         ->where('ha.IdHistorico', '=', DB::raw('(select max(his_autoridads."IdHistorico") from his_autoridads where his_autoridads."HisIdCandidato" = ha."HisIdCandidato")'));
            // })
            ->select('cargos.Posicion', 'organizacion_politicas.Sigla', 'cargos.NombreCargo', 'cargos.Titularidad', 'candidatos.Nombres', 'candidatos.PrimerApellido', 'candidatos.SegundoApellido', 'candidatos.Genero', 'municipios.NombreMunicipio', 'provincias.NombreProvincia', 'autoridads.DetalleIsHabilitado', 'autoridads.FechaRespuesta as modificado_autoridad', 'candidatos.IdCandidato', 'autoridads.Observaciones');

        $historicos = DB::table('candidatos')
            ->join('his_autoridads', 'his_autoridads.HisIdCandidato', '=', 'candidatos.IdCandidato')
            ->join('cargos', 'cargos.IdCargo', '=', 'his_autoridads.HisIdCargo')
            ->join('municipios', 'municipios.IdMunicipio', '=', 'candidatos.IdMunicipio')
            ->join('provincias', 'provincias.IdProvincia', '=', 'candidatos.IdProvincia')
            ->join('organizacion_politicas', 'organizacion_politicas.IdOrganizacionPolitica', '=', 'candidatos.IdOrganizacionPolitica')
            ->select('cargos.Posicion', 'organizacion_politicas.Sigla', 'cargos.NombreCargo', 'cargos.Titularidad', 'candidatos.Nombres', 'candidatos.PrimerApellido', 'candidatos.SegundoApellido', 'candidatos.Genero', 'municipios.NombreMunicipio', 'provincias.NombreProvincia', 'his_autoridads.HisDetalleIsHabilitado as DetalleIsHabilitado', 'his_autoridads.HisFechaRespuesta as modificado_autoridad', 'candidatos.IdCandidato', 'his_autoridads.HisObservaciones as Observaciones');
        $nombre_pdf = "";
        switch ($antecedente_request) {
            case 'alcalde_concejal':
                $autoridades = $autoridades->where('provincias.IdProvincia', 'like', $provincia_request)
                    ->where('municipios.IdMunicipio', $request->municipioajax)
                    ->whereBetween('cargos.IdCargo', [1, 23])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $historicos = $historicos->where('provincias.IdProvincia', 'like', $provincia_request)
                    ->where('municipios.IdMunicipio', $request->municipioajax)
                    ->whereBetween('cargos.IdCargo', [1, 23])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $nombre_pdf = "Antecentes - Alcalde y Concejales";
                break;
            case 'municipal':
                $autoridades = $autoridades->where('provincias.IdProvincia', 'like', $provincia_request)
                    ->where('municipios.IdMunicipio', $request->municipioajax)
                    ->whereBetween('cargos.IdCargo', [1, 23])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $historicos = $historicos->where('provincias.IdProvincia', 'like', $provincia_request)
                    ->where('municipios.IdMunicipio', $request->municipioajax)
                    ->whereBetween('cargos.IdCargo', [1, 23])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $nombre_pdf = "Antecedentes - Municipales";

                break;
            case 'gobernador':
                $autoridades = $autoridades
                    ->whereBetween('cargos.IdCargo', [24, 24])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $historicos = $historicos
                    ->whereBetween('cargos.IdCargo', [24, 24])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $nombre_pdf = "Antecedentes - Gobernador";

                break;
            case 'gubernamental':
                $autoridades = $autoridades
                    ->whereBetween('cargos.IdCargo', [24, 24])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $historicos = $historicos
                    ->whereBetween('cargos.IdCargo', [24, 24])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $nombre_pdf = "Antecedentes - Gubernamentales";

                break;
            case 'asambleista_poblacion':
                $autoridades = $autoridades
                    ->where('cargos.NombreCargo', 'Asambleísta Departamental por Población')
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $historicos = $historicos
                    ->where('cargos.NombreCargo', 'Asambleísta Departamental por Población')
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $nombre_pdf = "Antecedentes - Asambleistas por población";

                break;
            case 'poblacional':
                $autoridades = $autoridades
                    ->where('cargos.NombreCargo', 'Asambleísta Departamental por Población')
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $historicos = $historicos
                    ->where('cargos.NombreCargo', 'Asambleísta Departamental por Población')
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $nombre_pdf = "Antecedentes - poblacionales";

                break;
            case 'asambleista_territorio':
                $autoridades = $autoridades
                    ->where('cargos.NombreCargo', 'Asambleísta Departamental por Territorio')
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $historicos = $historicos
                    ->where('cargos.NombreCargo', 'Asambleísta Departamental por Territorio')
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $nombre_pdf = "Antecedentes - Asambleistas por territorio";

                break;
            case 'territorial':
                $autoridades = $autoridades
                    ->where('cargos.NombreCargo', 'Asambleísta Departamental por Territorio')
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $historicos = $historicos
                    ->where('cargos.NombreCargo', 'Asambleísta Departamental por Territorio')
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $nombre_pdf = "Antecedentes - territoriales";

                break;
            case 'asambleistas_npioc':
                $autoridades = $autoridades
                    ->whereIn('cargos.IdCargo', ['106', '108', '110', '112', '114', '107', '109', '111', '113', '115'])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $historicos = $historicos
                    ->whereIn('cargos.IdCargo', ['106', '108', '110', '112', '114', '107', '109', '111', '113', '115'])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $nombre_pdf = "Antecedentes - Asambleistas nacion y pueblo indigena originario";

                break;
            case 'npiocal':
                $autoridades = $autoridades
                    ->whereIn('cargos.IdCargo', ['106', '108', '110', '112', '114', '107', '109', '111', '113', '115'])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $historicos = $historicos
                    ->whereIn('cargos.IdCargo', ['106', '108', '110', '112', '114', '107', '109', '111', '113', '115'])
                    ->orderBy('cargos.Posicion', 'asc')
                    ->orderBy('cargos.NombreCargo', 'asc')
                    ->orderBy('cargos.Titularidad', 'desc');
                $nombre_pdf = "Antecedentes - Naciones y pueblos indigenas originarios";

                break;
            default:
                $autoridades = new stdClass();
        }

        $autoridades = $autoridades->get();
        $historicos = $historicos->get();

        $autoridades = $autoridades->merge($historicos);
        $municipios = DB::table("municipios")->get();
        $provincias = DB::table("provincias")
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->get();
        $municipio = DB::table("municipios")
            ->where('municipios.IdMunicipio', $request->municipioajax)
            ->get();
        $provincia = DB::table("provincias")
            ->where('provincias.IdProvincia', $provincia_request)
            ->get();
        $cargos = DB::table("cargos")->distinct('NombreCargo')->get();

        view()->share(['autoridades' => $autoridades, 'municipios' => $municipios, 'provincias' => $provincias, 'cargos' => $cargos, 'provincia_request' => $provincia_request, 'municipio_request' => $municipio_request, 'titularidad_request' => $titularidad_request, 'antecedente_request' => $antecedente_request, 'provincia' => $provincia, 'municipio' => $municipio, 'nombre_pdf' => $nombre_pdf]);
        if ($request->antecedente === 'alcalde_concejal' || $request->antecedente === 'gobernador' || $request->antecedente === 'asambleista_poblacion' || $request->antecedente === 'asambleista_territorio' || $request->antecedente === 'asambleistas_npioc') {
            if ($antecedente_request === "alcalde_concejal" || $antecedente_request === "municipal") {
                DB::table('auditorias')->insert([
                    'NombreTabla' => 'his_autoridads',
                    'Accion' => 'El usuario ' . Auth::user()->name . ' consultó el reporte de ' . $nombre_pdf . '-' . $autoridades[0]->NombreProvincia . ' ' . $autoridades[0]->NombreMunicipio,
                    'IdUsuario' => (int)Auth::user()->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                DB::table('auditorias')->insert([
                    'NombreTabla' => 'his_autoridads',
                    'Accion' => 'El usuario ' . Auth::user()->name . ' consultó el reporte de ' . $nombre_pdf,
                    'IdUsuario' => (int)Auth::user()->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if ($request->has('download')) {
                $headerHtml = view()->make('composicion.head')->render();
                $footerHtml = view()->make('composicion.foot')->render();
                $pageMargins = [25, 20, 25, 30];
                $pageName = 'credencial.pdf';
                // pass view file
                $pdf = PDF::loadView('antecedentes.pdf')->setOrientation('landscape')
                    ->setOption('header-html', $headerHtml)
                    ->setOption('footer-html', $footerHtml)
                    ->setOption('page-size', 'A4')
                    ->setOption('margin-top', '1cm')
                    ->setOption('margin-right', '1cm')
                    ->setOption('margin-bottom', '1cm')
                    ->setOption('margin-left', '1cm')
                    ->setOption('encoding', 'utf-8')
                    ->setOption('footer-right', '[page]')
                    ->setOption('enable-local-file-access', true);
                // download pdf
                if ($antecedente_request === "alcalde_concejal" || $antecedente_request === "municipal") {
                    DB::table('auditorias')->insert([
                        'NombreTabla' => 'his_autoridads',
                        'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de ' . $nombre_pdf . '-' . $autoridades[0]->NombreProvincia . ' ' . $autoridades[0]->NombreMunicipio,
                        'IdUsuario' => (int)Auth::user()->id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                    return $pdf->download($nombre_pdf . '-' . $autoridades[0]->NombreProvincia . ' ' . $autoridades[0]->NombreMunicipio . '.pdf');
                } else {
                    DB::table('auditorias')->insert([
                        'NombreTabla' => 'his_autoridads',
                        'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de ' . $nombre_pdf,
                        'IdUsuario' => (int)Auth::user()->id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                    return $pdf->download($nombre_pdf . '.pdf');
                }
            }

            return view('antecedentes.vistaprevia');
        } else {
            if ($antecedente_request === "alcalde_concejal" || $antecedente_request === "municipal") {
                DB::table('auditorias')->insert([
                    'NombreTabla' => 'his_autoridads',
                    'Accion' => 'El usuario ' . Auth::user()->name . ' consultó el reporte de ' . $nombre_pdf . '-' . $autoridades[0]->NombreProvincia . ' ' . $autoridades[0]->NombreMunicipio,
                    'IdUsuario' => (int)Auth::user()->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                DB::table('auditorias')->insert([
                    'NombreTabla' => 'his_autoridads',
                    'Accion' => 'El usuario ' . Auth::user()->name . ' consultó el reporte de ' . $nombre_pdf,
                    'IdUsuario' => (int)Auth::user()->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if ($request->has('download')) {
                $headerHtml = view()->make('composicion.head')->render();
                $footerHtml = view()->make('composicion.foot')->render();
                $pageMargins = [25, 20, 25, 30];
                $pageName = 'credencial.pdf';
                // pass view file
                $pdf = PDF::loadView('antecedentes_municipales.pdf')->setOrientation('landscape')
                    ->setOption('header-html', $headerHtml)
                    ->setOption('footer-html', $footerHtml)
                    ->setOption('page-size', 'A4')
                    ->setOption('margin-top', '1cm')
                    ->setOption('margin-right', '1cm')
                    ->setOption('margin-bottom', '1cm')
                    ->setOption('margin-left', '1cm')
                    ->setOption('encoding', 'utf-8')
                    ->setOption('footer-right', '[page]')
                    ->setOption('enable-local-file-access', true);
                // download pdf
                if ($antecedente_request === "alcalde_concejal" || $antecedente_request === "municipal") {
                    DB::table('auditorias')->insert([
                        'NombreTabla' => 'his_autoridads',
                        'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de ' . $nombre_pdf . '-' . $autoridades[0]->NombreProvincia . ' ' . $autoridades[0]->NombreMunicipio,
                        'IdUsuario' => (int)Auth::user()->id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                    return $pdf->download($nombre_pdf . '-' . $autoridades[0]->NombreProvincia . ' ' . $autoridades[0]->NombreMunicipio . '.pdf');
                } else {
                    DB::table('auditorias')->insert([
                        'NombreTabla' => 'his_autoridads',
                        'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de ' . $nombre_pdf,
                        'IdUsuario' => (int)Auth::user()->id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                    return $pdf->download($nombre_pdf . '.pdf');
                }
            }

            return view('antecedentes_municipales.vistaprevia');
        }
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
     * @param  \App\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function show(Antecedente $antecedente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function edit(Antecedente $antecedente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Antecedente $antecedente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antecedente $antecedente)
    {
        $segment_users = url('/') . '/' . request()->segment(1);
        $antecedente->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
