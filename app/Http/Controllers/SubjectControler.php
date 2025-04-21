<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectControler extends Controller
{
    public function createsubject()
    {
        return view('backend.createsubject');
    }
    public function storesubject(Request $request)
    {
        $request->validate([
            'subject_name' => 'required',
            'subject_code' => 'required'
        ]);
        $subject = new Subject;
        $subject->subject_name = $request->subject_name;
        $subject->subject_code = $request->subject_code;
        $subject->save();
        return redirect()->back()->with([
            'message' => 'Subject created successfully',
            'alert-type' => 'info',

        ]);
    }
    public function managesubject()
    {
        $subjects = Subject::all();
        return view('backend.managesubject', compact('subjects'));
    }
    public function editsubject($id)
    {
        $Subject_details = Subject::findOrFail($id);
        return view('backend.EditSubjects', compact('Subject_details'));
    }
    public function updatesubject(Request $request, $id)
    {

        $request->validate([
            'subject_name' => 'required',
            'subject_code' => 'required'
        ]);
        $subject = Subject::findOrFail($id);
        $subject->subject_name = $request->subject_name;
        $subject->subject_code = $request->subject_code;
        $subject->update();
        return redirect()->route('managesubject')->with([
            'message' => 'Subject Updated successfully',
            'alert-type' => 'info',

        ]);
    }
    public function Deletesubject($id)
    {
        Subject::findOrFail($id)->delete();
        return redirect()->route('managesubject')->with([
            'message' => 'class deleted',
            'alert-type' => 'info'
        ]);
    }
    public function subject_Combination()
    {
        $class = classes::all();
        $subject = Subject::all();
        return view('managesubject_Combination', compact('class', 'subject'));
    }
    public function storeCombination(Request $request)
    {
        $class = classes::findOrFail($request->class_id); 
        $subjects = Subject::find($request->subjects_id);

        $class->subjects()->attach($subjects);
        return redirect()->back()->with([
            'message' => 'Conbination Done',
            'alert-type' => 'info',
        ]);
    }
    public function Manage_Combination()
    {
        $results = DB::table('table_classes_student')
            ->join('classes', 'table_classes_student.class_id', '=', 'classes.id')
            ->join('subjects', 'table_classes_student.subjects_id', '=', 'subjects.id')
            ->select(
                'table_classes_student.*',
                'classes.class_name',
                'classes.section',
                'subjects.subject_name'
            )
            ->get();

        return view('backend.Manage_Combination', compact('results'));
    }
    public function deactivate_Combination($id)
    {
        
        $status=DB::table('table_classes_student')->select('status')->where('id',$id)->first();
        if($status->status == 1)
        {
            DB::table('table_classes_student')->where('id',$id)->update(['status' => 0]);
            return redirect()->back()->with([
                'message' => 'status deactivated',
                'alert-type' => 'info',
            ]);
        }
        elseif($status->status == 0)
        {
            DB::table('table_classes_student')->where('id',$id)->update(['status' => 1]);
            return redirect()->back()->with([
                'message' => 'status activated',
                'alert-type' => 'info',
            ]);
        }
    }
}
