<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\SearchController;
 
Route::get('/',         [HomeController::class, 'index'] )->name('home'); 
Route::get('/recipes',  [RecipesController::class, 'read'] )->name('recipe'); 
Route::get('/section',  [SectionsController::class, 'list'] )->name('section'); 
Route::get('/article',  [ArticlesController::class, 'read'] )->name('article'); 
Route::get('/tag',      [TagsController::class, 'index'] )->name('tag'); 
Route::get('/searcg',   [SearchController::class, 'index'] )->name('search'); 