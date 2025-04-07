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
 *  @User routes
 */
Route::controller(UserController::class)->group(function() {
    Route::get('/',  'loginview')->name('loginPage');  
    Route::post('/login',  'login')->name('logging.in');
    Route::get('/register', 'registerview')->name('register.page');
    Route::post('/register',  'store')->name('registering');
    Route::post('/logout',  'logout')->name('logging.out');
});

    /* 
    * @Home task routes
    */
Route::controller(TaskController::class)->group(function () {
    Route::get('/home', 'index')->name('home.page');
    Route::get('home/create', 'createTask')->name('create.task');
    Route::post('home/create', 'create')->name('creating.task');
    Route::get('home/{$task}', 'read')->name('read.task');
    Route::patch('home/{$task}/update', 'update')->name('update.task');
    Route::delete('home/{$task}/dete', 'destroy')->name('delete.task');
});
// Route::get('/home', [TaskController::class, 'index'])
//     ->middleware(UserIsLoggedIn::class)
//     ->name('home.page');
