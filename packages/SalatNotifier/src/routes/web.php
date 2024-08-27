<?php

use Illuminate\Support\Facades\Route;
use SalatNotifier\Controllers\SalatTimeManagerController;

Route::get('/salat-times', [SalatTimeManagerController::class, 'index'])->name('salat-times.index');
Route::post('/salat-times', [SalatTimeManagerController::class, 'store'])->name('salat-times.store');
Route::get('/salat-times/{id}/edit', [SalatTimeManagerController::class, 'edit'])->name('salat-times.edit');
Route::put('/salat-times/{id}', [SalatTimeManagerController::class, 'update'])->name('salat-times.update');
Route::delete('/salat-times/{id}', [SalatTimeManagerController::class, 'delete'])->name('salat-times.delete');
