<!doctype html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('js/adminlte.min.js') }}"></script>
@include('layouts.head')


<body>
    <div class="app-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')

        <main class="app-main">
            <div class="container-fluid mt-4">
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <h5 class="card-title mb-0">Change password</h5>
                    </div>
                    <!--end::Header-->

                    <!--begin::Form-->
                    <form action="{{ route('updatepassword') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="old_password" class="form-label">Old password</label>
                                    <input type="password" class="form-control  @error('old_password') is-invalid @enderror" id="old_password" name='old_password' placeholder="Enter Old Password" >
                                    @error('old_password')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="new_password" class="form-label">New password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror " id="new_password" name='new_password' placeholder="Enter New password">
                                    @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="new_password_con" class="form-label">Confirm New password</label>
                                    <input type="password" class="form-control" id="new_password_con" name='new_password_confirmation' placeholder="Enter New password" >
                                </div>
                      


                            </div>
                           
                        </div>
                        <!--end::Body-->

                        <!--begin::Footer-->
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">change password</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#profilepic').on('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);

        });
    });
</script>

</html>