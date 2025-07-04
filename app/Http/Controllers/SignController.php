<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sign;
use App\Models\SignStudent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SignController extends Controller
{
    public function index()
    {
        $signs = Sign::orderBy('id', 'desc')->paginate(25);
        return view('signs.index', compact('signs'));
    }

    public function create()
    {
        return view('signs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
        ]);

        $sign = new Sign();
        $sign->date = $request->date;
        $sign->save(); 

        $student_ids = $request->student_ids;
        $participants = $request->participants;
        
        foreach($student_ids as $index => $student_id){
            if(isset($student_id) && $student_id != null){                
                $sign_student = new SignStudent();
                $sign_student->sign_id = $sign->id;
                $sign_student->student_id = $student_id;
                $sign_student->participant = $participants[$index];
                $sign_student->save();
            }
        }

        if($sign){
            return redirect()->route('signs.index')->with('status', 'Student sign-n sheet saved successfully.');         
        }
        return redirect()->route('signs.index')->with('delete', 'Student sign-n sheet save faild, try again.');
    }

    public function view(Sign $sign)
    {
        $sign_students = SignStudent::where('sign_id', $sign->id)->get();
        return view('signs.view', compact('sign', 'sign_students'));
    }

    public function edit(Sign $sign)
    {
        $sign_students = SignStudent::where('sign_id', $sign->id)->get();
        return view('signs.edit', compact('sign', 'sign_students'));
    }

    public function update(Request $request, Sign $sign)
    {
        $request->validate([
            'date' => 'required',
        ]);

        $sign->date = $request->date;
        $sign->save(); 

        $student_ids = $request->student_ids;
        $participants = $request->participants;
        
        $sign_students = SignStudent::where('sign_id', $sign->id)->get();
        
        foreach($sign_students as $index => $sign_student){            
            if(isset($sign_student) && $sign_student != null){
                $sign_student->sign_id = $sign->id;
                $sign_student->student_id = $student_ids[$index];
                $sign_student->participant = $participants[$index];
                $sign_student->save();
            }
        }

        return redirect()->route('signs.index')->with('success', 'Student sign-n sheet updated successfully.');
    }

    public function destroy(Request $request)
    {
        $sign = Sign::find($request->data_id);
        if($sign)
        {
            $sign_students = SignStudent::where('sign_id', $sign->id)->delete();
            $sign->delete();

            return redirect()->route('signs.index')->with('delete', 'Student sign-n sheet deleted successfully.');
        }
        else
        {
            return redirect()->route('signs.index')->with('delete', 'No student sign-n sheet found!.');
        }    
    }
}
