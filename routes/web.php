<?php

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
//Route::resource('/', 'ClientesController');
//, 'administracion'
Route::group(['middleware'=>['auth', 'noCache']], function (){
    Route::get('pdf/{ruta}', 'CartaPorteController@getPdfCartaPorte')->name('cartaPorte');
    Route::post('cartaPorte/release', 'CartaPorteController@abiertaToRelease')->name('release');
    Route::resource('clientes', 'ClientesController')->middleware('administrador');
    Route::resource('operadores', 'OperadoresController')->middleware('administrador');
    Route::resource('provedores', 'ProvedoresController')->middleware('administrador');
    Route::resource('rutas', 'RutasController')->middleware('administrador');
    Route::resource('unidades', 'UnidadesController')->middleware('administrador');
    Route::resource('datosFacturacions', 'DatosFacturacionController')->middleware('administrador');
    Route::resource('usuarios', 'UsuariosController')->middleware('administrador');
    Route::resource('datosCporPagar', 'DatosCporPagarController');
    Route::resource('actividad', 'ActividadController');
    Route::resource('cartaPorte', 'CartaPorteController')->middleware('administrador');
    //Route::resource('cuentasPorCobrar', 'CuentasPorCobrarController');
    Route::resource('cuentasPorCobrarV2', 'CuentasPorCobrarV2Controller')->middleware('administrador');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('prueba', 'PruebasController');
    Route::resource('facturas', 'FacturasController');
    Route::resource('error', 'PaginaErrorController');
});

Route::get('factura', function(){
   return view('factura');
});

Auth::routes();
//['register'=>false, 'reset'=>false]


