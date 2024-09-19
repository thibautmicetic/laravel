<?php

use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\DemandeContactController;
use App\Http\Controllers\PingPongController;
use App\Http\Controllers\TestFlashController;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckTodo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
        return view('welcome', ['titre' => 'Site de Thibaut Oui']);
});

Route::get('/ping', [PingPongController::class, 'ping']);
Route::get('/pong', [PingPongController::class, 'pong'])->middleware(CheckAuth::class);

Route::get('/flash', [TestFlashController::class, 'flash']);
Route::post('/traitement', [TestFlashController::class, 'traitement']);

Route::get('/todo', [TodoController::class, 'todo'])->middleware(CheckTodo::class)->middleware('throttle:50,1')->middleware(CheckAuth::class);;
Route::post('/todoAdd', [TodoController::class, 'todoAdd'])->middleware('throttle:10,1');
Route::get('/todo/termine/{id}', [TodoController::class, 'updateTodo']);
Route::get('/todo/delete/{id}', [TodoController::class, 'deleteTodo']);
Route::get('/todo/deleteAll', [TodoController::class, 'deleteAllTodos']);

Route::get('/demandes', [DemandeContactController::class, 'demandes']);
Route::post('/createDemande', [DemandeContactController::class, 'createDemande']);

Route::get('/login', [AuthentificationController::class, 'login']);
Route::post('/traitementLogin', [AuthentificationController::class, 'traitementLogin']);

Route::get('/register', [AuthentificationController::class, 'register']);
Route::post('/traitementRegister', [AuthentificationController::class, 'traitementRegister']);

Route::fallback(function () {
    return 'Page 404';
});

Route::middleware('throttle:5,1')->get('/testRate', function () {
    return 'Hello World';
});
