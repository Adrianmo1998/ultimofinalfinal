<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/puesto','api\Puesto@getPuestos');
Route::get('/infopuestos','api\Puesto@getInfoPuestos');
Route::post('/add-empleado','api\Puesto@addEmpleado');
Route::delete('/delete-empleado/{id}','api\Puesto@deleteEmpleado');
Route::patch('/edit-empleado','api\Puesto@editEmpleado');
