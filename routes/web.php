<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});


Route::get('/signup', function () {
    return view('signup');
});

Route::post('login', [AuthController::class, 'login'])
->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/deposit', [TransactionController::class, 'deposit'])->name('deposit');
    Route::get('/withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
    Route::get('/transfer', [TransactionController::class, 'transfer'])->name('transfer');
    Route::post('/deposit/create', [TransactionController::class, 'depositAmount'])->name('deposit.create');
    Route::post('/withdraw/create', [TransactionController::class, 'withdrawAmount'])->name('withdraw.create');
    Route::post('/transfer/create', [TransactionController::class, 'transferAmount'])->name('transfer.create');
    Route::get('/statement', [TransactionController::class, 'statement'])->name('statement');
    Route::get('/statement-data', [TransactionController::class, 'getTransactionData'])->name('statement_data');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});
