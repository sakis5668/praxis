<?php

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@welcome');

/**
 * Utilities
 */
Route::get('/utils/wks', 'UtilitiesController@calculateWeeks')->name('wks.calculate');
Route::get('/utils/bmi', 'UtilitiesController@calculateBMI')->name('bmi.calculate');

/**
 * PDF's
 */
Route::get('patients/{patient}/examinations/{examination}/pdf', 'ExaminationsPDFController@pdfExamination');
Route::get('patients/{patient}/examinations/pdf', 'ExaminationsPDFController@pdfOverview');
Route::get('patients/{patient}/surgeries/{surgery}/pdf', 'SurgeryPDFController@pdf')->name('surgeries.pdf');

/**
 * Main Level
 */
Route::resource('/patients', 'PatientsController');
Route::resource('/admin/users', 'AdminUsersController');
Route::get('pregnancies', 'ActivePregnanciesController@index')->name('pregnancies');

/**
 * Patients
 */
Route::prefix('patients/{patient}')->group(function () {
    Route::resource('pregnancies', 'PregnanciesController');
    Route::resource('examinations', 'ExaminationsController');
    Route::resource('history', 'HistoriesController');
    Route::resource('cytologies', 'CytologiesController');
    Route::resource('histologies', 'HistologiesController');
    Route::resource('laboratory_examinations', 'LaboratoryExaminationsController');
    Route::resource('imaging_results', 'ImagingResultsController');
    Route::resource('surgeries', 'SurgeriesController');
});

/**
 * Pregnancies
 */
Route::prefix('pregnancies/{pregnancy}')->group(function (){
    Route::resource('history','PregnancyHistoryController')->names('pregnancy.history');
    Route::resource('examinations', 'PregnancyExaminationsController')->names('pregnancy.examinations');
    Route::resource('prenatals', 'PregnancyPrenatalsController')->names('pregnancy.prenatals');
    Route::resource('outcome', 'PregnancyOutcomesController')->names('pregnancy.outcome');
});


