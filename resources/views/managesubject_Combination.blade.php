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
            <h5 class="card-title mb-0">Add Subject Combination </h5>
          </div>
          <!--end::Header-->
          <!--begin::Form-->
          <form action="{{ route('storeCombination') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                  <label for="validationCustom04" class="form-label">Class</label>
                </div>
                <div class="col-md-6">
                  <select class="form-select" name="class_id" id="validationCustom04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    @foreach($class as $classes)
                    <option value="{{$classes->id}}">{{$classes->class_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- Subject Section -->
              <div class="row mt-3">
                <div class="col-md-2">
                  <label for="subject" class="form-label">Subjects</label>
                </div>
                <div class="col-md-6">
                  <div id="subject-container">
                    <div class="input-group mb-2">
                      <select name="subjects_id[]" class="form-select" required>
                        <option selected disabled value="">Choose...</option>
                        @foreach($subject as $subjects)
                        <option value="{{ $subjects->id }}">{{ $subjects->subject_name }}</option>
                        @endforeach
                      </select>
                      <button type="button" class="btn btn-danger ms-2 remove-subject d-none">Remove</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                <button type="button" class="btn btn-success mt-2" id="add-subject">Add Subject</button>

                </div>
              </div>

            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Create Subjects</button>
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
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const subjectContainer = document.getElementById('subject-container');
    const addBtn = document.getElementById('add-subject');

    addBtn.addEventListener('click', function () {
    
      const newField = subjectContainer.firstElementChild.cloneNode(true);
      newField.querySelector('select').value = '';
      newField.querySelector('.remove-subject').classList.remove('d-none');
      subjectContainer.appendChild(newField);
    });

    subjectContainer.addEventListener('click', function (e) {
      if (e.target.classList.contains('remove-subject')) {
        e.target.closest('.input-group').remove();
      }
    });
  });
</script>

</html>