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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/me', [\App\Http\Controllers\Admin\DashbordController::class, 'index'])->name('dashboard');

Route::group([
    'prefix' => 'admin',
    'namespace' => '\App\Http\Controllers\Admin',
], function () {
    Route::resource('customers', CustomerController::class);
});
