<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Config\Geographic\LocationController;
use App\Http\Controllers\Config\Geographic\CityController;
use App\Http\Controllers\Config\Geographic\StateController;
use App\Http\Controllers\Config\Geographic\CountryController;
use App\Http\Controllers\Config\FiscalYear\WeeklyOffController;
use App\Http\Controllers\Payroll\EmployeeStatus\DepartmentController;
use App\Http\Controllers\Payroll\EmployeeStatus\DesignationController;
use App\Http\Controllers\Payroll\EmployeeStatus\GradeController;
use App\Http\Controllers\Payroll\EmployeeStatus\TypeController;
use App\Http\Controllers\LMS\LeaveGroupController;
use App\Http\Controllers\Config\GeneralMaster\BloodGroupController;
use App\Http\Controllers\Config\GeneralMaster\CurrencyController;
use App\Http\Controllers\Config\GeneralMaster\GenderController;
use App\Http\Controllers\Config\GeneralMaster\NationalityController;
use App\Http\Controllers\Config\GeneralMaster\RaceController;
use App\Http\Controllers\Config\GeneralMaster\SalutationController;
use App\Http\Controllers\Payroll\EmployeeMaster\GeneralInfoController;
use App\Http\Controllers\Payroll\EmployeeMaster\EmployeeActionController;
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
    // department Master
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('department', 'index')->name('department');
        Route::get('department/add', 'add')->name('add_department');
        Route::get('edit_department/{id}', 'edit_department')->name('edit_department');
        Route::post('submit_department', 'submit_department');
        Route::post('department_restore', 'department_restore');
        Route::get('delete_department_list', 'delete_department_list');
    });
    // designation Master
    Route::controller(DesignationController::class)->group(function () {
        Route::get('designation', 'index')->name('designation');
        Route::get('designation/add', 'add')->name('add_designation');
        Route::get('edit_designation/{id}', 'edit_designation')->name('edit_designation');
        Route::post('submit_designation', 'submit_designation');
        Route::post('designation_restore', 'designation_restore');
        Route::get('delete_designation_list', 'delete_designation_list');
    });
    // Grade Master
    Route::controller(GradeController::class)->group(function () {
        Route::get('grade', 'index')->name('grade');
        Route::get('grade/add', 'add')->name('add_grade');
        Route::get('edit_grade/{id}', 'edit_grade')->name('edit_grade');
        Route::post('submit_grade', 'submit_grade');
        Route::post('grade_restore', 'grade_restore');
        Route::get('delete_grade_list', 'delete_grade_list');
    });
    // Type Master
    Route::controller(TypeController::class)->group(function () {
        Route::get('type', 'index')->name('type');
        Route::get('type/add', 'add')->name('add_type');
        Route::get('edit_type/{id}', 'edit_type')->name('edit_type');
        Route::post('submit_type', 'submit_type');
        Route::post('type_restore', 'type_restore');
        Route::get('delete_type_list', 'delete_type_list');
    });
    // Leave Group
    Route::controller(LeaveGroupController::class)->group(function () {
        Route::get('leavegroup', 'index')->name('leavegroup');
        Route::get('leavegroup/add', 'add')->name('add_leavegroup');
        Route::get('edit_leavegroup/{id}', 'edit_leavegroup')->name('edit_leavegroup');
        Route::post('submit_leavegroup', 'submit_leavegroup');
        Route::post('leavegroup_restore', 'leavegroup_restore');
        Route::get('delete_leavegroup_list', 'delete_leavegroup_list');
    });
    // Salutation Master
    Route::controller(SalutationController::class)->group(function () {
        Route::get('salutation', 'index')->name('salutation');
        Route::get('salutation/add', 'add')->name('add_salutation');
        Route::get('edit_salutation/{id}', 'edit_salutation')->name('edit_salutation');
        Route::post('submit_salutation', 'submit_salutation');
        Route::post('salutation_restore', 'salutation_restore');
        Route::get('delete_salutation_list', 'delete_salutation_list');
    });
     // Gender Master
     Route::controller(GenderController::class)->group(function () {
        Route::get('gender', 'index')->name('gender');
        Route::get('gender/add', 'add')->name('add_gender');
        Route::get('edit_gender/{id}', 'edit_gender')->name('edit_gender');
        Route::post('submit_gender', 'submit_gender');
        Route::post('gender_restore', 'gender_restore');
        Route::get('delete_gender_list', 'delete_gender_list');
    });
     // Blood Master
     Route::controller(BloodGroupController::class)->group(function () {
        Route::get('blood', 'index')->name('blood');
        Route::get('blood/add', 'add')->name('add_blood');
        Route::get('edit_blood/{id}', 'edit_blood')->name('edit_blood');
        Route::post('submit_blood', 'submit_blood');
        Route::post('blood_restore', 'blood_restore');
        Route::get('delete_blood_list', 'delete_blood_list');
    });
     // Nationality Master
     Route::controller(NationalityController::class)->group(function () {
        Route::get('nationality', 'index')->name('nationality');
        Route::get('nationality/add', 'add')->name('add_nationality');
        Route::get('edit_nationality/{id}', 'edit_nationality')->name('edit_nationality');
        Route::post('submit_nationality', 'submit_nationality');
        Route::post('nationality_restore', 'nationality_restore');
        Route::get('delete_nationality_list', 'delete_nationality_list');
    });
     // Race Master
     Route::controller(RaceController::class)->group(function () {
        Route::get('race', 'index')->name('race');
        Route::get('race/add', 'add')->name('add_race');
        Route::get('edit_race/{id}', 'edit_race')->name('edit_race');
        Route::post('submit_race', 'submit_race');
        Route::post('race_restore', 'race_restore');
        Route::get('delete_race_list', 'delete_race_list');
    });
     // Currency Master
     Route::controller(CurrencyController::class)->group(function () {
        Route::get('currency', 'index')->name('currency');
        Route::get('currency/add', 'add')->name('add_currency');
        Route::get('edit_currency/{id}', 'edit_currency')->name('edit_currency');
        Route::post('submit_currency', 'submit_currency');
        Route::post('currency_restore', 'currency_restore');
        Route::get('delete_currency_list', 'delete_currency_list');
    });
     // GeneralInfo Master
     Route::controller(GeneralInfoController::class)->group(function () {
        Route::get('employee', 'index')->name('employee');
        Route::get('employee/add', 'add')->name('add_employee');
        Route::get('edit_employee/{id}', 'edit_employee')->name('edit_employee');
        Route::post('submit_employee', 'submit_employee');
        Route::post('employee_restore', 'employee_restore');
        Route::get('delete_employee_list', 'delete_employee_list');
        Route::get('get_city_desc', 'getCityDesc')->name('get_city_desc');
        Route::get('get_branch_details', 'getBranchDetails')->name('get_branch_details');

    });
    // Employee Action Master
    Route::controller(EmployeeActionController::class)->group(function () {
        Route::get('clone', 'clone_oto')->name('clone');
        Route::post('submit_emp_clone', 'submit_emp_clone');

        Route::get('stoppay', 'stope_pay')->name('stoppay');
        Route::post('submit_emp_stop_pay', 'submit_emp_stop_pay');

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
