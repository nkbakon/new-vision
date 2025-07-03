<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Development;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DevelopmentController extends Controller
{
    public function index()
    {
        $developments = Development::orderBy('id', 'desc')->paginate(25);
        return view('developments.index', compact('developments'));
    }

    public function create()
    {
        return view('developments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $categories= json_encode($request->categories);
        $sessions= json_encode($request->sessions);

        $development = new Development();
        $development->student_id = $request->student_id;
        $development->enrollment_date = $request->enrollment_date;
        $development->referred_by = $request->referred_by;
        $development->categories = $categories;
        $development->sessions = $sessions;
        $development->advisor = $request->advisor;
        $development->date = $request->date;
        $development->goal = $request->goal;
        $development->motivation = $request->motivation;
        $development->action_step = $request->action_step;
        $development->barrier = $request->barrier;
        $development->strategy = $request->strategy;
        $development->award = $request->award;
        $development->comment = $request->comment;
        $development->was_goal = $request->was_goal;
        $development->date_goal = $request->date_goal;
        $development->save();  
        
        if($request->hasFile('student_signature')) {
            $student_signature = $request->file('student_signature');
            $folderName = 'signatures';        
            $path = $student_signature->store($folderName, 'public');
            $development->student_signature = $path;
            $development->save();
        } 

        if($request->hasFile('mentor_signature')) {
            $mentor_signature = $request->file('mentor_signature');
            $folderName = 'signatures';        
            $path = $mentor_signature->store($folderName, 'public');
            $development->mentor_signature = $path;
            $development->save();
        } 

        if($development){
            return redirect()->route('developments.index')->with('status', 'Individual development plan saved successfully.');         
        }
        return redirect()->route('developments.index')->with('delete', 'Individual development plan save faild, try again.');
    }

    public function view(Development $development)
    {
        return view('developments.view', compact('development'));
    }

    public function edit(Development $development)
    {
        return view('developments.edit', compact('development'));
    }

    public function update(Request $request, Development $development)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $categories= json_encode($request->categories);
        $sessions= json_encode($request->sessions);
        
        $development->student_id = $request->student_id;
        $development->enrollment_date = $request->enrollment_date;
        $development->referred_by = $request->referred_by;
        $development->categories = $categories;
        $development->sessions = $sessions;
        $development->advisor = $request->advisor;
        $development->date = $request->date;
        $development->goal = $request->goal;
        $development->motivation = $request->motivation;
        $development->action_step = $request->action_step;
        $development->barrier = $request->barrier;
        $development->strategy = $request->strategy;
        $development->award = $request->award;
        $development->comment = $request->comment;
        $development->was_goal = $request->was_goal;
        $development->date_goal = $request->date_goal;
        $development->save(); 

        if($request->hasFile('update_student_signature')) {                
            if($development->student_signature != null){
                Storage::disk('public')->delete($development->student_signature);
                $development->student_signature = null;
                $development->save();
            }
        
            $update_student_signature = $request->file('update_student_signature');
            $folderName = 'signatures';        
            $path = $update_student_signature->store($folderName, 'public');
            $development->student_signature = $path;
            $development->save();

        }elseif(!$request->hasFile('update_student_signature') && $request->student_signature_remove == "1"){
            if($development->student_signature != null){
                Storage::disk('public')->delete($development->student_signature);
                $development->student_signature = null;
                $development->save();
            }
        }

        if($request->hasFile('update_mentor_signature')) {                
            if($development->mentor_signature != null){
                Storage::disk('public')->delete($development->mentor_signature);
                $development->mentor_signature = null;
                $development->save();
            }
        
            $update_mentor_signature = $request->file('update_mentor_signature');
            $folderName = 'signatures';        
            $path = $update_mentor_signature->store($folderName, 'public');
            $development->mentor_signature = $path;
            $development->save();

        }elseif(!$request->hasFile('update_mentor_signature') && $request->mentor_signature_remove == "1"){
            if($development->mentor_signature != null){
                Storage::disk('public')->delete($development->mentor_signature);
                $development->mentor_signature = null;
                $development->save();
            }
        }

        return redirect()->route('developments.index')->with('success', 'Individual development plan updated successfully.');
    }

    public function destroy(Request $request)
    {
        $development = Development::find($request->data_id);
        if($development)
        {
            if($development->student_signature != null){
                Storage::disk('public')->delete($development->student_signature);
                $development->student_signature = null;
                $development->save();
            }

            if($development->mentor_signature != null){
                Storage::disk('public')->delete($development->mentor_signature);
                $development->mentor_signature = null;
                $development->save();
            }

            $development->delete();

            return redirect()->route('developments.index')->with('delete', 'Individual development plan deleted successfully.');
        }
        else
        {
            return redirect()->route('developments.index')->with('delete', 'No individual development plan found!.');
        }    
    }
}
