<?php

use Azuriom\Plugin\Authme\Controllers\AuthmeHomeController;
use Azuriom\Plugin\Authme\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

Route::get('/', [AuthmeHomeController::class, 'index']);

Route::get('/click2login', [SessionController::class, 'click2login'])->middleware('auth')->name('click2login');
