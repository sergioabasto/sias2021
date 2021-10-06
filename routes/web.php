<?php

use App\Municipio;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::view('prueba/prueba','prueba.prueba')->name('prueba');

//Routes
Route::middleware(['auth'])->group(function () {
    Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('can:roles.store');
    Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('can:roles.index');
    Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('can:roles.create');
    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('can:roles.edit');
    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('can:roles.show');
    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('can:roles.destroy');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('can:roles.edit');

    //Usuarios
    Route::get('users', 'UserController@index')->name('users.index')->middleware('can:users.index');
    Route::put('users/{user}', 'UserController@update')->name('users.update')->middleware('can:users.edit');
    Route::get('users/{user}', 'UserController@show')->name('users.show')->middleware('can:users.show');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('can:users.destroy');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('can:users.edit');
    Route::get('users.buscar', 'UserController@buscar')->name('users');

    //CARGOS

    Route::post('cargos/store', 'CargoController@store')->name('cargos.store')->middleware('can:cargos.store');
    Route::get('cargos', 'CargoController@index')->name('cargos.index')->middleware('can:cargos.index');
    Route::get('cargos/create', 'CargoController@create')->name('cargos.create')->middleware('can:cargos.create');
    Route::put('cargos/{cargo}', 'CargoController@update')->name('cargos.update')->middleware('can:cargos.edit');
    Route::get('cargos/{cargo}', 'CargoController@show')->name('cargos.show')->middleware('can:cargos.show');
    Route::delete('cargos/{cargo}', 'CargoController@destroy')->name('cargos.destroy')->middleware('can:cargos.destroy');
    Route::get('cargos/{cargo}/edit', 'CargoController@edit')->name('cargos.edit')->middleware('can:cargos.edit');
    Route::get('cargos.buscar', 'CargoController@buscar')->name('buscargo');
    //DEPARTAMENTOS
    Route::post('departamentos/store', 'DepartamentoController@store')->name('departamentos.store')->middleware('can:departamentos.store');
    Route::get('departamentos', 'DepartamentoController@index')->name('departamentos.index')->middleware('can:departamentos.index');
    Route::get('departamentos/create', 'DepartamentoController@create')->name('departamentos.create')->middleware('can:departamentos.create');
    Route::put('departamentos/{departamento}', 'DepartamentoController@update')->name('departamentos.update')->middleware('can:departamentos.edit');
    Route::get('departamentos/{departamento}', 'DepartamentoController@show')->name('departamentos.show')->middleware('can:departamentos.show');
    Route::delete('departamentos/{departamento}', 'DepartamentoController@destroy')->name('departamentos.destroy')->middleware('can:departamentos.destroy');
    Route::get('departamentos/{departamento}/edit', 'DepartamentoController@edit')->name('departamentos.edit')->middleware('can:departamentos.edit');
    //ORGANIZACIONES POLITICAS
    Route::post('organizacionpoliticas/store', 'OrganizacionPoliticaController@store')->name('organizacionpoliticas.store')->middleware('can:organizacionpoliticas.store');
    Route::get('organizacionpoliticas', 'OrganizacionPoliticaController@index')->name('organizacionpoliticas.index')->middleware('can:organizacionpoliticas.index');
    Route::get('organizacionpoliticas/create', 'OrganizacionPoliticaController@create')->name('organizacionpoliticas.create')->middleware('can:organizacionpoliticas.create');
    Route::put('organizacionpoliticas/{organizacionpolitica}', 'OrganizacionPoliticaController@update')->name('organizacionpoliticas.update')->middleware('can:organizacionpoliticas.edit');
    Route::get('organizacionpoliticas/{organizacionpolitica}', 'OrganizacionPoliticaController@show')->name('organizacionpoliticas.show')->middleware('can:organizacionpoliticas.show');
    Route::delete('organizacionpoliticas/{organizacionpolitica}', 'OrganizacionPoliticaController@destroy')->name('organizacionpoliticas.destroy')->middleware('can:organizacionpoliticas.destroy');
    Route::get('organizacionpoliticas/{organizacionpolitica}/edit', 'OrganizacionPoliticaController@edit')->name('organizacionpoliticas.edit')->middleware('can:organizacionpoliticas.edit');
    //MUNICIPIO
    Route::post('municipios/store', 'MunicipioController@store')->name('municipios.store')->middleware('can:municipios.store');
    Route::get('municipios', 'MunicipioController@index')->name('municipios.index')->middleware('can:municipios.index');
    Route::get('municipios/create', 'MunicipioController@create')->name('municipios.create')->middleware('can:municipios.create');
    Route::put('municipios/{municipio}', 'MunicipioController@update')->name('municipios.update')->middleware('can:municipios.edit');
    Route::get('municipios/{municipio}', 'MunicipioController@show')->name('municipios.show')->middleware('can:municipios.show');
    Route::delete('municipios/{municipio}', 'MunicipioController@destroy')->name('municipios.destroy')->middleware('can:municipios.destroy');
    Route::get('municipios/{municipio}/edit', 'MunicipioController@edit')->name('municipios.edit')->middleware('can:municipios.edit');
    Route::get('municipios.buscar', 'MunicipioController@buscar')->name('buscarmunicipio');
    //PROVINCIAS
    Route::post('provincias/store', 'ProvinciaController@store')->name('provincias.store')->middleware('can:provincias.store');
    Route::get('provincias', 'ProvinciaController@index')->name('provincias.index')->middleware('can:provincias.index');
    Route::get('provincias/create', 'ProvinciaController@create')->name('provincias.create')->middleware('can:provincias.create');
    Route::put('provincias/{provincia}', 'ProvinciaController@update')->name('provincias.update')->middleware('can:provincias.edit');
    Route::get('provincias/{provincia}', 'ProvinciaController@show')->name('provincias.show')->middleware('can:provincias.show');
    Route::delete('provincias/{provincia}', 'ProvinciaController@destroy')->name('provincias.destroy')->middleware('can:provincias.destroy');
    Route::get('provincias/{provincia}/edit', 'ProvinciaController@edit')->name('provincias.edit')->middleware('can:provincias.edit');
    Route::get('provincias.buscar', 'ProvinciaController@buscar')->name('buscarprovincia');
    //CANDIDATOS
    Route::post('candidatos/store', 'CandidatoController@store')->name('candidatos.store')->middleware('can:candidatos.store');
    Route::get('candidatos', 'CandidatoController@index')->name('candidatos.index')->middleware('can:candidatos.index');
    Route::get('candidatos/create', 'CandidatoController@create')->name('candidatos.create')->middleware('can:candidatos.create');
    Route::put('candidatos/{candidato}', 'CandidatoController@update')->name('candidatos.update')->middleware('can:candidatos.edit');
    Route::get('candidatos/{candidato}', 'CandidatoController@show')->name('candidatos.show')->middleware('can:candidatos.show');
    Route::delete('candidatos/{candidato}', 'CandidatoController@destroy')->name('candidatos.destroy')->middleware('can:candidatos.destroy');
    Route::get('candidatos/{candidato}/edit', 'CandidatoController@edit')->name('candidatos.edit')->middleware('can:candidatos.edit');
    Route::get('candidatos.buscar', 'CandidatoController@buscar')->name('buscarcandidato');
    //NPIOC
    Route::post('npiocs/store', 'NpiocController@store')->name('npiocs.store')->middleware('can:npiocs.store');
    Route::get('npiocs', 'NpiocController@index')->name('npiocs.index')->middleware('can:npiocs.index');
    Route::get('npiocs/create', 'NpiocController@create')->name('npiocs.create')->middleware('can:npiocs.create');
    Route::put('npiocs/{npioc}', 'NpiocController@update')->name('npiocs.update')->middleware('can:npiocs.edit');
    Route::get('npiocs/{npioc}', 'NpiocController@show')->name('npiocs.show')->middleware('can:npiocs.show');
    Route::delete('npiocs/{npioc}', 'NpiocController@destroy')->name('npiocs.destroy')->middleware('can:npiocs.destroy');
    Route::get('npiocs/{npioc}/edit', 'NpiocController@edit')->name('npiocs.edit')->middleware('can:npiocs.edit');

    //AUTORIDADES
    Route::post('autoridads/store', 'AutoridadController@store')->name('autoridads.store')->middleware('can:autoridads.store');
    Route::get('autoridads', 'AutoridadController@index')->name('autoridads.index')->middleware('can:autoridads.index');
    Route::get('autoridads/create', 'AutoridadController@create')->name('autoridads.create')->middleware('can:autoridads.create');
    Route::put('autoridads/{autoridad}', 'AutoridadController@update')->name('autoridads.update')->middleware('can:autoridads.edit');
    Route::get('autoridads/{autoridad}', 'AutoridadController@show')->name('autoridads.show')->middleware('can:autoridads.show');
    Route::delete('autoridads/{autoridad}', 'AutoridadController@destroy')->name('autoridads.destroy')->middleware('can:autoridads.destroy');
    Route::get('autoridads/{autoridad}/edit', 'AutoridadController@edit')->name('autoridads.edit')->middleware('can:autoridads.edit');
    Route::get('autoridads.buscar', 'AutoridadController@buscar')->name('buscarautoridad');
    //DOCUMENTOS
    Route::post('documentos/store', 'DocumentoController@store')->name('documentos.store')->middleware('can:documentos.store');
    Route::get('documentos', 'DocumentoController@index')->name('documentos.index')->middleware('can:documentos.index');
    Route::get('documentos/create', 'DocumentoController@create')->name('documentos.create')->middleware('can:documentos.create');
    Route::put('documentos/{documento}', 'DocumentoController@update')->name('documentos.update')->middleware('can:documentos.edit');
    Route::get('documentos/{documento}', 'DocumentoController@show')->name('documentos.show')->middleware('can:documentos.show');
    Route::delete('documentos/{documento}', 'DocumentoController@destroy')->name('documentos.destroy')->middleware('can:documentos.destroy');
    Route::get('documentos/{documento}/edit', 'DocumentoController@edit')->name('documentos.edit')->middleware('can:documentos.edit');
    //MENU
    Route::get('menuregion', 'MenuController@indexRegions')->name('menuregion')->middleware('can:menu.menuregion');
    Route::get('menucandidato', 'MenuController@indexCandidatos')->name('menucandidato')->middleware('can:menu.menucandidato');
    Route::get('menureporte', 'MenuController@indexReportes')->name('menureporte')->middleware('can:menu.menureporte');
    Route::get('menurol', 'MenuController@indexRoles')->name('menurol')->middleware('can:menu.menurol');
    Route::get('menugober', 'MenuController@indexGober')->name('menugober')->middleware('can:menu.gobernacion');
    //AUDITORIAS
    Route::get('auditorias', 'AuditoriaController@index')->name('auditorias.index')->middleware('can:auditorias.index');
    //HISTORICO
    Route::get('historico', 'HisAutoridadCOntroller@index')->name('historico.index')->middleware('can:historico.index');
    //NACIONES
    Route::post('nacions/store', 'NacionController@store')->name('nacions.store')->middleware('can:nacions.store');
    Route::get('nacions', 'NacionController@index')->name('nacions.index')->middleware('can:nacions.index');
    Route::get('nacions/create', 'NacionController@create')->name('nacions.create')->middleware('can:nacions.create');
    Route::put('nacions/{nacion}', 'NacionController@update')->name('nacions.update')->middleware('can:nacions.edit');
    Route::get('nacions/{nacion}/edit', 'NacionController@edit')->name('nacions.edit')->middleware('can:nacions.edit');
      //PERSONAL TED
    Route::post('personal/store', 'PersonalTedController@store')->name('personal.store')->middleware('can:personal.store');
    Route::get('personal', 'PersonalTedController@index')->name('personal.index')->middleware('can:personal.index');
    Route::get('personal/create', 'PersonalTedController@create')->name('personal.create')->middleware('can:personal.create');
    Route::put('personal/{nacion}', 'PersonalTedController@update')->name('personal.update')->middleware('can:personal.edit');
    Route::get('personal/{nacion}/edit', 'PersonalTedController@edit')->name('personal.edit')->middleware('can:personal.edit');
    //REPORTES
    Route::get('credencial/', 'CredencialController@index')->name('credencial')->middleware('can:credencial.index');
    Route::get('credencial_gobernacion/', 'CredencialController@gobernacion')->name('credencial_gobernacion');
    Route::get('credencial_npioc/', 'CredencialController@npioc')->name('credencial_npioc')->middleware('can:composicion.filtros');
    Route::get('buscador/', 'CredencialController@searchAutoridad')->name('buscador_autoridad.index');
    Route::get('buscador_gobernacion/', 'CredencialController@searchGobernacion')->name('buscador_gobernacion.index');
    Route::get('buscador_npioc/', 'CredencialController@searchNpioc')->name('buscador_npioc.index');
    Route::get('buscadorid/', 'CredencialController@searchAutoridadById')->name('buscador_autoridad_id');
    Route::get('composicion/', 'ComposicionController@index')->name('composicion');
    Route::get('buscadorcomposicion/', 'ComposicionController@searchComposicion')->name('buscador_composicion.index');
    Route::get('composicion_territorio/', 'ComposicionController@territorio')->name('composicion_territorio');
    Route::get('buscadorcomposicion_ter/', 'ComposicionController@searchTerritorio')->name('buscador_composicion_territorio.index');
    Route::get('composicion_poblacion/', 'ComposicionController@poblacion')->name('composicion_poblacion');
    Route::get('buscadorcomposicion_pob/', 'ComposicionController@searchPoblacion')->name('buscador_composicion_poblacion.index');
    Route::get('composicion_npioc/', 'ComposicionController@npioc')->name('composicion_npioc');
    Route::get('buscadorcomposicion_npioc/', 'ComposicionController@searchNpioc')->name('buscador_composicion_npioc.index');
    Route::get('municipios_ajax','ComposicionController@searchMunicipios');
    Route::get('antecedente/', 'AntecedenteController@index')->name('antecedente')->middleware('can:antecedentes.filtros');
    Route::get('buscadorantecedente/', 'AntecedenteController@searchAntecedente')->name('buscador_antecedente.index');

    Route::get('resolucion', 'ResolucionCredencialController@index')->name('resolucion.index')->middleware('can:resolucion.index');
    Route::get('resolucion/{resolucion_credencials}/edit', 'ResolucionCredencialController@edit')->name('resolucion.edit');
    Route::put('resolucion/{resolucion_credencials}', 'ResolucionCredencialController@update')->name('resolucion.update');

    //BUSCADOR
    Route::get('users/buscador', 'UserController@index');

    //CLEAR
    Route::get('storage-link',function(){
        return Artisan::call('storage:link');
    });
    Route::get('/clear', function() {
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
    });
});
