<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@welcome');

Route::get('/utils/ssw', 'SSWCalculatorController@inputData')->name('ssw.input');
Route::post('/utils/ssw', 'SSWCalculatorController@calculateResult')->name('ssw.output');
Route::get('/utils/bmi', 'UtilitiesController@calculateBMI')->name('bmi.calcucate');

Route::resource('/patients', 'PatientsController');
Route::resource('/admin/users', 'AdminUsersController');

Route::prefix('patients')->group(function () {
    Route::resource('{patient}/pregnancies', 'PregnanciesController');
    Route::resource('{patient}/examinations', 'ExaminationsController');
    Route::resource('{patient}/history', 'HistoriesController');
    Route::resource('{patient}/cytologies', 'CytologiesController');
    Route::resource('{patient}/histologies', 'HistologiesController');
    Route::resource('{patient}/laboratory_examinations', 'LaboratoryExaminationsController');
    Route::resource('{patient}/imaging_results', 'ImagingResultsController');
    Route::resource('{patient}/surgeries', 'SurgeriesController');
    Route::get('{patient}/surgeries/{surgery}/pdf', 'SurgeryPDFController@pdf')->name('surgeries.pdf');
});

Route::prefix('pregnancies/{pregnancy}')->group(function (){
    Route::resource('history','PregnancyHistoryController')->names('pregnancy.history');
    Route::resource('examinations', 'PregnancyExaminationsController')->names('pregnancy.examinations');
    Route::resource('prenatals', 'PregnancyPrenatalsController')->names('pregnancy.prenatals');
    Route::resource('outcome', 'PregnancyOutcomesController')->names('pregnancy.outcome');
});


