<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\backend\ClassesController;
use App\Http\Controllers\backend\ResultController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectControler;
use App\Models\Student;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('logout_out', [LogoutController::class, 'destroy'])
        ->name('logout_out');
Route::get('profile-view', [ProfileController::class, 'index'])->name('profile-view');
Route::post('adminprofileupdate',[ProfileController::class,'update'])->name('adminprofileupdate');
Route::get('changepassword',[ProfileController::class,'changepassword'])->name('changepassword');
Route::post('updatepassword',[ProfileController::class,'updatepassword'])->name('updatepassword');
Route::get('createclass',[ClassesController::class,'createclass'])->name('createclass');
Route::post('storeclass',[ClassesController::class,'storeclass'])->name('storeclass');
Route::get('Manageclass',[ClassesController::class,'Manageclass'])->name('Manageclass');
Route::get('editclass/{id}',[ClassesController::class,'editclass'])->name('editclass');
Route::post('updateclass/{id}',[ClassesController::class,'updateclass'])->name('updateclass');
Route::get('/delete-class/{id}', [ClassesController::class, 'Deleteclass'])->name('Deleteclass');
Route::get('createsubject',[SubjectControler::class,'createsubject'])->name('createsubject');
Route::post('storesubject',[SubjectControler::class,'storesubject'])->name('storesubject');
Route::get('managesubject',[SubjectControler::class,'managesubject'])->name('managesubject');
Route::get('editsubject/{id}',[SubjectControler::class,'editsubject'])->name('editsubject');
Route::post('updatesubject/{id}',[SubjectControler::class,'updatesubject'])->name('updatesubject');
Route::get('Deletesubject/{id}',[SubjectControler::class,'Deletesubject'])->name('Deletesubject');
Route::get('Add/managesubject/Combination',[SubjectControler::class,'subject_Combination'])->name('subject_Combination');
Route::post('Add/managesubject/storeCombination',[SubjectControler::class,'storeCombination'])->name('storeCombination');
Route::get('Add/manage/Combination',[SubjectControler::class,'Manage_Combination'])->name('Manage_Combination');
Route::get('deactivate/Combination/{id}',[SubjectControler::class,'deactivate_Combination'])->name('deactivate');
Route::get('addstudent',[StudentController::class,'create'])->name('addstudent');
Route::post('StoreStudent',[StudentController::class,'Store'])->name('StoreStudent');
Route::get('ManageStudent',[StudentController::class,'View'])->name('ManageStudent');
Route::post('UpdateStudent/{id}',[StudentController::class,'update'])->name('UpdateStudent');
Route::get('deleteStudents/{id}',[StudentController::class,'Delete'])->name('deleteStudents');
Route::get('EditStudent/{id}',[StudentController::class,'Edit'])->name('EditStudent');
Route::get('addresults',[ResultController::class,'create'])->name('addresults');
Route::get('fetchStudent',[ResultController::class,'fetchStudent'])->name('fetchStudent');
Route::get('checkresult',[ResultController::class,'checkresult'])->name('checkresult');
Route::post('storeResults',[ResultController::class,'storeResults'])->name('storeResults');
Route::get('Manageresults',[ResultController::class,'Manageresults'])->name('Manageresults');
Route::get('editresult/{id}',[ResultController::class,'editresult'])->name('editresult');
Route::post('UpdateResult',[ResultController::class,'UpdateResult'])->name('UpdateResult');
Route::get('deleteResult/{id}',[ResultController::class,'deleteResult'])->name('deleteResult');

});
