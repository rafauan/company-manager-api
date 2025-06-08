<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

Route::apiResource('companies', CompanyController::class);
Route::apiResource('employees', EmployeeController::class);
