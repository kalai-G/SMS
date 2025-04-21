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
          <div class="card-header">
            <h2 class="card-title mb-0">Edit Result</h2>
          </div>

          <form action="{{ route('UpdateResult') }}" method="POST">
            @csrf
            <input type="hidden" name="student_id" value="{{ $result[0]->student_id }}">

            <div class="card-body">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label class="form-label">Student Name</label>
                  <input type="text" class="form-control" value="{{ $result[0]->student->name ?? 'N/A' }}" readonly>
                </div>

                <div class="mb-3 col-md-6">
                  <label class="form-label">Class</label>
                  <input type="text" class="form-control" value="{{ $result[0]->student->class->class_name ?? 'N/A' }}" readonly>
                </div>
              </div>

              <div class="row">
                <label class="form-label">Subjects & Marks</label>
                @foreach($result as $res)
                <div class="mb-3 col-md-6">
                  <input type="hidden" name="subject_ids[]" value="{{ $res->subject_id }}">
                  <input type="hidden" name="result_ids[]" value="{{ $res->id }}">

                  <label>{{ $res->subject->subject_name ?? 'Subject' }}</label>
                  <input type="number" name="marks[]" value="{{ $res->marks }}" class="form-control" required>
                </div>
                @endforeach
              </div>
            </div>

            <div class="card-footer d-flex justify-content-end">
              <button type="submit" class="btn btn-success">Update Results</button>
            </div>
          </form>
        </div>
      </div>
    </main>
    @include('layouts.footer')
  </div>
</body>

</html>