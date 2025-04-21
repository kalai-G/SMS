<!doctype html>
<html lang="en">
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
                        <h5 class="card-title mb-0">Create Subjects</h5>
                    </div>
                    <!--end::Header-->

                    <!--begin::Form-->
                    <form action="{{ route('storesubject') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="class_name" class="form-label">Subject Name</label>
                                    <input type="text" class="form-control  @error('subject_name') is-invalid @enderror" id="subject_name" name='subject_name' placeholder="Enter Subject Name">
                                    <div class="form-text" id="basic-addon4">
                                        Example: First, Second,Third etc
                                    </div>
                                    @error('subject_name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="section" class="form-label">Subject Code</label>
                                    <input type="text" class="form-control  @error('subject_code') is-invalid @enderror" id="subject_code" name='subject_code' placeholder="Enter Subject code">
                                    <div class="form-text" id="basic-addon4">
                                        Example: A, B, C etc
                                    </div>
                                    @error('subject_code')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror

                                </div>





                            </div>

                        </div>
                        <!--end::Body-->

                        <!--begin::Footer-->
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Create Subject</button>
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