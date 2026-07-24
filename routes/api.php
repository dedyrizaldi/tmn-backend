<?php

use App\Http\Controllers\Api\V1\EquipmentController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\NewsController;
use App\Http\Controllers\Api\V1\ProjectController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Home
    |--------------------------------------------------------------------------
    */

    Route::get('/home', [HomeController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | News
    |--------------------------------------------------------------------------
    */

    Route::get('/news-categories', [NewsController::class, 'categories']);
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/{slug}', [NewsController::class, 'show']);

    /*
    |--------------------------------------------------------------------------
    | Projects
    |--------------------------------------------------------------------------
    */
    Route::get('/project-categories', [ProjectController::class, 'categories']);
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::get('/projects/{slug}', [ProjectController::class, 'show']);

    /*
    |--------------------------------------------------------------------------
    | Equipment
    |--------------------------------------------------------------------------
    */

    Route::get('/equipment', [EquipmentController::class, 'index']);
    Route::get('/equipment/{slug}', [EquipmentController::class, 'show']);

});