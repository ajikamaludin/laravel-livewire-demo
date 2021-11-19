<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PowerLinkController;

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

Route::get('/', [FrontController::class, 'index'])->name('welcome');
Route::post('/', [FrontController::class, 'store'])->name('links.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('shortlinks', LinkController::class)->middleware(['auth'])->name('shortlinks.index');
Route::get('powerlinks', PowerLinkController::class)->middleware(['auth'])->name('powerlinks.index');

require __DIR__.'/auth.php';

Route::get('/{link:code}', [FrontController::class, 'redirect']);
