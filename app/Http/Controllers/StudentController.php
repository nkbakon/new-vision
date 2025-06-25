<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(25);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:students,contact',
            'email' => 'required|email|unique:students,email',
        ]);

        $areas= json_encode($request->areas);
        $relationships= json_encode($request->relationships);

        $student = new Student();
        $student->name = $request->name;
        $student->contact = $request->contact;
        $student->email = $request->email;
        $student->areas = $areas;
        $student->relationships = $relationships;
        $student->cooperative = $request->cooperative;
        $student->grades_fine = $request->grades_fine;
        $student->school_attitude = $request->school_attitude;
        $student->interested_in_education = $request->interested_in_education;
        $student->work_well_with_students = $request->work_well_with_students;
        $student->satisfied_with_friends = $request->satisfied_with_friends;
        $student->do_homework = $request->do_homework;
        $student->life_attitude = $request->life_attitude;
        $student->dont_hang_street = $request->dont_hang_street;
        $student->cooperative_with_parent = $request->cooperative_with_parent;
        $student->dont_get_trouble = $request->dont_get_trouble;
        $student->getting_job = $request->getting_job;
        $student->have_you_stopped = $request->have_you_stopped;
        $student->stop_fair = $request->stop_fair;
        $student->happend_result = $request->happend_result;
        $student->happend_result_other = $request->happend_result_other;
        $student->school = $request->school;
        $student->save();

        if($request->hasFile('signature')) {
            $signature = $request->file('signature');
            $folderName = 'signatures';        
            $path = $signature->store($folderName, 'public');
            $student->signature = $path;
            $student->save();
        }        

        if($student){
            return redirect()->route('students.index')->with('status', 'Student data recorded successfully.');         
        }
        return redirect()->route('students.index')->with('delete', 'Student data record faild, try again.');
    }
}
