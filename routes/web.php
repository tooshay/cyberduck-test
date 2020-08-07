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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/companies', ['App\Http\Controllers\CompanyController', 'index'])->name('companies.index');
Route::get('/companies/{id}', ['App\Http\Controllers\CompanyController', 'edit'])->name('company.edit');
Route::delete('/companies/{id}', ['App\Http\Controllers\CompanyController', 'destroy'])->name('company.destroy');
