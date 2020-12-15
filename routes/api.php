<?php

use App\Http\Controllers\LinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GanttController;
use App\Http\Controllers\TaskController;
use App\Models\Link;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/{name?}', function($name = null){
    return 'Hi ' . $name;
});

Route::get('/keywords/{id?}', function($id = null){
    return 'Keywords: ' . $id;
});

Route::get('/projects',function(){
    return "hi users";
});
Route::get('/data', function(){
    $tasks = new Task();
    $links = new Link();

    return response()->json([
        'data' => $tasks->all(),
        'links' => $links->all()
    ]);
})->name('campaigns.api.data');

Route::resource('task',TaskController::class);
Route::resource('link',LinkController::class);
