<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Route::get('/company',[App\Http\Controllers\CompanyController::class,'index'])->name('company');
Route::post('/company', [App\Http\Controllers\CompanyController::class,'create'])->name('create.company');

Route::post('/company/{id}',[App\Http\Controllers\CompanyController::class,'storeImage'])->name('store.image');
Route::get('/company/{id}',[App\Http\Controllers\CompanyController::class,'showCompanyInfo'])->name('show.company.info');

*/
Route::resource('companies',CompanyController::class);
Route::post('/companies/{id}',[CompanyController::class,'storeImage'])->name('companies.storeImage');

Route::resource('employees',EmployeeController::class);
