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

Route::post('loginToken', 'Api\PassportController@login');
Route::post('register', 'Api\PassportController@register');
//登陆的用户才能访问的api
Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function(){
    Route::post('details', 'PassportController@getDetails');
});

Route::group(['namespace' => 'Api'] , function ()
{
    //get use email and password compare with database data and return "success" or "fail"
    Route::get('index', 'UserLoginApiController@index');
    Route::post('login', 'UserLoginApiController@login');

    //get all Courses information
    Route::get('allCourses', 'AllCoursesApiController@getAllCourses');

    Route::get('studentCourse', 'ShowStudentCourseController@showStudentCourse');
    Route::get('studentUnit', 'ShowStudentUnitController@showStudentUnit');
    Route::get('studentLesson', 'ShowStudentLessonController@showStudentLesson');

    //API List
    Route::get('APIList', function(){
        $APIs = [
            "all-courses-info (get)" => "empirecollege.net/Education/public/api/allCourses",
            "student-course-info (get email=xxx@xxx)" => "empirecollege.net/Education/public/api/studentCourse",
            "student-unit-info (get email=xxx@xxx)" => "empirecollege.net/Education/public/api/studentUnit",
            "student-class-info (get email=xxx@xxx)" => "empirecollege.net/Education/public/api/studentLesson",
        ];
        return response()->json($APIs,200,[],JSON_PRETTY_PRINT);
    });

});
