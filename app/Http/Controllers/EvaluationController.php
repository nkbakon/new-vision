<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::orderBy('id', 'desc')->paginate(25);
        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        return view('evaluations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $areas= json_encode($request->areas);

        $evaluation = new Evaluation();
        $evaluation->student_id = $request->student_id;
        $evaluation->start_date = $request->start_date;
        $evaluation->feel_better = $request->feel_better;
        $evaluation->areas = $areas;
        $evaluation->area_not_well = $request->area_not_well;
        $evaluation->what_area_not_well = $request->what_area_not_well;
        $evaluation->cooperative = $request->cooperative;
        $evaluation->positive = $request->positive;
        $evaluation->organized = $request->organized;
        $evaluation->trouble_less = $request->trouble_less;
        $evaluation->hanging_street = $request->hanging_street;
        $evaluation->education = $request->education;
        $evaluation->getting_a_job = $request->getting_a_job;
        $evaluation->positive_img = $request->positive_img;
        $evaluation->positive_edu = $request->positive_edu;
        $evaluation->attitude = $request->attitude;
        $evaluation->attitude_describe = $request->attitude_describe;
        $evaluation->help_improve = $request->help_improve;
        $evaluation->other_comment = $request->other_comment;
        $evaluation->save();       

        if($evaluation){
            return redirect()->route('evaluations.index')->with('status', 'Post evaluation saved successfully.');         
        }
        return redirect()->route('evaluations.index')->with('delete', 'Post evaluation save faild, try again.');
    }

    public function view(Evaluation $evaluation)
    {
        return view('evaluations.view', compact('evaluation'));
    }

    public function edit(Evaluation $evaluation)
    {
        return view('evaluations.edit', compact('evaluation'));
    }

    public function update(Request $request, Evaluation $evaluation)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $areas= json_encode($request->areas);

        $evaluation->student_id = $request->student_id;
        $evaluation->start_date = $request->start_date;
        $evaluation->feel_better = $request->feel_better;
        $evaluation->areas = $areas;
        $evaluation->area_not_well = $request->area_not_well;
        $evaluation->what_area_not_well = $request->what_area_not_well;
        $evaluation->cooperative = $request->cooperative;
        $evaluation->positive = $request->positive;
        $evaluation->organized = $request->organized;
        $evaluation->trouble_less = $request->trouble_less;
        $evaluation->hanging_street = $request->hanging_street;
        $evaluation->education = $request->education;
        $evaluation->getting_a_job = $request->getting_a_job;
        $evaluation->positive_img = $request->positive_img;
        $evaluation->positive_edu = $request->positive_edu;
        $evaluation->attitude = $request->attitude;
        $evaluation->attitude_describe = $request->attitude_describe;
        $evaluation->help_improve = $request->help_improve;
        $evaluation->other_comment = $request->other_comment;
        $evaluation->save();  

        return redirect()->route('evaluations.index')->with('success', 'Post evaluation updated successfully.');
    }

    public function destroy(Request $request)
    {
        $evaluation = Evaluation::find($request->data_id);
        if($evaluation)
        {
            $evaluation->delete();

            return redirect()->route('evaluations.index')->with('delete', 'Post evaluation deleted successfully.');
        }
        else
        {
            return redirect()->route('evaluations.index')->with('delete', 'No post evaluation found!.');
        }    
    }
}
