<?php

use App\Http\Controllers\CompareController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeofItemController;
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

Route::get('/', function () {
    return redirect()->route('items.index');
});

Route::resource('items', ItemController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('types', TypeofItemController::class);
Route::get('/compare', [CompareController::class, 'index'])->name('compare.index');
