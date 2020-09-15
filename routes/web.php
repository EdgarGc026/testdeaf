<?php

use Illuminate\Support\Facades\Route;

/* Creando la ruta del admin */

/* Route::resource('questions', 'QuestionController');
Route::get('/questions/{id}/confirmDelete', 'QuestionController@confirmDelete')
    ->name('questions.confirmDelete'); */

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

Route::get('/questionnaires/{questionnaire}/questions/{question}/edit', 'QuestionController@edit')
  ->name('questions.edit');
Route::put('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@update')
  ->name('questions.update');

Route::get('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@confirmDelete')
  ->name('questions.confirmDelete');
Route::delete('/questionnaires/{questionnaire}/questions/{question}','QuestionController@destroy')
  ->name('questions.destroy');
/*

*/




/* Route::post('questions/{questions}/answers','QuestionsAnswersController@create')->name('create_answer'); */

Route::get('/takeExam', 'SurveyController@show')->name('survey.show');

/* Route::get('/questionnaires/create', 'QuestionnaireController@create')
    ->name('questionnaires.create');
Route::post('/questionnaires', 'QuestionnaireController@store')
    ->name('questionnaires.store');

Route::put('/questionnaires/{questionnaire}', 'QuestionnaireController@update')
    ->name('questionnaires.update');
Route::get('/questionnaires/{questionnaire}/edit', 'QuestionnaireController@edit')
    ->name('questionnaires.edit');

Route::get('/questionnaires', 'QuestionnaireController@index')
    ->name('questionnaires.index');
Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show')
    ->name('questionnaires.show');

Route::delete('/questionnaires/{questionnaire}', 'QuestionnaireController@destroy')
    ->name('questionnaires.destroy'); */
