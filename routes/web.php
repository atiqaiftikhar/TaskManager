<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskViewController;
use App\Http\Controllers\UserController;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/",[HomeController::class,'home']);
Route::get('/feature',[FeatureController::class,'index' ])->name('feature');
Route::get('/blogs',[BlogController::class,'index' ])->name('blog');
Route::get('/aboutus',[AboutUsController::class,'index' ])->name('aboutus');
Route::get('/taskview',[TaskViewController::class,'index' ])->name('taskview');
Route::get("/admin",[AdminController::class,'index']);

Route::post('/projects/add-team-member', [ProjectController::class])->name('projects.add-team-member');
Route::get('/projects/{id}', 'ProjectController@show')->name('projects.show');





Route::group(['prefix'=>'admin'],function(){

    // Route::group(['middleware' => 'admin'], function () {

    Route::group(['prefix' => '/project'], function() {
    Route::get('/',[ProjectController::class,'project'])->name('project.index');
    Route::get('/create',[ProjectController::class,'create'])->name('project.create');
    Route::post('/store',[ProjectController::class,'store'])->name('project.store');
    Route::get('/edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
    Route::post('/update/{id}',[ProjectController::class,'update'])->name('project.update');
    Route::get('/delete/{id}',[ProjectController::class,'delete'])->name('project.delete');
    });


    Route::group(['prefix' => '/project'], function() {
        Route::get('/',[ProjectController::class,'project'])->name('project.index');
        Route::get('/create',[ProjectController::class,'create'])->name('project.create');
        Route::post('/store',[ProjectController::class,'store'])->name('project.store');
        Route::get('/edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
        Route::post('/update/{id}',[ProjectController::class,'update'])->name('project.update');
        Route::get('/delete/{id}',[ProjectController::class,'delete'])->name('project.delete');


        });


            Route::group(['prefix' => '/task/{fid}'], function() {
            Route::get('/',[TaskController::class,'task'])->name('task.index');
            Route::get('/create',[TaskController::class,'create'])->name('task.create');
            Route::post('/store',[TaskController::class,'store'])->name('task.store');
            Route::get('/edit/{id}',[TaskController::class,'edit'])->name('task.edit');
            Route::post('/update/{id}',[TaskController::class,'update'])->name('task.update');
            Route::get('/delete/{id}',[TaskController::class,'delete'])->name('task.delete');
            Route::post('/readyfortesting', [TaskController::class, 'readyForTesting'])->name('task.readyForTesting');
            Route::get('/detail/{id}',[TaskController::class,'detail'])->name('task.detail');
            // Route::get('/filter', [TaskController::class, 'filterTasks'])->name('task.filter');

            });


             Route::group(['prefix' => '/module/{tid}'], function() {
                // Route::group(['prefix' => '/module'], function() {
                Route::get('/',[ModuleController::class,'module'])->name('module.index');
                Route::get('/create',[ModuleController::class,'create'])->name('module.create');
                Route::post('/store',[ModuleController::class,'store'])->name('module.store');
                Route::get('/edit/{id}',[ModuleController::class,'edit'])->name('module.edit');
                Route::post('/update/{id}',[ModuleController::class,'update'])->name('module.update');
                Route::get('/delete/{id}',[ModuleController::class,'delete'])->name('module.delete');


                });




            Route::group(['prefix' => '/user'], function() {
                Route::get('/',[UserController::class,'user'])->name('user.index');

                });

                Route::group(['prefix' => '/notification'], function() {
                    // Route::get('/',[NotificationController::class,'index'])->name('notifications.index');
                    Route::get('/', [NotificationController::class, 'show'])->name('notifications.show');

                    });

});




Auth::routes();
// Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//     return "this page requires that you be logged in and an Admin";
// }]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

