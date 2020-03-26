<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/introduce', 'IntroduceController@index')->name('introduce');

Route::get('/recipes', 'RecipeListController@index')->name('recipes');

Route::get('/recipes/search', 'RecipeListController@search')->name('search');

Route::get('/user/{user_id}', 'MyPageController@index')->name('user');

Route::get('/recipes/add', 'RecipeController@showAddRecipePage')->name('add');

Route::post('/recipes/add', 'RecipeController@add');