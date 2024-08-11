<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RegexOptionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function (){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::prefix('forms')->group(function (){
    Route::get('/{id}', [FormController::class, 'show']);
});

Route::prefix('inputs')->group(function (){
    Route::get('/', [InputController::class, 'index']);
});

Route::prefix('regex_options')->group(function (){
    Route::get('/', [RegexOptionsController::class, 'index']);
});