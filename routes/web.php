<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RolesController;
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

Route::get('/', function () { return view('welcome'); });
Route::get('/home', [ToDoListController::class, 'index'])->name('home');

Auth::routes();

Route::prefix('roles')->middleware(['auth'])->group(function () {
    Route::post('/store', [RolesController::class, 'store'])->name('store');
    Route::post('/destroy/{id}', [RolesController::class, 'destroy'])->name('destroy');
});

Route::prefix('todo')->middleware(['auth'])->group(function () {
    Route::post('/update/{id}', [ToDoController::class, 'update'])->name('update_todo');
    Route::post('/store', [ToDoController::class, 'store'])->name('store_todo');
    Route::post('/destroy/{id}', [ToDoController::class, 'destroy'])->name('destroy_todo');
    Route::post('/store_img', [ToDoController::class, 'store_img'])->name('store_img');
    Route::post('/destroy_img/{id}', [ToDoController::class, 'destroy_img'])->name('destroy_img');
});


Route::prefix('tag')->middleware(['auth'])->group(function () {
    Route::post('/destroy/{id}', [TagController::class, 'destroy'])->name('destroy_tag');
    Route::post('/store', [TagController::class, 'store'])->name('store_tag');
});

Route::prefix('list')->middleware(['auth'])->group(function () {
    Route::post('/destroy/{id}', [ToDoListController::class, 'destroy'])->name('destroy_list');
    Route::post('/store', [ToDoListController::class, 'store'])->name('store_list');
    Route::get('/{id}', [RolesController::class, 'show'])->name('roles_show');
    Route::get('/show/{id}', [ToDoController::class, 'show'])->name('show_list_item');
});



Route::prefix('todo')->middleware(['auth'])->group(function () {
    Route::post('/update/{id}', [ToDoController::class, 'update'])->name('update_todo');
    Route::post('/store', [ToDoController::class, 'store'])->name('store_todo');
    Route::post('/destroy/{id}', [ToDoController::class, 'destroy'])->name('destroy_todo');
});
