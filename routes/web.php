<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\GanttController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KeywordsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\CompetitorsController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\AuditsController;
use App\Http\Controllers\CampaignCategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\ExperimentsController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PagesController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home'); //Projects list
Route::get('/keywords', [KeywordsController::class, 'index'])->name('keywords');
Route::get('/pages', [PagesController::class, 'index'])->name('pages');
Route::get('/competitors', [CompetitorsController::class, 'index'])->name('competitors');
Route::get('/ranking', [RankingController::class, 'index'])->name('ranking');
Route::get('/audits', [AuditsController::class, 'index'])->name('audits');
Route::get('/chat', [ChatController::class, 'index'])->name('chat');

Route::get('/experiments', [ExperimentsController::class, 'index'])->name('experiments');
Route::get('/gantt', [GanttController::class, 'gantt'])->name('gantt.gantt');
Route::get('/tester', [ApiController::class,'common_search_engines'])->name('tester');


Route::get('/projects/delete/{id}',[HomeController::class,'delete'])->name('project.delete');
Route::get('/projects/new', [HomeController::class, 'new'])->name('projects.new');
Route::get('/projects/create', [HomeController::class, 'create'])->name('projects.create');
Route::get('/projects/edit/{id}', [HomeController::class, 'edit'])->name('projects.edit');
Route::get('/projects/select/{id}', [HomeController::class, 'select']);
Route::get('/projects/deselect', [HomeController::class, 'deselect'])->name('projects.deselect');
Route::post('/projects/save', [HomeController::class, 'save'])->name('projects.save');
Route::put('/projects/update', [HomeController::class, 'update'])->name('projects.update');

Route::get('/campaigns', [CampaignsController::class, 'index'])->name('campaigns');
Route::get('/campaigns/new', [CampaignsController::class, 'new'])->name('campaigns.new');
Route::post('/campaigns/save', [CampaignsController::class, 'save'])->name('campaigns.save');
Route::post('/campaigns/category/save', [CampaignsController::class,'savecategory'])->name('campaignscategory.post');
Route::post('/campaigns/category/store', [CampaignsController::class,'storecategory'])->name('campaignscategory.store');
Route::get('/campaigns/category/delete/{id}', [CampaignsController::class,'deletecategory'])->name('campaignscategory.delete');
Route::get('/campaigns/categories',[CampaignsController::class,'categories'])->name('campaigns.categories');
Route::get('/campaigns/links',[LinkController::class,'index'])->name('campaigns.links');
Route::get('/campaigns/gantt',[CampaignsController::class,'gantt'])->name('campaigns.gantt');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::get('file-import-export', [ImportExportController::class, 'fileImportExport']);
Route::post('file-import', [ImportExportController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [ImportExportController::class, 'fileExport'])->name('file-export');