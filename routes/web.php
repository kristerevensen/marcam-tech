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
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;

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

Route::get('/projects.html', [HomeController::class, 'index'])->name('home'); //Projects list
Route::get('/keywords.html', [KeywordsController::class, 'index'])->name('keywords');
Route::get('/pages.html', [PagesController::class, 'index'])->name('pages');
Route::get('/competitors.html', [CompetitorsController::class, 'index'])->name('competitors');
Route::get('/ranking.html', [RankingController::class, 'index'])->name('ranking');
Route::get('/audits.html', [AuditsController::class, 'index'])->name('audits');
Route::get('/chat.html', [ChatController::class, 'index'])->name('chat');

Route::get('/experiments', [ExperimentsController::class, 'index'])->name('experiments');

Route::get('/projects/delete/{id}',[HomeController::class,'delete'])->name('project.delete');
Route::get('/projects/new.html', [HomeController::class, 'new'])->name('projects.new');
Route::get('/projects/create.html', [HomeController::class, 'create'])->name('projects.create');
Route::get('/projects/edit/{id}', [HomeController::class, 'edit'])->name('projects.edit');
Route::get('/projects/select/{id}', [HomeController::class, 'select'])->name('projects.select');
Route::get('/projects/deselect.html', [HomeController::class, 'deselect'])->name('projects.deselect');
Route::post('/projects/save.html', [HomeController::class, 'save'])->name('projects.save');
Route::put('/projects/update.html', [HomeController::class, 'update'])->name('projects.update');

Route::get('/campaigns.html', [CampaignsController::class, 'index'])->name('campaigns');
Route::get('/campaigns/sources.html', [CampaignsController::class, 'sources'])->name('campaigns.sources');
Route::get('/campaigns/sources/new.html', [CampaignsController::class, 'new_source'])->name('campaigns.new_source');
Route::post('/campaigns/sources/save.html', [CampaignsController::class, 'save_source'])->name('campaigns.save_source');
Route::get('/campaigns/sources/delete/{id}', [CampaignsController::class, 'source_delete'])->name('campaigns.source_delete');

Route::get('/campaigns/mediums.html', [CampaignsController::class, 'mediums'])->name('campaigns.mediums');
Route::get('/campaigns/mediums/new.html', [CampaignsController::class, 'new_medium'])->name('campaigns.new_medium');
Route::post('/campaigns/mediums/save.html', [CampaignsController::class, 'save_medium'])->name('campaigns.save_medium');
Route::get('/campaigns/mediums/delete/{id}', [CampaignsController::class, 'medium_delete'])->name('campaigns.medium_delete');

Route::get('/campaigns/terms.html', [CampaignsController::class, 'terms'])->name('campaigns.terms');
Route::get('/campaigns/terms/new.html', [CampaignsController::class, 'new_term'])->name('campaigns.new_term');
Route::post('/campaigns/terms/save.html', [CampaignsController::class, 'save_term'])->name('campaigns.save_term');
Route::get('/campaigns/terms/delete/{id}', [CampaignsController::class, 'term_delete'])->name('campaigns.term_delete');

Route::get('/campaigns/contents.html', [CampaignsController::class, 'contents'])->name('campaigns.contents');
Route::get('/campaigns/contents/new.html', [CampaignsController::class, 'new_content'])->name('campaigns.new_content');
Route::post('/campaigns/contents/save.html', [CampaignsController::class, 'save_content'])->name('campaigns.save_content');
Route::get('/campaigns/contents/delete/{id}', [CampaignsController::class, 'content_delete'])->name('campaigns.content_delete');

Route::get('/campaigns/new.html', [CampaignsController::class, 'new'])->name('campaigns.new');
Route::post('/campaigns/save.html', [CampaignsController::class, 'save'])->name('campaigns.save');
Route::post('/campaigns/category/save.html', [CampaignsController::class,'savecategory'])->name('campaignscategory.post');
Route::post('/campaigns/category/store.html', [CampaignsController::class,'storecategory'])->name('campaignscategory.store');
Route::get('/campaigns/category/delete/{id}', [CampaignsController::class,'deletecategory'])->name('campaignscategory.delete');
Route::get('/campaigns/categories.html',[CampaignsController::class,'categories'])->name('campaigns.categories');
Route::get('/campaigns/links.html',[LinkController::class,'index'])->name('campaigns.links');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/tasks.html', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks/store.html', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{task}',[TaskController::class, 'update'])->name('tasks.update');
    Route::put('tasks/sync', [TaskController::class, 'sync'])->name('tasks.sync');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('statuses', [StatusController::class,'store'])->name('statuses.store');
    Route::put('statuses',[StatusController::class,'update'])->name('statuses.update');
});


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

