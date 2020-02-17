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
        Route::get('/teams','TeamController@index')->name('team.teamlist');
        Route::get('/teams/addteam','TeamController@addTeam')->name('team.teamadd'); 
        Route::get('/teams/editteam/{id}','TeamController@editTeam')->name('team.teamedit')->where('id', '[0-9]+'); 
        Route::patch('/teams/update/{id}','TeamController@updateTeam')->name('team.recupdate')->where('id', '[0-9]+');
        Route::post('/teams/addteamsubmit','TeamController@addTeamSubmit')->name('team.recaddsubmit');  
        Route::get('/teams/delete/{id}','TeamController@delete')->name('team.recdelete')->where('id', '[0-9]+'); 
        Route::get('/teams/updatestatus/{id}/{status}','TeamController@updateStatus')->name('team.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/teamsmanager/deleteAll','TeamController@deleteAll')->name('team.deleteall');

        /* slider route */
        Route::get('/slider','SliderController@index')->name('slider.sliderlist');
        Route::get('/slider/addslider','SliderController@addSlider')->name('slider.slideradd'); 
        Route::get('/slider/editslider/{id}','SliderController@editSlider')->name('slider.slideredit')->where('id', '[0-9]+'); 
        Route::patch('/slider/update/{id}','SliderController@updateSlider')->name('slider.recupdate')->where('id', '[0-9]+');
        Route::post('/slider/addslidersubmit','SliderController@addSliderSubmit')->name('slider.recaddsubmit');  
        Route::get('/slider/delete/{id}','SliderController@delete')->name('slider.recdelete')->where('id', '[0-9]+'); 
        Route::get('/slider/updatestatus/{id}/{status}','SliderController@updateStatus')->name('slider.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/slidermanager/deleteAll','SliderController@deleteAll')->name('slider.deleteall');

        /* Testimonial route */
        Route::get('/testimonial','TestimonialController@index')->name('testimonial.testimoniallist');
        Route::get('/testimonial/addtestimonial','TestimonialController@addTestimonial')->name('testimonial.testimonialadd'); 
        Route::get('/testimonial/edittestimonial/{id}','TestimonialController@editTestimonial')->name('testimonial.testimonialedit')->where('id', '[0-9]+'); 
        Route::patch('/testimonial/update/{id}','TestimonialController@updateTestimonial')->name('testimonial.recupdate')->where('id', '[0-9]+');
        Route::post('/testimonial/addtestimonialsubmit','TestimonialController@addTestimonialSubmit')->name('testimonial.recaddsubmit');  
        Route::get('/testimonial/delete/{id}','TestimonialController@delete')->name('testimonial.recdelete')->where('id', '[0-9]+'); 
        Route::get('/testimonial/updatestatus/{id}/{status}','TestimonialController@updateStatus')->name('testimonial.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/testimonialmanager/deleteAll','TestimonialController@deleteAll')->name('testimonial.deleteall');

        /* Client route */
        Route::get('/client','ClientController@index')->name('client.clientlist');
        Route::get('/client/addclient','ClientController@addClient')->name('client.clientadd'); 
        Route::get('/client/editclient/{id}','ClientController@editClient')->name('client.clientedit')->where('id', '[0-9]+'); 
        Route::patch('/client/update/{id}','ClientController@updateClient')->name('client.recupdate')->where('id', '[0-9]+');
        Route::post('/client/addclientsubmit','ClientController@addClientSubmit')->name('client.recaddsubmit');  
        Route::get('/client/delete/{id}','ClientController@delete')->name('client.recdelete')->where('id', '[0-9]+'); 
        Route::get('/client/updatestatus/{id}/{status}','ClientController@updateStatus')->name('client.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/clientmanager/deleteAll','ClientController@deleteAll')->name('client.deleteall');

        /* Destination route */
        Route::get('/destination','DestinationController@index')->name('destination.destinationlist');
        Route::get('/destination/adddestination','DestinationController@addDestination')->name('destination.destinationadd'); 
        Route::get('/destination/editdestination/{id}','DestinationController@editDestination')->name('destination.destinationedit')->where('id', '[0-9]+'); 
        Route::patch('/destination/update/{id}','DestinationController@updateDestination')->name('destination.recupdate')->where('id', '[0-9]+');
        Route::post('/destination/adddestinationsubmit','DestinationController@addDestinationSubmit')->name('destination.recaddsubmit');  
        Route::get('/destination/delete/{id}','DestinationController@delete')->name('destination.recdelete')->where('id', '[0-9]+'); 
        Route::get('/destination/updatestatus/{id}/{status}','DestinationController@updateStatus')->name('destination.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/destinationmanager/deleteAll','DestinationController@deleteAll')->name('destination.deleteall');

        /* Service route */
        Route::get('/service','ServiceController@index')->name('service.servicelist');
        Route::get('/service/addservice','ServiceController@addService')->name('service.serviceadd'); 
        Route::get('/service/editservice/{id}','ServiceController@editService')->name('service.serviceedit')->where('id', '[0-9]+'); 
        Route::patch('/service/update/{id}','ServiceController@updateService')->name('service.recupdate')->where('id', '[0-9]+');
        Route::post('/service/addservicesubmit','ServiceController@addServiceSubmit')->name('service.recaddsubmit');  
        Route::get('/service/delete/{id}','ServiceController@delete')->name('service.recdelete')->where('id', '[0-9]+'); 
        Route::get('/service/updatestatus/{id}/{status}','ServiceController@updateStatus')->name('service.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/servicemanager/deleteAll','ServiceController@deleteAll')->name('service.deleteall');

        /* FAQ route */
        Route::get('/faq','FaqController@index')->name('faq.faqlist');
        Route::get('/faq/addfaq','FaqController@addFaq')->name('faq.faqadd'); 
        Route::get('/faq/editfaq/{id}','FaqController@editFaq')->name('faq.faqedit')->where('id', '[0-9]+'); 
        Route::patch('/faq/update/{id}','FaqController@updateFaq')->name('faq.recupdate')->where('id', '[0-9]+');
        Route::post('/faq/addfaqsubmit','FaqController@addFaqSubmit')->name('faq.recaddsubmit');  
        Route::get('/faq/delete/{id}','FaqController@delete')->name('faq.recdelete')->where('id', '[0-9]+'); 
        Route::get('/faq/updatestatus/{id}/{status}','FaqController@updateStatus')->name('faq.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/faqmanager/deleteAll','FaqController@deleteAll')->name('faq.deleteall');

        /* category route */
        Route::get('/category','CategoryController@index')->name('category.categorylist');
        Route::get('/category/addcategory','CategoryController@addCategory')->name('category.categoryadd'); 
        Route::get('/category/editcategory/{id}','CategoryController@editCategory')->name('category.categoryedit')->where('id', '[0-9]+'); 
        Route::patch('/category/update/{id}','CategoryController@updateCategory')->name('category.recupdate')->where('id', '[0-9]+');
        Route::post('/category/addcategorysubmit','CategoryController@addCategorySubmit')->name('category.recaddsubmit');  
        Route::get('/category/delete/{id}','CategoryController@delete')->name('category.recdelete')->where('id', '[0-9]+'); 
        Route::get('/category/updatestatus/{id}/{status}','CategoryController@updateStatus')->name('category.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/categorymanager/deleteAll','CategoryController@deleteAll')->name('category.deleteall');

        /* News route */
        Route::get('/news','NewsdataController@index')->name('news.newslist');
        Route::get('/news/addnews','NewsdataController@addNews')->name('news.newsadd'); 
        Route::get('/news/editnews/{id}','NewsdataController@editNews')->name('news.newsedit')->where('id', '[0-9]+'); 
        Route::patch('/news/update/{id}','NewsdataController@updateNews')->name('news.recupdate')->where('id', '[0-9]+');
        Route::post('/news/addnewssubmit','NewsdataController@addNewsSubmit')->name('news.recaddsubmit');  
        Route::get('/news/delete/{id}','NewsdataController@delete')->name('news.recdelete')->where('id', '[0-9]+'); 
        Route::get('/news/updatestatus/{id}/{status}','NewsdataController@updateStatus')->name('news.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/newsmanager/deleteAll','NewsdataController@deleteAll')->name('news.deleteall');

        /* Pacakage route */
        Route::get('/package','PackageController@index')->name('package.packagelist');
        Route::get('/package/addpackage','PackageController@addPackage')->name('package.packageadd'); 
        Route::get('/package/editpackage/{id}','PackageController@editPackage')->name('package.packageedit')->where('id', '[0-9]+'); 
        Route::patch('/package/update/{id}','PackageController@updatePackage')->name('package.recupdate')->where('id', '[0-9]+');
        Route::post('/package/addpackagesubmit','PackageController@addPackageSubmit')->name('package.recaddsubmit');  
        Route::get('/package/delete/{id}','PackageController@delete')->name('package.recdelete')->where('id', '[0-9]+'); 
        Route::post('/package/deleteimage','PackageController@deleteImage')->name('package.recdeleteimage'); 
        Route::get('/package/updatestatus/{id}/{status}','PackageController@updateStatus')->name('package.recupdatestatus')->where('id', '[0-9]+')->where('status', '[0-9]+'); 
        Route::post('/packagemanager/deleteAll','PackageController@deleteAll')->name('package.deleteall');


        /* Payment route */
        Route::get('/payment','PaymentController@index')->name('payment.paymentlist');
        Route::get('/payment/delete/{id}','PaymentController@delete')->name('payment.paymentdelete')->where('id', '[0-9]+'); 
        Route::post('/payment/deleteAll','PaymentController@deleteAll')->name('payment.deleteall'); 

    });
});
