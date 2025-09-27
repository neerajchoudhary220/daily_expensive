<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\IncomeTransactionController;
use App\Http\Controllers\web\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });

    // Expenses
    Route::controller(ExpensesController::class)->prefix('expenses')->group(function () {
        Route::get('/', 'index')->name('expenses');
        Route::get('list', 'list')->name('expense.list');
        Route::delete('{expense}/delete', 'destroy')->name('expense.delete');
    });

    // Income Transaction
    Route::controller(IncomeTransactionController::class)->prefix('income-transaction')->group(function () {
        Route::get('/', 'index')->name('income_transaction');
    });

    Route::get('logout', function () {
        Auth::logout();
        request()->session()->regenerateToken();

        return redirect('/');
    })->name('logout');
});
