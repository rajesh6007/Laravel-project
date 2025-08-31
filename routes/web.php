<?php

use App\Http\Controllers\CustomerDetailsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // return Inertia::render('welcome');
    return view('app');
})->name('home');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('dashboard', function () {
//         return Inertia::render('dashboard');
//     })->name('dashboard');
// });

Route::post('/customeregister', [CustomerDetailsController::class, 'store'])->name('customeregister.store');

Route::post('/cuslogin', [CustomerDetailsController::class, 'login'])->name('cuslogin.login');

Route::post('getuser.getall_user', [CustomerDetailsController::class, 'getall_user'])->name('getuser.getall_user');
// require __DIR__ . '/settings.php';
// require __DIR__ . '/auth.php';

// Here because of require /auth.php the route always prioritize the controllers inside auth folder so make sure 
// that the route is different than the one in the auth folder