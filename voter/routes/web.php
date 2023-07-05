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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/regCode', 'Auth\RegisterController@regCode')->name('regCode');
Route::post('/regCode', 'Auth\RegisterController@verifyCode');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile/{nid?}', 'HomeController@profile')->name('profile');
Route::get('/voters', 'HomeController@voters')->name('voters');
Route::get('/candidates', 'CandidateController@candidates')->name('candidates');
Route::post('/candidate/store', 'CandidateController@store')->name('candidate.store');
Route::get('/candidate/search', 'CandidateController@search')->name('candidate.search');


Route::get('/vote', 'VoteController@vote')->name('vote');
Route::get('/voteAction/{candidate}', 'VoteController@voteAction')->name('voteAction');


Route::get('results', 'ResultController@show')->name('results');