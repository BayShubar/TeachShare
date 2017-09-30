<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function(){
		Route::resource('/materials', 'MaterialsController');
		Route::get('materials/teachers/{id}', 'MaterialsController@selectToTeacher');
		Route::get('materials/like/{id}', 'MaterialsController@like');
		Route::put('materials/comment/{id}', 'MaterialsController@setComment');
		Route::get('materials/comment/{id}', 'MaterialsController@getComment');
});

Route::group(['middleware' => 'auth:api'], function(){
		Route::get('/teachers/{id}/iFolow','TeachersController@iFollow');
		Route::get('/teachers/{id}/teachers', 'TeachersController@myTeachers');
		Route::resource('/teachers', 'TeachersController');
});


Route::group(['middleware' => 'auth:api'], function(){
		Route::resource('/journals', 'JournalController');
		Route::get('journals/teachers/{id}', 'JournalController@selectToTeacher');
});