<?php

use App\Models\paylist;
use App\Models\employee;
use App\Models\employee1;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\PaylistController;
use App\Http\Controllers\HistoriesController;
use App\Http\Controllers\KasbonController;
use App\Http\Controllers\SalaryController;

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


// Dokumentasi penampilan data nama 
// Route::get('/', function () {
//     return view('welcome', ["data" => paylist::with(['getkaryawan1', 'getkaryawan2', 'getkaryawan3'])->get()]);
// });
Route::get('/', function () {
    return view('index', [
        "title" => "Dashboard",
        "index" => "active"
    ]);
})->middleware('auth');

Route::get('paylists', [PaylistController::class, 'index'])->name("paylists")->middleware('auth');
Route::post('/paylist', [PaylistController::class, 'store'])->middleware('auth');
Route::put('/paylist', [PaylistController::class, 'update'])->middleware('auth');
Route::delete('/paylist', [PaylistController::class, 'delete'])->middleware('auth');
Route::get('/paylist/{tanggal?}/{bulan?}/{tahun?}', [PaylistController::class, 'indexWithParam'])->where('tahun', '[0-9]+')->where('bulan', '[1-9]|1[0-2]')->where('tanggal', '^(0?[1-9]|[1-2][0-9]|3[0-1])$')->middleware('auth');

Route::get('/kasbon', [KasbonController::class, "index"])->middleware('auth')->name('kasbon.index');
Route::post('/kasbon', [KasbonController::class, "store"])->middleware('auth');
Route::put('/kasbon', [KasbonController::class, "update"])->middleware('auth');
Route::delete('/kasbon', [KasbonController::class, "delete"])->middleware('auth');

Route::get('/employee', [employeeController::class, 'index'])->middleware('auth');
Route::post('/employee', [employeeController::class, 'store'])->middleware('auth');
Route::put('/employee', [employeeController::class, 'update'])->middleware('auth');
Route::delete('/employee', [employeeController::class, 'delete'])->middleware('auth');

Route::get('/histories/{tahun?}', [HistoriesController::class, 'index'])->where('tahun', '[0-9]+')->middleware('auth');
Route::get('/histories/{tahun}/{bulan}/{mingguKe}', [HistoriesController::class, 'indexWithParam'])->middleware('auth');

Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/logining', [AuthController::class, 'login'])->middleware('guest');

Route::get('/salary', [SalaryController::class, "index"])->middleware('auth');
Route::put('/salary', [SalaryController::class, "update"])->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout']);
