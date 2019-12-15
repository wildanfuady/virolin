<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');

Route::group(['middleware' => 'jwt.auth'], function() {
   
    Route::get('logout', 'AuthController@logout');

	// ============================= BAB =============================

    Route::get('bab/{id}', 'Api\BabController@detail'); // list bab
    
    // ============================= INDIKATOR =============================
    
    Route::get('indikator/{id}', 'Api\IndikatorController@list_indikator'); // list sub bab dan detail indikator

    // ============================= LIST ELEMENT =============================
    
    Route::get('list-element/{id}', 'Api\IndikatorController@list_element'); // list sub bab dan detail 

    /* upload dokumen internal
    | Syarat:
    | 1. Input hidden indikator_id
    | 2. Input hidden sub bab. Contoh: 7.1.1
    | 3. Input file dengan nama "file"
    */
    Route::post('upload-internal/{id}', 'Api\IndikatorController@upload_internal'); 
    
    /* upload dokumen eksternal
    | Syarat:
    | 1. Input hidden indikator_id
    | 2. Input hidden sub bab. Contoh: 7.1.1
    | 3. Input file dengan nama "file"
    */
    Route::post('upload-eksternal/{id}', 'Api\IndikatorController@upload_eksternal'); 

    // ============================= SCORE =============================

    Route::get('score-all', 'Api\ScoreController@all'); // done
    Route::get('score-all-bab/{bab_id}', 'Api\ScoreController@all_bab'); // done
    Route::get('sub-bab/{bab_id}', 'Api\ScoreController@per_sub_bab'); // done
    Route::get('score-all-indikator/{id}', 'Api\ScoreController@all_indikator');
    Route::get('score-per-indikator/{indikator_id}', 'Api\ScoreController@per_indikator');
    Route::get('/delete_internal/{id}', 'Api\UploadController@delete_internal');
    Route::get('/delete_eksternal/{id}', 'Api\UploadController@delete_eksternal');

});
