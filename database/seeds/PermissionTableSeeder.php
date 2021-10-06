<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //NAVEGACION DEL MENU PRICIPAL
        Permission::create([
            'name'=>'MENU TERRITORIO',
            'slug'=>'menu.menuregion',
            'description'=>'VISUALIZA EL MENU DE TERRITORIO',
        ]);
        Permission::create([
            'name'=>'MENU CANDIDATOS Y AUTORIDADES',
            'slug'=>'menu.menucandidato',
            'description'=>'VISUALIZA EL MENU EL MENU DE CANDIDATOS Y AUTORIDADES',
        ]);
        Permission::create([
            'name'=>'MENU DE REPORTES',
            'slug'=>'menu.menureporte',
            'description'=>'VISUALIZA EL MENU DE REPORTES',
        ]);
        Permission::create([
            'name'=>'MENU DE ROLES Y USUARIOS',
            'slug'=>'menu.menurol',
            'description'=>'VISUALIZA EL MENU DE ROLES',
        ]);
        Permission::create([
            'name'=>'MENU DE GOBERNACIÓN',
            'slug'=>'menu.menugobernacion',
            'description'=>'VISUALIZA EL MENU DE GOBERNACION',
        ]);
           //usuarios
           Permission::create([
            'name'=>'USUARIO',
            'slug'=>'users.index',
            'description'=>'NAVEGA LA TABLA USUARIOS',
        ]);
        Permission::create([
            'name'=>'USUARIO',
            'slug'=>'users.show',
            'description'=>'VISUALIZA A UN USUARIO EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'USUARIO',
            'slug'=>'users.edit',
            'description'=>'EDITA A UN USUARIO EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'USUARIO',
            'slug'=>'users.destroy',
            'description'=>'ELIMINA UN USUARIO EN ESPECIFICO',
        ]);

        //roles
        Permission::create([
            'name'=>'ROLES',
            'slug'=>'roles.index',
            'description'=>'NAVEGA LA TABLA USUARIOS',
        ]);
        Permission::create([
            'name'=>'ROLES',
            'slug'=>'roles.show',
            'description'=>'VISUALIZA A UN ROL EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'ROLES',
            'slug'=>'roles.create',
            'description'=>'CREA UN NUEVO ROL EN EL SISTEMA',
        ]);
        Permission::create([
            'name'=>'ROLES',
            'slug'=>'roles.edit',
            'description'=>'EDITA UN ROL EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'ROLES',
            'slug'=>'roles.destroy',
            'description'=>'ELIMINA UN ROL EN ESPECIFICO',
        ]);

         //CARGOS
         Permission::create([
            'name'=>'CARGO',
            'slug'=>'cargos.index',
            'description'=>'NAVEGA LA TABLA CARGOS',
        ]);
        Permission::create([
            'name'=>'CARGO',
            'slug'=>'cargos.show',
            'description'=>'VISUALIZA A UN CARGO EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'CARGO',
            'slug'=>'cargos.create',
            'description'=>'CREA UN NUEVO CARGO EN EL SISTEMA',
        ]);
        Permission::create([
            'name'=>'CARGO',
            'slug'=>'cargos.edit',
            'description'=>'EDITA UN CARGO EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'CARGO',
            'slug'=>'cargos.destroy',
            'description'=>'ELIMINA UN CARGO EN ESPECIFICO',
        ]);

         //DEPARTAMENTO
         Permission::create([
            'name'=>'DEPARTAMENTO',
            'slug'=>'departamentos.index',
            'description'=>'NAVEGA LA TABLA DEPARTAMENTOS',
        ]);
        Permission::create([
            'name'=>'DEPARTAMENTO',
            'slug'=>'departamentos.show',
            'description'=>'VISUALIZA A UN DEPARTAMENTO EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'DEPARTAMENTO',
            'slug'=>'departamentos.create',
            'description'=>'CREA UN NUEVO DEPARTAMENTO EN EL SISTEMA',
        ]);
        Permission::create([
            'name'=>'DEPARTAMENTO',
            'slug'=>'departamentos.edit',
            'description'=>'EDITA UN DEPARTAMENTO EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'DEPARTAMENTO',
            'slug'=>'departamentos.destroy',
            'description'=>'ELIMINA UN DEPARTAMENTO EN ESPECIFICO',
        ]);

        //ORGANIZACIONES POLITICAS
        Permission::create([
            'name'=>'ORGANIZACION POLITICA',
            'slug'=>'organizacionpoliticas.index',
            'description'=>'NAVEGA LA TABLA ORGANIZACION POLITICA',
        ]);
        Permission::create([
            'name'=>'ORGANIZACION POLITICA',
            'slug'=>'organizacionpoliticas.show',
            'description'=>'VISUALIZA A UN ORGANIZACION POLITICA EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'ORGANIZACION POLITICA',
            'slug'=>'organizacionpoliticas.create',
            'description'=>'CREA UN NUEVO ORGANIZACION POLITICA EN EL SISTEMA',
        ]);
        Permission::create([
            'name'=>'ORGANIZACION POLITICA',
            'slug'=>'organizacionpoliticas.edit',
            'description'=>'EDITA UN ORGANIZACION POLITICA EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'ORGANIZACION POLITICA',
            'slug'=>'organizacionpoliticas.destroy',
            'description'=>'ELIMINA UN ORGANIZACION POLITICA EN ESPECIFICO',
        ]);
         //PROVINCIA
         Permission::create([
            'name'=>'PROVINCIA',
            'slug'=>'provincias.index',
            'description'=>'NAVEGA LA TABLA PROVINCIAS',
        ]);
        Permission::create([
            'name'=>'PROVINCIA',
            'slug'=>'provincias.show',
            'description'=>'VISUALIZA A UNA PROVINCIA EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'PROVINCIA',
            'slug'=>'provincias.create',
            'description'=>'CREA UNA NUEVA PROVINCIA EN EL SISTEMA',
        ]);
        Permission::create([
            'name'=>'PROVINCIA',
            'slug'=>'provincias.edit',
            'description'=>'EDITA UNA PROVINCIA EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'PROVINCIA',
            'slug'=>'provincias.destroy',
            'description'=>'ELIMINA UNA PROVINCIA EN ESPECIFICO',
        ]);
           //MUNICIPIOS
           Permission::create([
            'name'=>'MUNICIPIO',
            'slug'=>'municipios.index',
            'description'=>'NAVEGA LA TABLA MUNICIPIOS',
        ]);
        Permission::create([
            'name'=>'MUNICIPIO',
            'slug'=>'municipios.show',
            'description'=>'VISUALIZA A UN MUNICIPIOS EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'MUNICIPIO',
            'slug'=>'municipios.create',
            'description'=>'CREA UN NUEVO MUNICIPIOS EN EL SISTEMA',
        ]);
        Permission::create([
            'name'=>'MUNICIPIO',
            'slug'=>'municipios.edit',
            'description'=>'EDITA UN MUNICIPIOS EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'MUNICIPIO',
            'slug'=>'municipios.destroy',
            'description'=>'ELIMINA UN MUNICIPIOS EN ESPECIFICO',
        ]);
        //CANDIDATOS
        Permission::create([
            'name'=>'CANDIDATO',
            'slug'=>'candidatos.index',
            'description'=>'NAVEGA LA TABLA CANDIDATOS',
        ]);
        Permission::create([
            'name'=>'CANDIDATO',
            'slug'=>'candidatos.show',
            'description'=>'VISUALIZA A UN CANDIDATOS EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'CANDIDATO',
            'slug'=>'candidatos.create',
            'description'=>'CREA UN NUEVO CANDIDATO EN EL SISTEMA',
        ]);
        Permission::create([
            'name'=>'CANDIDATO',
            'slug'=>'candidatos.edit',
            'description'=>'EDITA UN CANDIDATO EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'CANDIDATO',
            'slug'=>'candidatos.destroy',
            'description'=>'ELIMINA UN CANDIDATO EN ESPECIFICO',
        ]);

        //NACIONES Y PUEBLO INDIGENAS

        Permission::create([
            'name'=>'NACIONES',
            'slug'=>'nacions.index',
            'description'=>'NAVEGA LA TABLA NACIONES',
        ]);
        Permission::create([
            'name'=>'NACIONES',
            'slug'=>'nacions.show',
            'description'=>'VISUALIZA A UNA NACION EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'NACIONES',
            'slug'=>'nacions.create',
            'description'=>'CREA UNA NUEVA NACION',
        ]);
        Permission::create([
            'name'=>'NACIONES',
            'slug'=>'nacions.edit',
            'description'=>'EDITA UNA NACION Y PUEBLO INDIGENA',
        ]);

        //DOCUMENTOS
        Permission::create([
            'name'=>'DOCUMENTO',
            'slug'=>'documentos.index',
            'description'=>'NAVEGA LA TABLA DOCUMENTO',
        ]);
        Permission::create([
            'name'=>'DOCUMENTO',
            'slug'=>'documentos.show',
            'description'=>'VISUALIZA A UN DOCUMENTO EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'DOCUMENTO',
            'slug'=>'documentos.create',
            'description'=>'CREA UN NUEVO DOCUMENTO EN EL SISTEMA',
        ]);
        Permission::create([
            'name'=>'DOCUMENTO',
            'slug'=>'documentos.edit',
            'description'=>'EDITA UN DOCUMENTO EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'DOCUMENTO',
            'slug'=>'documentos.destroy',
            'description'=>'ELIMINA UN DOCUMENTO EN ESPECIFICO',
        ]);
        //REPORTES
        Permission::create([
            'name'=>'REPORTES',
            'slug'=>'credencial.index',
            'description'=>'REPORTE DE CREDENCIALES ',
        ]);
        Permission::create([
            'name'=>'Reportes de Composición',
            'slug'=>'composicion.filtros',
            'description'=>'Visualizacion de los Reportes de Escaños',
        ]);

        //AUTORIDADES
        Permission::create([
            'name'=>'AUTORIDAD',
            'slug'=>'autoridads.index',
            'description'=>'NAVEGA LA TABLA AUTORIDADES',
        ]);
        Permission::create([
            'name'=>'AUTORIDAD',
            'slug'=>'autoridads.show',
            'description'=>'VISUALIZA A UNA AUTORIDAD EN ESPECIFICO',
        ]);

        Permission::create([
            'name'=>'AUTORIDAD',
            'slug'=>'autoridads.edit',
            'description'=>'EDITA LA INFORMACION DE UNA AUTORIDAD',
        ]);


        Permission::create([
            'name'=>'NPIOC',
            'slug'=>'npiocs.index',
            'description'=>'NAVEGA LA TABLA NPIOCS',
        ]);
        Permission::create([
            'name'=>'NPIOC',
            'slug'=>'npiocs.show',
            'description'=>'VISUALIZA A UNA AUTORIDAD DE NPIOCS',
        ]);
        Permission::create([
            'name'=>'NPIOCS',
            'slug'=>'npiocs.create',
            'description'=>'CREA UNA NUEVA AUTORIDAD NPIOC EN EL SISTEMA',
        ]);
        Permission::create([
            'name'=>'NPIOCS',
            'slug'=>'npiocs.edit',
            'description'=>'EDITA A UNA AUTORIDAD NPIOC EN ESPECIFICO',
        ]);
        Permission::create([
            'name'=>'NPIOCS',
            'slug'=>'npiocs.destroy',
            'description'=>'ELIMINA A UNA AUTORIDAD NPIOC EN ESPECIFICO',
        ]);

        //HISTORICO
        Permission::create([
            'name'=>'HISTORICO',
            'slug'=>'historico.index',
            'description'=>'NAVEGA LA TABLA NPIOCS',
        ]);

        //RESOLUCION
        Permission::create([
            'name'=>'RESOLUCION',
            'slug'=>'resolucion.index',
            'description'=>'NAVEGA LA TABLA NPIOCS',
        ]);

        //AUDITORIAS
        Permission::create([
            'name'=>'AUDITORIAS',
            'slug'=>'auditorias.index',
            'description'=>'NAVEGA LA TABLA NPIOCS',
        ]);

        //ANTECEDENTES

        Permission::create([
            'name'=>'ANTECEDENTES',
            'slug'=>'antecedentes.filtros',
            'description'=>'reporte de Los antecedentes por autoridad',
        ]);

        //GOBERNACION

        Permission::create([
            'name'=>'GOBERNACION',
            'slug'=>'credencial_gobernacion',
            'description'=>'credencial_gobernacion',
        ]);
        Permission::create([
            'name'=>'GOBERNACION',
            'slug'=>'buscador_composicion_territorio.index',
            'description'=>'TERRITORIO',
        ]);
        Permission::create([
            'name'=>'GOBERNACION',
            'slug'=>'buscador_composicion_poblacion.index',
            'description'=>'POBLACION',
        ]);
        Permission::create([
            'name'=>'GOBERNACION',
            'slug'=>'credencial_npioc',
            'description'=>'CREDENCIAL NPIOC',
        ]);
        Permission::create([
            'name'=>'GOBERNACION',
            'slug'=>'buscador_composicion_npioc.index',
            'description'=>'BUSCADOR NPIOC',
        ]);
    }
}
