<?php

use App\Http\Controllers\FrontEndController;
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
Route::group(['namespace'=>'App\Http\Controllers'],function(){
    Route::get('/','LoginController@Login')->name('loginpage');// this for loginform  page
    Route::post('/do-login','LoginController@DoLogin')->name('dologinpage');// it shows how we logins


    //Route::get('/adminlogin','AdminController@AdminLogin')->name('adminpage');// this for loginform  page
    //Route::post('/admin-do-login','AdminController@AdminDoLogin')->name('admindologinpage');//it shows how we logins

    //Route::get('/admin/welcome','AdminController@Adminwelcome')->name('adminwelcomepage')->middleware('admin_auth');
Route::group(['middleware'=>'user_auth'],function(){
        //these routes after loging we use
    Route::get('/logout','LoginController@LogOut')->name('logoutpage');//this is for log out

    Route::get('/index','FrontEndController@index')->name('indexpage');

    Route::get('/export','FrontEndController@Export')->name('exportpage');

    
    Route::get('/pdf','FrontEndController@PDF')->name('pdfpage');
  

    Route::get("/about",'FrontEndController@About')->name('aboutpage');

    Route::get("/contact",'FrontEndController@Contact')->name('contactpage');

    Route::get("/email",'FrontEndController@Email')->name('emailpage');

    Route::get("/home",'FrontEndController@Home')->name('homepage');

    Route::get("/newform",'FrontEndController@New')->name('new.userpage');

    Route::post("/saveform",'FrontEndController@Saveform')->name('save.formpage');

    Route::get("/viewform/{userId}",'FrontEndController@Viewform')->name('view.formpage');

    Route::get("/editform/{userId}",'FrontEndController@Editform')->name('edit.formpage');
    Route::post("/updateform",'FrontEndController@Updateform')->name('update.formpage');

    Route::get("/deleteform/{userId}",'FrontEndController@Deleteform')->name('delete.formpage');

    Route::get("/activate-user/{userId}",'FrontEndController@Activate')->name('activate.formpage');

    Route::get("/force-delete-user/{userId}",'FrontEndController@Force')->name('force.formpage');

    Route::get("/admin",'FrontEndController@Admin')->name('adminpage');

});

});
