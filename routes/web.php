<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ScheduleController;




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
Route::get('/', function () { return view('welcome'); });
Route::get('/posts', [PostController::class, 'index']);   
Route::get('/', [EventController::class, 'index']);
Route::get('/events', [EventController::class, 'index']);   
Route::get('/events/create', [EventController::class, 'create']);
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::post('/events', [EventController::class, 'store']);
Route::get('schedules/create/{event_id}', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('schedules/{event_id}', [ScheduleController::class, 'show'])->name('schedules.show');

