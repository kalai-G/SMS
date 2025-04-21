<?php

namespace App\Http\Controllers\backend;

use App\Models\classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Message;

class ClassesController extends Controller
{
    public function createclass()
    {
        return view('backend.Createclass_view');
    }
    public function storeclass(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'section' => 'required'

        ]);


        $class = new classes();
        $class->class_name = $request->class_name;
        $class->section = $request->section;
        $class->save();
        return redirect()->back()->with([
            'message' => 'Student class Created',
            'alert-type' => 'info'
        ]);
    }
    public function Manageclass()
    {
        $classes = classes::all();
        return view('backend.Manageclass', compact('classes'));
    }
    public function editclass($id)
    {
        $class = classes::findOrFail($id);
        return view('backend.editclass', compact('class'));
    }
    public function updateclass(Request $request, $id)
    {
        $class = classes::findOrFail($id);
        $class->class_name = $request->class_name;
        $class->section = $request->section;
        $class->update();
        return redirect()->route('Manageclass')->with([
            'message' => ' Student class updated successfully',
            'alert-type' => 'info'

        ]);
    }
    public function Deleteclass($id)
    {
        classes::findOrFail($id)->delete();
        return redirect()->route('Manageclass')->with([
            'message'=>'class deleted',
            'alert-type'=>'info'
        ]);
    }
}
