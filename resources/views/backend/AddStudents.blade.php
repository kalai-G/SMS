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
                        <h5 class="card-title mb-0"> Subjects Admission</h5>
                    </div>
                    <!--end::Header-->

                    <!--begin::Form-->
                    <form action="{{ route('StoreStudent') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- Name -->
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Student Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name">
                                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email">
                                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Roll ID -->
                                <div class="mb-3 col-md-6">
                                    <label for="roll_id" class="form-label">Roll ID</label>
                                    <input type="text" class="form-control @error('roll_id') is-invalid @enderror" id="roll_id" name="roll_id" placeholder="Enter Roll ID">
                                    @error('roll_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Class ID -->
                                <div class="mb-3 col-md-6">
                                    <label for="class_id" class="form-label">Class </label>
                                    @error('class_id') <div class="text-danger">{{ $message }}</div> @enderror
                                    <select class="form-select" name="class_id" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        @foreach($class as $classes)
                                        <option value="{{$classes->id}}">{{$classes->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Date of Birth -->
                                <div class="mb-3 col-md-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob">
                                    @error('dob') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Gender -->
                                <div class="mb-3 col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Photo -->
                                <div class="mb-3 col-md-6">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="profilepic" name="photo">
                                    @error('photo') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>


                                <!-- Status -->
                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label d-block" for="showImage">Preview</label>
                                    <img src="{{ asset('images/image.png') }}" class="rounded" alt="Avatar" style="width: 120px; height: auto;" id="showImage">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
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