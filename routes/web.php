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

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth', 'namespace' => 'Students', 'prefix' => 'Students'], function()
{
    Route::get('{value}/Student', 'StudentController@redirect')->name('Student');
    Route::post('add', 'StudentController@store')->name('add');
    Route::post('search', 'StudentController@search')->name('search');
    Route::get('{id}/edit', 'StudentController@edit')->name('edit');
    Route::patch('update', 'StudentController@update')->name('update');
    Route::delete('delete/{id}', 'StudentController@destroy')->name('delete');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Courses', 'prefix' => 'Courses'], function ()
{

    Route::get('{value}/Course', 'CourseController@redirect')->name('Course');
    Route::post('course_add', 'CourseController@store')->name('course_add');
    Route::post('course_search', 'CourseController@search')->name('course_search');
    Route::get('{id}/edit', 'CourseController@edit')->name('edit');
    Route::patch('course_update', 'CourseController@update')->name('course_update');
    Route::delete('course_delete/{id}', 'CourseController@destroy')->name('course_delete');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Units', 'prefix' => 'Units'] , function ()
{
    Route::get('unit_index', 'UnitController@index')->name('unit_index');
    Route::get('unit_create', 'UnitController@create')->name('unit_create');
    Route::post('unit_add', 'UnitController@store')->name('unit_add');
    Route::post('unit_search', 'UnitController@search')->name('unit_search');
    Route::post('unit_manage', 'UnitController@edit')->name('unit_manage');
    Route::delete('unit_delete/{id}', 'UnitController@destroy')->name('unit_delete');
    Route::get('{id}/edit', 'UnitController@edit')->name('edit');
    Route::patch('unit_update', 'UnitController@update')->name('unit_update');

});

Route::group(['middleware' => 'auth', 'namespace' => 'Trainers', 'prefix' => 'Trainers'] , function ()
{
    Route::get('trainer_index', 'TrainerController@index')->name('trainer_index');
    Route::get('trainer_create', 'TrainerController@create')->name('trainer_create');
    Route::post('trainer_add', 'TrainerController@store')->name('trainer_add');
    Route::post('trainer_search', 'TrainerController@search')->name('trainer_search');
    Route::post('trainer_manage', 'TrainerController@edit')->name('trainer_manage');
    Route::delete('trainer_delete/{id}', 'TrainerController@destroy')->name('trainer_delete');
    Route::get('{id}/edit', 'TrainerController@edit')->name('edit');
    Route::patch('trainer_update', 'TrainerController@update')->name('trainer_update');

});

Route::group(['middleware' => 'auth', 'namespace' => 'Lessons', 'prefix' => 'Lessons'] , function ()
{
    Route::get('lesson_index', 'LessonController@index')->name('lesson_index');
    Route::get('lesson_create', 'LessonController@create')->name('lesson_create');
    Route::post('lesson_add', 'LessonController@store')->name('lesson_add');
    Route::post('lesson_search', 'LessonController@search')->name('lesson_search');
    Route::post('lesson_manage', 'LessonController@edit')->name('lesson_manage');
    Route::delete('lesson_delete/{id}', 'LessonController@destroy')->name('lesson_delete');
    Route::get('{id}/edit', 'LessonController@edit')->name('edit');
    Route::patch('lesson_update', 'LessonController@update')->name('lesson_update');

});

Route::group(['middleware' => 'auth', 'namespace' => 'relation', 'prefix' => 'enrollment'] , function ()
{
    Route::get('enrolS_create', 'LessonStudentController@create')->name('enrolS_create');
    Route::post('enrolS_add', 'LessonStudentController@store')->name('enrolS_add');
    Route::delete('enrolS_delete/{id}', 'LessonStudentController@destroy')->name('enrolS_delete');

    Route::get('enrolT_create', 'LessonTrainerController@create')->name('enrolT_create');
    Route::post('enrolT_add', 'LessonTrainerController@store')->name('enrolT_add');
    Route::delete('enrolT_delete/{id}', 'LessonTrainerController@destroy')->name('enrolT_delete');

    Route::get('{value}/enrolM_index', 'LessonManageController@index')->name('enrolM_index');
    Route::post('enrolM_search', 'LessonManageController@search')->name('enrolM_search');
    Route::post('enrolM_manage', 'LessonManageController@edit')->name('enrolM_manage');
    Route::delete('enrolM_delete/{id}', 'LessonManageController@destroy')->name('enrolM_delete');
    Route::get('{id}/edit', 'LessonManageController@edit')->name('edit');
    Route::patch('enrolM_update', 'LessonManageController@update')->name('enrolM_update');

});

Route::group(['middleware' => 'auth', 'namespace' => 'Resources', 'prefix' => 'resource'] , function ()
{
    Route::get('{value}/src_index', 'ResourcesController@redirect')->name('src_index');

    Route::get('articlecreate', 'ArticleController@create')->name('articlecreate');
    Route::get('articlemanage', 'ArticleController@index')->name('articlemanage');
    Route::patch('articleupdate', 'ArticleController@update')->name('articleupdate');
    Route::post('article_add', 'ArticleController@store')->name('article_add');
    Route::delete('articledelete/{id}', 'ArticleController@destroy')->name('articledelete');
    Route::get('{id}/edit', 'ArticleController@edit')->name('edit');

    Route::get('assessmentcreate', 'AssessmentController@create')->name('assessmentcreate');
    Route::get('assessmentmanage', 'AssessmentController@index')->name('assessmentmanage');
    Route::post('assessment_add', 'AssessmentController@store')->name('assessment_add');
    Route::patch('assessmentupdate', 'AssessmentController@update')->name('assessmentupdate');
    Route::get('{id}/assessment_edit', 'AssessmentController@edit')->name('assessment_edit');
    Route::delete('assessmentdelete/{id}', 'AssessmentController@destroy')->name('assessmentdelete');

    Route::get('videocreate', 'VideoController@create')->name('videocreate');
    Route::get('videomanage', 'VideoController@index')->name('videomanage');
    Route::post('video_add', 'VideoController@store')->name('video_add');
    Route::patch('videoupdate', 'VideoController@update')->name('videoupdate');
    Route::get('{id}/video_edit', 'VideoController@edit')->name('video_edit');
    Route::delete('videodelete/{id}', 'VideoController@destroy')->name('videodelete');

    Route::get('audiocreate', 'AudioController@create')->name('audiocreate');
    Route::get('audiomanage', 'AudioController@index')->name('audiomanage');
    Route::post('audio_add', 'AudioController@store')->name('audio_add');
    Route::patch('audioupdate', 'AudioController@update')->name('audioupdate');
    Route::get('{id}/audio_edit', 'AudioController@edit')->name('audio_edit');
    Route::delete('audiodelete/{id}', 'AudioController@destroy')->name('audiodelete');
});