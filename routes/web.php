<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('assets', AssetController::class)->names([
    'index' => 'assets.index',
    'create' => 'assets.create',
    'store' => 'assets.store',
    //'show' => 'assets.show',
    'edit' => 'assets.edit',
    'update' => 'assets.update',
    'destroy' => 'assets.destroy',
]);
Route::resource('asset-types', AssetTypeController::class)->names([
    'index' => 'asset-types.index',
    'create' => 'asset-types.create',
    'store' => 'asset-types.store',
    'show' => 'asset-types.show',
    'edit' => 'asset-types.edit',
    'update' => 'asset-types.update',
    'destroy' => 'asset-types.destroy',
]);
