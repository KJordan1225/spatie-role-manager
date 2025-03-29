<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Routes to handle Role mangement.
Route::get('/admin/roles/list', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.list');
Route::get('/admin/roles/show/{role}', [App\Http\Controllers\RoleController::class, 'show'])->name('admin.roles.show');
Route::get('/admin/roles/edit/{role}', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit');
Route::put('/admin/roles/update/{role}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create');
Route::post('/admin/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store');
Route::delete('/admin/roles/destroy/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin_dashboard');
