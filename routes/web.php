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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// website routes
Route::get('/','websiteController@index')->name('website_index');
Route::get('/contact','websiteController@contact')->name('website_contact');
Route::post('/contact/send-message','websiteController@message')->name('website_send_message');

// admin routes
Route::get('/admin','adminController@view')->name('admin_index')->middleware('auth');
Route::group(['namespace' => 'admin','middleware' => 'auth'],function () {
    // user info route
    Route::get('/admin/user','userController@index')->name('user_index');
    Route::post('/admin/add-user','userController@add')->name('user_add');
    // Route::get('/admin/view-user/{slug}','userController@view')->name('user_view');
    Route::get('/admin/view-user-modal/{slug}','userController@viewm')->name('user_viewm');
    Route::post('/admin/update-user-modal/{slug}','userController@update')->name('user_update');
    Route::get('/admin/update-user-soft-delete/{slug}','userController@softdelete')->name('user_soft_delete');
    Route::get('/admin/update-user-restore/{slug}','userController@restore')->name('user_restore');
    Route::get('/admin/update-user-hard-delete/{slug}','userController@harddelete')->name('user_hard_delete');
    // user settings
    Route::get('/admin/user/settings/{slug}','userController@user_setting')->name('user_settings');
    Route::post('/admin/user/setting/change/{slug}','userController@user_setting_change')->name('user_setting_change');
    Route::get('/admin/user/profile/{slug}','userController@user_profile')->name('user_profile');
    // user role controll route
    Route::get('/admin/user-role','userRoleController@index')->name('user_role_index');
    Route::post('/admin/user-role-add','userRoleController@add')->name('user_role_add');
    Route::post('/admin/user-role-update/{slug}','userRoleController@update')->name('user_role_update');
    Route::get('/admin/user-role-delete/{slug}','userRoleController@delete')->name('user_role_delete');
    // contact message routes
    Route::get('/admin/message','messageController@index')->name('message_index');
    Route::post('/admin/message/soft_delete_multiple/{id}', 'messageController@soft_delete_multiple')->name('soft_delete_multiple');
    Route::post('/admin/message/hard_delete_multiple/{id}', 'messageController@hard_delete_multiple')->name('hard_delete_multiple');
    Route::get('/admin/message/trash', 'messageController@trashView')->name('message_trash');
    Route::get('/admin/message/view/{slug}', 'messageController@view')->name('message_view');
    // social links
    Route::get('/admin/social-links', 'SocialLinkController@index')->name('social_link');
    Route::post('/admin/social-links-add', 'SocialLinkController@add')->name('social_link_add');
    Route::post('/admin/social-links-update/{slug}', 'SocialLinkController@update')->name('social_link_update');
    Route::get('/admin/social-links-delete/{slug}', 'SocialLinkController@delete')->name('social_link_delete');
    //test blade
    Route::get('/admin/test', 'frontendController@index')->name('test');
    // banner routes
    Route::get('/admin/banner', 'bannerController@index')->name('banner');
    Route::post('/admin/banner', 'bannerController@add')->name('add_banner');
    Route::get('/admin/banner/view/{id}', 'bannerController@view')->name('view_banner');
});


// blank pages
Route::get('/admin/blank/index','adminController@blank_index')->name('blank_page_index')->middleware('auth');
Route::get('/admin/blank/add','adminController@blank_add')->name('blank_page_add')->middleware('auth');
Route::get('/admin/blank/view','adminController@blank_view')->name('blank_page_view')->middleware('auth');
Route::get('/admin/blank/all','adminController@blank_all')->name('blank_page_all_in_one')->middleware('auth');
Route::get('/admin/blank/test','adminController@test')->name('blank_page_test')->middleware('auth');

// Ajax Crud
Route::get('/admin/ajax','AjaxController@index')->name('ajax_index')->middleware('auth');
Route::post('/admin/ajax/add','AjaxController@add')->name('ajax_index_add')->middleware('auth');
Route::post('/admin/ajax/delete','AjaxController@delete')->name('ajax_index_delete')->middleware('auth');
Route::get('/admin/ajax/view/{id}','AjaxController@view')->name('ajax_index_view')->middleware('auth');
Route::post('/admin/ajax/update','AjaxController@update')->name('ajax_index_update')->middleware('auth');
