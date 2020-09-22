<?php

use Illuminate\Support\Facades\Route;

/* Creando la ruta del admin */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questionnaires', 'QuestionnaireController');
Route::get('questionnaires/{id}/confirmDelete', 'QuestionnaireController@confirmDelete')
  ->name('questionnaires.confirmDelete');

Route::get('/questionnaires/{questionnaire}/questions', 'QuestionController@index')
  ->name('questions.index');

Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create')
  ->name('questions.create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store')
  ->name('questions.store');

Route::get('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@show')
  ->name('questions.show');

Route::get('/questionnaires/{questionnaire}/questions/{question}/edit', 'QuestionController@edit')
  ->name('questions.edit');
Route::put('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@update')
  ->name('questions.update');

Route::get('/questionnaires/{questionnaire}/questions/{question}/confirmDelete', 'QuestionController@confirmDelete')
  ->name('questions.confirmDelete');
Route::delete('/questionnaires/{questionnaire}/questions/{question}','QuestionController@destroy')
  ->name('questions.destroy');

Route::get('/takeExam', 'SurveyController@show')->name('survey.show');