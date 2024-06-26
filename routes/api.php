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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->namespace('Api\Auth')->group(function(){

	Route::post('register', 'RegisterController@register')->name('register');
	
	Route::post('login', 'LoginController@login')->name('login');

});

Route::middleware(['auth:api'])/*->prefix('')*/->namespace('Api')->group(function () {
	Route::apiResources([
		'boxes'			        =>'ContainerController',
		'contents'				=>'ContentController',
		'regions'				=>'RegionController',
		'subregions'			=>'SubregionController',
		'traders'				=>'TraderController',
		'selling-deals'			=>'SellingDealController',
		'purchasing-deals'		=>'PurchasingDealController',
		'collecting-deals'		=>'CollectingDealController',
	]);
});