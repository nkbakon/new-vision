<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Selection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SelectionController extends Controller
{
    public function index()
    {
        $selections = Selection::orderBy('id', 'desc')->paginate(25);
        return view('selections.index', compact('selections'));
    }

    public function create()
    {
        return view('selections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $reasons= json_encode($request->reasons);

        $selection = new Selection();
        $selection->student_id = $request->student_id;
        $selection->time_to_contact = $request->time_to_contact;
        $selection->teachers_name = $request->teachers_name;
        $selection->teachers_contact = $request->teachers_contact;
        $selection->referring_student = $request->referring_student;
        $selection->reasons = $reasons;
        $selection->strong_points = $request->strong_points;
        $selection->success_like = $request->success_like;
        $selection->save();       

        if($selection){
            return redirect()->route('selections.index')->with('status', 'Student selection sheet saved successfully.');         
        }
        return redirect()->route('selections.index')->with('delete', 'Student selection sheet save faild, try again.');
    }

    public function view(Selection $selection)
    {
        return view('selections.view', compact('selection'));
    }

    public function edit(Selection $selection)
    {
        return view('selections.edit', compact('selection'));
    }

    public function update(Request $request, Selection $selection)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $reasons= json_encode($request->reasons);

        $selection->student_id = $request->student_id;
        $selection->time_to_contact = $request->time_to_contact;
        $selection->teachers_name = $request->teachers_name;
        $selection->teachers_contact = $request->teachers_contact;
        $selection->referring_student = $request->referring_student;
        $selection->reasons = $reasons;
        $selection->strong_points = $request->strong_points;
        $selection->success_like = $request->success_like;
        $selection->save(); 

        return redirect()->route('selections.index')->with('success', 'Student selection sheet updated successfully.');
    }

    public function destroy(Request $request)
    {
        $selection = Selection::find($request->data_id);
        if($selection)
        {
            $selection->delete();

            return redirect()->route('selections.index')->with('delete', 'Student selection sheet deleted successfully.');
        }
        else
        {
            return redirect()->route('selections.index')->with('delete', 'No student selection sheet found!.');
        }    
    }
}
