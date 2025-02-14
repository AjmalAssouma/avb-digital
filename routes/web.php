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


// ---------------------------------------ROUTES NUMERO COMPTES----------------------------------------------------------------

Route::get('/home/liste-des-numeros-de-compte', [PlacementController::class, 'showAllNumCompte'])->name('list.numcompte');

Route::post('/home/liste-des-numeros-de-compte/ajouter-numero-compte', [PlacementController::class, 'createdNumCompte']);

Route::post('/home/liste-des-numeros-de-compte/modifier', [PlacementController::class, 'updateNumCompte']);

Route::delete('/home/liste-des-numeros-de-compte/supprimer', [PlacementController::class, 'deleteNumCompte']);


// ---------------------------------------ROUTES PLACEMENTS----------------------------------------------------------------
Route::get('/home/creer-un-placement', [PlacementController::class, 'showPlacementCreationForm'])->name('creation.placement');

Route::get('/home/creer-un-placement/{numCompteId}', [PlacementController::class, 'getPlacementNumComptes']);

Route::get('/home/liste-des-placements/{id}/sgis', [PlacementController::class, 'getSGIsForPlacement']);

Route::post('/home/liste-des-placements/update-sgi', [PlacementController::class, 'updateSGI'])->name('placements.updateSGI');

Route::get('/home/liste-des-placements/{id}/ta', [PlacementController::class, 'getTableauAmortissement']);

Route::post('/home/creer-un-placement/obligation', [PlacementController::class, 'createdPlacementObligation'])->name('creation.placement.obligation');

Route::post('/home/creer-un-placement/action', [PlacementController::class, 'createdPlacementAction'])->name('creation.placement.action');

Route::post('/home/creer-un-placement/dat', [PlacementController::class, 'createdPlacementDat'])->name('creation.placement.dat');

Route::get('/home/liste-des-placements', [PlacementController::class, 'allPlacement'])->name('list.placement');

Route::post('/home/liste-des-placements/modifier-obligations', [PlacementController::class, 'updateObligationsPlacement']);

Route::post('/home/liste-des-placements/modifier-actions', [PlacementController::class, 'updateActionsPlacement']);

Route::post('/home/liste-des-placements/modifier-dat', [PlacementController::class, 'updateDatPlacement']);

Route::delete('/home/liste-des-placements/supprimer', [PlacementController::class, 'deletePlacement']);


// ---------------------------------------ROUTES DETAIL PLACEMENTS----------------------------------------------------------------
Route::get('/home/details-placement/{id}', [DetailPlacementController::class, 'show'])->name('details.placement');

Route::post('/home/details-placement/{id}/modifier-obligations', [DetailPlacementController::class, 'updateObligations']);

Route::post('/home/details-placement/{id}/modifier-actions', [DetailPlacementController::class, 'updateActions']);

Route::post('/home/details-placement/{id}/modifier-dat', [DetailPlacementController::class, 'updateDat']);

Route::delete('/home/details-placement/{id}/supprimer', [DetailPlacementController::class, 'deleteDetail']);

// ---------------------------------------ROUTES EXPORTATION PLACEMENTS----------------------------------------------------------------
Route::get('/home/exporter-des-placements', [PlacementController::class, 'exportPlacement'])->name('exporter.placement');

Route::post('/home/exporter-des-placements/importer', [PlacementController::class, 'importPlacement'])->name('importer.placement');;












