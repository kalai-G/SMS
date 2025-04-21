<?php

namespace App\Http\Controllers\backend;

use App\Models\Result;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function create()
    {
        $class = Classes::all();
        return view('backend.addresults', compact('class'));
    }
    public function fetchStudent(Request $request)
    {
        $class_id = $request->class_id;
        $students = Student::where('class_id', $class_id)->get();
        $std_data = '<option> --Select a Student --</option>';
        foreach ($students as $student) {
            $std_data .= '<option value="' . $student->id . '">' . $student->name . '|' . $student->name . '</option>';
        }


        $class = classes::with('subjects')->where('id', $class_id)->first();
        $class_subjects = $class->subjects;
        for ($i = 0; $i < count($class_subjects); $i++) {
            $subject_data[$i] = '<div class="mb-3 col-md-9">
                                        <label for="class_id" class="form-label">' . $class_subjects[$i]->subject_name . '</label>
                                        <input type="hidden" class="form-control" name="subject_ids[]"  value="' . $class_subjects[$i]->id . '">
                                        <input type="text" class="form-control" name="marks[]"  placeholder="Enter marks">
                                    </div>';
        }

        return response()->json([
            'students' => $std_data,
            'subjects' => $subject_data
        ]);
    }
    public function checkresult(Request $request)
    {
        $Student_id = $request->Student_id;

        $result = Result::where('student_id', $Student_id)->first();

        $message = '';
        if ($result) {
            $message .= '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                 Result found for this student.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
        }

        return response()->json(['html' => $message]);
    }

    public function storeResults(Request $request)
    {

        foreach ($request->subject_ids as $index => $subjectId) {
            Result::create([
                'class_id' => $request->class_id,
                'student_id' => $request->student_id,
                'subject_id' => $subjectId,
                'marks' => $request->marks[$index],
            ]);
        }

        return redirect()->back()->with([
            'message' => 'result Saved Successfully',
            'alert-type' => 'info',
        ]);
    }
    public function Manageresults()
    {
        $results = Result::select('results.*')
            ->join(DB::raw('(SELECT MAX(id) as max_id FROM results GROUP BY student_id) as latest'), 'results.id', '=', 'latest.max_id')
            ->with('student.class')
            ->get();

        return view('backend.Manageresults', compact('results'));
    }
    public function editresult($id)
    {
        $result = Result::where('student_id', $id)->get();
        return view('backend.EditResults', compact('result'));
    }
    public function UpdateResult(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_ids' => 'required|array',
            'result_ids' => 'required|array',
            'marks' => 'required|array',
        ]);

        foreach ($request->result_ids as $index => $resultId) {
            $result = Result::find($resultId);

            if ($result) {
                $result->update([
                    'subject_id' => $request->subject_ids[$index],
                    'marks' => $request->marks[$index],
                ]);
            }
        }

        return redirect()->back()->with([
            'message' => 'Results Updated Successfully',
            'alert-type' => 'success',
        ]);
    }
    public function deleteResult($id)
    {
        $Student = Student::find($id);
        @unlink(public_path('uploads'.$Student->photo));

Result::where('student_id',$Student->id);

        if ($Student) {
            $Student->delete();
            return redirect()->back()->with([
                'message' => 'Result deleted successfully.',
                'alert-type' => 'warning',
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Result not found.',
            'alert-type' => 'error',
        ]);
    }
}
