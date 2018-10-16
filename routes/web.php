<?php

Route::group(['prefix' => 'install', 'middleware' => 'install'], function() {
  Route::get('/', array('as' => 'g_step', 'uses' => 'Install\InstallController@getStep'));
  Route::post('/', array('as' => 'v_step', 'uses' => 'Install\InstallController@setStep'));
});

Route::group(['prefix' => 'administration'], function() {

});

Route::get('/login', array('as' => 'login', 'uses' => 'Auth\AuthController@getLogin'));
Route::post('/login', array('as' => 'login', 'uses' => 'Auth\AuthController@sendLogin'));