<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\ReportController;

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

//Routes for meal
Route::middleware(['auth:sanctum', 'verified'])->get('/',[MealController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/add-meal', [MealController::class, 'create'])->name('add-meal');

Route::middleware(['auth:sanctum', 'verified'])->post('/save-meal', [MealController::class, 'store'])->name('save-meal');

Route::middleware(['auth:sanctum', 'verified'])->get('/edit-meal/{id}', [MealController::class, 'edit'])->name('edit-meal');

Route::middleware(['auth:sanctum', 'verified'])->put('/update-meal/{id}', [MealController::class, 'update'])->name('update-meal');

Route::middleware(['auth:sanctum', 'verified'])->get('/delete-meal/{id}', [MealController::class, 'destroy'])->name('delete-meal');

//Routes for generating reports
Route::middleware(['auth:sanctum', 'verified'])->get('/report/{day}', [ReportController::class, 'report'])->name('report');

Route::middleware(['auth:sanctum', 'verified'])->post('/dynamic', [ReportController::class, 'dynamic'])->name('dynamic');

Route::middleware(['auth:sanctum', 'verified'])->get('/range', [ReportController::class, 'range'])->name('range');
