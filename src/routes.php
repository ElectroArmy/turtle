<?php

Route::group(['middleware' => 'web'], function () {
    // app routes
    Route::get('/', config('turtle.controllers.app') . '@index')->name('index');
    Route::get('home', config('turtle.controllers.app') . '@indexRedirect');
    Route::get('dashboard', config('turtle.controllers.app') . '@dashboard')->name('dashboard');
    Route::get('delete/{route}/{id}', config('turtle.controllers.app') . '@deleteModal')->name('delete');
    Route::group(['middleware' => 'allow:contact'], function () {
        Route::get('contact', config('turtle.controllers.app') . '@contactForm')->name('contact');
        Route::post('contact', config('turtle.controllers.app') . '@contact');
    });

    // auth routes
    Route::get('login', config('turtle.controllers.auth') . '@loginForm')->name('login');
    Route::post('login', config('turtle.controllers.auth') . '@login');
    Route::get('logout', config('turtle.controllers.auth') . '@logout')->name('logout');
    Route::group(['middleware' => 'allow:registration'], function () {
        Route::get('register', config('turtle.controllers.auth') . '@registerForm')->name('register');
        Route::post('register', config('turtle.controllers.auth') . '@register');
    });
    Route::get('profile', config('turtle.controllers.auth') . '@profileForm')->name('profile');
    Route::patch('profile', config('turtle.controllers.auth') . '@profile');
    Route::get('password/email', config('turtle.controllers.auth') . '@passwordEmailForm')->name('password.email');
    Route::post('password/email', config('turtle.controllers.auth') . '@passwordEmail');
    Route::get('password/reset/{token?}', config('turtle.controllers.auth') . '@passwordResetForm')->name('password.reset');
    Route::post('password/reset', config('turtle.controllers.auth') . '@passwordReset');
    Route::get('password/change', config('turtle.controllers.auth') . '@passwordChangeForm')->name('password.change');
    Route::patch('password/change', config('turtle.controllers.auth') . '@passwordChange');

    // role routes
    Route::get('roles', config('turtle.controllers.role') . '@index')->name('roles');
    Route::get('roles/datatable', config('turtle.controllers.role') . '@indexDatatable')->name('roles.datatable');
    Route::get('roles/create', config('turtle.controllers.role') . '@createModal')->name('roles.create');
    Route::post('roles/create', config('turtle.controllers.role') . '@create');
    Route::get('roles/update/{id}', config('turtle.controllers.role') . '@updateModal')->name('roles.update');
    Route::patch('roles/update/{id}', config('turtle.controllers.role') . '@update');
    Route::delete('roles/delete', config('turtle.controllers.role') . '@delete')->name('roles.delete');

    // user routes
    Route::get('users', config('turtle.controllers.user') . '@index')->name('users');
    Route::get('users/datatable', config('turtle.controllers.user') . '@indexDatatable')->name('users.datatable');
    Route::get('users/create', config('turtle.controllers.user') . '@createModal')->name('users.create');
    Route::post('users/create', config('turtle.controllers.user') . '@create');
    Route::get('users/update/{id}', config('turtle.controllers.user') . '@updateModal')->name('users.update');
    Route::patch('users/update/{id}', config('turtle.controllers.user') . '@update');
    Route::get('users/password/{id}', config('turtle.controllers.user') . '@passwordModal')->name('users.password');
    Route::patch('users/password/{id}', config('turtle.controllers.user') . '@password');
    Route::delete('users/delete', config('turtle.controllers.user') . '@delete')->name('users.delete');
    Route::get('users/activity/{id}', config('turtle.controllers.user') . '@activity')->name('users.activity');
    Route::get('users/activity/datatable/{id}', config('turtle.controllers.user') . '@activityDatatable')->name('users.activity.datatable');
    Route::get('users/activity/data/{id}', config('turtle.controllers.user') . '@activityDataModal')->name('users.activity.data');
});