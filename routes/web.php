<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeSubmissionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\SocialAuthController;

Route::get('/',         [HomeController::class, 'index'] )->name('home');
Route::get('/recipes',  [RecipesController::class, 'read'] )->name('recipe');
Route::get('/section',  [SectionsController::class, 'list'] )->name('section');
Route::get('/article',  [ArticlesController::class, 'read'] )->name('article');
Route::get('/tag',      [TagsController::class, 'index'] )->name('tag');
Route::get('/search',   [SearchController::class, 'index'] )->name('search');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/verify-email', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('profile.password');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::get('/profile/avatar', [ProfileController::class, 'editAvatar'])->name('profile.avatar');
    Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::delete('/profile/avatar', [ProfileController::class, 'deleteAvatar'])->name('profile.avatar.delete');
});

// Verified user routes (requires email verification)
Route::middleware(['auth', 'verified'])->group(function () {
    // Recipe submission routes
    Route::get('/my-recipes', [RecipeSubmissionController::class, 'index'])->name('recipes.my');
    Route::get('/recipes/create', [RecipeSubmissionController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeSubmissionController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{recipe}/edit', [RecipeSubmissionController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeSubmissionController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [RecipeSubmissionController::class, 'destroy'])->name('recipes.destroy');
});

// Social authentication
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');