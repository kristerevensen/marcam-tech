<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/keywords', [App\Http\Controllers\KeywordsController::class, 'index'])->name('keywords');
Route::get('/analytics', [App\Http\Controllers\AnalyticsController::class, 'index'])->name('analytics');
Route::get('/competitors', [App\Http\Controllers\CompetitorsController::class, 'index'])->name('competitors');
Route::get('/ranking', [App\Http\Controllers\RankingController::class, 'index'])->name('ranking');
Route::get('/audits', [App\Http\Controllers\AuditsController::class, 'index'])->name('audits');
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'index'])->name('chat');
Route::get('/campaigns', [App\Http\Controllers\CampaignsController::class, 'index'])->name('campaigns');
Route::get('/experiments', [App\Http\Controllers\ExperimentsController::class, 'index'])->name('experiments');
Route::get('/projects/new', [App\Http\Controllers\HomeController::class, 'new'])->name('projects.new');



Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
