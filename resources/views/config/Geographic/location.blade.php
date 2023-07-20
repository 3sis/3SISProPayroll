@extends('layouts.app')
@section('page_title', 'Location')
@section('content')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link rel="stylesheet" href="../src/plugins/src/sweetalerts2/sweetalerts2.css">

    <link href="../src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="../src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../src/plugins/css/dark/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL STYLES -->
@endsection
<div class="container">
    <div class="row mt-2">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6 d-grid gap-1 d-md-block">
            <!-- <div class="page-meta"> -->
            <nav class="breadcrumb-style-five  mb-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg><span class="inner-text">Home</span></a></li>
                    <li class="breadcrumb-item active"><a href="#">Location Master</a></li>
                </ol>
            </nav>

            <!-- </div>  -->
        </div>

        <div class="col-xl-6 col-md-6 col-sm-6 col-6 d-grid d-md-flex justify-content-md-end">
            <a class="btn btn-danger btn-icon btnUnDeleteRec3SIS" href="javascript:void(0)" id='Undelete_Data'
                class='' title="Restore">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-rotate-ccw">
                    <polyline points="1 4 1 10 7 10"></polyline>
                    <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                </svg>
            </a>
            <a href="{{ route('add_location') }}" class="btn btn-success me-4 btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                <span class="icon-name"> Add</span>
            </a>

        </div>



        {{-- {{ $location_list }} --}}

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Location Name</th>
                                <th>Country Name</th>
                                <th>BI</th>
                                <th>User</th>
                                <th class="no-content">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($location_list as $row)
                                {{-- {{ $row }} --}}
                                <tr>
                                    <td>{{ $row->GMLMHLocationId }}</td>
                                    <td>{{ $row->GMLMHDesc1 }}</td>
                                    <td>{{ $row->GMLMHCountryId }}</td>
                                    <td>{{ $row->GMLMHBiDesc }}</td>
                                    <td>{{ $row->GMLMHUser }}</td>
                                    <td>
                                        <!-- Edit -->
                                        <a href="edit_location/{{ Crypt::encryptString($row->id) }}"> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg></a>
                                        <!-- Delete -->
                                        <a href="javascript:void(0);" class="delete" id="{{ $row->id }}"
                                            action="delete"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17">
                                                </line>
                                                <line x1="14" y1="11" x2="14" y2="17">
                                                </line>
                                            </svg></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- Restore list undeletemodal -->
        <div id="UndoModal" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered 3SISPro-modal-dialog" role="document"
                style="max-width:1000px!important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table id="UndoModalTable" class="no-footer" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th title="Location Id">ID</th>
                                            <th>Location Name</th>
                                            <th>Country Name</th>
                                            <th>User</th>
                                            <th>Action</th>
                                            <th style="visibility: hidden;">Unique Id</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end undeletemodal -->

    </div>
</div>
@endsection
@section('js')
<!-- BEGIN THEME GLOBAL STYLE -->
<script src="../src/assets/js/scrollspyNav.js"></script>
<script src="../src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
<script src="../src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
<!-- END THEME GLOBAL STYLE -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../src/plugins/src/table/datatable/datatables.js"></script>
<script>
    $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 10
    });
</script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    $(document).on('click', '.delete', function() {
        var action = $(this).attr('action');
        var id = $(this).attr('id');

        var desc = $(this).closest("tr").find("td:eq(1)").text();
        $deleteMessage3SIS = fnConfirmationMsg('Delete', 'Location', id, desc);
        $successMessage3SIS = fnSuccessMsg('Deleted', 'Location', id, desc);

        Swal.fire({
            title: $deleteMessage3SIS,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'delete!',
            // allowOutsideClick: false,
            reverseButtons: true
        }).then((result) => {
            console.log(result)
            if (result.isConfirmed) {
                $.ajax({
                    url: "delete_restore",
                    method: 'post',
                    data: {
                        id: id,
                        action: action
                    },
                    success: function(data) {
                        console.log(data);
                        Swal.fire({
                            icon: 'success',
                            title: $successMessage3SIS,
                            allowOutsideClick: false,
                            timer: 5000,
                        })
                        window.location.reload();
                    }
                })
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Delete action is cancelled :)',
                    'error'
                )
            }
        })
    });
    $('#Undelete_Data').click(function() {
        $('#UndoModalTable').DataTable({
            // pagingType   : "simple_numbers",
            stripeClasses: [],
            pageLength: 6,
            lengthMenu: [6, 10, 20, 50],
            order: [
                [1, "desc"]
            ],
            processing: true,
            serverSide: true,
            destroy: true,
            "ajax": "delete_location_list",
            "columns": [{
                    data: "GMLMHLocationId"
                },
                {
                    data: "GMLMHDesc1"
                },
                {
                    data: "fn_city.GMCTHDesc1"
                },
                {
                    data: "GMLMHUser"
                },
                {
                    data: "action",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "id",
                    "visible": false
                },
            ]
        });
        $('.modal-title').text('Restore Location');
        $('#UndoModal').modal('show');
    });
    $(document).on('click', '.restore', function() {
        var action = 'undelete';
        var id = $(this).attr('id');
        var desc = $(this).closest("tr").find("td:eq(1)").text();
        $restoreMessage3SIS = fnConfirmationMsg('Restore', 'Location', id, desc);
        Swal.fire({
            title: $restoreMessage3SIS,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Restore!',
            allowOutsideClick: false,
        }).then((result) => {
            console.log(result)
            if (result.isConfirmed) {
                $.ajax({
                    url: "location_delete",
                    mehtod: "get",
                    data: {
                        id: id,
                        action: action
                    },
                    success: function(data) {
                        console.log(data);
                        $('#landingPageBrowser3SIS').DataTable().ajax.reload();
                        $('#UndoModalTable').DataTable().ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            title: 'Your data has been Restored.',
                        })
                    }
                })
            }
        })
    });

    function fnConfirmationMsg(actionName, tableName, Id, Desc) {
        return "Do you want to " + actionName + "?<br>" +
            tableName + " | <b style='color: #F5821F'> " + Id + "<br></b>" +
            "<b style='color: #F5821F'> " + Desc + ".";
    }

    function fnSuccessMsg(actionName, tableName, Id, Desc) {
        return actionName + " Successfully<br>" +
            tableName + " | <b style='color: #F5821F'> " + Id + "<br></b>" +
            "<b style='color: #F5821F'> " + Desc + ".";
    }
</script>
@endsection
