<?php

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/gradelist/{id}', 'GradeController@show');
Route::post('/gradelist', 'GradeController@index');
Route::post('/gradeUpdate', 'GradeController@update');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
