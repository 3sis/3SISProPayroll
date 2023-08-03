<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Config\Geographic\LocationController;
use App\Http\Controllers\Config\Geographic\CityController;
use App\Http\Controllers\Config\Geographic\StateController;
use App\Http\Controllers\Config\Geographic\CountryController;
use App\Http\Controllers\Config\FiscalYear\WeeklyOffController;

Route::group(['middleware' => ['guest']], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('login');
        Route::post('login', 'login')->name('login_check');
    });
});

Route::group(['middleware' => ['auth']], function () {

    Route::controller(AuthController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
        Route::get('home', 'home')->name('home');
        // Route::get('fastpath','fastpath');
    });

    // Location Master
    Route::controller(LocationController::class)->group(function () {
        // Route::get('/','index');
        Route::get('location', 'index')->name('location');
        Route::get('location/add', 'add')->name('add_location');
        Route::get('edit_location/{id}', 'edit_location')->name('edit_location');
        Route::post('submit_location', 'submit_location');
        Route::post('delete_restore', 'delete_restore');
        Route::get('get_city_desc', 'getCityDesc')->name('get_city_desc');
        Route::get('delete_location_list', 'delete_location_list');
    });
    // City Master
    Route::controller(CityController::class)->group(function () {
        // Route::get('/','index');
        Route::get('city', 'index')->name('city');
        Route::get('city/add', 'add')->name('add_city');
        Route::get('edit_city/{id}', 'edit_city')->name('edit_city');
        Route::post('submit_city', 'submit_city');
        Route::post('city_restore', 'city_restore');
        Route::get('get_State_desc', 'getStateDesc')->name('get_State_desc');
        Route::get('delete_city_list', 'delete_city_list');
    });
     // State Master
     Route::controller(StateController::class)->group(function () {
        // Route::get('/','index');
        Route::get('state', 'index')->name('state');
        Route::get('state/add', 'add')->name('add_state');
        Route::get('edit_state/{id}', 'edit_state')->name('edit_state');
        Route::post('submit_state', 'submit_state');
        Route::post('state_restore', 'state_restore');
        Route::get('delete_state_list', 'delete_state_list');
    });
     // Country Master
     Route::controller(CountryController::class)->group(function () {
        // Route::get('/','index');
        Route::get('country', 'index')->name('country');
        Route::get('country/add', 'add')->name('add_country');
        Route::get('edit_country/{id}', 'edit_country')->name('edit_country');
        Route::post('submit_country', 'submit_country');
        Route::post('country_restore', 'country_restore');
        Route::get('delete_country_list', 'delete_country_list');
    });
    // WeeklyOff
    Route::controller(WeeklyOffController::class)->group(function () {
        Route::get('weeklyOff', 'index');
        // Route::get('weeklyOff/{action?}/{id?}', 'index');
        Route::get('weeklyOff_report/{type}', 'report');
        Route::get('get_weeklyOff', 'weeklyOff_list');
        Route::get('get_weeklyOffDetail', 'weeklyOffDetail_list')->name('get_weeklyOffDetail');
        Route::post('weeklyOff_save', 'save');
        Route::get('get_fydate', 'getFYDate')->name('get_fydate');
        Route::get('new_form', 'new_form')->name('new_form');
    });
});

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::get('/home', function () {
//     return view('index');
// });


Route::get('/index2.html', function () {
    return view('template.index2');
});

Route::get('/component-modal.html', function () {
    return view('template.component-modal');
});



Route::get('/form-bootstrap-basic.html', function () {
    return view('template.form-bootstrap-basic');
});


Route::get('/form-validation.html', function () {
    return view('template.form-validation');
});

Route::get('/login', function () {
    return view('template.form-validation');
});

Route::get('/table-basic.html', function () {
    return view('template.table-basic');
});

Route::get('/table-datatable-basic.html', function () {
    return view('template.table-datatable-basic');
});

Route::get('/table-datatable-striped-table.html', function () {
    return view('template.table-datatable-striped-table');
});


Route::get('/table-datatable-custom.html', function () {
    return view('template.table-datatable-custom');
});


Route::get('/table-datatable-miscellaneous.html', function () {
    return view('template.table-datatable-miscellaneous');
});

Route::get('/icon', function () {
    return view('template.component-fonticons');
});

Route::get('/component-notifications.html', function () {
    return view('template.component-notifications');
});
