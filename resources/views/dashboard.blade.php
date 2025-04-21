<!doctype html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('js/adminlte.min.js') }}"></script>


@include('layouts.head')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary app-loaded sidebar-open">
    <div class="app-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        @include('layouts.main')

        @include('layouts.footer')
    </div>



</body>
<!--end::Body-->

</html>