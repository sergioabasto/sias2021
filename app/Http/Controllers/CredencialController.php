<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CredencialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estado = "Alcaldia";
        $genero = 'MASCULINO';
        $cargo_M = 'CONCEJAL TITULAR';
        $cargo_F = 'CONCEJALA TITULAR';

        $listas = DB::table("personal_teds")->get();
        $municipios = DB::table("municipios")->get();
        $cargos = DB::table("cargos")
                    ->distinct('NombreCargo')
                    ->whereBetween('IdCargo', [1, 23])
                    ->get();

        $posiciones = [];
        foreach ($listas as $personal) {
            if ($personal->Posicion == 1) {
                $posicion[0]['cargo'] = $personal->Cargo;
                $posicion[0]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 2) {
                $posicion[1]['cargo'] = $personal->Cargo;
                $posicion[1]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 3) {
                $posicion[2]['cargo'] = $personal->Cargo;
                $posicion[2]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 4) {
                $posicion[3]['cargo'] = $personal->Cargo;
                $posicion[3]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 5) {
                $posicion[4]['cargo'] = $personal->Cargo;
                $posicion[4]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 6) {
                $posicion[5]['cargo'] = $personal->Cargo;
                $posicion[5]['nombre'] = $personal->NombreCompleto;
            } else {
            }
        }
        view()->share(['posicion' => $posicion, 'municipios' => $municipios, 'cargos' => $cargos, 'estado' => $estado]);

        if ($request->has('download')) {

            $headerHtml = view()->make('credencial.head')->render();
            $footerHtml = view()->make('credencial.footer')->render();
            $pageMargins = [25, 20, 25, 30];
            $pageName = 'credencial.pdf';
            // pass view file
            $pdf = PDF::loadView('credencial.credencial')->setOrientation('portrait')
                ->setOption('header-html', $headerHtml)
                ->setOption('footer-html', $footerHtml)
                ->setOption('page-size', 'Letter')
                ->setOption('margin-top', '1cm')
                ->setOption('margin-right', '1cm')
                ->setOption('margin-bottom', '1cm')
                ->setOption('margin-left', '1cm')
                ->setOption('encoding', 'utf-8');

            // download pdf
            return $pdf->download('userlist.pdf');

        }
        return view('credencial.filtros');
    }
    public function npioc(Request $request)
    {
        $estado = "npioc";
        $listas = DB::table("personal_teds")->get();
        $municipios = DB::table("municipios")->get();
        $cargos = DB::table("cargos")
                    ->where('cargos.NombreCargo', 'like', '%NACIÓN Y PUEBLO INDÍGENA ORIGINARIO%')
                    ->orderBy('IdCargo', 'asc')
                    ->get();
        view()->share(['cargos' => $cargos, 'estado' => $estado]);
        return view('credencial.filtros');
    }
    public function gobernacion(Request $request)
    {
        $estado = "gobernacion";
        $genero = 'MASCULINO';
        $cargo_M = 'GOBERNADOR TITULAR';
        $cargo_F = 'GOBERNADORA TITULAR';

        $listas = DB::table("personal_teds")->get();
        $provincias = DB::table("provincias")->get();
        $municipios = DB::table("municipios")->get();
        $cargos = DB::table("cargos")
                    ->distinct('NombreCargo')
                    ->whereBetween('IdCargo', [24, 104])
                    ->get();

        $posiciones = [];
        foreach ($listas as $personal) {
            if ($personal->Posicion == 1) {
                $posicion[0]['cargo'] = $personal->Cargo;
                $posicion[0]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 2) {
                $posicion[1]['cargo'] = $personal->Cargo;
                $posicion[1]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 3) {
                $posicion[2]['cargo'] = $personal->Cargo;
                $posicion[2]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 4) {
                $posicion[3]['cargo'] = $personal->Cargo;
                $posicion[3]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 5) {
                $posicion[4]['cargo'] = $personal->Cargo;
                $posicion[4]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 6) {
                $posicion[5]['cargo'] = $personal->Cargo;
                $posicion[5]['nombre'] = $personal->NombreCompleto;
            } else {
            }
        }
        view()->share(['posicion' => $posicion, 'municipios' => $municipios, 'cargos' => $cargos, 'provincias' => $provincias, 'estado' => $estado]);

        if ($request->has('download')) {

            $headerHtml = view()->make('credencial.head')->render();
            $footerHtml = view()->make('credencial.footer')->render();
            $pageMargins = [25, 20, 25, 30];
            $pageName = 'credencial.pdf';
            // pass view file
            $pdf = PDF::loadView('credencial.credencial')->setOrientation('portrait')
                ->setOption('header-html', $headerHtml)
                ->setOption('footer-html', $footerHtml)
                ->setOption('page-size', 'Letter')
                ->setOption('margin-top', '1cm')
                ->setOption('margin-right', '1cm')
                ->setOption('margin-bottom', '1cm')
                ->setOption('margin-left', '1cm')
                ->setOption('encoding', 'utf-8');

            // download pdf
            return $pdf->download('userlist.pdf');

        }
        return view('credencial.filtros_gobernacion');
    }
    public function searchAutoridad(Request $request)
    {
        $estado = "Alcaldia";
        if ($request->has('cargo')) {
            $cargo_request = $request->cargo;
        } else {
            $cargo_request = "";
        }
        if ($request->has('municipio')) {
            $municipio_request = (int)$request->municipio;
        } else {
            $municipio_request = 0;
        }
        if ($request->has('titularidad')) {
            $titularidad_request = $request->titularidad;
        } else {
            $titularidad_request = '';
        }

        $genero = 'MASCULINO';
        $titularidadfinal = mb_strtoupper($request->titularidad, "UTF-8");
        switch ($cargo_request) {
            case 'Alcaldesa(e)':
                $cargo_M = 'ALCALDE';
                $cargo_F = 'ALCALDESA';
                $nombrepdf = "Alcalde";
                //code to be executed
                break;
            case 'Concejalas(es)':
                $cargo_M = 'CONCEJAL '.$titularidadfinal;
                $cargo_F = 'CONCEJALA '.$titularidadfinal;
                $nombrepdf = "Consejales";
                //code to be executed
                break;
            case 'Gobernadora (or)':
                $cargo_M = 'GOBERNADOR '.$titularidadfinal;
                $cargo_F = 'GOBERNADORA '.$titularidadfinal;
                //code to be executed
                break;

            default:
                $cargo_M = mb_strtoupper($request->cargo . ' ' . $titularidadfinal, "UTF-8");
                $cargo_F = mb_strtoupper($request->cargo . ' ' . $titularidadfinal, "UTF-8");
                //code to be executed
        }

        $consejales = DB::table('candidatos')
            ->join('autoridads', 'autoridads.IdCandidato', '=', 'candidatos.IdCandidato')
            ->join('cargos', 'cargos.IdCargo', '=', 'autoridads.IdCargo')
            ->join('municipios', 'municipios.IdMunicipio', '=', 'candidatos.IdMunicipio')
            ->join('provincias', 'provincias.IdProvincia', '=', 'candidatos.IdProvincia')
            ->select('candidatos.IdCandidato', 'candidatos.Nombres', 'candidatos.PrimerApellido', 'candidatos.SegundoApellido', 'candidatos.Genero', 'municipios.NombreMunicipio', 'provincias.NombreProvincia', DB::raw('(CASE WHEN (candidatos."Genero" = ' . "'" . $genero . "'" . ') THEN ' . "'" . $cargo_M . "'" . ' ELSE ' . "'" . $cargo_F . "'" . ' END) as cargo'))
            ->where('cargos.Titularidad', 'like', $request->titularidad)
            ->where('cargos.NombreCargo', 'like', $request->cargo)
            ->where('municipios.IdMunicipio', (int)$request->municipio)
            ->whereBetween('cargos.IdCargo', [1, 23])
            ->orderBy('cargos.Posicion', 'asc')
            ->get();
        $consejales;
        $listas = DB::table("personal_teds")->get();
        $municipios = DB::table("municipios")->get();
        $cargos = DB::table("cargos")
                    ->distinct('NombreCargo')
                    ->whereBetween('IdCargo', [1, 23])
                    ->get();
        $resolucion = DB::table("resolucion_credencials")->get();
        $posiciones = [];
        foreach ($listas as $personal) {
            if ($personal->Posicion == 1) {
                $posicion[0]['cargo'] = $personal->Cargo;
                $posicion[0]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 2) {
                $posicion[1]['cargo'] = $personal->Cargo;
                $posicion[1]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 3) {
                $posicion[2]['cargo'] = $personal->Cargo;
                $posicion[2]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 4) {
                $posicion[3]['cargo'] = $personal->Cargo;
                $posicion[3]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 5) {
                $posicion[4]['cargo'] = $personal->Cargo;
                $posicion[4]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 6) {
                $posicion[5]['cargo'] = $personal->Cargo;
                $posicion[5]['nombre'] = $personal->NombreCompleto;
            } else {
            }
        }
        view()->share(['posicion' => $posicion, 'consejales' => $consejales, 'municipios' => $municipios, 'cargos' => $cargos, 'cargo_request' => $cargo_request, 'municipio_request' => $municipio_request, 'titularidad_request' => $titularidad_request, 'estado' => $estado, 'resolucion' => $resolucion]);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Autoridads',
            'Accion' => 'El usuario '.Auth::user()->name.' consultó reporte de credenciales de Alcaldía/Consejales del Municipio ' . $consejales[0]->NombreMunicipio . ' ' . $request->titularidad,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);        
        if ($request->has('download')) {

            $headerHtml = view()->make('credencial.head')->render();
            $footerHtml = view()->make('credencial.footer')->render();
            $pageMargins = [25, 20, 25, 30];
            $pageName = 'credencial.pdf';
            // pass view file
            $pdf = PDF::loadView('credencial.credencial')->setOrientation('portrait')
                ->setOption('header-html', $headerHtml)
                ->setOption('footer-html', $footerHtml)
                // ->setOption('page-size', 'Legal')
                ->setOption('page-width', '210')
                ->setOption('page-height', '320')
                ->setOption('margin-top', '1cm')
                ->setOption('margin-right', '1cm')
                ->setOption('margin-bottom', '1cm')
                ->setOption('margin-left', '1cm')
                ->setOption('encoding', 'utf-8')
                ->setOption('enable-local-file-access', true);

            // download pdf
            DB::table('auditorias')->insert([
                'NombreTabla' => 'Autoridads',
                'Accion' => 'El usuario '.Auth::user()->name.' descargó reporte de credenciales de Alcaldía/Consejales del Municipio ' . $consejales[0]->NombreMunicipio . ' ' . $request->titularidad,
                'IdUsuario' => (int)Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return $pdf->download($consejales[0]->NombreMunicipio . '-credencial-'.$nombrepdf.'-'.$request->titularidad.'.pdf');

        }
        return view('credencial.vistaprevia');
    }
    public function searchGobernacion(Request $request)
    {
        $estado = "gobernacion";
        if ($request->has('cargo')) {
            $cargo_request = $request->cargo;
        } else {
            $cargo_request = "";
        }
        if ($request->has('provincia')) {
            $provincia_request = (int)$request->provincia;
        } else {
            $provincia_request = 0;
        }
        if ($request->has('titularidad')) {
            $titularidad_request = $request->titularidad;
        } else {
            $titularidad_request = '';
        }

        $genero = 'MASCULINO';
        $titularidadfinal = mb_strtoupper($request->titularidad, "UTF-8");
        switch ($cargo_request) {

            case 'Gobernadora (or)':
                $cargo_M = 'GOBERNADOR';
                $cargo_F = 'GOBERNADORA';
                $request->provincia = 0;
                $estado = "Gobernador";
                //code to be executed
                break;
            case 'Asambleísta Departamental por Población':
                $cargo_M = mb_strtoupper($request->cargo . ' ' . $titularidadfinal, "UTF-8");
                $cargo_F = mb_strtoupper($request->cargo . ' ' . $titularidadfinal, "UTF-8");
                $request->provincia = 0;
                $estado = "Poblacion";
                //code to be executed
                break;
            case 'Asambleísta Departamental por Territorio':
                $cargo_M = mb_strtoupper($request->cargo . ' ' . $titularidadfinal, "UTF-8");
                $cargo_F = mb_strtoupper($request->cargo . ' ' . $titularidadfinal, "UTF-8");
                $estado = "Territorio";
                //code to be executed
                break;
            default:
                $cargo_M = mb_strtoupper($request->cargo . ' ' . $titularidadfinal, "UTF-8");
                $cargo_F = mb_strtoupper($request->cargo . ' ' . $titularidadfinal, "UTF-8");
                //code to be executed
        }

        $consejales = DB::table('candidatos')
            ->join('autoridads', 'autoridads.IdCandidato', '=', 'candidatos.IdCandidato')
            ->join('cargos', 'cargos.IdCargo', '=', 'autoridads.IdCargo')
            ->join('provincias', 'provincias.IdProvincia', '=', 'candidatos.IdProvincia')
            ->select('candidatos.IdCandidato', 'candidatos.Nombres', 'candidatos.PrimerApellido', 'candidatos.SegundoApellido', 'candidatos.Genero', 'provincias.NombreProvincia', DB::raw('(CASE WHEN (candidatos."Genero" = ' . "'" . $genero . "'" . ') THEN ' . "'" . $cargo_M . "'" . ' ELSE ' . "'" . $cargo_F . "'" . ' END) as cargo'))
            ->where('cargos.Titularidad', 'like', $request->titularidad)
            ->where('cargos.NombreCargo', 'like', $request->cargo)
            ->where('provincias.IdProvincia', (int)$request->provincia)
            ->whereBetween('cargos.IdCargo', [24, 104])
            ->orderBy('cargos.Posicion', 'asc')
            ->get();
        $consejales;
        if ($estado === "Gobernador")
        {
            $nombre_pdf = 'La Paz-credencial-gobernador';
            $audit = 'Descargó reporte de credencial para Gobernación de La Paz';
        }
        if ($estado === "Poblacion")
        {
            $nombre_pdf = 'La Paz-credencial-asambleistas-poblacion';
            $audit = 'Descargó reporte de credencial para Asambleísta por Poblacion de La Paz';

        }
        if ($estado === "Territorio")
        {
            $nombre_pdf = $consejales[0]->NombreProvincia . '-credencial-asambleistas-territorio';
            $audit = 'Descargó reporte de credencial para Asambleísta por Territorio de la provincia ' . $consejales[0]->NombreProvincia;

        }
        $listas = DB::table("personal_teds")->get();
        $municipios = DB::table("municipios")->get();
        $provincias = DB::table("provincias")->get();
        $cargos = DB::table("cargos")
                    ->distinct('NombreCargo')
                    ->whereBetween('IdCargo', [24, 104])
                    ->get();
        $resolucion = DB::table("resolucion_credencials")->get();
        $posiciones = [];
        foreach ($listas as $personal) {
            if ($personal->Posicion == 1) {
                $posicion[0]['cargo'] = $personal->Cargo;
                $posicion[0]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 2) {
                $posicion[1]['cargo'] = $personal->Cargo;
                $posicion[1]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 3) {
                $posicion[2]['cargo'] = $personal->Cargo;
                $posicion[2]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 4) {
                $posicion[3]['cargo'] = $personal->Cargo;
                $posicion[3]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 5) {
                $posicion[4]['cargo'] = $personal->Cargo;
                $posicion[4]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 6) {
                $posicion[5]['cargo'] = $personal->Cargo;
                $posicion[5]['nombre'] = $personal->NombreCompleto;
            } else {
            }
        }
        view()->share(['posicion' => $posicion, 'consejales' => $consejales, 'municipios' => $municipios, 'cargos' => $cargos, 'cargo_request' => $cargo_request, 'titularidad_request' => $titularidad_request, 'provincias' => $provincias, 'provincia_request' => $provincia_request, 'estado' => $estado, 'resolucion' => $resolucion]);
        $audit = str_replace('Descargó', 'consultó', $audit);        
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Autoridads',
            'Accion' => 'El usuario '.Auth::user()->name.' '.$audit . ' ' . $request->titularidad,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);        
        if ($request->has('download')) {

            $headerHtml = view()->make('credencial.head')->render();
            $footerHtml = view()->make('credencial.footer')->render();
            $pageMargins = [25, 20, 25, 30];
            $pageName = 'credencial.pdf';
            // pass view file
            $pdf = PDF::loadView('credencial.credencial')->setOrientation('portrait')
                ->setOption('header-html', $headerHtml)
                ->setOption('footer-html', $footerHtml)
                // ->setOption('page-size', 'Legal')
                ->setOption('page-width', '210')
                ->setOption('page-height', '320')
                ->setOption('margin-top', '1cm')
                ->setOption('margin-right', '1cm')
                ->setOption('margin-bottom', '1cm')
                ->setOption('margin-left', '1cm')
                ->setOption('encoding', 'utf-8')
                ->setOption('enable-local-file-access', true);

            // download pdf
            $audit = str_replace('consultó', 'descargó', $audit);
            DB::table('auditorias')->insert([
                'NombreTabla' => 'Autoridads',
                'Accion' => 'El usuario '.Auth::user()->name.' '.$audit . ' ' . $request->titularidad,
                'IdUsuario' => (int)Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return $pdf->download($nombre_pdf.'-'.$request->titularidad.'.pdf');

        }
        return view('credencial.vistaprevia_gob');
    }
    public function searchNpioc(Request $request)
    {
        $estado = "npioc";
        if ($request->has('cargo')) {
            $cargo_request = $request->cargo;
        } else {
            $cargo_request = "";
        }

        $genero = 'MASCULINO';
        switch ($cargo_request) {

            case 'NPIOC':
                $cargo_M = mb_strtoupper('ASAMBLEÍSTA SUPLENTE DE LA NACIÓN Y PUEBLO INDÍGENA ORIGINARIO', "UTF-8");
                $cargo_F = mb_strtoupper('ASAMBLEÍSTA SUPLENTE DE LA NACIÓN Y PUEBLO INDÍGENA ORIGINARIO', "UTF-8");
                $estado = "npioc";
                //code to be executed
                break;
            default:
                $cargo_M = mb_strtoupper($request->cargo, "UTF-8");
                $cargo_F = mb_strtoupper($request->cargo, "UTF-8");
                //code to be executed
        }

        $consejales = DB::table('candidatos')
            ->join('autoridads', 'autoridads.IdCandidato', '=', 'candidatos.IdCandidato')
            ->join('cargos', 'cargos.IdCargo', '=', 'autoridads.IdCargo')
            ->join('provincias', 'provincias.IdProvincia', '=', 'candidatos.IdProvincia')
            ->select('candidatos.IdCandidato', 'candidatos.Nombres', 'candidatos.PrimerApellido', 'candidatos.SegundoApellido', 'candidatos.Genero', 'provincias.NombreProvincia', DB::raw('(CASE WHEN (candidatos."Genero" = ' . "'" . $genero . "'" . ') THEN ' . "'" . $cargo_M . "'" . ' ELSE ' . "'" . $cargo_F . "'" . ' END) as cargo'))
            ->where('cargos.NombreCargo', 'like', $request->cargo)
            ->orderBy('cargos.Posicion', 'asc')
            ->get();
        if ($estado === "npioc")
        {
            $nombre_pdf = 'La Paz-credencial-'.$request->cargo;
            $audit = 'Descargó reporte de credencial de '.$request->cargo;
        }
        $listas = DB::table("personal_teds")->get();
        $municipios = DB::table("municipios")->get();
        $provincias = DB::table("provincias")->get();
        $cargos = DB::table("cargos")
                    ->where('cargos.NombreCargo', 'like', '%NACIÓN Y PUEBLO INDÍGENA ORIGINARIO%')
                    ->orderBy('IdCargo', 'asc')
                    ->get();
        $resolucion = DB::table("resolucion_credencials")->get();
        $posiciones = [];
        foreach ($listas as $personal) {
            if ($personal->Posicion == 1) {
                $posicion[0]['cargo'] = $personal->Cargo;
                $posicion[0]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 2) {
                $posicion[1]['cargo'] = $personal->Cargo;
                $posicion[1]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 3) {
                $posicion[2]['cargo'] = $personal->Cargo;
                $posicion[2]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 4) {
                $posicion[3]['cargo'] = $personal->Cargo;
                $posicion[3]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 5) {
                $posicion[4]['cargo'] = $personal->Cargo;
                $posicion[4]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 6) {
                $posicion[5]['cargo'] = $personal->Cargo;
                $posicion[5]['nombre'] = $personal->NombreCompleto;
            } else {
            }
        }
        view()->share(['posicion' => $posicion, 'consejales' => $consejales, 'municipios' => $municipios, 'cargos' => $cargos, 'cargo_request' => $cargo_request, 'provincias' => $provincias, 'estado' => $estado, 'resolucion' => $resolucion]);
        $audit = str_replace('Descargó', 'consultó', $audit);        
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Autoridads',
            'Accion' => 'El usuario '.Auth::user()->name.' '.$audit . ' ' . $request->titularidad,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);        
        if ($request->has('download')) {

            $headerHtml = view()->make('credencial.head')->render();
            $footerHtml = view()->make('credencial.footer')->render();
            $pageMargins = [25, 20, 25, 30];
            $pageName = 'credencial.pdf';
            // pass view file
            $pdf = PDF::loadView('credencial.credencial')->setOrientation('portrait')
                ->setOption('header-html', $headerHtml)
                ->setOption('footer-html', $footerHtml)
                // ->setOption('page-size', 'Legal')
                ->setOption('page-width', '210')
                ->setOption('page-height', '320')
                ->setOption('margin-top', '1cm')
                ->setOption('margin-right', '1cm')
                ->setOption('margin-bottom', '1cm')
                ->setOption('margin-left', '1cm')
                ->setOption('encoding', 'utf-8')
                ->setOption('enable-local-file-access', true);

            // download pdf
            $audit = str_replace('consultó', 'descargó', $audit);                    
            DB::table('auditorias')->insert([
                'NombreTabla' => 'Autoridads',
                'Accion' => 'El usuario '.Auth::user()->name.' '.$audit . ' ' . $request->titularidad,
                'IdUsuario' => (int)Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return $pdf->download($nombre_pdf.'.pdf');
        }
        return view('credencial.vistaprevia_npioc');
    }
    public function searchAutoridadById(Request $request)
    {

        if ($request->has('cargo')) {
            $cargo_request = $request->cargo;
        } else {
            $cargo_request = "";
        }
        if ($request->has('municipio')) {
            $municipio_request = (int)$request->municipio;
        } else {
            $municipio_request = 0;
        }
        if ($request->has('titularidad')) {
            $titularidad_request = $request->titularidad;
        } else {
            $titularidad_request = '';
        }

        $consejales = DB::table('candidatos')
            ->join('autoridads', 'autoridads.IdCandidato', '=', 'candidatos.IdCandidato')
            ->join('cargos', 'cargos.IdCargo', '=', 'autoridads.IdCargo')
            ->join('municipios', 'municipios.IdMunicipio', '=', 'candidatos.IdMunicipio')
            ->join('provincias', 'provincias.IdProvincia', '=', 'candidatos.IdProvincia')
            ->select('candidatos.IdCandidato', 'candidatos.Nombres', 'candidatos.PrimerApellido', 'candidatos.SegundoApellido', 'candidatos.Genero', 'municipios.NombreMunicipio', 'provincias.NombreProvincia', 'cargos.NombreCargo', 'cargos.Titularidad', 'cargos.Titularidad', 'candidatos.Genero')
            ->where('autoridads.IdAutoridad', 'like', $request->IdAutoridad)
            ->where('candidatos.IdCandidato', 'like', $request->IdCandidato)
            ->get();
        $estado = "none";
        $titularidadfinal = mb_strtoupper($consejales[0]->Titularidad, "UTF-8");
        $nombre_final = mb_strtoupper($consejales[0]->Nombres .' '. $consejales[0]->PrimerApellido .' '. $consejales[0]->SegundoApellido .'-', "UTF-8");
        switch ( $consejales[0]->NombreCargo) {
            case 'Alcaldesa(e)':
                if($consejales[0]->Genero === "MASCULINO" )
                {
                    $consejales[0]->cargo = 'ALCALDE '.$titularidadfinal;
                }
                else
                {
                    $consejales[0]->cargo =  'ALCALDESA '.$titularidadfinal;
                }

                $nombrepdf = $nombre_final."-".$consejales[0]->cargo."-".$titularidadfinal;
                $estado = "Alcaldia";
                //code to be executed
                break;
            case 'Concejalas(es)':

                if($consejales[0]->Genero === "MASCULINO" )
                {
                    $consejales[0]->cargo = 'CONCEJAL '.$titularidadfinal;
                }
                else
                {
                    $consejales[0]->cargo =  'CONCEJALA '.$titularidadfinal;
                }

                $nombrepdf = $nombre_final."-".$consejales[0]->cargo."-".$titularidadfinal;
                $estado = "Alcaldia";
                //code to be executed
                break;
            case 'Gobernadora (or)':

                if($consejales[0]->Genero === "MASCULINO" )
                {
                    $consejales[0]->cargo = 'GOBERNADOR '.$titularidadfinal;
                }
                else
                {
                    $consejales[0]->cargo =  'GOBERNADORA '.$titularidadfinal;
                }

                $nombrepdf = $nombre_final."-".$consejales[0]->cargo."-".$titularidadfinal;
                $estado = "Gobernador";
                break;
            case 'Asambleísta Departamental por Población':

                if($consejales[0]->Genero === "MASCULINO" )
                {
                    $consejales[0]->cargo = mb_strtoupper($consejales[0]->NombreCargo . ' ' . $titularidadfinal, "UTF-8");
                }
                else
                {
                    $consejales[0]->cargo = mb_strtoupper($consejales[0]->NombreCargo . ' ' . $titularidadfinal, "UTF-8");
                }

                $nombrepdf = $nombre_final."-".$consejales[0]->cargo."-".$titularidadfinal;
                $estado = "Poblacion";
                break;
            case 'Asambleísta Departamental por Territorio':

                if($consejales[0]->Genero === "MASCULINO" )
                {
                    $consejales[0]->cargo = mb_strtoupper($consejales[0]->NombreCargo . ' ' . $titularidadfinal, "UTF-8");
                }
                else
                {
                    $consejales[0]->cargo = mb_strtoupper($consejales[0]->NombreCargo . ' ' . $titularidadfinal, "UTF-8");
                }

                $nombrepdf = $nombre_final."-".$consejales[0]->cargo."-".$titularidadfinal;
                $estado = "Territorio";
                break;

            default:
                $consejales[0]->cargo = mb_strtoupper($consejales[0]->NombreCargo, "UTF-8");
                $nombrepdf = $nombre_final."-".$consejales[0]->cargo."-".$titularidadfinal;
                $estado = "npioc";
        }
        $listas = DB::table("personal_teds")->get();
        $municipios = DB::table("municipios")->get();
        $cargos = DB::table("cargos")->distinct('NombreCargo')->get();
        $resolucion = DB::table("resolucion_credencials")->get();
        $posiciones = [];
        foreach ($listas as $personal) {
            if ($personal->Posicion == 1) {
                $posicion[0]['cargo'] = $personal->Cargo;
                $posicion[0]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 2) {
                $posicion[1]['cargo'] = $personal->Cargo;
                $posicion[1]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 3) {
                $posicion[2]['cargo'] = $personal->Cargo;
                $posicion[2]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 4) {
                $posicion[3]['cargo'] = $personal->Cargo;
                $posicion[3]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 5) {
                $posicion[4]['cargo'] = $personal->Cargo;
                $posicion[4]['nombre'] = $personal->NombreCompleto;
            } else if ($personal->Posicion == 6) {
                $posicion[5]['cargo'] = $personal->Cargo;
                $posicion[5]['nombre'] = $personal->NombreCompleto;
            } else {
            }
        }
        view()->share(['posicion' => $posicion, 'consejales' => $consejales, 'municipios' => $municipios, 'cargos' => $cargos, 'cargo_request' => $cargo_request, 'municipio_request' => $municipio_request, 'titularidad_request' => $titularidad_request, 'estado' => $estado, 'resolucion' => $resolucion]);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Autoridads',
            'Accion' => 'El usuario '.Auth::user()->name.' consultó '.$nombrepdf . ' ' . $request->titularidad,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);           
        if ($request->has('download')) {

            $headerHtml = view()->make('credencial.head')->render();
            $footerHtml = view()->make('credencial.footer')->render();
            $pageMargins = [25, 20, 25, 30];
            $pageName = 'credencial.pdf';
            // pass view file
            $pdf = PDF::loadView('credencial.credencial')->setOrientation('portrait')
                ->setOption('header-html', $headerHtml)
                ->setOption('footer-html', $footerHtml)
                ->setOption('page-width', '210')
                ->setOption('page-height', '320')
                ->setOption('margin-top', '1cm')
                ->setOption('margin-right', '1cm')
                ->setOption('margin-bottom', '1cm')
                ->setOption('margin-left', '1cm')
                ->setOption('encoding', 'utf-8')
                ->setOption('enable-local-file-access', true);

            // download pdf
            DB::table('auditorias')->insert([
                'NombreTabla' => 'Autoridads',
                'Accion' => 'El usuario '.Auth::user()->name.' descargó '.$nombrepdf . ' ' . $request->titularidad,
                'IdUsuario' => (int)Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);            
            return $pdf->download($nombrepdf.".pdf");

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
