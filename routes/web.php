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
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create');
Route::put('/admin/roles/update/{role}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update');
Route::post('/admin/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store');
Route::delete('/admin/roles/destroy/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy');


// Routes to handle User mangement.
Route::get('/manage/users/list', [App\Http\Controllers\UserController::class, 'index'])->name('manage.users.index');
Route::get('/manage/users/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('manage.users.show');
Route::get('/manage/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('manage.users.edit');
Route::get('/manage/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('manage.users.create');
Route::put('/manage/users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('manage.users.update');
Route::post('/manage/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('manage.users.store');
Route::delete('/manage/users/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('manage.users.destroy');






// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin_dashboard');
