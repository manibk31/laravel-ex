<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array('as'=>'/', 'uses'=>'PlanController@getPlans'));
Route::post('/postplan', array('as'=>'addplan', 'uses'=>'PlanController@postPlan'));
