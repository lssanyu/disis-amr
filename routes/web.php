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


/*-------------------------------Human Health Organisms Isolated-------------------------------------*/
Route::get('/loadDataForSpecificQuarter', 'HH_IsolatesController@loadDataForSpecificQuarter');
// Route::get('/loadDataForSpecificQuarter', 'HH_IsolatesController@loadDataForSpecificQuarter');
Route::get('/hh_isolateschart', 'HH_IsolatesController@getDefaultData')->name('hh_isolateschart');
Route::get('/allData', 'HH_IsolatesController@getAllData')->name('isolates');

/*-------------------------------Animal Health Organisms Isolated-------------------------------------*/
Route::get('/loadDataPerDistrict', 'AH_IsolatesController@loadDataPerDistrict');
Route::get('/ah_isolateschart', 'AH_IsolatesController@getDefaultData')->name('ah_isolateschart');
Route::get('/allAhIsolates', 'AH_IsolatesController@getAllData')->name('all_ah_isolateschart');

/*-------------------------------Animal Health Resistance------------------------------------------------*/
Route::get('/ah_resistance', 'AH_ResistanceController@getDefaultData')->name('ah_resistance');
Route::get('/loadDataForSpecificOrganism', 'AH_ResistanceController@loadDataForSpecificOrganism');

/*-------------------------------Samples with Growth-----------------------------------------------------*/
Route::get('/sampleswithgrowth', 'SamplesWithGrowthController@getDefaultData')->name('sample_with_growth');
Route::get('/loadDataPerFacility', 'SamplesWithGrowthController@loadDataPerFacility');
Route::get('/allsampleswithgrowth', 'SamplesWithGrowthController@getAllData')->name('all_samples_with_growth');

/*-------------------------------Human Health Resistance------------------------------------------------*/
Route::get('/hh_resistance', 'HH_ResistanceController@getDefaultData')->name('hh_resistance');
Route::get('/loadHumanResData','HH_ResistanceController@loadHumanResData');

/*-------------------------------Samples Cultured-------------------------------------------------------*/
Route::get('/samplescultured', 'SamplesCulturedController@getDefaultData')->name('samples_cultured');
Route::get('/loadCulturedGraph','SamplesCulturedController@loadCulturedGraph');
Route::get('/allsamplescultured','SamplesCulturedController@getAllData')->name('all_samples_cultured');

/*-------------------------------Nav Graphs-------------------------------------------------------*/
Route::get('/resistance_pattern', 'ResistancePatternController@index')->name('resistance_pattern');
Route::get('/get_it', 'AMRController@get_it')->name('sidebar');
Route::get('/amr', 'AMRController@index')->name('amr_surveillance');
Route::get('/home', 'HomeController@home')->name('home');


/*-------------------------------User Management------------------------------------------------------*/
Route::get('/', 'UserController@index')->name('login');
Route::post('/post-login', 'UserController@postLogin');
Route::get('/registration', 'UserController@registration');
Route::post('/post-registration', 'UserController@postRegistration');
Route::post('/login', 'UserController@logout')->name('logout');

/*-------------------------------Pie Charts---------------------------------------------------------------*/
Route::get('/getAllPieChartData', 'HH_IsolatesPieChartController@getAllPieChartData')->name('pie_chart');
Route::get('/getSpecificPieData', 'HH_IsolatesPieChartController@getSpecificPieData');
