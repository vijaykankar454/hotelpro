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
Route::get('/admin/register', 'Admin\Auth\RegisterController@showAdminRegisterForm');
Route::post('/admin/register', 'Admin\Auth\RegisterController@createAdmin');

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){

    Route::get('/', 'Auth\LoginController@showAdminLoginForm')->name('loginview');
    Route::post('/login', 'Auth\LoginController@adminLogin')->name('login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::group([ 'middleware' =>  ['auth:admin']], function()
    {
        Route::get('/dashboard', 'AdminDashboard@index')->name('dashboard');

    });
});
