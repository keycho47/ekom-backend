<?php

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
//});
Route::prefix('/user')->group(function (){
    Route::post('/login', 'API\LoginController@login')->name('user.login');
    Route::post('/register', 'API\LoginController@register')->name('user.register');
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/report', 'API\ReportController@getCurrentState')->name('report');

    Route::apiResources([
        'products' => 'API\ProductController',
        'clients' => 'API\ClientController',
        'roles' => 'API\RoleController',
        'taxes' => 'API\TaxController',
        'prices' => 'API\PriceController',
        'entity' => 'API\EntityController',
        'stock' => 'API\StockController',
    ]);
});

//Route::apiResources([
//    'products' => 'API\ProductController',
//    'clients' => 'API\ClientController',
//    'roles' => 'API\RoleController',
//    'taxes' => 'API\TaxController',
//    'prices' => 'API\PriceController',
//    'entity' => 'API\EntityController',
//    'stock' => 'API\StockController',
//]);

