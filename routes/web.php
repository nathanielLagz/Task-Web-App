<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserIsLoggedIn;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

/*
 * @Login page routes
 */
Route::get('/', [UserController::class, 'loginview'])
        ->name('login.page');  
Route::post('/login', [UserController::class, 'login'])
    ->name('logging.in');
Route::get('/register',[UserController::class, 'registerview'])
    ->name('register.page');
route::post('/register', [UserController::class ,'store'])
    ->name('registering');

    /* 
    * @Home routes
    */
Route::get('/home', [TaskController::class, 'index'])
->middleware(UserIsLoggedIn::class)
->name('home.page');
// Route::get('/home', [TaskController::class, 'index'])
//     ->middleware(UserIsLoggedIn::class)
//     ->name('home.page');
Route::post('/logout', [UserController::class, 'logout'])
    ->name('logging.out');