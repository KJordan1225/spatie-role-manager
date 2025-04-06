<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuillController;


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

// Routes to handle User Profile mangement.
Route::get('/manage/user_profiles/list', [App\Http\Controllers\UserProfileController::class, 'index'])->name('manage.user_profiles.index');
Route::get('/manage/user_profiles/edit/{id}', [App\Http\Controllers\UserProfileController::class, 'edit'])->name('manage.user_profiles.edit');
Route::put('/manage/user_profiles/update/{id}', [App\Http\Controllers\UserProfileController::class, 'update'])->name('manage.user_profiles.update');
Route::get('/manage/user_profiles/create/{id}', [App\Http\Controllers\UserProfileController::class, 'create'])->name('manage.user_profiles.create');
Route::post('/manage/user_profiles/store/{id}', [App\Http\Controllers\UserProfileController::class, 'store'])->name('manage.user_profiles.store');
Route::delete('/manage/user_profiles/destroy/{id}', [App\Http\Controllers\UserProfileController::class, 'destroy'])->name('manage.user_profiles.destroy');

// Upload user profile pics
Route::post('/manage/user_profiles/upload_pics/{id}', [App\Http\Controllers\UserProfileController::class, 'uploadPic'])->name('manage.user_profiles.upload_pics');
// Update is active
Route::get('/manage/users/listIsActive', [App\Http\Controllers\UserController::class, 'listIsActive'])->name('manage.users.listIsActive');
Route::post('/manage/users/updateIsActive', [App\Http\Controllers\UserController::class, 'updateIsActive'])->name('manage.users.updateIsActive');

// Routes to manage chapter directory
Route::get('/chapter_directory/view', [App\Http\Controllers\ChapterDirectoryController::class, 'viewDirectory'])->name('chapter_directory.view');
Route::get('generate-pdf', [App\Http\Controllers\ChapterDirectoryController::class, 'generatePDF'])->name('chapter_directory.generatepdf');

// Routes to manage user profiles auth->user owns
Route::get('/myProfile/index', [App\Http\Controllers\MyUserProfileController::class, 'index'])->name('my_profile.view');
Route::get('/myProfile/edit', [App\Http\Controllers\MyUserProfileController::class, 'edit'])->name('my_profile.edit');
Route::put('/myProfile/update', [App\Http\Controllers\MyUserProfileController::class, 'update'])->name('my_profile.update');
Route::get('/myProfile/create/', [App\Http\Controllers\MyUserProfileController::class, 'create'])->name('my_profile.create');
Route::post('/myProfile/store', [App\Http\Controllers\MyUserProfileController::class, 'store'])->name('my_profile.store');
Route::post('/myProfile/upload_pics', [App\Http\Controllers\MyUserProfileController::class, 'uploadPic'])->name('my_profile.upload_pics');

// Routesto handle Events
Route::get('/event/index', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
Route::get('/event/create', [App\Http\Controllers\EventController::class, 'create'])->name('event.create');
Route::post('/event/store', [App\Http\Controllers\EventController::class, 'store'])->name('event.store');



// Routes to service website guest pages
Route::get('/about_ga', [App\Http\Controllers\GuestPagesController::class, 'aboutGA'])->name('about_ga');


// Route to handle TinyMCE image upload
Route::post('/tinymce-upload-image', [App\Http\Controllers\TinyMCEUploadImageController::class, 'store'])->name('tinymce-upload-image');












