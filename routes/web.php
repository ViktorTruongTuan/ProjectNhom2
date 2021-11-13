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

Route::get('/','HomeController@GetHomePage');

Route::get('/login','LoginController@LoginPage');
Route::post('/login','LoginController@PostLogin');

Route::get('/logout','LogoutController@GetLogout');


Route::get('/userlist','UserListController@UserListPage')->middleware('checkrole');

Route::get('/register','registerController@RegisterPage');
Route::post('/register','registerController@PostRegister');
