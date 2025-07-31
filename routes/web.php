<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController; 
use App\Http\Controllers\FuzzyController;


Route::get('/', [SiswaController::class, 'index']);


Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/tambah', [SiswaController::class, 'create'])->name('siswa.tambah');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');

