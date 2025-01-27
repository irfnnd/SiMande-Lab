<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\SertifikatController;


Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Auth::routes(['verify' => true]);
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pembayaran', PembayaranController::class);
    Route::post('/pembayaran/upload-bukti', [PembayaranController::class, 'store'])->name('bukti.upload');
    Route::get('/pembayaran/{id}/unduh-tagihan', [PdfController::class, 'tagihanPDF'])->name('tagihan.unduh');
    Route::resource('permohonan-uji', PermohonanController::class);
    Route::get('/get-parameter/{id}', [PermohonanController::class, 'getParameter']);

    Route::post('permohonan-uji/{id}/status', [PermohonanController::class, 'updateStatus'])->name('permohonan.updateStatus');
    Route::get('/get-status-history/{id}', [TrackingController::class, 'getStatusHistory']);
    Route::resource('tracking', TrackingController::class);
    Route::resource('sertifikat', SertifikatController::class);
    Route::resource('feedback', FeedbackController::class);
});
