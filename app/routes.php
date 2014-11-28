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

    Route::get('/', 'AppartmentManager\Controllers\HomeController@index');

    //appartment CRUD routes
    Route::resource('appartment', 'AppartmentManager\Controllers\Admin\AppartmentController');
    //Tenant CRUD routes
    Route::resource('tenant', 'AppartmentManager\Controllers\Admin\TenantController');

    //Complaints Categories CRUD routes
    Route::resource('complaints/category', 'AppartmentManager\Controllers\Admin\ComplaintsCategoryController');
    //Complaints CRUD routes
    Route::resource('complaints', 'AppartmentManager\Controllers\Tenant\ComplaintsController');
    //Admin Categories CRUD routes
    Route::resource('admin', 'AppartmentManager\Controllers\Admin\AdminController');
    //Tenant Auth Controller
    Route::controller('admin/auth', 'AppartmentManager\Controllers\Admin\Auth\AuthController');
    //Admin Complaints
    Route::resource('admin-complaints', 'AppartmentManager\Controllers\Admin\AdminComplaintsController');
    //Tenant Auth Controller
    Route::controller('tenant/auth', 'AppartmentManager\Controllers\Tenant\Auth\AuthController');
    //Tenant Dashboard CRUD routes
    Route::resource(
        'tenant-dashboard',
        'AppartmentManager\Controllers\Tenant\DashboardController'
    );
    Route::resource(
        'tenant-dashboard.profile',
        'AppartmentManager\Controllers\Tenant\ProfileController'
    );
    //Tenant Dashboard CRUD routes
    Route::resource(
        'admin-dashboard',
        'AppartmentManager\Controllers\Admin\DashboardController'
    );
