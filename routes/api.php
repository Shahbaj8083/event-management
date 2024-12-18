<?php

use App\Http\Controllers\api\AttendeeController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EventController;
use App\Http\Controllers\api\JwtAuthController;
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

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
->middleware('auth:sanctum');

Route::apiResource('events', EventController::class);
Route::apiResource('events.attendees', AttendeeController::class)
    ->scoped(['attendee' => 'event']);
    # The keys in the scoped method should refer to the singular form of the model name
    #every attendee is bolongs to any of the event, without event no attendee


#learning jwt 

Route::post('jwt-register', [JwtAuthController::class, 'register']);
Route::post('jwt-login', [JwtAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('jwt-user', [JwtAuthController::class, 'userProfile']);
    Route::post('jwt-logout', [JwtAuthController::class, 'logout']);
});