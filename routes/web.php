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

Route::prefix('pregnancies')->group(function (){
    Route::resource('{pregnancy}/history','PregnancyHistoryController')->names('pregnancy.history');
});


