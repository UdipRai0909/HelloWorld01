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
//
Route::view('/', 'home');

Auth::routes();

// Route::get('customers', function() {

    //     $customers = [

    //         'Udip Rai',
    //         'Utsa Rai',
    //         'DB Yakkha',
    //         'Bindu Chamling Rai'

    //     ];

    //     return view('tests.01_customer', [

    //         'customers' => $customers,
    //     ]);
    // });
//
// Navbar Routes
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('about', function () {
        return view('tests.01_about');
    })->middleware('test');
    
    //Contact Form Route
        Route::get('contact','ContactFormController@create')->name('contact.create');
        Route::post('contact','ContactFormController@store')->name('contact.store');

//
// Customers Routes Resource Controllers from the Documentation
Route::resource('customers', 'CustomersController'); 
// Route::resource('customers', 'CustomersController') -> middlewareE('auth'); 
    // Route::get('customers', 'CustomersController@index');
        // Route::get('customers/create', 'CustomersController@create');
        // Route::post('customers', 'CustomersController@store');
        // Route::get('customers/{customer}', 'CustomersController@show');
        // Route::get('customers/{customer}/edit', 'CustomersController@edit');
        // Route::patch('customers/{customer}', 'CustomersController@update');
        // Route::delete('customers/{customer}', 'CustomersController@destroy');






    
    // Route::
//

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
