<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

//Auth routes
Route::middleware([CheckIsNotLogged::class])->group(function(){
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
});

Route::middleware([CheckIsLogged::class])->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/newNote', [MainController::class, 'newNote'])->name('newNote');
    route::post('/newNoteSubmit', [MainController::class, 'newNoteSubmit'])->name('newNoteSubmit');
    Route::get('/editNote/{id}', [MainController::class, 'editNote'])->name('editNote');
    Route::post('/editNoteSubmit/{id}', [MainController::class, 'editNoteSubmit'])->name('editNoteSubmit');
    Route::get('/deleteNoteConfirm/{id}', [MainController::class, 'deleteNoteConfirm'])->name('deleteNoteConfirm');
    Route::get('/deleteNoteSubmit/{id}', [MainController::class, 'deleteNoteSubmit'])->name('deleteNoteSubmit');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
