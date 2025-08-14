<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiswaController;

Route::get('/siswa/pdf', [SiswaController::class, 'createPdf'])->name('siswa.pdf');
Route::resource('siswa', SiswaController::class)->except(['show']);