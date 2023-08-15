@extends('layouts.app')
@section('page_title', 'edit Employee')
@section('content')
@section('css')

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link rel="stylesheet" href="../src/plugins/src/sweetalerts2/sweetalerts2.css">

    <link href="../src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="../src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <!-- toastr -->
    <link href="../src/plugins/src/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/light/notification/snackbar/custom-snackbar.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/dark/notification/snackbar/custom-snackbar.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->


    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/light/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="../src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css">

    <link href="../src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="../src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="../src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link href="../src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />

    <link href="../src/plugins/css/dark/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/light/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/src/flatpickr/flatpickr.css" rel="stylesheet" type="text/css" />

    <!--  END CUSTOM STYLE FILE  -->
    </head>

@endsection
<div class="container">
    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <nav id="navbar-example2" class="navbar sticky-top scrollspy_menu" style="top:100px;">
                    <div class="col-auto me-auto mt-2" style="width:850px;">
                        <form id='AddForm' method="post" autocomplete="off">
                            @csrf
                            <input type="hidden" value="{{ $employee['id'] }}" name="id">
                            <div class="container" id="list-wrapper">
                                <div class="wrapper">
                                    <div class="nav nav-tabs list" id="list" role="tablist">
                                        <li class="nav-item" id="nav-home-tab"><a class="nav-link"
                                                href="#general_info_link">General Info</a></li>
                                        <li class="nav-item" id="nav-home-tab"><a class="nav-link"
                                                href="#additional_info_link">Additional Info</a></li>
                                        <li class="nav-item" id="nav-home-tab"><a class="nav-link"
                                                href="#office_info_link">Office Info</a></li>
                                        <li class="nav-item" id="nav-home-tab"><a class="nav-link"
                                                href="#statutory_waged_info_link">Statutory & waged</a> </li>
                                        <li class="nav-item" id="nav-home-tab"><a class="nav-link"
                                                href="#address_info_link">address</a> </li>
                                        <li class="nav-item" id="nav-home-tab"><a class="nav-link"
                                                href="#banking_info_link">Banking Info</a> </li>
                                        <li class="nav-item" id="nav-home-tab"><a class="nav-link"
                                                href="#resignation_info_link">Resignation & LWP</a> </li>

                                        <li class="nav-item" id="nav-home-tab"><a class="nav-link" href="#empty"
                                                style="visibility: hidden;"></a> </li>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-auto me-2">
                        <a href="#"
                            class="btn btn-danger _effect--ripple waves-effect waves-light error_btn mx-2 bs-tooltip"
                            data-bs-placement="bottom" title="Error" data-bs-toggle="modal"
                            data-bs-target="#ErrorListModalCenter"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-alert-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg></a>
                        <a href="{{ route('employee') }}"
                            class="btn btn-info _effect--ripple waves-effect waves-light bs-tooltip"
                            data-bs-placement="bottom" title="Back" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg></a>

                        <button class="btn btn-success _effect--ripple waves-effect waves-light mx-2 bs-tooltip"
                            data-bs-placement="bottom" title="Save"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-edit">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg></button>
                    </div>
                </nav>
            </div>
        </div>

        <main data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
            data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
            <div class="row" id="general_info_link">
                <div id="flStackForm1" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 error_msg">
                                    <h3>General Info</h3>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Employee Id<span class="text-danger">
                                            *</span></label>
                                    <input type="text" name='EMGIHEmployeeId' id='EMGIHEmployeeId'
                                        class='form-control threshold' maxlength="20" placeholder="Enter Employee Id"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHEmployeeId', $employee['EMGIHEmployeeId'] ?? '') }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="name" class="form-label">First Name<span class="text-danger">
                                            *</span></label>
                                    <input type="text" name='EMGIHFirstName' id='EMGIHFirstName'
                                        class='form-control threshold' maxlength="20" placeholder="Enter First Name"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHFirstName', $employee['EMGIHFirstName'] ?? '') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Middle Name</label>
                                    <input type="text" name='EMGIHMiddleName' id='EMGIHMiddleName'
                                        class='form-control threshold' maxlength="20" placeholder="Enter Middle Name"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHMiddleName', $employee['EMGIHMiddleName'] ?? '') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Last Name<span class="text-danger">
                                            *</span></label>
                                    <input type="text" name='EMGIHLastName' id='EMGIHLastName'
                                        class='form-control threshold' maxlength="20" placeholder="Enter Last Name"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHLastName', $employee['EMGIHLastName'] ?? '') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" name='EMGIHFullName' id='EMGIHFullName'
                                        class='form-control' placeholder="Full Name"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHFullName', $employee['EMGIHFullName'] ?? '') }}" readonly>
                                </div>

                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Salutation<span class="text-danger">
                                            *</span> </label>
                                    <select id='EMGIHSalutationId' name='EMGIHSalutationId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Salutation</option>
                                        @foreach ($salutation_list as $salutation)
                                            @if (!empty($employee['EMGIHSalutationId']) && $employee['EMGIHSalutationId'] == $salutation->GMSLHSalutationId)
                                                <option value='{{ $salutation->GMSLHSalutationId }}' selected>
                                                    {{ $salutation->GMSLHDesc1 }}</option>
                                            @else
                                                <option value='{{ $salutation->GMSLHSalutationId }}'>
                                                    {{ $salutation->GMSLHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Gender<span class="text-danger">
                                            *</span> </label>
                                    <select id='EMGIHGenderId' name='EMGIHGenderId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Gender</option>
                                        @foreach ($gender_list as $gender)
                                            @if (!empty($employee['EMGIHGenderId']) && $employee['EMGIHGenderId'] == $gender->GMGDHGenderId)
                                                <option value='{{ $gender->GMGDHGenderId }}' selected>
                                                    {{ $gender->GMGDHDesc1 }}</option>
                                            @else
                                                <option value='{{ $gender->GMGDHGenderId }}'>
                                                    {{ $gender->GMGDHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Location<span class="text-danger">
                                            *</span> </label>
                                    <select id='EMGIHLocationId' name='EMGIHLocationId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Location</option>
                                        @foreach ($location_list as $location)
                                            @if (!empty($employee['EMGIHLocationId']) && $employee['EMGIHLocationId'] == $location->GMLMHLocationId)
                                                <option value='{{ $location->GMLMHLocationId }}' selected>
                                                    {{ $location->GMLMHDesc1 }}</option>
                                            @else
                                                <option value='{{ $location->GMLMHLocationId }}'>
                                                    {{ $location->GMLMHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Employment Type<span
                                            class="text-danger">
                                            *</span> </label>
                                    <select id='EMGIHEmploymentTypeId' name='EMGIHEmploymentTypeId'
                                        class="form-select" style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Employment Type </option>
                                        @foreach ($employmentType_list as $employmentType)
                                            @if (!empty($employee['EMGIHEmploymentTypeId']) && $employee['EMGIHEmploymentTypeId'] == $employmentType->ESTYHTypeId)
                                                <option value='{{ $employmentType->ESTYHTypeId }}' selected>
                                                    {{ $employmentType->ESTYHDesc1 }}</option>
                                            @else
                                                <option value='{{ $employmentType->ESTYHTypeId }}'>
                                                    {{ $employmentType->ESTYHDesc1 }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Grade Id</label>
                                    <select id='EMGIHGradeId' name='EMGIHGradeId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Grade</option>
                                        @foreach ($grade_list as $grade)
                                            @if (!empty($employee['EMGIHGradeId']) && $employee['EMGIHGradeId'] == $grade->ESGRHGradeId)
                                                <option value='{{ $grade->ESGRHGradeId }}' selected>
                                                    {{ $grade->ESGRHDesc1 }}</option>
                                            @else
                                                <option value='{{ $grade->ESGRHGradeId }}'>
                                                    {{ $grade->ESGRHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Designation Id</label>
                                    <select id='EMGIHDesignationId' name='EMGIHDesignationId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select designation</option>
                                        @foreach ($designation_list as $designation)
                                            @if (!empty($employee['EMGIHDesignationId']) && $employee['EMGIHDesignationId'] == $designation->ESDEHDesignationId)
                                                <option value='{{ $designation->ESDEHDesignationId }}' selected>
                                                    {{ $designation->ESDEHDesc1 }}</option>
                                            @else
                                                <option value='{{ $designation->ESDEHDesignationId }}'>
                                                    {{ $designation->ESDEHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Department Id</label>
                                    <select id='EMGIHDepartmentId' name='EMGIHDepartmentId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Department</option>
                                        @foreach ($department_list as $department)
                                            @if (!empty($employee['EMGIHDepartmentId']) && $employee['EMGIHDepartmentId'] == $salutation->ESDPHDepartmentId)
                                                <option value='{{ $department->ESDPHDepartmentId }}' selected>
                                                    {{ $department->ESDPHDesc1 }}</option>
                                            @else
                                                <option value='{{ $department->ESDPHDepartmentId }}'>
                                                    {{ $department->ESDPHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Calendar Id<span class="text-danger">
                                            *</span> </label>
                                    <select id='EMGIHCalendarId' name='EMGIHCalendarId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Calendar</option>
                                        @foreach ($calendar_list as $calendar)
                                            @if (!empty($employee['EMGIHCalendarId']) && $employee['EMGIHCalendarId'] == $calendar->FYCAHCalendarId)
                                                <option value='{{ $calendar->FYCAHCalendarId }}' selected>
                                                    {{ $calendar->FYCAHDesc1 }}</option>
                                            @else
                                                <option value='{{ $calendar->FYCAHCalendarId }}'>
                                                    {{ $calendar->FYCAHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="Updated" class="form-label">Date Of Birth</label>

                                    <input id="EMGIHDateOfBirth" name='EMGIHDateOfBirth'
                                        class="form-control flatpickr flatpickr-input active input_border"
                                        type="text" placeholder="Select Date.."
                                        value="{{ date('d-m-Y', strtotime($employee['EMGIHDateOfBirth'])) }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="Updated" class="form-label">Date Of Joining</label>

                                    <input id="EMGIHDateOfJoining" name='EMGIHDateOfJoining'
                                        class="form-control flatpickr flatpickr-input active input_border"
                                        type="text" placeholder="Select Date.."
                                        value="{{ date('d-m-Y', strtotime($employee['EMGIHDateOfJoining'])) }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="Updated" class="form-label">Date Of Confirmation</label>

                                    <input id="EMGIHDateOfConfirmation" name='EMGIHDateOfConfirmation'
                                        class="form-control flatpickr flatpickr-input active input_border"
                                        type="text" placeholder="Select Date.."
                                        value="{{ date('d-m-Y', strtotime($employee['EMGIHDateOfConfirmation'])) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- additional_info Start -->
            <div class="row" id="additional_info_link">
                <div id="flStackForm2" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h3>Additional Info</h3>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Nationality<span class="text-danger">
                                            *</span> </label>
                                    <select id='EMGIHNationalityId' name='EMGIHNationalityId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Nationality</option>
                                        @foreach ($nationality_list as $nationality)
                                            @if (!empty($employee['EMGIHNationalityId']) && $employee['EMGIHNationalityId'] == $nationality->GMNAHNationalityId)
                                                <option value='{{ $nationality->GMNAHNationalityId }}' selected>
                                                    {{ $nationality->GMNAHDesc1 }}</option>
                                            @else
                                                <option value='{{ $nationality->GMNAHNationalityId }}'>
                                                    {{ $nationality->GMNAHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Religion</label>
                                    <select id='EMGIHReligionId' name='EMGIHReligionId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Religion</option>
                                        @foreach ($religionMaster_list as $religion)
                                            @if (!empty($employee['EMGIHReligionId']) && $employee['EMGIHReligionId'] == $religion->GMRLHReligionId)
                                                <option value='{{ $religion->GMRLHReligionId }}' selected>
                                                    {{ $religion->GMRLHDesc1 }}</option>
                                            @else
                                                <option value='{{ $religion->GMRLHReligionId }}'>
                                                    {{ $religion->GMRLHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Race/Cast</label>
                                    <select id='EMGIHRaceCastId' name='EMGIHRaceCastId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Race/Cast</option>
                                        @foreach ($raceGroup_list as $raceGroup)
                                            @if (!empty($employee['EMGIHRaceCastId']) && $employee['EMGIHRaceCastId'] == $raceGroup->GMRAHRaceId)
                                                <option value='{{ $gender->GMRAHRaceId }}' selected>
                                                    {{ $raceGroup->GMRAHDesc1 }}</option>
                                            @else
                                                <option value='{{ $raceGroup->GMRAHRaceId }}'>
                                                    {{ $raceGroup->GMRAHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="bank" class="form-label">PAN No</label>
                                    <input type="text" name="EMGIHPANNo" id="EMGIHPANNo"
                                        class='form-control threshold' maxlength="15" placeholder="Enter PAN No"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHPANNo', $employee['EMGIHPANNo'] ?? '') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Blood Group</label>
                                    <select id='EMGIHBloodGroupId' name='EMGIHBloodGroupId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Blood Group</option>
                                        @foreach ($gender_list as $gender)
                                            @if (!empty($employee['EMGIHBloodGroupId']) && $employee['EMGIHBloodGroupId'] == $gender->GMBGHBloodGroupId)
                                                <option value='{{ $gender->GMBGHBloodGroupId }}' selected>
                                                    {{ $gender->GMBGHDesc1 }}</option>
                                            @else
                                                <option value='{{ $gender->GMBGHBloodGroupId }}'>
                                                    {{ $gender->GMBGHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Physical Status</label>
                                    <select id='EMGIHPhysicalStatusId' name='EMGIHPhysicalStatusId'
                                        class="form-select" style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Physical Status</option>
                                        @foreach ($physicalStatus_list as $physicalStatus)
                                            @if (
                                                !empty($employee['EMGIHPhysicalStatusId']) &&
                                                    $employee['EMGIHPhysicalStatusId'] == $physicalStatus->GMPSHPhysicalStatusId)
                                                <option value='{{ $physicalStatus->GMPSHPhysicalStatusId }}' selected>
                                                    {{ $physicalStatus->GMPSHDesc1 }}</option>
                                            @else
                                                <option value='{{ $physicalStatus->GMPSHPhysicalStatusId }}'>
                                                    {{ $physicalStatus->GMPSHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Leave Group</span> </label>
                                    <select id='EMGIHLeaveGroupId' name='EMGIHLeaveGroupId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Leave Group</option>
                                        @foreach ($leaveGroup_list as $leaveGroup)
                                            @if (!empty($employee['EMGIHLeaveGroupId']) && $employee['EMGIHLeaveGroupId'] == $leaveGroup->LMLGHGroupId)
                                                <option value='{{ $leaveGroup->LMLGHGroupId }}' selected>
                                                    {{ $leaveGroup->LMLGHDesc1 }}</option>
                                            @else
                                                <option value='{{ $leaveGroup->LMLGHGroupId }}'>
                                                    {{ $leaveGroup->LMLGHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class='form-group'>
                                        <label class="form-label">Aadhar No</label>
                                        <input type="text" name='EMGIHAadharNo' id='EMGIHAadharNo'
                                            class='form-control threshold' maxlength="6"
                                            placeholder="Enter Aadhar No"
                                            style='border-color: rgb(102, 175, 233); outline: 0px'
                                            value="{{ old('EMGIHAadharNo', $employee['EMGIHAadharNo'] ?? '') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Marital Status</label>
                                    <select id='EMGIHMaritalStatusId' name='EMGIHMaritalStatusId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Marital Status</option>
                                        @foreach ($maritalStatus_list as $maritalStatus)
                                            @if (
                                                !empty($employee['EMGIHMaritalStatusId']) &&
                                                    $employee['EMGIHMaritalStatusId'] == $maritalStatus->GMMSHMaritalStatusId)
                                                <option value='{{ $maritalStatus->GMMSHMaritalStatusId }}' selected>
                                                    {{ $maritalStatus->GMMSHDesc1 }}</option>
                                            @else
                                                <option value='{{ $maritalStatus->GMMSHMaritalStatusId }}'>
                                                    {{ $maritalStatus->GMMSHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="Updated" class="form-label">Date Of Marriage</label>
                                    <input id="EMGIHDateOfMarriage" name='EMGIHDateOfMarriage'
                                        class="form-control flatpickr flatpickr-input active input_border"
                                        type="text" placeholder="Select Marriage Date.."
                                        value="{{ date('d-m-Y', strtotime($employee['EMGIHDateOfMarriage'])) }}">

                                </div>
                                <div class="col-md-3">
                                    <div class='form-group'>
                                        <label class="form-label">Spouse Name</label>
                                        <input type="text" name='EMGIHSpouseName' id='EMGIHSpouseName'
                                            class='form-control threshold' maxlength="100"
                                            placeholder="Enter Spouse Name"
                                            style='border-color: rgb(102, 175, 233); outline: 0px'
                                            value="{{ old('EMGIHSpouseName', $employee['EMGIHSpouseName'] ?? '') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='form-group'>
                                        <label class="form-label">Driving License No</label>
                                        <input type="text" name='EMGIHDrivingLicenseNo' id='EMGIHDrivingLicenseNo'
                                            class='form-control threshold' maxlength="100"
                                            placeholder="Enter Driving License No"
                                            style='border-color: rgb(102, 175, 233); outline: 0px'
                                            value="{{ old('EMGIHDrivingLicenseNo', $employee['EMGIHDrivingLicenseNo'] ?? '') }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- additional_info End -->
            <!-- office_info Start -->
            <div class="row" id="office_info_link">
                <div id="flStackForm3" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h3>Office Info</h3>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Office Email</label>
                                    <input type="text" name="EMGIHOfficeEmail" id="EMGIHOfficeEmail"
                                        class='form-control threshold' maxlength="100" placeholder="Enter Email Id"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHOfficeEmail', $employee['EMGIHOfficeEmail'] ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="ifsc" class="form-label">Personal Email</label>
                                    <input type="text" name="EMGIHPersonalEmail" id="EMGIHPersonalEmail"
                                        class='form-control threshold' maxlength="20" placeholder="Enter Email"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHPersonalEmail', $employee['EMGIHPersonalEmail'] ?? '') }}">
                                </div>
                                <div class="col-md-2">
                                    <label for="email" class="form-label">Office Extension</label>
                                    <input type="text" name="EMGIHOfficeExtension" id="EMGIHOfficeExtension"
                                        class='form-control threshold' maxlength="10" placeholder="Enter Extension"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHOfficeExtension', $employee['EMGIHOfficeExtension'] ?? '') }}">
                                </div>
                                <div class="col-md-2">
                                    <label for="email" class="form-label">Land Line No</label>
                                    <input type="text" name="EMGIHOfficeLandLineNo" id="EMGIHOfficeLandLineNo"
                                        class='form-control threshold' maxlength="15"
                                        placeholder="Enter Land Line No"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHOfficeLandLineNo', $employee['EMGIHOfficeLandLineNo'] ?? '') }}">
                                </div>
                                <div class="col-md-2">
                                    <label for="email" class="form-label">Office Mobile No</label>
                                    <input type="text" name="EMGIHOfficeMobileNo" id="EMGIHOfficeMobileNo"
                                        class='form-control threshold' maxlength="15" placeholder="Enter Mobile No"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHOfficeMobileNo', $employee['EMGIHOfficeMobileNo'] ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="ifsc" class="form-label">Personal Phone No</label>
                                    <input type="text" name="EMGIHPersonalPhoneNo" id="EMGIHPersonalPhoneNo"
                                        class='form-control threshold' maxlength="20" placeholder="Enter Phone No"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHPersonalPhoneNo', $employee['EMGIHPersonalPhoneNo'] ?? '') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- office_info End -->
            <!-- statutory_waged_info Start -->
            <div class="row" id="statutory_waged_info_link">
                <div id="flStackForm4" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h3>Statutory and waged</h3>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">

                                <div class="col-md-2">

                                    <div class="form-check form-check-primary form-check-inline">

                                        <input class="form-check-input" type="checkbox" name='EMGIHOTApplicable'
                                            id='EMGIHOTApplicable' value="{{ $employee['EMGIHOTApplicable'] }}"
                                            checked>
                                        <label class="form-check-label" for="form-check-default">OT Applicable</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>OT Basis</label>
                                    <select id='EMGIHOTBasisId' name='EMGIHOTBasisId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        @foreach ($wadge as $OTBasis)
                                            @if (!empty($employee['EMGIHOTBasisId']) && $employee['EMGIHOTBasisId'] == $OTBasis)
                                                <option value='{{ $OTBasis }}' selected>
                                                    {{ $OTBasis }}</option>
                                            @else
                                                <option value='{{ $OTBasis }}'>
                                                    {{ $OTBasis }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check form-check-primary form-check-inline">
                                        <input class="form-check-input" type="checkbox" name='EMGIHPFApplicable'
                                            id='EMGIHPFApplicable' value="{{ $employee['EMGIHPFApplicable'] }}"
                                            checked>
                                        <label class="form-check-label" for="form-check-default">PF Applicable</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="bank" class="form-label">PF Threshold</label>
                                    <input type="number" name="EMGIHPFThreshold" id="EMGIHPFThreshold"
                                        class='form-control floatNumberField' placeholder="PF Threshold"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHPFThreshold', $employee['EMGIHPFThreshold'] ?? '0.00') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="bank" class="form-label">PF Acct No</label>
                                    <input type="text" name="EMGIHPFAcctNo" id="EMGIHPFAcctNo"
                                        class='form-control' placeholder="PF A/C No."
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHPFAcctNo', $employee['EMGIHPFAcctNo'] ?? '') }}">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check form-check-primary form-check-inline">
                                        <input class="form-check-input" type="checkbox" name='EMGIHIsDailyWages'
                                            id='EMGIHIsDailyWages' value="{{ $employee['EMGIHIsDailyWages'] }}"
                                            checked>
                                        <label class="form-check-label" for="form-check-default">Daily Wages</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="dropdown" class="form-label">Wage Basis </label>
                                    <select id='EMGIHDailyWagesId' name='EMGIHDailyWagesId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        @foreach ($wadge as $DailyWages)
                                            @if (!empty($employee['EMGIHDailyWagesId']) && $employee['EMGIHDailyWagesId'] == $DailyWages)
                                                <option value='{{ $OTBasis }}' selected>
                                                    {{ $DailyWages }}</option>
                                            @else
                                                <option value='{{ $DailyWages }}'>
                                                    {{ $DailyWages }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check form-check-primary form-check-inline">
                                        <input class="form-check-input" type="checkbox" name='EMGIHPFAgreedByComp'
                                            id='EMGIHPFAgreedByComp' value="{{ $employee['EMGIHPFAgreedByComp'] }}"
                                            checked>
                                        <label class="form-check-label" for="form-check-default">Agreed By
                                            Comp</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="bank" class="form-label">Comp Limit</label>
                                    <input type="number" name="EMGIHPFCompLimit" id="EMGIHPFCompLimit"
                                        class='form-control floatNumberField' placeholder="Comp Limit"
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHPFCompLimit', $employee['EMGIHPFCompLimit'] ?? '0.00') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="dropdown" class="form-label">Regime Id<span class="text-danger">
                                            *</span> </label>
                                    <select id='EMGIHRegimeId' name='EMGIHRegimeId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Marital Status</option>
                                        @foreach ($maritalStatus_list as $Regime)
                                            @if (!empty($employee['EMGIHRegimeId']) && $employee['EMGIHRegimeId'] == $Regime->GMMSHMaritalStatusId)
                                                <option value='{{ $Regime->GMMSHMaritalStatusId }}' selected>
                                                    {{ $Regime->GMMSHDesc1 }}</option>
                                            @else
                                                <option value='{{ $Regime->GMMSHMaritalStatusId }}'>
                                                    {{ $Regime->GMMSHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- statutory_waged_info End -->
            <!-- address_info Start -->
            <div class="row" id="address_info_link">
                <div id="flStackForm4" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h3>Address Info</h3>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <div class="row mt-0">
                                        <div class="col-12">
                                            <label for="address1" class="form-label">Present Address<span
                                                    class="text-danger">
                                                    *</span></label>
                                            <input type="text" name='EMGIHPresentAddress1'
                                                id='EMGIHPresentAddress1' class='form-control threshold'
                                                maxlength="100" placeholder="Enter Address 1"
                                                style='border-color: rgb(102, 175, 233); outline: 0px'
                                                value="{{ old('EMGIHPresentAddress1', $employee['EMGIHPresentAddress1'] ?? '') }}">

                                        </div>
                                        <div class="col-12">
                                            <input type="text" name='EMGIHPresentAddress2'
                                                id='EMGIHPresentAddress2' class='form-control threshold'
                                                maxlength="100" placeholder="Enter Address 2"
                                                style='border-color: rgb(102, 175, 233); outline: 0px'
                                                value="{{ old('EMGIHPresentAddress2', $employee['EMGIHPresentAddress2'] ?? '') }}">

                                        </div>
                                        <div class="col-12">
                                            <input type="text" name='EMGIHPresentAddress3'
                                                id='EMGIHPresentAddress3' class='form-control threshold'
                                                maxlength="100" placeholder="Enter Address 3"
                                                style='border-color: rgb(102, 175, 233); outline: 0px'
                                                value="{{ old('EMGIHPresentAddress3', $employee['EMGIHPresentAddress3'] ?? '') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">City <span class="text-danger">
                                                    *</span>
                                            </label>
                                            <select id='EMGIHPresentCityId' name='EMGIHPresentCityId'
                                                class="form-select" style="width: 100%;border: 1px solid #68a6ec;">
                                                <option value=''>Select City</option>
                                                @foreach ($city_list as $city)
                                                    @if (!empty($employee['EMGIHPresentCityId']) && $employee['EMGIHPresentCityId'] == $city->GMCTHCityId)
                                                        <option value='{{ $city->GMCTHCityId }}' selected>
                                                            {{ $city->GMCTHDesc1 }}</option>
                                                    @else
                                                        <option value='{{ $city->GMCTHCityId }}'>
                                                            {{ $city->GMCTHDesc1 }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class='form-group'>
                                                <label class="form-label">State </label>
                                                <input type="hidden" name="EMGIHPresentStateId"
                                                    id="EMGIHPresentStateId">
                                                <input type="text" name='PresentStateName' id='PresentStateName'
                                                    class='form-control' readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class='form-group'>
                                                <label class="form-label">Contry</label>
                                                <input type="hidden" name="EMGIHPresentCountryId"
                                                    id="EMGIHPresentCountryId">
                                                <input type="text" name='PresentCountryName'
                                                    id='PresentCountryName' class='form-control' readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class='form-group'>
                                                <label class="form-label">Pin Code</label>
                                                <input type="text" name='EMGIHPresentPinCode'
                                                    id='EMGIHPresentPinCode' class='form-control threshold'
                                                    maxlength="6" placeholder="Enter Pin Code"
                                                    style='border-color: rgb(102, 175, 233); outline: 0px'
                                                    value="{{ old('EMGIHPresentPinCode', $employee['EMGIHPresentPinCode'] ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="n-chk col-md-12">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name='EMGIHSameAsPresentAdd' id='EMGIHSameAsPresentAdd'
                                                value="{{ $employee['EMGIHSameAsPresentAdd'] }}" checked>
                                            <label class="form-check-label" for="form-check-default">
                                                Same As Present
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Permanent Address-->
                                <div class="col-md-5">
                                    <div class="row mt-0">
                                        <div class="col-12">
                                            <label for="address1" class="form-label">Permanent Address<span
                                                    class="text-danger">
                                                    *</span></label>
                                            <input type="text" name='EMGIHPermanentAddress1'
                                                id='EMGIHPermanentAddress1' class='form-control threshold'
                                                maxlength="100" placeholder="Enter Address 1"
                                                style='border-color: rgb(102, 175, 233); outline: 0px'
                                                value="{{ old('EMGIHPermanentAddress1', $employee['EMGIHPermanentAddress1'] ?? '') }}">
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name='EMGIHPermanentAddress2'
                                                id='EMGIHPermanentAddress2' class='form-control threshold'
                                                maxlength="100" placeholder="Enter Address 2"
                                                style='border-color: rgb(102, 175, 233); outline: 0px'
                                                value="{{ old('EMGIHPermanentAddress2', $employee['EMGIHPermanentAddress2'] ?? '') }}">
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name='EMGIHPermanentAddress3'
                                                id='EMGIHPermanentAddress3' class='form-control threshold'
                                                maxlength="100" placeholder="Enter Address 3"
                                                style='border-color: rgb(102, 175, 233); outline: 0px'
                                                value="{{ old('EMGIHPermanentAddress3', $employee['EMGIHPermanentAddress3'] ?? '') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">City <span class="text-danger">
                                                    *</span>
                                            </label>
                                            <select id='EMGIHPermanentCityId' name='EMGIHPermanentCityId'
                                                class="form-select" style="width: 100%;border: 1px solid #68a6ec;">
                                                <option value=''>Select City</option>
                                                @foreach ($city_list as $city)
                                                    @if (!empty($employee['EMGIHPermanentCityId']) && $employee['EMGIHPermanentCityId'] == $city->GMCTHCityId)
                                                        <option value='{{ $city->GMCTHCityId }}' selected>
                                                            {{ $city->GMCTHDesc1 }}</option>
                                                    @else
                                                        <option value='{{ $city->GMCTHCityId }}'>
                                                            {{ $city->GMCTHDesc1 }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class='form-group'>
                                                <label class="form-label">State</label>
                                                <input type="hidden" name="EMGIHPermanentStateId"
                                                    id="EMGIHPermanentStateId">
                                                <input type="text" name='PermanentStateName'
                                                    id='PermanentStateName' class='form-control' readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class='form-group'>
                                                <label class="form-label">Contry</label>
                                                <input type="hidden" name="EMGIHPermanentCountryId"
                                                    id="EMGIHPermanentCountryId">
                                                <input type="text" name='PermanentCountryName'
                                                    id='PermanentCountryName' class='form-control' readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class='form-group'>
                                                <label class="form-label">Pin Code</label>
                                                <input type="text" name='EMGIHPermanentPinCode'
                                                    id='EMGIHPermanentPinCode' class='form-control threshold'
                                                    maxlength="6" placeholder="Enter Pin Code"
                                                    style='border-color: rgb(102, 175, 233); outline: 0px'
                                                    value="{{ old('EMGIHPermanentPinCode', $employee['EMGIHPermanentPinCode'] ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- address_info End -->
            <!-- banking_info Start -->
            <div class="row" id="banking_info_link">
                <div id="flStackForm4" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h3>Banking Info</h3>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="branch" class="form-label">Branch<span class="text-danger">
                                            *</span> </label>
                                    <select id='EMGIHBranchId' name='EMGIHBranchId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Branch</option>
                                        @foreach ($branch_list as $branch)
                                            @if (!empty($employee['EMGIHBranchId']) && $employee['EMGIHBranchId'] == $branch->BMBRHBranchId)
                                                <option value='{{ $branch->BMBRHBranchId }}' selected>
                                                    {{ $branch->BMBRHDesc1 }}</option>
                                            @else
                                                <option value='{{ $branch->BMBRHBranchId }}'>
                                                    {{ $branch->BMBRHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="bank" class="form-label">Bank</label>
                                    <input type="hidden" name="EMGIHBankId" id="EMGIHBankId">
                                    <input type="text" name='bankName' id='bankName' class='form-control'
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="ifsc" class="form-label">IFSC</label>
                                    <input type="text" name='EMGIHIFSCId' id='EMGIHIFSCId' class='form-control'
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="ifsc" class="form-label">A/C No.</label>
                                    <input type="text" name="EMGIHBankAccountNo" id="EMGIHBankAccountNo"
                                        class='form-control threshold' maxlength="20" placeholder="Enter A/C No."
                                        style='border-color: rgb(102, 175, 233); outline: 0px'
                                        value="{{ old('EMGIHBankAccountNo', $employee['EMGIHBankAccountNo'] ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="accountType" class="form-label">Account Type<span
                                            class="text-danger">
                                            *</span> </label>
                                    <select id='EMGIHAccountTypeId' name='EMGIHAccountTypeId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Account Type</option>
                                        @foreach ($acctType_list as $acctType)
                                            @if (!empty($employee['EMGIHAccountTypeId']) && $employee['EMGIHAccountTypeId'] == $acctType->BMATHAcctId)
                                                <option value='{{ $acctType->BMATHAcctId }}' selected>
                                                    {{ $acctType->BMATHDesc1 }}</option>
                                            @else
                                                <option value='{{ $acctType->BMATHAcctId }}'>
                                                    {{ $acctType->BMATHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="branch" class="form-label">Payment Mode<span class="text-danger">
                                            *</span> </label>
                                    <select id='EMGIHPaymentModeId' name='EMGIHPaymentModeId' class="form-select"
                                        style="width: 100%;border: 1px solid #68a6ec;">
                                        <option value=''>Select Payment Mode</option>
                                        @foreach ($paymentMode_list as $paymentMode)
                                            @if (!empty($employee['EMGIHPaymentModeId']) && $employee['EMGIHPaymentModeId'] == $paymentMode->BMPMHPaymentModeId)
                                                <option value='{{ $paymentMode->BMPMHPaymentModeId }}' selected>
                                                    {{ $paymentMode->BMPMHDesc1 }}</option>
                                            @else
                                                <option value='{{ $paymentMode->BMPMHPaymentModeId }}'>
                                                    {{ $paymentMode->BMPMHDesc1 }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- banking_info End -->
            <!-- resignation_info Start -->
            <div class="row" id="resignation_info_link">
                <div id="flStackForm4" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h3>Resignation and LWP</h3>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">
                                <div class="col-md-9">
                                    <div class="row mt-0">
                                        <div class="col-md-3 n-chk mt-4">
                                            <div class="form-check form-check-primary form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name='EMGIHIsResignation' id='EMGIHIsResignation'
                                                    value="{{ $employee['EMGIHIsResignation'] }}" checked>
                                                <label class="form-check-label" for="form-check-default">
                                                    Is Resignation
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="Updated" class="form-label">Letter Submission</label>
                                            <input id="EMGIHDateOfLetterSubmission" name='EMGIHDateOfLetterSubmission'
                                                class="form-control flatpickr flatpickr-input active input_border"
                                                type="text" placeholder="Select Submission Date.."
                                                value="{{ date('d-m-Y', strtotime($employee['EMGIHDateOfLetterSubmission'])) }}">

                                        </div>
                                        <div class="col-md-3">
                                            <label for="Updated" class="form-label">Resignation</label>
                                            <input id="EMGIHDateOfResignation" name='EMGIHDateOfResignation'
                                                class="form-control flatpickr flatpickr-input active input_border"
                                                type="text" placeholder="Select Resignation Date.."
                                                value="{{ date('d-m-Y', strtotime($employee['EMGIHDateOfResignation'])) }}">

                                        </div>
                                        <div class="col-md-3">
                                            <label for="Updated" class="form-label">Leaving</label>
                                            <input id="EMGIHDateOfLeaving" name='EMGIHDateOfLeaving'
                                                class="form-control flatpickr flatpickr-input active input_border"
                                                type="text" placeholder="Select Leaving Date.."
                                                value="{{ date('d-m-Y', strtotime($employee['EMGIHDateOfLeaving'])) }}">

                                        </div>
                                        <div class="col-md-6">
                                            <label for="ifsc" class="form-label">Reason</label>
                                            <input type="text" name="EMGIHReason" id="EMGIHReason"
                                                class='form-control threshold' maxlength="20"
                                                placeholder="Enter Reason"
                                                style='border-color: rgb(102, 175, 233); outline: 0px'
                                                value="{{ old('EMGIHReason', $employee['EMGIHReason'] ?? '') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ifsc" class="form-label">Remarks For FnF</label>
                                            <input type="text" name="EMGIHRemarksForFnF" id="EMGIHRemarksForFnF"
                                                class='form-control threshold' maxlength="20"
                                                placeholder="Enter Remarks"
                                                style='border-color: rgb(102, 175, 233); outline: 0px'
                                                value="{{ old('EMGIHRemarksForFnF', $employee['EMGIHRemarksForFnF'] ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row mt-0">
                                        <div class="n-chk col-md-12">
                                            <div class="form-check form-check-primary form-check-inline">

                                                <input class="form-check-input" type="checkbox"
                                                    name='EMGIHLeaveWithoutPayIndicator'
                                                    id='EMGIHLeaveWithoutPayIndicator'
                                                    value="{{ $employee['EMGIHLeaveWithoutPayIndicator'] }}"
                                                    checked>

                                                <label class="form-check-label" for="form-check-default">
                                                    Leave Without Pay Indicator
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-0">
                                        <div class="col-md-12 mt-2  ">
                                            <label for="Updated" class="form-label">Leave Without Pay From</label>

                                            <input id="EMGIHLeaveWithoutPayFrom" name='EMGIHLeaveWithoutPayFrom'
                                                class="form-control flatpickr flatpickr-input active input_border"
                                                type="text" placeholder="Select Without Pay Date.."
                                                value="{{ date('d-m-Y', strtotime($employee['EMGIHLeaveWithoutPayFrom'])) }}">

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- resignation_info End -->

        </main>
        <div class="modal fade" id="ErrorListModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Form Error</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body form_error_list">
                        <!-- <h4 class="modal-heading mb-4 mt-2">Aligned Center</h4>
                                <p class="modal-text">In hac habitasse platea dictumst. Proin sollicitudin et lacus in tincidunt. Integer nisl ex, sollicitudin eget nulla nec, pharetra lacinia nisl. Aenean nec nunc ex. Integer varius neque at dolor scelerisque porttitor.</p> -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<!-- BEGIN THEME GLOBAL STYLE -->
<script src="../src/assets/js/scrollspyNav.js"></script>
<script src="../src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
<script src="../src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
<!-- END THEME GLOBAL STYLE -->
<script src="../src/plugins/src/highlight/highlight.pack.js"></script>
<!-- toastr -->
<script src="../src/plugins/src/notification/snackbar/snackbar.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="../src/assets/js/components/notification/custom-snackbar.js"></script>
<script src="../src/plugins/src/flatpickr/flatpickr.js"></script>
<script src="../src/plugins/src/flatpickr/custom-flatpickr.js"></script>
<!--  END CUSTOM SCRIPTS FILE  -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.error_btn').hide();
        maritalStatus();
        sameAsPresentAddress();
        isResignation();
        isLWP();
        isOTApplicable();
        isPFApplicable();
        isAgreedByComp();
        isDailyWages();
    });

    $("#AddForm").submit(function(e) {
        e.preventDefault();
        $('#EMGIHEmployeeId,#EMGIHFirstName,#EMGIHPresentCityId').removeClass('border border-danger');

        if ($('#EMGIHEmployeeId').val() == '') {
            $('#EMGIHEmployeeId').addClass('border border-danger');
        }
        if ($('#EMGIHFirstName').val() == '') {
            $('#EMGIHFirstName').addClass('border border-danger');
        }

        if ($('#EMGIHPresentCityId').val() == '') {
            $('#EMGIHPresentCityId').addClass('border border-danger');
        }
        $('.form_error_list').html('');
        if ($('#EMGIHEmployeeId').val() == '' || $('#EMGIHFirstName').val() == '' ||
            $('#EMGIHPresentCityId').val() == '') {
            if ($('#EMGIHEmployeeId').val() == '') {
                $('.form_error_list').append('<p>Please Enter Employee Id !</p>');
            }
            if ($('#EMGIHFirstName').val() == '') {
                $('.form_error_list').append('<p>Please Enter Employee First Name !</p>');
            }
            if ($('#EMGIHPresentCityId').val() == '') {
                $('.form_error_list').append('<p>Please Present Select City !</p>');
            }
            var error_count = $(".form_error_list").children().length;
            console.log(error_count);
            if (error_count > 0) {
                $('.error_btn').show();
                // $('.error_btn').show().animate({
                //     left: '-250px'
                // }).animate({
                //     left: '1px'
                // });
            }
            return false;
        } else {
            var action = $('#action').val();
            console.log('action: ' + action);
            $.ajax({
                url: "{{ url('submit_employee') }}",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {
                    $('.error_btn').hide();
                    updateCheckBoxValue();

                },
                success: function(response) {
                    console.log(response);
                    if (response.errors) {
                        $('.error_btn').show();
                        // $('.error_btn').show().animate({
                        //     left: '-250px'
                        // }).animate({
                        //     left: '1px'
                        // });
                        $.each(response.errors, function(key, value) {
                            console.log(value.key);
                            $('.form_error_list').append('<p>' + value + '</p>');
                        });
                    }
                    if (response.status == 'success') {
                        // Bottom Right
                        $('#EMGIHPresentCityId').val('').trigger("change");
                        $('#AddForm')[0].reset();
                        custom_notification({
                            text: 'Employee Update successfully',
                            pos: 'bottom-right',
                            duration: 100000
                        })
                        window.location = "{{ url('employee') }}";

                    }
                    if (response.status == 'error') {
                        // Bottom Right
                        custom_notification({
                            text: 'Employee Master not save',
                            pos: 'bottom-right'
                        })
                    }
                }
            })
        }
    });
    $('#error_btn').click(function() {
        $('#ErrorModal').modal('show');
    });
    $('#EMGIHPresentCityId').change(function() {
        var id = $(this).val();
        getPresentCityDetail(id);
    });
    $('#EMGIHPermanentCityId').change(function() {
        var id = $(this).val();
        getPermanentCityDetail(id);
    });
    $('#EMGIHBranchId').change(function() {
        var id = $(this).val();
        getBank1Details(id);
    });
    $('#EMGIHBranchId2').change(function() {
        var id = $(this).val();
        getBank2Details(id);
    });
    $("#EMGIHFirstName").change(function() {

        constructFullName();
    });
    $("#EMGIHMiddleName").change(function() {

        constructFullName();
    });
    $("#EMGIHLastName").change(function() {

        constructFullName();
    });
    $("#EMGIHMaritalStatusId").change(function() {
        maritalStatus();
    });
    // When SameAsPresentAdd is Checked, bring all to addres1 to address2
    $("#EMGIHSameAsPresentAdd").on("click", function() {
        sameAsPresentAddress();
    });
    $("#EMGIHIsResignation").on("click", function() {
        isResignation();
    });
    $("#EMGIHLeaveWithoutPayIndicator").on("click", function() {
        isLWP();
    });
    $("#EMGIHOTApplicable").on("click", function() {
        isOTApplicable();
    });
    $("#EMGIHPFApplicable").on("click", function() {
        isPFApplicable();
    });
    $("#EMGIHPFAgreedByComp").on("click", function() {
        isAgreedByComp();
    });
    $("#EMGIHIsDailyWages").on("click", function() {
        isDailyWages();
    });

    function getPresentCityDetail(id) {
        $.ajax({
            url: "{{ url('get_city_desc') }}",
            type: 'get',
            data: 'id=' + id,
            success: function(response) {
                $('#EMGIHPresentStateId').val(response.StateId);
                $('#PresentStateName').val(response.StateDesc);
                $('#EMGIHPresentCountryId').val(response.CountryId);
                $('#PresentCountryName').val(response.CountryDesc);
            }
        })
    }

    function getPermanentCityDetail(id) {
        $.ajax({
            url: "{{ url('get_city_desc') }}",
            type: 'get',
            data: 'id=' + id,
            success: function(response) {
                $('#EMGIHPermanentStateId').val(response.StateId);
                $('#PermanentStateName').val(response.StateDesc);
                $('#EMGIHPermanentCountryId').val(response.CountryId);
                $('#PermanentCountryName').val(response.CountryDesc);
            }
        })
    }

    function getBank1Details(id) {
        $.ajax({
            url: "{{ url('get_branch_details') }}",
            type: 'get',
            data: 'id=' + id,
            success: function(response) {
                $('#EMGIHBankId').val(response.BankId);
                $('#bankName').val(response.BankName);
                $('#EMGIHIFSCId').val(response.ifsc);
            }
        })
    }

    function getBank2Details(id) {
        $.ajax({
            url: "{{ url('get_branch_details') }}",
            type: 'get',
            data: 'id=' + id,
            success: function(response) {
                $('#EMGIHBankId2').val(response.BankId);
                $('#bankName2').val(response.BankName);
                $('#EMGIHIFSId2').val(response.ifsc);
            }
        })
    }

    function constructFullName() {
        var FullName = $("#EMGIHFirstName").val() + " " +
            $("#EMGIHMiddleName").val() + " " +
            $("#EMGIHLastName").val();
        $('#EMGIHFullName').val(FullName);
    }

    function maritalStatus() {
        if ($('#EMGIHMaritalStatusId').val() == '1000') {
            $("#EMGIHSpouseName").attr("readonly", false);
            $("#EMGIHDateOfMarriage").attr("disabled", false);
        } else {
            $("#EMGIHSpouseName").attr("readonly", true);
            $("#EMGIHDateOfMarriage").attr("disabled", true);
        }
    }

    function sameAsPresentAddress() {
        if ($('#EMGIHSameAsPresentAdd').prop('checked') == true) {
            $('#EMGIHPermanentAddress1').val($("#EMGIHPresentAddress1").val());
            $('#EMGIHPermanentAddress2').val($("#EMGIHPresentAddress2").val());
            $('#EMGIHPermanentAddress3').val($("#EMGIHPresentAddress3").val());
            $('#EMGIHPermanentCityId').val($("#EMGIHPresentCityId").val()).change();

            $('#EMGIHPermanentStateId').val($("#EMGIHPresentStateId").val());
            $('#PermanentStateName').val($("#PresentStateName").val());

            $('#EMGIHPermanentCountryId').val($("#EMGIHPresentCountryId").val());
            $('#PermanentCountryName').val($("#PresentCountryName").val());

            $('#EMGIHPermanentPinCode').val($("#EMGIHPresentPinCode").val());

            $("#EMGIHPermanentAddress1").attr("readonly", true);
            $("#EMGIHPermanentAddress2").attr("readonly", true);
            $("#EMGIHPermanentAddress3").attr("readonly", true);
            $("#EMGIHPermanentCityId").attr("disabled", true);
            $("#EMGIHPermanentPinCode").attr("readonly", true);
        } else {
            $("#EMGIHPermanentAddress1").val('');
            $("#EMGIHPermanentAddress2").val('');
            $("#EMGIHPermanentAddress3").val('');
            $("#EMGIHPermanentCityId").val('').change();
            $("#EMGIHPermanentStateId").val('');
            $("#PermanentStateName").val('');
            $("#EMGIHPermanentCountryId").val('');
            $("#PermanentCountryName").val('');
            $("#EMGIHPermanentPinCode").val('');
            $("#EMGIHPermanentCityId").attr("disabled", false);

        }
    }

    function isResignation() {
        if ($('#EMGIHIsResignation').prop('checked') == true) {
            $("#EMGIHDateOfLetterSubmission").attr("disabled", false);
            $("#EMGIHDateOfResignation").attr("disabled", false);
            $("#EMGIHDateOfLeaving").attr("disabled", false);
            $("#EMGIHReason").attr("readonly", false);
            $("#EMGIHRemarksForFnF").attr("readonly", false);
        } else {
            $("#EMGIHDateOfLetterSubmission").attr("disabled", true);
            $("#EMGIHDateOfResignation").attr("disabled", true);
            $("#EMGIHDateOfLeaving").attr("disabled", true);
            $("#EMGIHReason").attr("readonly", true);
            $("#EMGIHRemarksForFnF").attr("readonly", true);
        }
    }

    function isLWP() {
        if ($('#EMGIHLeaveWithoutPayIndicator').prop('checked') == true) {
            $("#EMGIHLeaveWithoutPayFrom").attr("disabled", false);
        } else {
            $("#EMGIHLeaveWithoutPayFrom").attr("disabled", true);
        }
    }

    function isOTApplicable() {
        if ($('#EMGIHOTApplicable').prop('checked') == true) {
            $("#EMGIHOTBasisId").attr("disabled", false);
        } else {
            $("#EMGIHOTBasisId").attr("disabled", true);
        }
    }

    function isPFApplicable() {
        if ($('#EMGIHPFApplicable').prop('checked') == true) {
            $("#EMGIHPFThreshold").attr("readonly", false);
        } else {
            $("#EMGIHPFThreshold").attr("readonly", true);
        }
    }

    function isAgreedByComp() {
        if ($('#EMGIHPFAgreedByComp').prop('checked') == true) {
            $("#EMGIHPFCompLimit").attr("readonly", false);
            $("#EMGIHPFAcctNo").attr("readonly", false);
        } else {
            $("#EMGIHPFCompLimit").attr("readonly", true);
            $("#EMGIHPFAcctNo").attr("readonly", true);
        }
    }

    function isDailyWages() {
        if ($('#EMGIHIsDailyWages').prop('checked') == true) {
            $("#EMGIHDailyWagesId").attr("disabled", false);
        } else {
            $("#EMGIHDailyWagesId").attr("disabled", true);
        }
    }

    function updateCheckBoxValue() {
        if ($('#EMGIHIsResignation').prop('checked') == true) {
            $('#EMGIHIsResignation').val(1);
        } else {
            $('#EMGIHIsResignation').val(0);
        }
        if ($('#EMGIHIsDailyWages').prop('checked') == true) {
            $('#EMGIHIsDailyWages').val(1);
        } else {
            $('#EMGIHIsDailyWages').val(0);
        }
        if ($('#EMGIHPFApplicable').prop('checked') == true) {
            $('#EMGIHPFApplicable').val(1);
        } else {
            $('#EMGIHPFApplicable').val(0);
        }
        if ($('#EMGIHPFAgreedByComp').prop('checked') == true) {
            $('#EMGIHPFAgreedByComp').val(1);
        } else {
            $('#EMGIHPFAgreedByComp').val(0);
        }
        if ($('#EMGIHOTApplicable').prop('checked') == true) {
            $('#EMGIHOTApplicable').val(1);
        } else {
            $('#EMGIHOTApplicable').val(0);
        }
        if ($('#EMGIHSameAsPresentAdd').prop('checked') == true) {
            $('#EMGIHSameAsPresentAdd').val(1);
        } else {
            $('#EMGIHSameAsPresentAdd').val(0);
        }
        if ($('#EMGIHLeaveWithoutPayIndicator').prop('checked') == true) {
            $('#EMGIHLeaveWithoutPayIndicator').val(1);
        } else {
            $('#EMGIHLeaveWithoutPayIndicator').val(0);
        }
    }
    if ($('#EMGIHDateOfBirth').val() != undefined) {
        $('#EMGIHDateOfBirth').flatpickr({
            dateFormat: "d-m-Y"
        });
    }
    if ($('#EMGIHDateOfJoining').val() != undefined) {
        $('#EMGIHDateOfJoining').flatpickr({
            dateFormat: "d-m-Y"
        });
    }
    if ($('#EMGIHDateOfConfirmation').val() != undefined) {
        $('#EMGIHDateOfConfirmation').flatpickr({
            dateFormat: "d-m-Y"
        });
    }
    if ($('#EMGIHDateOfMarriage').val() != undefined) {
        $('#EMGIHDateOfMarriage').flatpickr({
            dateFormat: "d-m-Y"
        });
    }
    if ($('#EMGIHDateOfLetterSubmission').val() != undefined) {
        $('#EMGIHDateOfLetterSubmission').flatpickr({
            dateFormat: "d-m-Y"
        });
    }
    if ($('#EMGIHDateOfResignation').val() != undefined) {
        $('#EMGIHDateOfResignation').flatpickr({
            dateFormat: "d-m-Y"
        });
    }
    if ($('#EMGIHDateOfLeaving').val() != undefined) {
        $('#EMGIHDateOfLeaving').flatpickr({
            dateFormat: "d-m-Y"
        });
    }
    if ($('#EMGIHLeaveWithoutPayFrom').val() != undefined) {
        $('#EMGIHLeaveWithoutPayFrom').flatpickr({
            dateFormat: "d-m-Y"
        });
    }
</script>
@endsection
