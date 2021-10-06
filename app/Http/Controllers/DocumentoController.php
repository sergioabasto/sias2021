<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Documentos',
            'Accion' => 'El usuario consultó la lista de documentos',            
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);          
        $documentos=Documento::paginate(10);
        return view('documentos.index', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'Documento'=>'required|mimes:pdf|unique:documentos,Documento',
            'DocumentoDescripcion'=>'required|max:500'
        ]);

        $documento=request()->except(['_token']);

        if($request->hasFile('Documento')){
            $documento['Documento']=$request->file('Documento')->store('uploads','public');

        }

        $docu = Documento::create($documento);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Documentos',
            'Accion' => 'El usuario creó un nuevo documento con ID-DOCUMENTO '. $docu->IdDocumento,            
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
        return redirect()->route('documentos.index')->with('info','Documento  guardado con exito!!.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        return view('documentos.show',compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        return view('documentos.edit',compact('documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        $datosDocumento=request()->except(['_token','_method']);
        if($request->hasFile('Documento')){
            $documento=documento::findOrFail($documento->IdDcocumento);
            Storage::delete('public/'.$documento->Documento);
            $datosDocumento['Documento']=$request->file('Documento')->store('uploads','public');
        }
        $docu = Documento::where('IdDocumento','=',$documento->IdDocumento)->update($datosDocumento);
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Documentos',
            'Accion' => 'El usuario modificó el documento con ID-DOCUMENTO '. $docu->IdDocumento,            
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);         
        return redirect()->route('documentos.index')->with('info','Autoridad Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $documento->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
