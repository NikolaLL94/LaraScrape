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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('provider', App\Http\Controllers\ProviderController::class)->except('update', 'destroy');

Route::resource('project', App\Http\Controllers\ProjectController::class)->except('update', 'destroy');

Route::resource('template', App\Http\Controllers\TemplateController::class)->except('update', 'destroy');

Route::get('send-email/{provider}', \App\Http\Controllers\SendEmailController::class);
