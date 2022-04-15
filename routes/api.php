<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Company;
use App\Models\Employee;

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('employees', [App\Http\Controllers\API\EmployeeController::class, 'index']);
Route::get('employees/{id}',[App\Http\Controllers\API\EmployeeController::class, 'show']);
Route::post('employees',[App\Http\Controllers\API\EmployeeController::class, 'store']);
Route::put('employees/{id}',[App\Http\Controllers\API\EmployeeController::class, 'update']);
Route::delete('employees/{id}',[App\Http\Controllers\API\EmployeeController::class, 'destroy']);


Route::get('companies', [App\Http\Controllers\API\CompanyController::class, 'index']);
Route::get('companies/{id}',[App\Http\Controllers\API\CompanyController::class, 'show']);
Route::post('companies',[App\Http\Controllers\API\CompanyController::class, 'store']);
Route::post('companies/{id}',[App\Http\Controllers\API\CompanyController::class, 'storeImage']);
Route::put('companies/{id}',[App\Http\Controllers\API\CompanyController::class, 'update']);
Route::delete('companies/{id}',[App\Http\Controllers\API\CompanyController::class, 'destroy']);

