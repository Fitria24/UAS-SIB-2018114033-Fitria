<?php
use App\Http\Controllers\MhsController;
use App\Http\Controllers\MtkController;
use App\Http\Controllers\AbsController;
use App\Http\Controllers\JdwController;
use App\Http\Controllers\KontrakmkController;
use App\Http\Controllers\SmtController;
use Illuminate\Support\Facades\Route;

Route::resource('mahasiswas',MhsController::class);
Route::resource('matakuliahs',MtkController::class);
Route::resource('absensis',AbsController::class);
Route::resource('jadwals',JdwController::class);
Route::resource('kontrakmks',KontrakmkController::class);
Route::resource('semesters',SmtController::class);
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

Route::get('',[MhsController::class,'index']);
Route::get('',[MtkController::class,'index']);
Route::get('',[AbsController::class,'index']);
Route::get('',[JdwController::class,'index']);
Route::get('',[KontrakmkController::class,'index']);
Route::get('',[SmtController::class,'index']);
Route::delete('/mahasiswas/{id}', [MhsController::class,'destroy']);
