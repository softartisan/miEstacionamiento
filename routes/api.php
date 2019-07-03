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


Route::get('cliente', 'ClienteController@index');
Route::get('cliente/{usuario}', 'ClienteController@show');
Route::post('cliente', 'ClienteController@store');
Route::patch('cliente/{usuario}', 'ClienteController@update');
Route::delete('cliente/{usuario}', 'ClienteController@delete');


Route::group(['prefix'=>'transbank'],function (){
  
    Route::get('venta',[
        'uses'  =>'ArrendarController@venta',
        'as'    =>'webpayplus'
    ]);
    Route::post('payment',[
        'uses'  =>'ArrendarController@webpayPayment',
        'as'    =>'webpayplusResponse'
    ]);
    Route::post('thanks',[
        'uses'  =>'ArrendarController@thanks',
        'as'    =>'thanks'
    ]);

});
