<?php

use App\Http\Controllers\RealTimeMonitorController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware([])->group(function() {
    Route::get('realtime-monitor', [RealTimeMonitorController::class, 'index'])->name('realtime-monitor');
    Route::get('aux-change', [RealTimeMonitorController::class, 'auxChange'])->name('aux-change');
});

require __DIR__.'/auth.php';
