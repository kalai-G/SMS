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
              <h5 class="card-title mb-0">Admin Profile</h5>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form action="{{ route('adminprofileupdate') }}" method="post" enctype="multipart/form-data">
              @csrf
              <!--begin::Body-->
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name='name' placeholder="Enter username" value="{{ $adminData->name}}">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name='email' placeholder="Enter email" value="{{$adminData->email}}">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="profilepic" class="form-label">Profile Photo</label>
                    <input type="file" class="form-control" id="profilepic" name='picture_url'>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label class="form-label d-block" for="showImage">Preview</label>
                    <img src="{{ !empty($adminData->picture_url) ? asset('uploads/' . $adminData->picture_url) : asset('upload/default.png') }}"
                      class="rounded" alt="Avatar"
                      style="width: 120px; height: auto;" id="showImage"  >
                  </div>
                </div>
              </div>
              <!--end::Body-->
              <!--begin::Footer-->
              <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
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