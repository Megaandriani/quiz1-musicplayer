<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/',function (){
    return view('auth/login');
});
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/artist','ArtistController@index');
Route::get('/artist/create','ArtistController@create');
Route::post('/artist','ArtistController@store');
Route::get('/artist/{id}/edit','ArtistController@edit');
Route::patch('/artist/{id}','ArtistController@update');
Route::delete('/artist/{id}','ArtistController@destroy'); 

Route::get('/album','AlbumController@index');
Route::get('/album/create','AlbumController@create');
Route::post('/album','AlbumController@store');
Route::get('/album/{id}/edit','AlbumController@edit');
Route::patch('/album/{id}','AlbumController@update');
Route::delete('/album/{id}','AlbumController@destroy'); 

Route::get('/track','TrackController@index');
Route::get('/track/create','TrackController@create');
Route::post('/track','TrackController@store');
Route::get('/track/{id}/edit','TrackController@edit');
Route::patch('/track/{id}','TrackController@update');
Route::delete('/track/{id}','TrackController@destroy');

Route::get('/played','PlayedController@index');
Route::get('/played/create','PlayedController@create');
Route::post('/played','PlayedController@store');
Route::get('/played/{id}/edit','PlayedController@edit');
Route::patch('/played/{id}','PlayedController@update');
Route::delete('/played/{id}','PlayedController@destroy');