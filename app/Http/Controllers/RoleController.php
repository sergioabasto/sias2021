<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Roles',
            'Accion' => 'El usuario '.Auth::user()->name. ' consultó la lista de roles',
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);           
        $roles=Role::paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::get();
        return view('roles.create',compact('permissions'));
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
            'name'=>'required|max:120|unique:roles,name',
            'slug'=>'required|max:120|unique:roles,slug',
            'description'=>'required|max:500|unique:roles,description',
            'special'=>'in:all-access,no-access|unique:roles,special',

        ]);
        $role=Role::create($request->all());

        //actualizar permisos
        $role->permissions()->sync($request->get('permissions'));
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Roles',
            'Accion' => 'El usuario '.Auth::user()->name. ' creó el rol con ID '. $role->id,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
        return redirect()->route('roles.index')->with('info','Role guardada con exito!!.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions=Permission::get();
        return view('roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
        'name'=>'required|max:120',
        'slug'=>'required|max:120',
        'description'=>'required|max:500',
        'special'=>'in:all-access,no-access|unique:roles,special',
        ]);
        //actualizar el roles
        $role->update($request->all());

        //actualizar permisos
        $role->permissions()->sync($request->get('permissions'));
        DB::table('auditorias')->insert([
            'NombreTabla' => 'Roles',
            'Accion' => 'El usuario '.Auth::user()->name. ' actualizó el rol con ID '. $role->id,
            'IdUsuario' => (int)Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);         
        return redirect()->route('roles.index')->with('info','Role Actualizado con exito!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $segment_users = url('/').'/'.request()->segment(1);
        $role->delete();
        return response()->json(['success' => 'success', 'ruta' => $segment_users], 200);
    }
}
