<?php

use App\Http\Controllers\EmployeeLoginController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EmployeeRedirect;
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
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web', 'verified'])->name('dashboard');

Route::get('/select-type', function () {
    return view('select-type');
})->middleware('guest')->name('select-type');

Route::get('/employees/login', [EmployeeLoginController::class, 'login'])
    ->name('employees.login')->middleware('guest');
Route::post('/employees/login', [EmployeeLoginController::class, 'store'])->middleware('guest');



Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/employees/offers', [OffersController::class, 'index'])
        ->name('offers.index');
    Route::get('/employees/offers/{leave}', [OffersController::class, 'show'])
        ->name('offers.show');
    Route::get('/employees/offers/reject/{leave}', [OffersController::class, 'reject'])
        ->name('offers.reject');
    Route::get('/employees/offers/accept/{leave}', [OffersController::class, 'accept'])
        ->name('offers.accept');
    Route::get('/employees/offers/wait/{leave}', [OffersController::class, 'wait'])
        ->name('offers.wait');
    Route::delete('/employees/offers/{leave}', [OffersController::class, 'destroy'])
        ->name('offers.destroy');
    Route::resource('/employees', EmployeesController::class);
});

Route::middleware('auth:employee')->group(function () {
    Route::resource('/leaves', LeavesController::class)->parameters(['leaves' => 'leave']);
});

require __DIR__ . '/auth.php';
