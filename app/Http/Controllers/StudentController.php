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
            'school' => 'required',
        ]);

        $lives = json_encode($request->lives);
        $events = json_encode($request->events);
        $other_infos = json_encode($request->other_infos);
        $previous_conducts = json_encode($request->previous_conducts);

        $student = new Student();
        $student->name = $request->name;
        $student->school = $request->school;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->state = $request->state;
        $student->zip = $request->zip;
        $student->home_phone = $request->home_phone;
        $student->work_phone = $request->work_phone;
        $student->cell_phone = $request->cell_phone;
        $student->gender = $request->gender;
        $student->ethnicity = $request->ethnicity;
        $student->age = $request->age;
        $student->dob = $request->dob;
        $student->father = $request->father;
        $student->mother = $request->mother;
        $student->parents_home_phone = $request->parents_home_phone;
        $student->parents_work_phone = $request->parents_work_phone;
        $student->parents_cell_phone = $request->parents_cell_phone;
        $student->student_lives_with = $request->student_lives_with;
        $student->gpa = $request->gpa;
        $student->counselor = $request->counselor;
        $student->emergency_contact = $request->emergency_contact;
        $student->relationship_to_student = $request->relationship_to_student;
        $student->emergency_home_phone = $request->emergency_home_phone;
        $student->emergency_work_phone = $request->emergency_work_phone;
        $student->emergency_cell_phone = $request->emergency_cell_phone;
        $student->guardian_email = $request->guardian_email;
        $student->student_email = $request->student_email;
        $student->lives = $lives;
        $student->contact_with_police = $request->contact_with_police;
        $student->explain_contact_with_police = $request->explain_contact_with_police;
        $student->court_involement = $request->court_involement;
        $student->incarcerated = $request->incarcerated;
        $student->explain_incarcerated = $request->explain_incarcerated;
        $student->events = $events;
        $student->other_infos = $other_infos;
        $student->last_school = $request->last_school;
        $student->previous_conducts = $previous_conducts;
        $student->suspended_time = $request->suspended_time;
        $student->ever_expelled = $request->ever_expelled;
        $student->explain_ever_expelled = $request->explain_ever_expelled;
        $student->additional_info = $request->additional_info;
        $student->advisor = $request->advisor;
        $student->save();

        if($request->hasFile('parent_signature')) {
            $parent_signature = $request->file('parent_signature');
            $folderName = 'signatures';        
            $path = $parent_signature->store($folderName, 'public');
            $student->parent_signature = $path;
            $student->save();
        } 
        
        if($request->hasFile('student_signature')) {
            $student_signature = $request->file('student_signature');
            $folderName = 'signatures';        
            $path_stu = $student_signature->store($folderName, 'public');
            $student->student_signature = $path_stu;
            $student->save();
        } 

        if($student){
            return redirect()->route('students.index')->with('status', 'Student data recorded successfully.');         
        }
        return redirect()->route('students.index')->with('delete', 'Student data record faild, try again.');
    }

    public function view(Student $student)
    {
        return view('students.view', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'school' => 'required',
        ]);

        $lives = json_encode($request->lives);
        $events = json_encode($request->events);
        $other_infos = json_encode($request->other_infos);
        $previous_conducts = json_encode($request->previous_conducts);

        $student->name = $request->name;
        $student->school = $request->school;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->state = $request->state;
        $student->zip = $request->zip;
        $student->home_phone = $request->home_phone;
        $student->work_phone = $request->work_phone;
        $student->cell_phone = $request->cell_phone;
        $student->gender = $request->gender;
        $student->ethnicity = $request->ethnicity;
        $student->age = $request->age;
        $student->dob = $request->dob;
        $student->father = $request->father;
        $student->mother = $request->mother;
        $student->parents_home_phone = $request->parents_home_phone;
        $student->parents_work_phone = $request->parents_work_phone;
        $student->parents_cell_phone = $request->parents_cell_phone;
        $student->student_lives_with = $request->student_lives_with;
        $student->gpa = $request->gpa;
        $student->counselor = $request->counselor;
        $student->emergency_contact = $request->emergency_contact;
        $student->relationship_to_student = $request->relationship_to_student;
        $student->emergency_home_phone = $request->emergency_home_phone;
        $student->emergency_work_phone = $request->emergency_work_phone;
        $student->emergency_cell_phone = $request->emergency_cell_phone;
        $student->guardian_email = $request->guardian_email;
        $student->student_email = $request->student_email;
        $student->lives = $lives;
        $student->contact_with_police = $request->contact_with_police;
        $student->explain_contact_with_police = $request->explain_contact_with_police;
        $student->court_involement = $request->court_involement;
        $student->incarcerated = $request->incarcerated;
        $student->explain_incarcerated = $request->explain_incarcerated;
        $student->events = $events;
        $student->other_infos = $other_infos;
        $student->last_school = $request->last_school;
        $student->previous_conducts = $previous_conducts;
        $student->suspended_time = $request->suspended_time;
        $student->ever_expelled = $request->ever_expelled;
        $student->explain_ever_expelled = $request->explain_ever_expelled;
        $student->additional_info = $request->additional_info;
        $student->advisor = $request->advisor;
        $student->save();

        if($request->hasFile('update_parent_signature')) {                
            if($student->parent_signature != null){
                Storage::disk('public')->delete($student->parent_signature);
                $student->parent_signature = null;
                $student->save();
            }
        
            $update_parent_signature = $request->file('update_parent_signature');
            $folderName = 'signatures';        
            $path = $update_parent_signature->store($folderName, 'public');
            $student->parent_signature = $path;
            $student->save();

        }elseif(!$request->hasFile('update_parent_signature') && $request->parent_signature_remove == "1"){
            if($student->parent_signature != null){
                Storage::disk('public')->delete($student->parent_signature);
                $student->parent_signature = null;
                $student->save();
            }
        }

        if($request->hasFile('update_student_signature')) {                
            if($student->student_signature != null){
                Storage::disk('public')->delete($student->student_signature);
                $student->student_signature = null;
                $student->save();
            }
        
            $update_student_signature = $request->file('update_student_signature');
            $folderName = 'signatures';        
            $path1 = $update_student_signature->store($folderName, 'public');
            $student->student_signature = $path1;
            $student->save();

        }elseif(!$request->hasFile('update_student_signature') && $request->student_signature_remove == "1"){
            if($student->student_signature != null){
                Storage::disk('public')->delete($student->student_signature);
                $student->student_signature = null;
                $student->save();
            }
        }

        return redirect()->route('students.index')->with('success', 'Student data records updated successfully.');
    }

    public function destroy(Request $request)
    {
        $student = Student::find($request->data_id);
        if($student)
        {
            if($student->parent_signature != null){
                Storage::disk('public')->delete($student->parent_signature);
                $student->parent_signature = null;
                $student->save();
            }

            if($student->student_signature != null){
                Storage::disk('public')->delete($student->student_signature);
                $student->student_signature = null;
                $student->save();
            }

            $student->delete();

            return redirect()->route('students.index')->with('delete', 'Student data deleted successfully.');
        }
        else
        {
            return redirect()->route('students.index')->with('delete', 'No student data found!.');
        }    
    }
}
