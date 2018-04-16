<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'] , function ()
{
    //get use email and password compare with database data and return "success" or "fail"
    Route::get('index', 'UserLoginApiController@index');
    Route::post('login', 'UserLoginApiController@login');

    //get all Courses information
    Route::get('allCourses', 'AllCoursesApiController@getAllCourses');

    Route::post('studentCourse', 'ShowStudentCourseController@showStudentCourse');

});
