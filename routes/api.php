<?php

use Illuminate\Support\Facades\Route;

Route::post('v1/login', 'Api\ApiController@authenticate');
Route::Post('v1/register','Api\ApiController@register');

Route::get('v1/branch-offices','Api\Order\BranchOfficeController@show');

Route::get('v1/pizzas','Api\Pizza\PizzaControllers@show');
Route::get('v1/pizzas/{id}','Api\Pizza\PizzaControllers@find');
Route::get('v1/pizzas/{id}/pre-established-ingredients','Api\Pizza\PizzaControllers@preEstablishedIngredients');
Route::get('v1/pizzas/{id}/ingredients-available-to-make','Api\Pizza\PizzaControllers@ingredientsAvailableToMake');


Route::group(['middleware' => 'auth_jwt','prefix' => 'v1'], function () {
    Route::post('logout', 'Api\ApiController@logout');
    Route::get('profile/basic-information', 'Api\ApiController@profile');
});

Route::group([ 'middleware' => ['auth_jwt','auth_admin_jwt'],'prefix' => 'v1'], function (){
    Route::get('most-frequent-customers','Api\Order\CostumerController@mostFrequent');
    Route::get('customers-that-spend-more-money','Api\Order\CostumerController@mostSpendMoney');
    Route::get('popular-ingredients','Api\Pizza\IngredientController@mostPopular');
});
