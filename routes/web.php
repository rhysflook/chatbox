<?php

use App\Events\MessageRecieved;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Main/Main', []);
});

Route::get('/users', [UserController::class, 'top'])->name('users.top');
Route::post('/users', [UserController::class, 'register']);
Route::post('/trigger_message', function() {});
Route::get('/login', [UserController::class, 'loginPage']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/chat', [MessagesController::class, 'chat'])->name('chat');
Route::post('/send-message', [MessagesController::class, 'send']);

Route::get('/settings', SettingsController::class);