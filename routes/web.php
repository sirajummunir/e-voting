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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
//Route::get('/', function(){
//return view('home');	
//});
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/resetPass', 'Auth\ResetPasswordController@reset')->name('password.resetPass');
Route::post('password/resetPass', 'Auth\ResetPasswordController@sendReset');
Route::get('password/resetCode', 'Auth\ResetPasswordController@code')->name('password.resetCode');
Route::post('password/resetCode', 'Auth\ResetPasswordController@resetCode');
Route::get('/regCode', 'Auth\RegisterController@regCode')->name('regCode');
Route::post('/regCode', 'Auth\RegisterController@verifyCode');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile/{nid?}', 'HomeController@profile')->name('profile');
Route::get('/voters', 'HomeController@voters')->name('voters');
Route::get('/candidates', 'CandidateController@candidates')->name('candidates');
Route::post('/candidate/store', 'CandidateController@store')->name('candidate.store');
Route::get('/candidate/search', 'CandidateController@search')->name('candidate.search');
Route::get('/candidate/{candidate}/delete', 'CandidateController@delete')->name('candidate.delete');
Route::get('requests', 'HomeController@requests')->name('requests');
Route::get('request/{user}/{verdict}', 'HomeController@judgeRequest')->name('request.judge');
Route::get('deleteUser/{user}', 'HomeController@deleteUser')->name('deleteUser');
Route::any('time', 'HomeController@time')->name('time');
Route::get('search', 'HomeController@search')->name('search');


Route::get('/vote', 'VoteController@vote')->name('vote');
Route::get('/voteAction/{candidate}', 'VoteController@voteAction')->name('voteAction');


Route::get('results', 'ResultController@show')->name('results');
Route::get('about', 'HomeController@about')->name('about');
