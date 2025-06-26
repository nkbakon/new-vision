<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessment::orderBy('id', 'desc')->paginate(25);
        return view('assessments.index', compact('assessments'));
    }

    public function create()
    {
        return view('assessments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $areas= json_encode($request->areas);
        $relationships= json_encode($request->relationships);

        $assessment = new Assessment();
        $assessment->student_id = $request->student_id;
        $assessment->areas = $areas;
        $assessment->relationships = $relationships;
        $assessment->cooperative = $request->cooperative;
        $assessment->grades_fine = $request->grades_fine;
        $assessment->school_attitude = $request->school_attitude;
        $assessment->interested_in_education = $request->interested_in_education;
        $assessment->work_well_with_students = $request->work_well_with_students;
        $assessment->satisfied_with_friends = $request->satisfied_with_friends;
        $assessment->do_homework = $request->do_homework;
        $assessment->life_attitude = $request->life_attitude;
        $assessment->dont_hang_street = $request->dont_hang_street;
        $assessment->cooperative_with_parent = $request->cooperative_with_parent;
        $assessment->dont_get_trouble = $request->dont_get_trouble;
        $assessment->getting_job = $request->getting_job;
        $assessment->have_you_stopped = $request->have_you_stopped;
        $assessment->stop_fair = $request->stop_fair;
        $assessment->happend_result = $request->happend_result;
        $assessment->happend_result_other = $request->happend_result_other;
        $assessment->school = $request->school;
        $assessment->save();

        if($request->hasFile('signature')) {
            $signature = $request->file('signature');
            $folderName = 'signatures';        
            $path = $signature->store($folderName, 'public');
            $assessment->signature = $path;
            $assessment->save();
        }        

        if($assessment){
            return redirect()->route('assessments.index')->with('status', 'Student Assessment data recorded successfully.');         
        }
        return redirect()->route('assessments.index')->with('delete', 'Student Assessment data record faild, try again.');
    }

    public function view(Assessment $assessment)
    {
        return view('assessments.view', compact('assessment'));
    }

    public function edit(Assessment $assessment)
    {
        return view('assessments.edit', compact('assessment'));
    }

    public function update(Request $request, Assessment $assessment)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $areas= json_encode($request->areas);
        $relationships= json_encode($request->relationships);

        $assessment->student_id = $request->student_id;
        $assessment->areas = $areas;
        $assessment->relationships = $relationships;
        $assessment->cooperative = $request->cooperative;
        $assessment->grades_fine = $request->grades_fine;
        $assessment->school_attitude = $request->school_attitude;
        $assessment->interested_in_education = $request->interested_in_education;
        $assessment->work_well_with_students = $request->work_well_with_students;
        $assessment->satisfied_with_friends = $request->satisfied_with_friends;
        $assessment->do_homework = $request->do_homework;
        $assessment->life_attitude = $request->life_attitude;
        $assessment->dont_hang_street = $request->dont_hang_street;
        $assessment->cooperative_with_parent = $request->cooperative_with_parent;
        $assessment->dont_get_trouble = $request->dont_get_trouble;
        $assessment->getting_job = $request->getting_job;
        $assessment->have_you_stopped = $request->have_you_stopped;
        $assessment->stop_fair = $request->stop_fair;
        $assessment->happend_result = $request->happend_result;
        $assessment->happend_result_other = $request->happend_result_other;
        $assessment->school = $request->school;
        $assessment->save();

        if($request->hasFile('update_signature')) {                
            if($assessment->signature != null){
                Storage::disk('public')->delete($assessment->signature);
                $assessment->signature = null;
                $assessment->save();
            }
        
            $update_signature = $request->file('update_signature');
            $folderName = 'signatures';        
            $path = $update_signature->store($folderName, 'public');
            $assessment->signature = $path;
            $assessment->save();

        }elseif(!$request->hasFile('update_signature') && $request->signature_remove == "1"){
            if($assessment->signature != null){
                Storage::disk('public')->delete($assessment->signature);
                $assessment->signature = null;
                $assessment->save();
            }
        }

        return redirect()->route('assessments.index')->with('success', 'Student Assessment data records updated successfully.');
    }

    public function destroy(Request $request)
    {
        $assessment = Assessment::find($request->data_id);
        if($assessment)
        {
            if($assessment->signature != null){
                Storage::disk('public')->delete($assessment->signature);
                $assessment->signature = null;
                $assessment->save();
            }
            $assessment->delete();

            return redirect()->route('assessments.index')->with('delete', 'Student Assessment data deleted successfully.');
        }
        else
        {
            return redirect()->route('assessments.index')->with('delete', 'No student assessment data found!.');
        }    
    }
}
