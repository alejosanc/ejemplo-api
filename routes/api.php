<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\ExampleController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
// });

Route::name('api.')->group(function () {
    Route::get('/', function () {
        return 'Listados de endpoints accesibles';
    })->name('info');
    Route::prefix('app')->name('app.')->group(function () {
        Route::get('/auth', function () {
            return 'Generat un access token a partir de un apikey';
        })->name('auth');
        Route::get('/validate', function () {
            return 'Validar que el access token este vigente';
        })->name('validate');
        Route::get('/refresh', function () {
            return 'Regenerar el access token a partir del apikey';
        })->name('refresh');
        Route::get('/schema', function () {
            return 'Funciones asociadas a la app';
        })->name('schema');
    });
    Route::get('example',[ExampleController::class,'example'])->name('example');
    Route::apiResource('users',UserController::class);
});
