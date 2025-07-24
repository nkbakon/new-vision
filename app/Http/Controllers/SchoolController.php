<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::orderBy('id', 'desc')->paginate(25);
        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'state' => 'required',
        ]);

        $school = new School();
        $school->name = $request->name;
        $school->state = $request->state;
        $school->save();       

        if($school){
            return redirect()->route('schools.index')->with('status', 'School saved successfully.');         
        }
        return redirect()->route('schools.index')->with('delete', 'School save faild, try again.');
    }

    public function view(School $school)
    {
        return view('schools.view', compact('school'));
    }

    public function edit(School $school)
    {
        return view('schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required',
            'state' => 'required',
        ]);

        $school->name = $request->name;
        $school->state = $request->state;
        $school->save();   

        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }

    public function destroy(Request $request)
    {
        $school = School::find($request->data_id);
        if($school)
        {
            $school->delete();

            return redirect()->route('schools.index')->with('delete', 'School deleted successfully.');
        }
        else
        {
            return redirect()->route('schools.index')->with('delete', 'No school found!.');
        }    
    }
}
