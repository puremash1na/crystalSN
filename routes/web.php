<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\DialogController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PublicationsController;
use App\Http\Controllers\MainInfoController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\JobInfoController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/accounts', AccountsController::class)->middleware('auth');
Route::resource('/publications', PublicationsController::class)->middleware('auth');
Route::resource('/community', CommunityController::class)->middleware('auth');
Route::resource('/group', GroupController::class)->middleware('auth');
Route::resource('/friends', FriendsController::class)->middleware('auth');
Route::resource('/messages', MessagesController::class)->middleware('auth');
Route::resource('/dialog', DialogController::class)->middleware('auth');
Route::resource('/maininfo', MainInfoController::class)->middleware('auth');
Route::resource('/contactinfo', ContactInfoController::class)->middleware('auth');
Route::resource('/jobinfo', JobInfoController::class)->middleware('auth');
