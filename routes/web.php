<?php


Route::get('/','HomeController@index');
Route::get('/findWithCid/{cid}', 'HomeController@get_cricketer');
Route::get('/findWithCrid/{crid}', 'HomeController@get_crinfo');
Route::get('/findWithCroneid/{cr_one_id}', 'HomeController@get_cr_one_info');