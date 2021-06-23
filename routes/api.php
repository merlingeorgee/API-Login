<?php
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::post('/login', [AuthController::class, 'login']);
//Route::post('/logout', [AuthController::class, 'logout']);
//Route::post('/register', [AuthController::class, 'register']);

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group([
    'namespace'=>'App\Http\Controllers',
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/login', [AuthController::class, 'login']);    
    Route::post('/logout', [AuthController::class, 'logout']);
   // Route::post('/register', [AuthController::class, 'register']);
    Route::post('register', 'AuthController@register');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('profile', 'AuthController@profile');
    Route::post('ResetPassword', 'AuthController@ResetPassword');
});

Route::group([
    'namespace'=>'App\Http\Controllers',
    'middleware' => 'api',
], function ($router) {

    Route::resource('todos', 'TodoController'); 
    Route::post('sendotp', 'AuthController@sendotp');
    
});

