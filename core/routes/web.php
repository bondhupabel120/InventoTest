<?php

use Illuminate\Support\Facades\Route;

/*Frontend*/
Route::get('/', 'IndexController@index')->name('index');
Route::get('/company/details/{id}', 'IndexController@companyDetails')->name('company.details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Admin Panel*/
Route::group(['prefix' => 'admin'], function (){
    /*Admin Login*/
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Admin\LoginController@login');
    /*Admin Register*/
    Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Admin\RegisterController@register');

    Route::middleware('auth:admin')->group(function (){
        Route::get('/home', 'AdminController@index')->name('admin.home');
        Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
        /*Admin Profile Edit*/
        Route::get('/edit/profile', 'Admin\AdminController@editAdminProfile')->name('edit.admin.profile');
        Route::post('/update/profile', 'Admin\AdminController@updateAdminProfile')->name('update.admin.profile');
        /*Category*/
        Route::get('/add/category', 'CategoryController@addCategory')->name('add.category');
        Route::post('/save/category', 'CategoryController@saveCategory')->name('save.category');
        Route::get('/manage/category', 'CategoryController@manageCategory')->name('manage.category');
        Route::get('/edit/category/{id}', 'CategoryController@editCategory')->name('edit.category');
        Route::post('/update/category', 'CategoryController@updateCategory')->name('update.category');
        Route::post('/delete/category', 'CategoryController@deleteCategory')->name('delete.category');
        /*Company*/
        Route::get('/add/company', 'CompanyController@addCompany')->name('add.company');
        Route::post('/save/company', 'CompanyController@saveCompany')->name('save.company');
        Route::get('/manage/company', 'CompanyController@manageCompany')->name('manage.company');
        Route::get('/edit/company/{id}', 'CompanyController@editCompany')->name('edit.company');
        Route::post('/update/company', 'CompanyController@updateCompany')->name('update.company');
        Route::post('/delete/company', 'CompanyController@deleteCompany')->name('delete.company');

    });
});
