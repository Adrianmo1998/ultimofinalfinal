<?php

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
Route::get('/', 'Puesto@getPuestos')->name('home');
Route::view('/home','vistas.home')->name('home');
Route::get('/empleados','Puesto@getPuestos')->name('puestos');
Route::get('/puesto/{puesto}', 'Puesto@getXPuesto')->name('verpuesto');

