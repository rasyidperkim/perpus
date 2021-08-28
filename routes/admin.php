<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\DataController;


Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::get('/author', [AuthorController::class, 'index'])->name('author.index');

Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');

Route::post('/author', [AuthorController::class, 'store'])->name('author.store');

Route::get('/author/{author}/edit', [AuthorController::class, 'edit'])->name('author.edit');

Route::put('/author/{author}', [AuthorController::class, 'update'])->name('author.update');

Route::delete('/author/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');

Route::get('/author/data', [DataController::class, 'authors'])->name('author.data');