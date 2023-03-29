<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EncounterController;
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



Route::post('/auth/login', LoginController::class);




 Route::middleware('auth:sanctum')->group(function () {
    Route::get('/services', ServiceController::class);

    Route::prefix('auth')->group(function(){
        Route::get('/user', function (Request $request) {
            return $request->user();
          });

          Route::post('logout', function (Request $request) {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'message' => 'Logged out'
            ]);
        });
     });



     Route::prefix('encounters')->group(function(){
        Route::post('/', [EncounterController::class,'generate']);
        Route::get('/', [EncounterController::class,'index']);
    });

     Route::get('/patients', PatientController::class);
    //  Route::post('/encounters', [EncounterController::class, 'generate']);
});




      Route::post('logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    });


// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/auth/user', function (Request $request) {
//         return $request->user();
//     });


// });

