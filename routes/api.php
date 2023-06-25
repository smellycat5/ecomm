<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Actions\Auth\{LoginAction, RegisterAction, LogoutAction};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('test', [UserController::class, 'test']);

Route::prefix('user')->group(function () {
    Route::post('login', LoginAction::class)->name('login');
    Route::post('register', RegisterAction::class)->name('register');
    //     Route::post('forgot-password', ForgotPasswordAction::class)->name('forgot-password');
    //     Route::post('reset-password', ResetPasswordAction::class)->name('reset-password');
    //     Route::get('verify/reset-token', VerifyPasswordTokenAction::class);
    //     Route::get('verify/invite-token', VerifyInviteTokenAction::class);
});
Route::middleware('auth:sanctum')->prefix('user')->group(function () {
    Route::get('logout', LogoutAction::class)->name('logout');
});
