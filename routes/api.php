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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sub-categories/{id}/options','API\SubCategoryController@subCategoryWithOptions');

Route::get('categories/canteen-info/{id}','API\CategoryController@get_categories');
Route::get('orders/{id}/options','API\OrderController@orders');


Route::apiResources([
        'sub-categories' => 'API\SubCategoryController',
        'orders' => 'API\OrderController',
]);

