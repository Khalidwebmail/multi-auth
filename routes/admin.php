<?php

Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\LoginController@login')->name('admin.login.submit');
Route::get('admin/home', 'Admin\HomeController@index')->name('admin.home');

