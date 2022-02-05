<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\User\IndexController::class, 'index']);
Route::get('/profile', [\App\Http\Controllers\User\IndexController::class, 'show_profile'])->name('user.show.profile');
Route::get('/search', [\App\Http\Controllers\User\IndexController::class, 'friend_search'])->name('user.friend.search');
Route::get('/user/{username}', [\App\Http\Controllers\User\IndexController::class, 'user_search'])->name('user.search');
Route::post('/accept', [\App\Http\Controllers\User\IndexController::class, 'accepte_friend'])->name('user.accepte.friend');
Route::post('/remove', [\App\Http\Controllers\User\IndexController::class, 'remove_friend'])->name('user.remove.friend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/login', [App\Http\Controllers\User\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\User\Auth\LoginController::class, 'login'])->name('getlogin');
Route::post('/logout', [App\Http\Controllers\User\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'register']);
Route::get('/password/reset', [App\Http\Controllers\User\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\User\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [App\Http\Controllers\User\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [App\Http\Controllers\User\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/password/confirm', [App\Http\Controllers\User\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('/password/confirm', [App\Http\Controllers\User\Auth\ConfirmPasswordController::class, 'confirm']);
Route::get('/email/verify', [App\Http\Controllers\User\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\User\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [App\Http\Controllers\User\Auth\VerificationController::class, 'resend'])->name('verification.resend');