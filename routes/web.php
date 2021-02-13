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

// Route::get('/contracts', [App\Http\Controllers\ContractsController::class , 'index']);
// Route::get('/contracts/view', [App\Http\Controllers\ContractsController::class, 'view']);
// Route::post('/contracts/save', [App\Http\Controllers\ContractsController::class, 'save']);
// Route::get('/contracts/remove', [App\Http\Controllers\ContractsController::class, 'remove']);
// Route::get('/contracts/edit', [App\Http\Controllers\ContractsController::class, 'edit']);
// Route::get('/contracts/print_pdf', [App\Http\Controllers\ContractsController::class, 'print_pdf']);

// Route::get('/contracts/templates', [App\Http\Controllers\ContractTemplatesController::class, 'index']);
// Route::get('/contracts/templates/view', [App\Http\Controllers\ContractTemplatesController::class, 'view']);
// Route::post('/contracts/templates/save', [App\Http\Controllers\ContractTemplatesController::class, 'save']);
// Route::get('/contracts/templates/remove', [App\Http\Controllers\ContractTemplatesController::class, 'remove']);
// Route::get('/contracts/templates/edit', [App\Http\Controllers\ContractTemplatesController::class, 'edit']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
