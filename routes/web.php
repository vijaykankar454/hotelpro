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
        Route::get('/pages/{id?}','PageController@index')->name('page.pagelist')->where('id', '[0-9]+');
        Route::get('/pages/addpage/{id?}','PageController@addPage')->name('page.pageadd')->where('id', '[0-9]+'); 
        Route::get('/pages/editpage/{id}','PageController@editPage')->name('page.pageedit')->where('id', '[0-9]+'); 
        Route::patch('/pages/update/{id}','PageController@updatePage')->name('page.pageupdate')->where('id', '[0-9]+');
        Route::post('/pages/addpagesubmit','PageController@addPageSubmit')->name('page.pageaddsubmit');  
        Route::get('/pages/delete/{id}','PageController@delete')->name('page.pagedelete')->where('id', '[0-9]+'); 
        Route::get('/pages/updatestatus/{id}/{status}','PageController@updateStatus')->name('page.pageupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/pagemanager/deleteAll','PageController@deleteAll')->name('page.deleteall');

        /* Traveller route */
        Route::get('/traveller','TravellerController@index')->name('traveller.travellerlist');
        Route::get('/traveller/delete/{id}','TravellerController@delete')->name('traveller.travellerdelete')->where('id', '[0-9]+'); 
        Route::get('/traveller/updatestatus/{id}/{status}','TravellerController@updateStatus')->name('traveller.updatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/traveller/deleteAll','TravellerController@deleteAll')->name('traveller.deleteall');

         /* Team route */
         Route::get('/teams/{id?}','TeamController@index')->name('team.teamlist')->where('id', '[0-9]+');
         Route::get('/teams/addteam/{id?}','TeamController@addTeam')->name('team.teamadd')->where('id', '[0-9]+'); 
         Route::get('/teams/editteam/{id}','TeamController@editTeam')->name('team.teamedit')->where('id', '[0-9]+'); 
         Route::patch('/teams/update/{id}','TeamController@updateTeam')->name('team.recupdate')->where('id', '[0-9]+');
         Route::post('/teams/addteamsubmit','TeamController@addTeamSubmit')->name('team.recaddsubmit');  
         Route::get('/teams/delete/{id}','TeamController@delete')->name('team.recdelete')->where('id', '[0-9]+'); 
         Route::get('/teams/updatestatus/{id}/{status}','TeamController@updateStatus')->name('team.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
         Route::post('/teamsmanager/deleteAll','TeamController@deleteAll')->name('team.deleteall');
    });
});
