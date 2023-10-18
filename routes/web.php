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

Route::controller(\App\Http\Controllers\GuideController::class)->prefix('tourist-guide')->group(function () {
    Route::get('/', 'index')->name('guides');
});

Route::controller(\App\Http\Controllers\VehicleController::class)->prefix('vehicle')->group(function () {
    Route::get('/', 'index')->name('vehicles');
});

Route::get('/about', function () {
    return view('landing-page.pages.about');
})->name('about');

Route::get('/contact-us', function () {
    return view('landing-page.pages.contact-us');
})->name('contact-us');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

    Route::get('manage-places', \App\Http\Livewire\Place\Index::class)->name('manage-places');
    Route::get('manage-vehicles', \App\Http\Livewire\Vehicle\Index::class)->name('manage-vehicles');
    Route::get('manage-guides', \App\Http\Livewire\Guide\Index::class)->name('manage-guides');
//
//    Route::get('billing-portal', \App\Http\Livewire\Payment\Index::class)->name('billing');
    Route::get('bookings', \App\Http\Livewire\Bookings\Index::class)->name('bookings');
});
