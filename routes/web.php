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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware'=>'auth.check'], function (){

    Route::group(['prefix'=>'/admin/dashboard','middleware'=>'admin.check'],function (){
        Route::get('/','Controller@getDashboard')->name('dashboard');

        Route::post('/slider/manage','SliderController@manageSlider')->name('manage_slider');

        Route::post('/change_about','Controller@changeAbout')->name('change_about');

        Route::get('/manage_branches','BranchController@getManageBranches')->name('manage_branches');

        Route::post('/create/branch','BranchController@addBranch')->name('create_branch');

        Route::get('/branch/delete/{id}','BranchController@deleteBranch');

        Route::post('/branch/update','BranchController@updateBranch')->name('branch_update');

        Route::get('/activity/make','ActivityController@getMakeActivity')->name('add_activity');

        Route::post('/activity/make','ActivityController@makeActivity')->name('make_activity');

        Route::get('/activity/manage','ActivityController@getManageActivity')->name('manage_activities');

        Route::get('/activity/delete/{id}','ActivityController@deleteActivity')->name('delete_activity');

        Route::post('/activity/update','ActivityController@updateActivity')->name('update_activity');

        Route::get('/partner/manage', 'PartnerController@getManagePartners')->name('manage_partners');

        Route::post('/partner/add','PartnerController@addPartner')->name('create_partner');

        Route::post('/partner/update','PartnerController@updatePartner')->name('update_partner');

        Route::get('/partner/delete/{id}','PartnerController@deletePartner')->name('delete_partner');

        Route::get('/service/manage','ServiceController@getManageServices')->name('manage_services');

        Route::post('/service/update','ServiceController@updateService')->name('service_update');

        Route::get('/service/add','ServiceController@getAddService')->name('add_service');

        Route::post('/service/add','ServiceController@addService')->name('make_service');

        Route::get('/service/delete/{id}','ServiceController@deleteService')->name('service_delete');

        Route::get('/job/add','JobController@getAddJob')->name('add_job');

        Route::post('/job/added','JobController@addJob')->name('job_added');

        Route::get('/job/manage','JobController@getManageJob')->name('manage_job');

        Route::post('/job/update','JobController@updateJob')->name('update_job');

        Route::get('/job/delete/{id}','JobController@deleteJob');

        Route::get('/announcement/add','AnnouncementController@getMakeAnnouncement')->name('make_announcement');

        Route::post('/announcement/added','AnnouncementController@makeAnnouncement')->name('announcement_made');

        Route::get('/announcement/manage','AnnouncementController@getManageAnnouncement')->name('manage_announcement');

        Route::get('/announcement/delete/{id}','AnnouncementController@deleteAnnouncement');

        Route::post('/announcement/update','AnnouncementController@updateAnnouncement')->name('update_announcement');

        Route::get('/manage/users','UserController@getManageUsers')->name('manage_users');

        Route::post('/make/admin','UserController@manageUser')->name('manage_user');

        Route::get('/gallery','GalleryController@getGallery')->name('get_gallery');

        Route::post('/gallery/manage','GalleryController@manageGallery')->name('manage_gallery');

        Route::get('/contactInfo','Controller@getContactInfo')->name('contact_info');

        Route::post('/contactInfo/manage','Controller@manageContacts')->name('manage_contact_info');

        Route::post('/contactInfo/create','Controller@addContactInfo')->name('create_contact');

        });
    Route::get('/logout','UserController@logout')->name('logout');
});

Route::group(['prefix' =>'/profile','middleware'=>'auth.check'], function (){
    Route::get('/','UserController@viewProfile')->name('profile');

    Route::post('/change/photo','UserController@changeProfilePic')->name('change_profile_pic');

    Route::get('/delete/photo','UserController@deleteProfilePic')->name('delete_profile_pic');

    Route::post('/change/username','UserController@changeUsername')->name('change_username');

    Route::post('/change/email','UserController@changeEmail')->name('change_email');

});

Route::get('/','Controller@getIndex');

Route::get('/about','Controller@getAbout')->name('about');

Route::get('/activities','ActivityController@getActivities')->name('activities');

Route::get('/announcements','AnnouncementController@getAnnouncements')->name('announcements');

Route::get('/contact_us','Controller@getContact')->name('contact_us');

Route::get('/register','UserController@getRegister')->name('get_register');;

Route::post('/registered','UserController@register')->name('register');

Route::get('/login', 'UserController@getLogin');

Route::post('/login/attempt','UserController@attemptLogin')->name('login');

Route::post('/search','Controller@search')->name('search');



