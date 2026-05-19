<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\PurchaseController;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('books', BookController::class);
Route::get('books/{book}/read', [BookController::class, 'read'])->name('books.read');

Route::resource('members', MemberController::class);
Route::resource('borrows', BorrowController::class);
Route::post('borrows/{borrow}/return', [BorrowController::class, 'returnBook'])->name('borrows.return');

Route::resource('purchases', PurchaseController::class);
