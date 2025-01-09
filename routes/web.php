<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoftController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DetailController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [SoftController::class, 'index']);
Route::get('/detail/{Software:slug}', [SoftController::class, 'detail'])->name('detailsoft');
Route::get('/dwonload/{Software:slug}', [SoftController::class, 'dwonload']);

Route::get('/software/{softwareId}/comments', [CommentController::class, 'show']);
Route::post('/software/{softwareId}/comments', [CommentController::class, 'store']);