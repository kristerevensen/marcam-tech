<?php

use App\Events\WebsocketEvent;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AnalysisController;
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
use App\Http\Controllers\PublicPagesController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;
use Symfony\Component\HttpKernel\Controller\ErrorController;

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
Route::redirect('/home', '/projects.html', 301);

Route::get('/projects.html', [HomeController::class, 'index'])->name('home'); //Projects list
Route::get('/error/404.html', [PublicPagesController::class, 'error_404'])->name('404'); //
Route::get('/keywords.html', [KeywordsController::class, 'index'])->name('keywords');
Route::get('/pages.html', [PagesController::class, 'index'])->name('pages');
Route::get('/competitors.html', [CompetitorsController::class, 'index'])->name('competitors');
Route::get('/ranking.html', [RankingController::class, 'index'])->name('ranking');
Route::get('/audits.html', [AuditsController::class, 'index'])->name('audits');
Route::get('/chat.html', [ChatController::class, 'index'])->name('chat');

Route::get('/account/profile.html', [AccountController::class, 'profile'])->name('account.profile');
Route::get('/account/editprofile.html', [AccountController::class, 'editprofile'])->name('account.editprofile');
Route::get('/account/editpassword.html', [AccountController::class, 'editpassword'])->name('account.editpassword');

Route::get('/experiments', [ExperimentsController::class, 'index'])->name('experiments');

Route::get('/projects/delete/{id}',[HomeController::class,'delete'])->name('project.delete');
Route::get('/projects/new.html', [HomeController::class, 'new'])->name('projects.new');
Route::get('/projects/create.html', [HomeController::class, 'create'])->name('projects.create');
Route::get('/projects/edit/{id}', [HomeController::class, 'edit'])->name('projects.edit');
Route::get('/projects/select/{id}', [HomeController::class, 'select'])->name('projects.select');
Route::get('/projects/deselect.html', [HomeController::class, 'deselect'])->name('projects.deselect');
Route::post('/projects/save.html', [HomeController::class, 'save'])->name('projects.save');
Route::post('/projects/update.html', [HomeController::class, 'update'])->name('projects.update'); 

Route::get('/analysis.html', [AnalysisController::class, 'index'])->name('analysis');
Route::get('/analysis/weekly/trends/{year}/{id}.html', [AnalysisController::class, 'weekly_channel_trends'])->name('analysis.channel.trends.week');
Route::get('/analysis/monthly/trends/{year}/{id}.html', [AnalysisController::class, 'monthly_channel_trends'])->name('analysis.channel.trends.month');
Route::get('/analysis/yearly/trends/{year}/{id}.html', [AnalysisController::class, 'yearly_channel_trends'])->name('analysis.channel.trends.year');
Route::get('/analysis/delete/{id}.html', [AnalysisController::class, 'delete_analysis'])->name('analysis.delete_analysis');
Route::get('/analysis/year/{year}.html', [AnalysisController::class, 'channels_year'])->name('analysis.channel.year');
Route::get('/analysis/pages.html', [AnalysisController::class, 'pages'])->name('analysis.pages');
Route::get('/analysis/trends/delete.html', [AnalysisController::class, 'delete_trends'])->name('analysis.delete_trends');
Route::get('/analysis/channels.html', [AnalysisController::class, 'channels'])->name('analysis.channels');
Route::get('/analysis/channel/{id}.html', [AnalysisController::class, 'channel'])->name('analysis.channel');
Route::get('/analysis/segments.html', [AnalysisController::class, 'segments'])->name('analysis.segments');
Route::get('/analysis/upload.html', [AnalysisController::class, 'upload'])->name('analysis.upload');
Route::post('/analysis/import.html', [AnalysisController::class, 'import'])->name('analysis.import');

Route::get('/campaigns/gantt.html', [CampaignsController::class, 'gantt'])->name('campaigns.gantt');
//Route::get('/campaigns/gantt/{$id}.html', [CampaignsController::class, 'gantt'])->name('campaigns.view_gantt');

Route::get('/campaigns.html', [CampaignsController::class, 'index'])->name('campaigns');
Route::get('/campaigns/delete/{id}.html', [CampaignsController::class, 'delete'])->name('campaigns.delete');
Route::get('/campaigns/sources.html', [CampaignsController::class, 'sources'])->name('campaigns.sources');
Route::get('/campaigns/sources/new.html', [CampaignsController::class, 'new_source'])->name('campaigns.new_source');
Route::post('/campaigns/sources/save.html', [CampaignsController::class, 'save_source'])->name('campaigns.save_source');
Route::post('/campaigns/source/save/ajax.html',[CampaignsController::class, 'source_save_ajax'])->name('campaigns.save_source_ajax');
Route::get('/campaigns/sources/delete/{id}', [CampaignsController::class, 'source_delete'])->name('campaigns.source_delete');

Route::get('/campaigns/bulk/new.html', [CampaignsController::class, 'new_bulk'])->name('campaigns.new_bulk');
Route::get('/campaigns/bulk/save.html', [CampaignsController::class, 'save_bulk'])->name('campaigns.save_bulk');

Route::get('/campaigns/mediums.html', [CampaignsController::class, 'mediums'])->name('campaigns.mediums');
Route::get('/campaigns/mediums/new.html', [CampaignsController::class, 'new_medium'])->name('campaigns.new_medium');
Route::post('/campaigns/mediums/save.html', [CampaignsController::class, 'save_medium'])->name('campaigns.save_medium');
Route::get('/campaigns/mediums/delete/{id}', [CampaignsController::class, 'medium_delete'])->name('campaigns.medium_delete');

Route::get('/campaigns/terms.html', [CampaignsController::class, 'terms'])->name('campaigns.terms');
Route::get('/campaigns/terms/new.html', [CampaignsController::class, 'new_term'])->name('campaigns.new_term');
Route::post('/campaigns/terms/save.html', [CampaignsController::class, 'save_term'])->name('campaigns.save_term');
Route::get('/campaigns/terms/delete/{id}', [CampaignsController::class, 'term_delete'])->name('campaigns.term_delete');

Route::get('/campaigns/testing.html', [CampaignsController::class, 'testing'])->name('campaigns.testing');
Route::get('/campaigns/view/{id}.html', [CampaignsController::class, 'view'])->name('campaigns.view');
Route::get('/campaigns/edit/{id}.html', [CampaignsController::class, 'edit'])->name('campaigns.edit');

Route::get('/campaigns/contents.html', [CampaignsController::class, 'contents'])->name('campaigns.contents');
Route::get('/campaigns/contents/new.html', [CampaignsController::class, 'new_content'])->name('campaigns.new_content');
Route::post('/campaigns/contents/save.html', [CampaignsController::class, 'save_content'])->name('campaigns.save_content');
Route::get('/campaigns/contents/delete/{id}', [CampaignsController::class, 'content_delete'])->name('campaigns.content_delete');

Route::get('/campaigns/custom_parameters.html', [CampaignsController::class, 'custom_parameters'])->name('campaigns.custom_parameters');
Route::get('/campaigns/custom_parameters/new.html', [CampaignsController::class, 'new_custom_parameter'])->name('campaigns.new_custom_parameter');
Route::post('/campaigns/custom_parameters/save.html', [CampaignsController::class, 'save_custom_parameter'])->name('campaigns.save_custom_parameter');
Route::get('/campaigns/custom_parameters/delete/{id}', [CampaignsController::class, 'delete_custom_parameter'])->name('campaigns.delete_custom_parameter');

Route::get('/campaigns/links.html', [CampaignsController::class, 'links'])->name('campaigns.links');
Route::get('/campaigns/links/new/{id?}.html', [CampaignsController::class, 'new_link'])->name('campaigns.new_link');
Route::get('/campaigns/links/bulk.html', [CampaignsController::class, 'new_bulk'])->name('campaigns.new_bulk_links');
Route::post('/campaigns/links/save.html', [CampaignsController::class, 'save_link'])->name('campaigns.save_link');
Route::get('/campaigns/links/delete/{id}.html', [CampaignsController::class, 'delete_link'])->name('campaigns.delete_link');

Route::get('/campaigns/templates.html', [CampaignsController::class, 'templates'])->name('campaigns.templates');
Route::get('/campaigns/templates/new.html', [CampaignsController::class, 'new_template'])->name('campaigns.new_template');
Route::post('/campaigns/templates/save.html', [CampaignsController::class, 'save_template'])->name('campaigns.save_template');
Route::get('/campaigns/templates/delete/{id}', [CampaignsController::class, 'delete_template'])->name('campaigns.delete_template');


Route::get('/campaigns/new.html', [CampaignsController::class, 'new'])->name('campaigns.new');
Route::post('/campaigns/save.html', [CampaignsController::class, 'save'])->name('campaigns.save');
Route::get('/campaigns/category/new.html', [CampaignsController::class,'new_category'])->name('campaigns.new_category');
Route::post('/campaigns/category/save.html', [CampaignsController::class,'savecategory'])->name('campaignscategory.post');
Route::post('/campaigns/category/store.html', [CampaignsController::class,'storecategory'])->name('campaignscategory.store');
Route::get('/campaigns/category/delete/{id}', [CampaignsController::class,'deletecategory'])->name('campaignscategory.delete');
Route::get('/campaigns/categories.html',[CampaignsController::class,'categories'])->name('campaigns.categories');


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

Route::get('importExportView', [MyController::class, 'importExportView']);
Route::get('export', [MyController::class, 'export'])->name('export');
Route::post('import', [MyController::class, 'import'])->name('import');
