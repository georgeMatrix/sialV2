<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/uno', 'RutasController@datosSelect');
Route::get('/evaluacion', 'RutasController@datosCporPagar');
Route::get('/rutasClientes/{id}/cartaPorte', 'RutasController@rutasClientes');
Route::post('postCuentasPorCobrar', 'CuentasPorCobrarController@postCuentasPorCobrar');
Route::post('/cuentasPorCobrarV2', 'CuentasPorCobrarV2Controller@getDatosCuentasPorCobrar');
Route::post('/facturar', 'CuentasPorCobrarV2Controller@datosParaFacturar');
Route::post('/guardarFacturar', 'CuentasPorCobrarV2Controller@datosAGuardarEnFactura');
Route::post('/guardarFactura', 'CuentasPorCobrarV2Controller@datosLlenosAGuardarEnFactura');
Route::post('/excelFactura', 'CuentasPorCobrarV2Controller@excel');
Route::post('/serverExterno', 'CuentasPorCobrarV2Controller@serverExterno');
Route::get('/cliente/{id}', 'CuentasPorCobrarV2Controller@cliente');
Route::post('/getFacturas', 'FacturasController@getFacturas');
Route::post('/cambioStatus', 'FacturasController@cambioStatus');
Route::post('/cambioStatusPagado', 'FacturasController@cambioStatusPagado');
//Route::get('/cuentasPorCobrarV2', 'CuentasPorCobrarV2Controller@getDatosCuentasPorCobrar');
