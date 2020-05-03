<?php


use Illuminate\Support\Facades\Route; 

Route::get('/', function () {
    return view('pages.home');
});


Route::get('/admin', 'PagesController@adminPage');
Route::get('/', 'PagesController@homePage');
Route::get('/building/{id}', 'PagesController@singlePage')->name('singlePage');

Route::post('/addbuilding', 'PagesController@addBuilding')->name('add_building');
Route::post('/addfac', 'PagesController@addFacilities')->name('add_fac');
Route::post('/addaddr', 'PagesController@addAddress')->name('add_addr');



/*
    REST API Routes
*/

/* Return all buildings */
Route::get('/api/buildings','RController@getAllBuildings');
/* 
    Return all buildings by city 
    Example: http://127.0.0.1/api/building?city=Moscow'
*/
Route::get('/api/building','RController@getByCity');