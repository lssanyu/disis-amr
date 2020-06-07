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


Route::get('/get_it', 'AMRController@get_it')->name('sidebar');


//Dropdown URLs
Route::get('/loadDataForSpecificQuarter', 'HH_IsolatesController@loadDataForSpecificQuarter');
Route::get('/loadDataForSpecificOrganism', 'AH_ResistanceController@loadDataForSpecificOrganism');
Route::get('/loadDataPerFacility', 'SamplesWithGrowthController@loadDataPerFacility');
Route::get('/loadDataPerDistrict', 'AH_IsolatesController@loadDataPerDistrict');
Route::get('/loadHumanResData','HH_ResistanceController@loadHumanResData');


Route::get('/amr', 'AMRController@index')->name('amr_surveillance');
Route::get('/loadDataForSpecificQuarter', 'HH_IsolatesController@loadDataForSpecificQuarter');
Route::get('/hh_isolateschart', 'HH_IsolatesController@getDefaultData')->name('hh_isolateschart');
Route::get('/sampleswithgrowth', 'SamplesWithGrowthController@getDefaultData')->name('sample_with_growth');
Route::get('/resistance_pattern', 'ResistancePatternController@index')->name('resistance_pattern');
Route::get('/ah_isolateschart', 'AH_IsolatesController@getDefaultData')->name('ah_isolateschart');
Route::get('/ah_resistance', 'AH_ResistanceController@getDefaultData')->name('ah_resistance');
Route::get('/hh_resistance', 'HH_ResistanceController@getDefaultData')->name('hh_resistance');

//user account
Route::get('/', 'UserController@index')->name('login');
Route::post('/post-login', 'UserController@postLogin');
Route::get('/registration', 'UserController@registration');
Route::post('/post-registration', 'UserController@postRegistration');
Route::post('/login', 'UserController@logout')->name('logout');
