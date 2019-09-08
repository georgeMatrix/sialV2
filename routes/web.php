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
Route::group(['middleware'=>['auth', 'noCache']], function (){
    Route::get('pdf/{ruta}', 'CartaPorteController@getPdfCartaPorte')->name('cartaPorte');
    Route::post('cartaPorte/release', 'CartaPorteController@abiertaToRelease')->name('release');
    Route::resource('clientes', 'ClientesController');
    Route::resource('operadores', 'OperadoresController');
    Route::resource('provedores', 'ProvedoresController');
    Route::resource('rutas', 'RutasController');
    Route::resource('unidades', 'UnidadesController');
    Route::resource('datosFacturacions', 'DatosFacturacionController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('datosCporPagar', 'DatosCporPagarController');
    Route::resource('actividad', 'ActividadController');
    Route::resource('cartaPorte', 'CartaPorteController');
    Route::resource('cuentasPorCobrar', 'CuentasPorCobrarController');
    Route::resource('cuentasPorCobrarV2', 'CuentasPorCobrarV2Controller');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('prueba', 'PruebasController');
    Route::resource('facturas', 'FacturasController');
});

Route::get('factura', function(){
   return view('factura');
});

Auth::routes();
//['register'=>false, 'reset'=>false]


