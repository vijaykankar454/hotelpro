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
    Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','Auth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
    
    Route::group([ 'middleware' =>  ['auth:admin']], function()
    {
        Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
         /* Dashoard route */
        Route::get('/dashboard', 'AdminDashboard@index')->name('dashboard');
        
        /* page route */
        Route::get('/pages','PageController@index')->name('page.pagelist');
        Route::get('/pages/addpage','PageController@addPage')->name('page.pageadd'); 
        Route::post('/pages/addpagesubmit','PageController@addPageSubmit')->name('page.pageaddsubmit');  
        Route::get('/pages/delete/{id}','PageController@delete')->name('page.pagedelete')->where('id', '[0-9]+'); 
        Route::get('/pages/updatestatus/{id}/{status}','PageController@updateStatus')->name('page.pageupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/pagemanager/deleteAll','PageController@deleteAll')->name('page.deleteall');
    });
});
