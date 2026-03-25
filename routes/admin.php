<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Candado directo y explicito en este arhchivo


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Gestion de roles
    Route::resource('roles', RoleController::class);
    // Gestion de usuarios
    Route::resource('users', UserController::class);
});
