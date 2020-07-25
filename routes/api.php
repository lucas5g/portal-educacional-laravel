<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return ['api' => 'Portal Educacional'];
});

Route::post('auth/login', 'Api\AuthController@login');

Route::middleware(['apiJwt', 'teacherRoute'])->group(function(){

    Route::resource('users', 'Api\UserController');
    Route::resource('courses', 'Api\CourseController');
    Route::resource('disciplines', 'Api\DisciplineController');
    Route::resource('registration', 'Api\RegistrationController');
    
});
