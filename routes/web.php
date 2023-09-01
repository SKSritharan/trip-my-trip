<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'index'])->name('home');
Route::get('/places', [\App\Http\Controllers\PlacesPageController::class, 'index'])->name('places');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('manage-places', \App\Http\Livewire\Place\Index::class)->name('manage-places');
    Route::get('manage-vehicles', \App\Http\Livewire\Vehicle\Index::class)->name('manage-vehicles');
    Route::get('manage-guides', \App\Http\Livewire\Guide\Index::class)->name('manage-guides');
});
