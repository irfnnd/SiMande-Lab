<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\SertifikatController;


Route::get('/', function () {
    return view('home');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('permohonan-uji', PermohonanController::class);
    Route::resource('tracking', TrackingController::class);
    Route::resource('sertifikat', SertifikatController::class);
    Route::resource('feedback', FeedbackController::class);
});
