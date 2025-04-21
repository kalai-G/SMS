<!doctype html>
<html lang="en">
  <head>
    @include('layouts.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{( asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
  </head>
  <body data-topbar="dark">
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
            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>
            <div class="p-4">
              <div class="mb-2">
                <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
              </div>
              <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
              </div>
              <div class="mb-2">
                <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
              </div>
              <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
              </div>
              <div class="mb-2">
                <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
              </div>
              <div class="form-check form-switch mb-5">
                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
              </div>
            </div>
          </div>
          <!-- end slimscroll-menu-->
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
            <!-- end page title -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">View class Table</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                        <tr>
                          <th>S.no</th>
                          <th>class name</th>
                          <th>Section</th>
                          <th>Created Date & Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($subjects as $key => $subject)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$subject->subject_name}}</td>
                          <td>{{$subject->subject_code}}</td>
                          <td>{{$subject->created_at}}</td>
                          <td style="text-align: center;font-size: 20px; color:rgb(var(--bs-secondary-bg-rgb));">
                            <a href="{{ route ('editsubject',$subject->id) }}"><i  class="fa-solid fa-pen-to-square me-3" style="color:rgb(34 60 86);"></i></a>
                            <a href="{{ route ('Deletesubject',$subject->id) }}"  id="delete" > <i class="fa-solid fa-trash" style="color:rgb(34 60 86);"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- container-fluid -->
        </div>
        @include('layouts.footer')
      </div>
      </div>
      <!-- END layout-wrapper -->
      <!-- Right Sidebar -->
      <!-- /Right-bar -->
      <!-- Right bar overlay-->
      <div class="rightbar-overlay"></div>
      <!-- JAVASCRIPT -->
      <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
      <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
      <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
      <!-- Required datatable js -->
      <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
      <!-- Buttons examples -->
      <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
      <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
      <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
      <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
      <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
      <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
      <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
      <!-- Responsive examples -->
      <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
      <!-- Datatable init js -->
      <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
      <script src="{{ asset('assets/js/app.js') }}"></script>
  </body>
</html>