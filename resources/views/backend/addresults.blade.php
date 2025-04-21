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
              <h5 class="card-title mb-0">Declare Result</h5>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form action="{{ route('storeResults') }}" method="post" enctype="multipart/form-data">
              @csrf
              <!--begin::Body-->
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="class_name" class="form-label">class </label>
                    <select class="form-select dynamic" name="class_id" id="class_id" data-dependant="student">
                      <option value="">--Select the Class---</option>
                      @foreach($class as $classes)
                      <option value="{{ $classes->id }}">
                        {{ $classes->class_name }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="section" class="form-label">Student Name</label>
                    <select class="form-select" name="student_id" id="student" required>
                      <option  value="">Choose...</option>
                    </select>
                    <div id="alert">
                    </div>
                    @error('subject_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="row " id="showSubjects">
                  <div class="mb-3">
                    <label for="class_name" class="form-label">Subjects </label>
                    <div class="sub">
                    </div>
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
        $('#showSubjects').hide();
        $('.dynamic').on('change', function() {
            let class_id = $(this).val();
            let dependant = $(this).data('dependant');
            let _token = "{{ csrf_token() }}";
    
            $.ajax({
                url: "{{ route('fetchStudent') }}",
                method: "GET",
                dataType: "json",
                data: {
                    class_id: class_id,
                    _token: _token
                },
                success: function(result) {
                    $('#student').html(result.students);
                    $('.sub').html(result.subjects);
                    $('#showSubjects').show();
                    console.log(result);
                }
            });
        });
    
        $('#student').change(function(){
            let Student_id =$(this).val();
            let _token = "{{ csrf_token() }}";
    
            $.ajax({
                url:"{{ route('checkresult') }}",
                method:"GET",
                dataType:"json",
                data:{
                    Student_id:Student_id, _token: _token
                },
                success: function(result)
                {
                    console.log(result);
                    $('#alert').html(result.html);
                }
            });
        });
    });
  </script>
</html>