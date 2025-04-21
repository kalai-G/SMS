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
                        <h5 class="card-title mb-0">Edit Classes</h5>
                    </div>
                    <!--end::Header-->

                    <!--begin::Form-->
                    <form action="{{ route('updateclass',$class->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="class_name" class="form-label">Edit Class</label>
                                    <input type="text" value="{{$class->class_name}}" class="form-control  @error('class_name') is-invalid @enderror" id="class_name" name='class_name' placeholder="Enter class name">
                                    <div class="form-text" id="basic-addon4">
                                        Example: First, Second,Third etc
                                    </div>
                                    @error('class_name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="section" class="form-label">Section</label>
                                    <input type="text" value="{{$class->section }}" class="form-control  @error('section') is-invalid @enderror" id="section" name='section' placeholder="Enter section">
                                    <div class="form-text" id="basic-addon4">
                                        Example: A, B, C etc
                                    </div>
                                    @error('section')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror

                                </div>





                            </div>

                        </div>
                        <!--end::Body-->

                        <!--begin::Footer-->
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Class</button>
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