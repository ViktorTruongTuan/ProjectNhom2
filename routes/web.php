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
//Login
Route::get('/login','LoginController@LoginPage');
Route::post('/login','LoginController@PostLogin');
Route::get('/logout','LogoutController@GetLogout');

//ProductList
Route::get('/productlist','ProductListController@ProductListPage')->middleware('checkrole');

//Add Product
Route::get('/addproduct','ProductListController@AddProductListPage')->middleware('checkrole');
Route::post('/addproduct','ProductListController@PostAddProductListPage')->middleware('checkrole');

//Delete Product
Route::get('deleteproduct/{id}','ProductListController@DeleteProduct')->middleware('checkrole');

//Update Product
Route::get('updateproduct/{id}', 'ProductListController@UpdateProductPage')->middleware('checkrole');
Route::post('/updateproduct','ProductListController@PostUpdateProduct')->middleware('checkrole');

Route::get('/userlist','UserListController@UserListPage')->middleware('checkrole');

Route::get('/register','registerController@RegisterPage');
Route::post('/register','registerController@PostRegister');

Route::get('/test','TestControler@getTest');
Route::post('/test','TestControler@postFile');
