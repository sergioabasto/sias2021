<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ComposicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado = "alcaldia_concejal";
        $municipios = DB::table("municipios")
            ->orderBy('municipios.NombreMunicipio', 'asc')
            ->get();
        $provincias = DB::table("provincias")
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->get();

        $cargos = DB::table("cargos")->distinct('NombreCargo')->get();
        view()->share(['municipios' => $municipios, 'provincias' => $provincias, 'cargos' => $cargos, 'estado' => $estado]);
        $tipo = "alcaldia_concejal";
        return view('composicion.filtros');
    }
    public function territorio()
    {

        $estado = "territorio";
        $municipios = DB::table("municipios")
            ->orderBy('municipios.NombreMunicipio', 'asc')
            ->get();
        $provincias = DB::table("provincias")
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->get();

        $cargos = DB::table("cargos")->distinct('NombreCargo')->get();
        view()->share(['municipios' => $municipios, 'provincias' => $provincias, 'cargos' => $cargos, 'estado' => $estado]);
        return view('composicion.filtros');
    }
    public function poblacion()
    {

        $estado = "poblacion";
        $municipios = DB::table("municipios")
            ->orderBy('municipios.NombreMunicipio', 'asc')
            ->get();
        $provincias = DB::table("provincias")
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->get();

        $cargos = DB::table("cargos")->distinct('NombreCargo')->get();
        view()->share(['municipios' => $municipios, 'provincias' => $provincias, 'cargos' => $cargos, 'estado' => $estado]);
        return view('composicion.filtros');
    }
    public function npioc()
    {

        $estado = "npioc";
        $municipios = DB::table("municipios")
            ->orderBy('municipios.NombreMunicipio', 'asc')
            ->get();
        $provincias = DB::table("provincias")
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->get();

        $cargos = DB::table("cargos")->distinct('NombreCargo')->get();
        view()->share(['municipios' => $municipios, 'provincias' => $provincias, 'cargos' => $cargos, 'estado' => $estado]);
        return view('composicion.filtros');
    }
    public function searchComposicion(Request $request)
    {
        $estado = "alcaldia_concejal";
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
        $titularidad_request = '';
        $autoridades = DB::table('candidatos')
            ->join('autoridads', 'autoridads.IdCandidato', '=', 'candidatos.IdCandidato')
            ->join('cargos', 'cargos.IdCargo', '=', 'autoridads.IdCargo')
            ->join('municipios', 'municipios.IdMunicipio', '=', 'candidatos.IdMunicipio')
            ->join('provincias', 'provincias.IdProvincia', '=', 'candidatos.IdProvincia')
            ->join('organizacion_politicas', 'organizacion_politicas.IdOrganizacionPolitica', '=', 'candidatos.IdOrganizacionPolitica')
            ->select('cargos.Posicion', 'organizacion_politicas.Sigla', 'cargos.NombreCargo', 'cargos.Titularidad', 'candidatos.Nombres', 'candidatos.PrimerApellido', 'candidatos.SegundoApellido', 'candidatos.Genero', 'municipios.NombreMunicipio', 'provincias.NombreProvincia', 'autoridads.DetalleIsHabilitado')
            ->where('provincias.IdProvincia', 'like', $provincia_request)
            ->where('municipios.IdMunicipio', $request->municipioajax)
            ->where('autoridads.IsHabilitado', 'like', 'Habilitado')
            ->whereBetween('cargos.IdCargo', [1, 23])
            ->orderBy('cargos.Posicion', 'asc')
            ->orderBy('cargos.NombreCargo', 'asc')
            ->orderBy('cargos.Titularidad', 'desc')
            ->get();
        $municipios = DB::table("municipios")->get();
        $provincias = DB::table("provincias")
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->get();
        $municipioa = DB::table("municipios")
            ->where('municipios.IdMunicipio', $request->municipioajax)
            ->get();
        $municipio = $municipioa[0]->NombreMunicipio;
        $provinciaa = DB::table("provincias")
            ->where('provincias.IdProvincia', $provincia_request)
            ->get();
        $provincia = $provinciaa[0]->NombreProvincia;


        $cargos = DB::table("cargos")->distinct('NombreCargo')->get();

        view()->share(['autoridades' => $autoridades, 'municipios' => $municipios, 'provincias' => $provincias, 'cargos' => $cargos, 'provincia_request' => $provincia_request, 'municipio_request' => $municipio_request, 'titularidad_request' => $titularidad_request, 'provincia' => $provincia, 'municipio' => $municipio, 'estado' => $estado]);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Autoridads',
            'Accion' => 'El usuario ' . Auth::user()->name . ' consultó el reporte de composición de Alcaldía/Consejales del Municipio de ' . $autoridades[0]->NombreMunicipio,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($request->has('download')) {
            $headerHtml = view()->make('composicion.head')->render();
            $footerHtml = view()->make('composicion.foot')->render();
            $pageMargins = [25, 20, 25, 30];
            $pageName = 'credencial.pdf';
            // pass view file
            $pdf = PDF::loadView('composicion.pdf')->setOrientation('landscape')
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
            DB::table('auditorias')->insert([
                'NombreTabla' => 'Autoridads',
                'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de composición de Alcaldía/Consejales del Municipio de ' . $autoridades[0]->NombreMunicipio,
                'IdUsuario' => (int)Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return $pdf->download($autoridades[0]->NombreMunicipio . '-composicion-municipio.pdf');
        }

        return view('composicion.vistaprevia');
    }
    public function searchTerritorio(Request $request)
    {
        $estado = "territorio";
        $autoridades = DB::table('candidatos')
            ->join('autoridads', 'autoridads.IdCandidato', '=', 'candidatos.IdCandidato')
            ->join('cargos', 'cargos.IdCargo', '=', 'autoridads.IdCargo')
            ->join('municipios', 'municipios.IdMunicipio', '=', 'candidatos.IdMunicipio')
            ->join('provincias', 'provincias.IdProvincia', '=', 'candidatos.IdProvincia')
            ->join('organizacion_politicas', 'organizacion_politicas.IdOrganizacionPolitica', '=', 'candidatos.IdOrganizacionPolitica')
            ->select('cargos.Posicion', 'organizacion_politicas.Sigla', 'cargos.NombreCargo', 'cargos.Titularidad', 'candidatos.Nombres', 'candidatos.PrimerApellido', 'candidatos.SegundoApellido', 'candidatos.Genero', 'municipios.NombreMunicipio', 'provincias.NombreProvincia', 'autoridads.DetalleIsHabilitado')
            ->whereBetween('cargos.IdCargo', [25, 104])
            ->where('cargos.NombreCargo', 'like', 'Asambleísta Departamental por Territorio')
            ->where('autoridads.IsHabilitado', 'like', 'Habilitado')
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->orderBy('cargos.Titularidad', 'desc')
            ->get();
        $municipios = DB::table("municipios")->get();
        $provincias = DB::table("provincias")
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->get();
        $cargos = DB::table("cargos")->distinct('NombreCargo')->get();

        view()->share(['autoridades' => $autoridades, 'municipios' => $municipios, 'provincias' => $provincias, 'cargos' => $cargos, 'estado' => $estado]);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Autoridads',
            'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de composición de Asambleístas por territorio del departamento de La Paz',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($request->has('download')) {
            $headerHtml = view()->make('composicion.head')->render();
            $footerHtml = view()->make('composicion.foot')->render();
            $pageMargins = [25, 20, 25, 30];
            $pageName = 'credencial.pdf';
            // pass view file
            $pdf = PDF::loadView('composicion.pdf')->setOrientation('landscape')
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
            DB::table('auditorias')->insert([
                'NombreTabla' => 'Autoridads',
                'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de composición de Asambleístas por territorio del departamento de La Paz',
                'IdUsuario' => (int)Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return $pdf->download('La Paz-composicion-asambleistas-territorio.pdf');
        }

        return view('composicion.vistaprevia');
    }
    public function searchPoblacion(Request $request)
    {
        $estado = "poblacion";
        $autoridades = DB::table('candidatos')
            ->join('autoridads', 'autoridads.IdCandidato', '=', 'candidatos.IdCandidato')
            ->join('cargos', 'cargos.IdCargo', '=', 'autoridads.IdCargo')
            ->join('municipios', 'municipios.IdMunicipio', '=', 'candidatos.IdMunicipio')
            ->join('provincias', 'provincias.IdProvincia', '=', 'candidatos.IdProvincia')
            ->join('organizacion_politicas', 'organizacion_politicas.IdOrganizacionPolitica', '=', 'candidatos.IdOrganizacionPolitica')
            ->select('cargos.Posicion', 'organizacion_politicas.Sigla', 'cargos.NombreCargo', 'cargos.Titularidad', 'candidatos.Nombres', 'candidatos.PrimerApellido', 'candidatos.SegundoApellido', 'candidatos.Genero', 'municipios.NombreMunicipio', 'provincias.NombreProvincia', 'autoridads.DetalleIsHabilitado')
            ->whereBetween('cargos.IdCargo', [25, 104])
            ->where('cargos.NombreCargo', 'like', 'Asambleísta Departamental por Población')
            ->where('autoridads.IsHabilitado', 'like', 'Habilitado')
            ->orderBy('cargos.Posicion', 'asc')
            ->orderBy('cargos.Titularidad', 'desc')
            ->get();
        $municipios = DB::table("municipios")->get();
        $provincias = DB::table("provincias")
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->get();
        $cargos = DB::table("cargos")->distinct('NombreCargo')->get();

        view()->share(['autoridades' => $autoridades, 'municipios' => $municipios, 'provincias' => $provincias, 'cargos' => $cargos, 'estado' => $estado]);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Autoridads',
            'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de composición de Asambleístas por población del departamento de La Paz',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($request->has('download')) {
            $headerHtml = view()->make('composicion.head')->render();
            $footerHtml = view()->make('composicion.foot')->render();
            $pageMargins = [25, 20, 25, 30];
            $pageName = 'credencial.pdf';
            // pass view file
            $pdf = PDF::loadView('composicion.pdf')->setOrientation('landscape')
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
            DB::table('auditorias')->insert([
                'NombreTabla' => 'Autoridads',
                'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de composición de Asambleístas por población del departamento de La Paz',
                'IdUsuario' => (int)Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return $pdf->download('La Paz-composicion-asambleistas-poblacion.pdf');
        }

        return view('composicion.vistaprevia');
    }
    public function searchNpioc(Request $request)
    {
        $estado = "npioc";
        $autoridades = DB::table('candidatos')
            ->join('autoridads', 'autoridads.IdCandidato', '=', 'candidatos.IdCandidato')
            ->join('cargos', 'cargos.IdCargo', '=', 'autoridads.IdCargo')
            ->join('municipios', 'municipios.IdMunicipio', '=', 'candidatos.IdMunicipio')
            ->join('provincias', 'provincias.IdProvincia', '=', 'candidatos.IdProvincia')
            ->join('organizacion_politicas', 'organizacion_politicas.IdOrganizacionPolitica', '=', 'candidatos.IdOrganizacionPolitica')
            ->select('cargos.Posicion', 'organizacion_politicas.Sigla', 'cargos.NombreCargo', 'cargos.Titularidad', 'candidatos.Nombres', 'candidatos.PrimerApellido', 'candidatos.SegundoApellido', 'candidatos.Genero', 'municipios.NombreMunicipio', 'provincias.NombreProvincia', 'autoridads.DetalleIsHabilitado')
            ->where('cargos.NombreCargo', 'like', '%NACIÓN Y PUEBLO INDÍGENA ORIGINARIO%')
            ->where('autoridads.IsHabilitado', 'like', 'Habilitado')
            ->orderBy('cargos.Posicion', 'asc')
            ->orderBy('cargos.Titularidad', 'desc')
            ->get();
        $municipios = DB::table("municipios")->get();
        $provincias = DB::table("provincias")
            ->orderBy('provincias.NombreProvincia', 'asc')
            ->get();
        $cargos = DB::table("cargos")->distinct('NombreCargo')->get();

        view()->share(['autoridades' => $autoridades, 'municipios' => $municipios, 'provincias' => $provincias, 'cargos' => $cargos, 'estado' => $estado]);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Autoridads',
            'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de composición de REPRESENTANTES DE LAS NACIONES Y PUEBLOS INDÍGENAS ORIGINARIO CAMPESINOS ASAMBLEÍSTAS DEPARTAMENTALES del departamento de La Paz',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($request->has('download')) {
            $headerHtml = view()->make('composicion.head')->render();
            $footerHtml = view()->make('composicion.foot')->render();
            $pageMargins = [25, 20, 25, 30];
            $pageName = 'credencial.pdf';
            // pass view file
            $pdf = PDF::loadView('composicion.pdf')->setOrientation('landscape')
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
            DB::table('auditorias')->insert([
                'NombreTabla' => 'Autoridads',
                'Accion' => 'El usuario ' . Auth::user()->name . ' descargó reporte de composición de REPRESENTANTES DE LAS NACIONES Y PUEBLOS INDÍGENAS ORIGINARIO CAMPESINOS ASAMBLEÍSTAS DEPARTAMENTALES del departamento de La Paz',
                'IdUsuario' => (int)Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return $pdf->download('La Paz-composicion-REPRESENTANTES DE LAS NACIONES Y PUEBLOS INDIGENAS ORIGINARIO CAMPESINOS ASAMBLEISTAS DEPARTAMENTALES.pdf');
        }

        return view('composicion.vistaprevia');
    }
    public function searchMunicipios(Request $request)
    {
        $IdProvincia = $request->IdProvincia;

        $municipios = Municipio::where('IdProvincia', $IdProvincia)
            ->get();
        return ['success' => true, 'data' => $municipios];
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
