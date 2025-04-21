<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />

    <!-- Theme styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" />
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary app-loaded sidebar-open">
    <div class="app-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
                    <h5 class="m-0 me-2">Settings</h5>
                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>
                <div class="p-4">
                    @foreach ([1,2,3] as $layout)
                    <div class="mb-2">
                        <img src="{{ asset('assets/images/layouts/layout-' . $layout . '.jpg') }}" class="img-fluid img-thumbnail" alt="layout-{{ $layout }}">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox"
                            id="{{ ['light', 'dark', 'rtl'][$layout - 1] }}-mode-switch"
                            @if($layout==1) checked @endif
                            @if($layout==2)
                            data-bsStyle="{{ asset('assets/css/bootstrap-dark.min.css') }}"
                            data-appStyle="{{ asset('assets/css/app-dark.min.css') }}"
                            @elseif($layout==3)
                            data-appStyle="{{ asset('assets/css/app-rtl.min.css') }}"
                            @endif>
                        <label class="form-check-label" for="{{ ['light', 'dark', 'rtl'][$layout - 1] }}-mode-switch">
                            {{ ['Light Mode', 'Dark Mode', 'RTL Mode'][$layout - 1] }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">View Student Tables</h4>
                        </div>
                    </div>
                </div>

                <!-- table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">View Class Table</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Student Name</th>
                                            <th>Class</th>
                                            <th>Roll No</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($results as $key => $result)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $result->student->name ?? 'N/A' }}</td>
                                            <td>{{ $result->student->class->class_name ?? 'N/A' }}</td>
                                            <td>{{ $result->student->roll_id ?? 'N/A'}} </td>
                                            <td>
                                                    <a href="{{route('editresult',$result->student->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Edit</a>

                                                <a href="{{route('deleteResult',$result->student->id) }}" id="delete" class="btn btn-info btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>

    <!-- Right bar overlay -->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- DataTables JS -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Init -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>