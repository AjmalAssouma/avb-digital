<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\DetailPlacementController;
use App\Http\Controllers\SgiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/', [LoginController::class, 'login']);

Route::get('/registration', [RegisterController::class, 'showRegistrationForm'])->name('registration');

Route::post('/registration', [RegisterController::class, 'register']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



// -----------------------------------USERS ROUTE--------------------------------------------------------

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/home/profile', [ProfileController::class, 'showProfileUser'])->name('home.userprofil');

Route::patch('/home/profile/update-password', [ProfileController::class, 'updatePassword'])->name('password.update');

Route::patch('/home/profile/update-info', [ProfileController::class, 'updateUserInfo'])->name('info.update');

Route::post('/home/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update-photo');

// ----------------------------------ADMIN ROUTE-------------------------------------------------------------
Route::middleware(['auth', 'role:1'])->group(function () {
    
    Route::get('/home/admin/tous_les_utilisateurs', [AdminController::class, 'allUsers'])->name('home.admin.all.users');

});


// ---------------------------------------------------------------------------------------------------------

Route::get('/otp-verify', [LoginController::class, 'showOtpForm'])->name('auth.otp');
Route::post('/otp-verify', [LoginController::class, 'verifyOtp'])->name('otp.check');
Route::post('/otp-verify/resend', [LoginController::class, 'resendOtp'])->name('otp.resend');


Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('forgot.password.submit');

Route::get('/forgot-password/otp-verify', [ForgotPasswordController::class, 'showOtpVerifyForm'])->name('otp.verify');
Route::post('/forgot-password/otp-verify', [ForgotPasswordController::class, 'submitOtpVerifyForm'])->name('otp.verify.submit');
Route::post('/forgot-password/otp-verify/resend', [ForgotPasswordController::class, 'resendOtp'])->name('forgotpassword.otp.resend');


Route::get('/forgot-password/otp-verify/reset-password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/forgot-password/otp-verify/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('password.reset.submit');




// ---------------------------------------ROUTES SGI----------------------------------------------------------------

Route::get('/home/liste-des-sgis', [SgiController::class, 'allSgi'])->name('list.sgi');

Route::post('/home/liste-des-sgis/creer-une-sgi', [SgiController::class, 'createSgi']);

Route::post('/home/liste-des-sgis/modifier', [SgiController::class, 'updateSgi']);

Route::post('/home/liste-des-sgis/suppression', [SgiController::class, 'deleteSgi']);


// ---------------------------------------ROUTES PLACEMENTS----------------------------------------------------------------
Route::get('/home/creer-un-placement', [PlacementController::class, 'showPlacementCreationForm'])->name('creation.placement');

Route::post('/home/creer-un-placement', [PlacementController::class, 'createdPlacement']);

Route::get('/home/liste-des-placements', [PlacementController::class, 'allPlacement'])->name('list.placement');

Route::post('/home/liste-des-placements/modifier', [PlacementController::class, 'updatePlacement']);


// ---------------------------------------ROUTES DETAIL PLACEMENTS----------------------------------------------------------------
Route::get('/home/details-placement/{id}', [DetailPlacementController::class, 'show'])->name('details.placement');











