<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

#ADMIN ROUTES
Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => ['auth','admin']], function () {
	#DASHBOARD
	Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.index');
	
	#GROUP
	Route::get('/grouptv/list', [AdminController::class, 'all_grouptv'])->name('dashboard.all_grouptv');
	Route::get('/grouptv/add', [AdminController::class, 'add_grouptv'])->name('dashboard.add_grouptv');
	Route::post('/add_grouptv_action', [AdminController::class, 'add_grouptv_action'])->name('dashboard.add_grouptv_action');
	Route::get('/grouptv/edit/{id}', [AdminController::class, 'edit_grouptv'])->name('dashboard.edit_grouptv');
	Route::post('/edit_grouptv_action', [AdminController::class, 'edit_grouptv_action'])->name('dashboard.edit_grouptv_action');
	Route::get('/grouptv/delete/{id}', [AdminController::class, 'delete_grouptv'])->name('dashboard.delete_grouptv');
	
	#SUBGROUP
	Route::get('/subgrouptv/list', [AdminController::class, 'all_subgrouptv'])->name('dashboard.all_subgrouptv');
	Route::get('/subgrouptv/add', [AdminController::class, 'add_subgrouptv'])->name('dashboard.add_subgrouptv');
	Route::post('/add_subgrouptv_action', [AdminController::class, 'add_subgrouptv_action'])->name('dashboard.add_subgrouptv_action');
	Route::get('/subgrouptv/edit/{id}', [AdminController::class, 'edit_subgrouptv'])->name('dashboard.edit_subgrouptv');
	Route::post('/edit_subgrouptv_action', [AdminController::class, 'edit_subgrouptv_action'])->name('dashboard.edit_subgrouptv_action');
	Route::get('/subgrouptv/delete/{id}', [AdminController::class, 'delete_subgrouptv'])->name('dashboard.delete_subgrouptv');
	
	#TV
	Route::get('/tv/list', [AdminController::class, 'all_tv'])->name('dashboard.all_tv');
	Route::get('/tv/add', [AdminController::class, 'add_tv'])->name('dashboard.add_tv');
	Route::post('/add_tv_action', [AdminController::class, 'add_tv_action'])->name('dashboard.add_tv_action');
	Route::get('/tv/edit/{id}', [AdminController::class, 'edit_tv'])->name('dashboard.edit_tv');
	Route::post('/edit_tv_action', [AdminController::class, 'edit_tv_action'])->name('dashboard.edit_tv_action');
	Route::get('/tv/delete/{id}', [AdminController::class, 'delete_tv'])->name('dashboard.delete_tv');
	
	#TVDATA
	Route::get('/tvdata/list', [AdminController::class, 'all_tvdata'])->name('dashboard.all_tvdata');
	Route::get('/tvdata/add', [AdminController::class, 'add_tvdata'])->name('dashboard.add_tvdata');
	Route::post('/add_tvdata_action', [AdminController::class, 'add_tvdata_action'])->name('dashboard.add_tvdata_action');
	Route::get('/tvdata/edit/{id}', [AdminController::class, 'edit_tvdata'])->name('dashboard.edit_tvdata');
	Route::post('/edit_tvdata_action', [AdminController::class, 'edit_tvdata_action'])->name('dashboard.edit_tvdata_action');
	Route::get('/tvdata/delete/{id}', [AdminController::class, 'delete_tvdata'])->name('dashboard.delete_tvdata');

    Route::post('/upload_tvvideo_action', [AdminController::class, 'upload_tvvideo_action'])->name('dashboard.upload_tvvideo_action');
	
    #LOGOUT
	Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('cli/clear',function(){
	Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:cache');
	return "clear";
});
