<?php

Route::group(['prefix' => 'install', 'middleware' => 'install'], function() {
  Route::get('/', array('as' => 'g_step', 'uses' => 'Install\InstallController@getStep'));
  Route::post('/', array('as' => 'v_step', 'uses' => 'Install\InstallController@setStep'));
});

Route::group(['middleware' => 'redirectInstall'], function () {
  Route::group(['prefix' => 'administration'], function() {
    Route::get('/', array('as' => 'dashboard', 'uses' => 'Administration\DashboardController@home'));
    Route::post('/', array('as' => 'dashboard_p', 'uses' => 'Administration\DashboardController@home_p'));

    Route::get('/project_management/{FOLDER_NAME}', array('as' => 'project_management', 'uses' => 'Administration\ProjectController@home'));
    Route::post('/project_management', array('as' => 'project_submit', 'uses' => 'Administration\ProjectController@gen_xml'));

    Route::get('/logout', array('as' => 'logout', 'uses' => 'Auth\AuthController@Logout'));
  });

  Route::get('/login', array('as' => 'login', 'uses' => 'Auth\AuthController@getLogin'));
  Route::post('/login', array('as' => 'login', 'uses' => 'Auth\AuthController@sendLogin'));
});

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));