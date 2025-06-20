<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\QuillController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FileRequestController;
use App\Http\Controllers\ShareDocumentController;
use App\Http\Controllers\ContactController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/send-test-email', function () {
            Mail::to('kjordan@ibshadownet2.com')->send(new TestEmail());
            return 'Test email sent!';
        });

Route::get('/test-email', function () {
    Mail::raw('This is a test email [again] from Laravel 11 using Gmail SMTP.', function ($message) {
        $message->to('shadow902@gmail.com')
                ->subject('Gmail SMTP Test');
    });
    return 'Test email sent!';
});

// Route::get('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'sendEnquiry'])->name('contact.sendEnquiry');

Route::get('/', function () {
    // if (Auth::check()) {
    //     return redirect('/home'); // or whatever your dashboard is
    // }
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Illuminate\Http\Request $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->intended('/dashboard');
    }

    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth'])->name('verification.verify');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'redirectWelcome'])->name('welcome');

// Routes for Forget Password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware(['auth', 'verified'])->group(function () {    
    Route::get('/documents-index', [DocumentController::class, 'index'])->name('documents.index');

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
    Route::post('/myProfile/upload_pics',[App\Http\Controllers\MyUserProfileController::class, 'uploadPic'])->name('my_profile.upload_pics');

    // Routes to handle Events
    Route::get('/event/index', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
    Route::get('/event/create', [App\Http\Controllers\EventController::class, 'create'])->name('event.create');
    Route::post('/event/store', [App\Http\Controllers\EventController::class, 'store'])->name('event.store');
    Route::get('/event/show/{id}', [App\Http\Controllers\EventController::class, 'show'])->name('event.show');
    Route::get('/event/edit/{id}', [App\Http\Controllers\EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/update/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('event.update');
    Route::delete('/event/destroy/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('event.destroy');

});


// Routes for public website display
Route::get('/event/public-index', [App\Http\Controllers\EventController::class, 'lastFiveEventsIndex'])->name('event.public-index');
Route::get('/event/public-details/{id}', [App\Http\Controllers\EventController::class, 'showDetails'])->name('event.public-details');

// Routes to service website guest pages
Route::get('/chapter_history', [App\Http\Controllers\GuestPagesController::class, 'aboutGA'])->name('about_ga');
Route::get('/fraternity_history', [App\Http\Controllers\GuestPagesController::class, 'fraternityHistory'])->name('fraternity_history');
Route::get('/mandated_programs', [App\Http\Controllers\GuestPagesController::class, 'mandatedPrograms'])->name('mandated_programs');


// Route to handle TinyMCE image upload
Route::post('/tinymce-upload-image', [App\Http\Controllers\TinyMCEUploadImageController::class, 'store'])->name('tinymce-upload-image');


/* ***
*
* Routes for Document Manager
*
*** */

Route::middleware(['auth', 'verified'])->group(function () {

    // Route::get('/', [DocumentController::class, 'index'])->name('documents.index');
    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');
    
    Route::post('/update-visibility', [DocumentController::class, 'updateVisibility'])->name('update.visibility');

    Route::get('/getFiles/{folder}', [DocumentController::class, 'getFiles'])->name('getFiles');
    Route::post('/send-email-document', [DocumentController::class, 'sendDocumentEmail'])->name('send.email');
    Route::get('/getDocumentComments', [DocumentController::class, 'getDocumentComments'])->name('getDocumentComments');


    // routes/web.php
    Route::post('/upload', [DocumentController::class, 'uploadDocumentFiles'])->name('upload');
    Route::post('/change-document', [DocumentController::class, 'changeFile'])->name('changeFile');
    Route::get('/filter-documents-by-tags', [DocumentController::class, 'filterDocumentByTag'])->name('filterDocumentByTag');
    Route::post('/update-document-order', [DocumentController::class, 'updateDocumentOrder'])->name('update.document.order');


    Route::get('/api/users', [UserController::class, 'search'])->name('users.search');


    // Request Documents Route
    // Route::get('/{slug?}/share/{id?}/{token?}', [FileRequestController::class, 'getSharedDocuments'])->name('getSharedDocuments');
    Route::post('/request-document', [FileRequestController::class, 'store'])->name('fileRequest.store');


    // Folder Route
    Route::resource('folders', FolderController::class);
    Route::post('/update-folder-positions', [FolderController::class, 'updateFolderPositions'])->name('folders.updatePositions');
    Route::post('/update-folder-child-positions', [FolderController::class, 'updateFolderChildPositions'])->name('folders.updateChildPositions');
    Route::post('/folders/details', [FolderController::class, 'fetchDetails'])->name('folders.fetchDetails');
    Route::post('/folders/download-zip', [FolderController::class, 'downloadZip'])->name('folders.downloadZip');
    Route::post('/folders/delete', [FolderController::class, 'deleteSelecetdFolder'])->name('folders.deleteSelecetdFolder');


    // Tags Route
    Route::resource('tags', TagController::class);
    Route::get('/search-tags', [TagController::class, 'searchTags'])->name('searchTags');
    Route::get('/add-tag', [TagController::class, 'addTag'])->name('addTag');


    Route::resource('workspaces', FolderController::class);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/projects', function () {
        return view('projects.index');
    })->name('projects.index');
    Route::get('/contacts', function () {
        return view('contacts.index');
    })->name('contacts.index');

    // Download documents
    Route::get('/download-document/{path}', function ($path) {
        // Decode URL-encoded path (e.g., spaces as %20)
        $decodedPath = urldecode($path);
    
        // Build full path relative to public/
        $filePath = public_path("documents/{$decodedPath}");
    
        // Check if file exists
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }
    
        abort(404, 'File not found');
    })->where('path', '.*');
    
    
});

// Auth::routes();


// Share Documents Route
Route::get('/{slug?}/share/{id?}/{token?}', [ShareDocumentController::class, 'getSharedDocuments'])->name('getSharedDocuments');
Route::post('/share-document', [ShareDocumentController::class, 'sharedDocuments'])->name('sharedDocuments');













