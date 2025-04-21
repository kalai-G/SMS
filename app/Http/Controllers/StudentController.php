<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        $class = Classes::get();
        return view('backend.AddStudents', compact('class'));
    }
    public function Store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'class_id' => 'required',
            'email' => 'required|email',
            'roll_id' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Handle photo upload
        $photoName = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHis') . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $photoName = $filename;
        }

        $student = new Student;
        $student->name = $request->name;
        $student->dob = $request->dob;
        $student->class_id = $request->class_id;
        $student->email = $request->email;
        $student->roll_id = $request->roll_id;
        $student->gender = $request->gender;
        $student->status = $request->status;
        $student->photo = $photoName; 
        $student->save();

        return redirect()->back()->with([
            'message' => 'Student Added Successfully',
            'alert-type' => 'info',
        ]);
    }
    public function view()
    {
        $student = Student::all();
        return view('backend.ManageStudent', compact('student'));
    }
    public function Edit($id)
    {
        $class = Classes::all();
        $student = Student::findOrFail($id);
        return view('backend.EditStudent', compact('student', 'class'));
    }
    public function update(Request $request, $id)
    {
        $student=Student::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'class_id' => 'required',
            'email' => 'required|email',
            'roll_id' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHis') . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $student->photo = $filename;
        }
    

        $student->name = $request->name;
        $student->dob = $request->dob;
        $student->class_id = $request->class_id;
        $student->email = $request->email;
        $student->roll_id = $request->roll_id;
        $student->gender = $request->gender;
        $student->status = $request->status;
        $student->save();

        return redirect()->route('ManageStudent')->with([
            'message' => 'Student updated Successfully',
            'alert-type' => 'info',
        ]);
    }
    public function Delete($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('ManageStudent')->with([
            'message' => 'Student deleted Successfully',
            'alert-type' => 'error',
        ]);

    }
}
