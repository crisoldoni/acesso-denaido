<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\AccessController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::delete('/people/{person}/destroy', [PersonController::class, 'destroy'])->name('people.destroy');
    Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
    Route::get('/people/{person}', [PersonController::class, 'show'])->name('people.show');
    Route::put('/people/{person}', [PersonController::class, 'update'])->name('people.update');
    Route::get('/people/{person}/edit', [PersonController::class, 'edit'])->name('people.edit');
    Route::post('/people', [PersonController::class, 'store'])->name('people.store');
    Route::get('/people', [PersonController::class, 'index'])->name('people.index');

    Route::delete('/groups/{group}/destroy', [GroupController::class, 'destroy'])->name('groups.destroy');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');
    Route::put('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');
    Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');

    Route::get('/accesses/{id}/remote', [AccessController::class, 'remote'])->name('accesses.remote');
    Route::delete('/accesses/{access}/destroy', [AccessController::class, 'destroy'])->name('accesses.destroy');
    Route::get('/accesses/create', [AccessController::class, 'create'])->name('accesses.create');
    Route::post('/accesses/{access}/validate', [AccessController::class, 'validatePassword'])->name('accesses.validate');
    Route::get('/accesses/{id}', [AccessController::class, 'show'])->name('accesses.show');
    Route::post('/accesses/logout-session/{id}', [AccessController::class, 'logoutSession'])->name('accesses.logoutSession');
    Route::put('/accesses/{access}', [AccessController::class, 'update'])->name('accesses.update');
    Route::get('/accesses/{access}/edit', [AccessController::class, 'edit'])->name('accesses.edit');
    Route::post('/accesses', [AccessController::class, 'store'])->name('accesses.store');
    Route::get('/accesses', [AccessController::class, 'index'])->name('accesses.index');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('login');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
