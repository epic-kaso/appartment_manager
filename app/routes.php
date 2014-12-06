<?php

    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the Closure to execute when that URI is requested.
    |
    */

    Route::get('/',
        [
            'as'   => 'home',
            'uses' => 'AppartmentManager\Controllers\HomeController@index'
        ]
    );
    //Tenant Dashboard CRUD routes
    Route::controller(
        'residents/profile',
        'AppartmentManager\Controllers\Tenant\ProfileController'
    );
    //Complaints CRUD routes
    Route::resource(
        'residents/complaints',
        'AppartmentManager\Controllers\Tenant\ComplaintsController'
    );
    //Tenant Auth Controller
    Route::controller(
        'residents',
        'AppartmentManager\Controllers\Tenant\Auth\AuthController'
    );

    Route::resource(
        'residents',
        'AppartmentManager\Controllers\Tenant\DashboardController'
    );


    //Admin Categories CRUD routes
    Route::resource('admin', 'AppartmentManager\Controllers\Admin\AdminController');
    //Tenant Auth Controller
    Route::controller('admin/auth', 'AppartmentManager\Controllers\Admin\Auth\AuthController');
    //Admin Complaints
    Route::resource('admin-complaints', 'AppartmentManager\Controllers\Admin\AdminComplaintsController');

    //appartment CRUD routes
    Route::resource('appartment', 'AppartmentManager\Controllers\Admin\AppartmentController');
    //Tenant CRUD routes
    Route::resource('tenant', 'AppartmentManager\Controllers\Admin\TenantController');

    //Complaints Categories CRUD routes
    Route::resource('complaints/category', 'AppartmentManager\Controllers\Admin\ComplaintsCategoryController');

    Route::controller(
        'admin-dashboard/profile',
        'AppartmentManager\Controllers\Admin\ProfileController'
    );

    //Tenant Dashboard CRUD routes
    Route::resource(
        'admin-dashboard',
        'AppartmentManager\Controllers\Admin\DashboardController'
    );
