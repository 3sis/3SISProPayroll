@extends('layouts.app')
@section('page_title', 'Add Location')
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
    <!--  END CUSTOM STYLE FILE  -->
    </head>

@endsection
<div class="container">
    <div class="container">
        <div class="row layout-top-spacing">
            <div id="basic" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <form id='AddForm' method="post" autocomplete="off">
                            @csrf
                            <div class="row m-2">
                                <div
                                    class="col-xl-12 col-md-12 col-sm-12 col-12 d-grid d-md-flex justify-content-md-end">
                                    <button
                                        class="btn btn-danger _effect--ripple waves-effect waves-light error_btn mx-2 bs-tooltip" data-bs-placement="bottom" title="Error"
                                        data-bs-toggle="modal" data-bs-target="#ErrorListModalCenter">Error</button>
                                    <a href="{{ route('location') }}"
                                        class="btn btn-info _effect--ripple waves-effect waves-light bs-tooltip" data-bs-placement="bottom" title="Back"
                                        type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-left">
                                        <line x1="19" y1="12" x2="5" y2="12"></line>
                                        <polyline points="12 19 5 12 12 5"></polyline>
                                    </svg></a>

                                    <button class="btn btn-success _effect--ripple waves-effect waves-light mx-2 bs-tooltip" data-bs-placement="bottom" title="Save"
                                        type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg></button>


                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <h4>Add Location</h4>
                    </div>
                    <div class="widget-content widget-content-area">

                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="validationDefault01" class="form-label">Location Id<span
                                        class="text-danger">
                                        *</span></label>
                                <input type="text" name='GMLMHLocationId' id='GMLMHLocationId'
                                    class='form-control threshold' maxlength="20" placeholder="Enter Location Name"
                                    style='border-color: rgb(102, 175, 233); outline: 0px'
                                    value="{{ old('GMLMHLocationId') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="GMLMHDesc1" class="form-label">Description 1<span class="text-danger">
                                        *</span></label>
                                <input type="text" name='GMLMHDesc1' id='GMLMHDesc1'
                                    class='form-control threshold' maxlength="20"
                                    placeholder="Enter Location Description 1"
                                    style='border-color: rgb(102, 175, 233); outline: 0px'
                                    value="{{ old('GMLMHDesc1') }}">

                            </div>
                            <div class="col-md-3">
                                <label for="validationDefault05" class="form-label">BI Desc</label>
                                <input type="text" name='GMLMHBiDesc' id='GMLMHBiDesc'
                                    class='form-control threshold' maxlength="20" placeholder="Enter Bi Desc"
                                    style='border-color: rgb(102, 175, 233); outline: 0px'
                                    value="{{ old('GMLMHBiDesc') }}">
                            </div>
                            <div class="col-md-12">
                                <label for="validationDefault03" class="form-label">Description 2</label>
                                <textarea name='GMLMHDesc2' id='GMLMHDesc2' class='form-control textarea' maxlength="200"
                                    placeholder="Enter Location Description 2" style='border-color: rgb(102, 175, 233); outline: 0px'>{{ old('GMLMHDesc2') }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault04" class="form-label">City<span class="text-danger">
                                        *</span></label>
                                <select id='GMLMHCityId' name='GMLMHCityId' class="form-select"
                                    style="width: 100%;border: 1px solid #68a6ec;">
                                    <option value=''>Select City</option>
                                    @foreach ($city_list as $city)
                                        <option value='{{ $city->GMCTHCityId }}'>
                                            {{ $city->GMCTHDesc1 }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault05" class="form-label">State</label>
                                <input type="hidden" name="GMLMHStateId" id="GMLMHStateId">
                                <input type="text" name='stateName' id='stateName' class='form-control' readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="validationDefault05" class="form-label">Contry</label>
                                <input type="hidden" name="GMLMHCountryId" id="GMLMHCountryId">
                                <input type="text" name='countryName' id='countryName' class='form-control'
                                    readonly>
                            </div>

                            <div class="col-12">


                                <!-- <a href="{{ route('location') }}" class="btn btn-info _effect--ripple waves-effect waves-light" type="submit">Back</a>

                                <button class="btn btn-success _effect--ripple waves-effect waves-light" type="submit">Save</button>

                                <button class="btn btn-danger _effect--ripple waves-effect waves-light error_btn" data-bs-toggle="modal" data-bs-target="#ErrorListModalCenter">Error</button> -->

                                <!-- Modal -->
                                <div class="modal fade" id="ErrorListModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Form Error</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="modal-body form_error_list">
                                                <!-- <h4 class="modal-heading mb-4 mt-2">Aligned Center</h4>
                                                        <p class="modal-text">In hac habitasse platea dictumst. Proin sollicitudin et lacus in tincidunt. Integer nisl ex, sollicitudin eget nulla nec, pharetra lacinia nisl. Aenean nec nunc ex. Integer varius neque at dolor scelerisque porttitor.</p> -->
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light-dark"
                                                    data-bs-dismiss="modal">Discard</button>
                                                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
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
<!--  END CUSTOM SCRIPTS FILE  -->

<script>
    // Get the Toast button
    // var toastButton = document.getElementById("toast-btn");
    // Get the Toast element
    // var toastElement = document.getElementsByClassName("toast")[0];

    // var toast = new bootstrap.Toast(toastElement)
    // toastButton.onclick = function() {
    //     toast.show();
    // }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.error_btn').hide();
    });
    $("#AddForm").submit(function(e) {
        e.preventDefault();
        $('#GMLMHLocationId,#GMLMHDesc1,#GMLMHCityId').removeClass('border border-danger');

        if ($('#GMLMHLocationId').val() == '') {
            $('#GMLMHLocationId').addClass('border border-danger');
        }
        if ($('#GMLMHDesc1').val() == '') {
            $('#GMLMHDesc1').addClass('border border-danger');
        }

        if ($('#GMLMHCityId').val() == '') {
            $('#GMLMHCityId').addClass('border border-danger');
        }
        $('.form_error_list').html('');
        if ($('#GMLMHLocationId').val() == '' || $('#GMLMHDesc1').val() == '' ||
            $('#GMLMHCityId').val() == '') {
            if ($('#GMLMHLocationId').val() == '') {
                $('.form_error_list').append('<p>Please Enter Location name !</p>');
            }
            if ($('#GMLMHDesc1').val() == '') {
                $('.form_error_list').append('<p>Please Enter Location Description 1 !</p>');
            }
            if ($('#GMLMHCityId').val() == '') {
                $('.form_error_list').append('<p>Please Select City !</p>');
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
                url: "{{ url('submit_location') }}",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {
                    $('.error_btn').hide();
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
                        $('#GMLMHCityId').val('').trigger("change");
                        $('#AddForm')[0].reset();
                        custom_notification({
                            text: 'Location Added successfully',
                            pos: 'bottom-right',
                            duration: 100000
                        })
                    }
                    if (response.status == 'error') {
                        // Bottom Right
                        custom_notification({
                            text: 'Location Master not save',
                            pos: 'bottom-right'
                        })
                    }
                }
            })
        }
    });

    $('#GMLMHCityId').change(function() {
        var id = $(this).val();
        // alert(id);
        getDesc(id);
    });

    function getDesc(id) {
        $.ajax({
            url: "{{ url('get_city_desc') }}",
            type: 'get',
            data: 'id=' + id,
            success: function(response) {
                $('#GMLMHStateId').val(response.StateId);
                $('#stateName').val(response.StateDesc);
                $('#GMLMHCountryId').val(response.CountryId);
                $('#countryName').val(response.CountryDesc);
            }
        })
    }
</script>
@endsection
