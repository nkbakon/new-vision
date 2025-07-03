<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mediation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MediationController extends Controller
{
    public function index()
    {
        $mediations = Mediation::orderBy('id', 'desc')->paginate(25);
        return view('mediations.index', compact('mediations'));
    }

    public function create()
    {
        return view('mediations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id1' => 'required',
        ]);

        $outcomes= json_encode($request->outcomes);

        $mediation = new Mediation();
        $mediation->student_id1 = $request->student_id1;
        $mediation->student_id2 = $request->student_id2;
        $mediation->student_id3 = $request->student_id3;
        $mediation->student_id4 = $request->student_id4;
        $mediation->referred_by = $request->referred_by;
        $mediation->date = $request->date;
        $mediation->incident = $request->incident;
        $mediation->outcomes = $outcomes;
        $mediation->outcome_explain = $request->outcome_explain;
        $mediation->referral = $request->referral;
        $mediation->save();  
        
        if($request->hasFile('s_signature1')) {
            $s_signature1 = $request->file('s_signature1');
            $folderName = 'signatures';        
            $path = $s_signature1->store($folderName, 'public');
            $mediation->s_signature1 = $path;
            $mediation->save();
        } 

        if($request->hasFile('s_signature2')) {
            $s_signature2 = $request->file('s_signature2');
            $folderName = 'signatures';        
            $path = $s_signature2->store($folderName, 'public');
            $mediation->s_signature2 = $path;
            $mediation->save();
        } 

        if($request->hasFile('s_signature3')) {
            $s_signature3 = $request->file('s_signature3');
            $folderName = 'signatures';        
            $path = $s_signature3->store($folderName, 'public');
            $mediation->s_signature3 = $path;
            $mediation->save();
        } 

        if($request->hasFile('s_signature4')) {
            $s_signature4 = $request->file('s_signature4');
            $folderName = 'signatures';        
            $path = $s_signature4->store($folderName, 'public');
            $mediation->s_signature4 = $path;
            $mediation->save();
        } 

        if($request->hasFile('staff_signature1')) {
            $staff_signature1 = $request->file('staff_signature1');
            $folderName = 'signatures';        
            $path = $staff_signature1->store($folderName, 'public');
            $mediation->staff_signature1 = $path;
            $mediation->save();
        } 

        if($request->hasFile('staff_signature2')) {
            $staff_signature2 = $request->file('staff_signature2');
            $folderName = 'signatures';        
            $path = $staff_signature2->store($folderName, 'public');
            $mediation->staff_signature2 = $path;
            $mediation->save();
        } 

        if($mediation){
            return redirect()->route('mediations.index')->with('status', 'Mediation saved successfully.');         
        }
        return redirect()->route('mediations.index')->with('delete', 'Mediation save faild, try again.');
    }

    public function view(Mediation $mediation)
    {
        return view('mediations.view', compact('mediation'));
    }

    public function edit(Mediation $mediation)
    {
        return view('mediations.edit', compact('mediation'));
    }

    public function update(Request $request, Mediation $mediation)
    {
        $request->validate([
            'student_id1' => 'required',
        ]);

        $outcomes= json_encode($request->outcomes);

        $mediation->student_id1 = $request->student_id1;
        $mediation->student_id2 = $request->student_id2;
        $mediation->student_id3 = $request->student_id3;
        $mediation->student_id4 = $request->student_id4;
        $mediation->referred_by = $request->referred_by;
        $mediation->date = $request->date;
        $mediation->incident = $request->incident;
        $mediation->outcomes = $outcomes;
        $mediation->outcome_explain = $request->outcome_explain;
        $mediation->referral = $request->referral;
        $mediation->save(); 

        if($request->hasFile('update_s_signature1')) {                
            if($mediation->s_signature1 != null){
                Storage::disk('public')->delete($mediation->s_signature1);
                $mediation->s_signature1 = null;
                $mediation->save();
            }
        
            $update_s_signature1 = $request->file('update_s_signature1');
            $folderName = 'signatures';        
            $path = $update_s_signature1->store($folderName, 'public');
            $mediation->s_signature1 = $path;
            $mediation->save();

        }elseif(!$request->hasFile('update_s_signature1') && $request->s_signature1_remove == "1"){
            if($mediation->s_signature1 != null){
                Storage::disk('public')->delete($mediation->s_signature1);
                $mediation->s_signature1 = null;
                $mediation->save();
            }
        }

        if($request->hasFile('update_s_signature2')) {                
            if($mediation->s_signature2 != null){
                Storage::disk('public')->delete($mediation->s_signature2);
                $mediation->s_signature2 = null;
                $mediation->save();
            }
        
            $update_s_signature2 = $request->file('update_s_signature2');
            $folderName = 'signatures';        
            $path = $update_s_signature2->store($folderName, 'public');
            $mediation->s_signature2 = $path;
            $mediation->save();

        }elseif(!$request->hasFile('update_s_signature2') && $request->s_signature2_remove == "1"){
            if($mediation->s_signature2 != null){
                Storage::disk('public')->delete($mediation->s_signature2);
                $mediation->s_signature2 = null;
                $mediation->save();
            }
        }

        if($request->hasFile('update_s_signature3')) {                
            if($mediation->s_signature3 != null){
                Storage::disk('public')->delete($mediation->s_signature3);
                $mediation->s_signature3 = null;
                $mediation->save();
            }
        
            $update_s_signature3 = $request->file('update_s_signature3');
            $folderName = 'signatures';        
            $path = $update_s_signature3->store($folderName, 'public');
            $mediation->s_signature3 = $path;
            $mediation->save();

        }elseif(!$request->hasFile('update_s_signature3') && $request->s_signature3_remove == "1"){
            if($mediation->s_signature3 != null){
                Storage::disk('public')->delete($mediation->s_signature3);
                $mediation->s_signature3 = null;
                $mediation->save();
            }
        }

        if($request->hasFile('update_s_signature4')) {                
            if($mediation->s_signature4 != null){
                Storage::disk('public')->delete($mediation->s_signature4);
                $mediation->s_signature4 = null;
                $mediation->save();
            }
        
            $update_s_signature4 = $request->file('update_s_signature4');
            $folderName = 'signatures';        
            $path = $update_s_signature4->store($folderName, 'public');
            $mediation->s_signature4 = $path;
            $mediation->save();

        }elseif(!$request->hasFile('update_s_signature4') && $request->s_signature4_remove == "1"){
            if($mediation->s_signature4 != null){
                Storage::disk('public')->delete($mediation->s_signature4);
                $mediation->s_signature4 = null;
                $mediation->save();
            }
        }

        if($request->hasFile('update_staff_signature1')) {                
            if($mediation->staff_signature1 != null){
                Storage::disk('public')->delete($mediation->staff_signature1);
                $mediation->staff_signature1 = null;
                $mediation->save();
            }
        
            $update_staff_signature1 = $request->file('update_staff_signature1');
            $folderName = 'signatures';        
            $path = $update_staff_signature1->store($folderName, 'public');
            $mediation->staff_signature1 = $path;
            $mediation->save();

        }elseif(!$request->hasFile('update_staff_signature1') && $request->staff_signature1_remove == "1"){
            if($mediation->staff_signature1 != null){
                Storage::disk('public')->delete($mediation->staff_signature1);
                $mediation->staff_signature1 = null;
                $mediation->save();
            }
        }

        if($request->hasFile('update_staff_signature2')) {                
            if($mediation->staff_signature2 != null){
                Storage::disk('public')->delete($mediation->staff_signature2);
                $mediation->staff_signature2 = null;
                $mediation->save();
            }
        
            $update_staff_signature2 = $request->file('update_staff_signature2');
            $folderName = 'signatures';        
            $path = $update_staff_signature2->store($folderName, 'public');
            $mediation->staff_signature2 = $path;
            $mediation->save();

        }elseif(!$request->hasFile('update_staff_signature2') && $request->staff_signature2_remove == "1"){
            if($mediation->staff_signature2 != null){
                Storage::disk('public')->delete($mediation->staff_signature2);
                $mediation->staff_signature2 = null;
                $mediation->save();
            }
        }

        return redirect()->route('mediations.index')->with('success', 'Mediation updated successfully.');
    }

    public function destroy(Request $request)
    {
        $mediation = Mediation::find($request->data_id);
        if($mediation)
        {
            if($mediation->s_signature1 != null){
                Storage::disk('public')->delete($mediation->s_signature1);
                $mediation->s_signature1 = null;
                $mediation->save();
            }

            if($mediation->s_signature2 != null){
                Storage::disk('public')->delete($mediation->s_signature2);
                $mediation->s_signature2 = null;
                $mediation->save();
            }

            if($mediation->s_signature3 != null){
                Storage::disk('public')->delete($mediation->s_signature3);
                $mediation->s_signature3 = null;
                $mediation->save();
            }

            if($mediation->s_signature4 != null){
                Storage::disk('public')->delete($mediation->s_signature4);
                $mediation->s_signature4 = null;
                $mediation->save();
            }

            if($mediation->staff_signature1 != null){
                Storage::disk('public')->delete($mediation->staff_signature1);
                $mediation->staff_signature1 = null;
                $mediation->save();
            }

            if($mediation->staff_signature2 != null){
                Storage::disk('public')->delete($mediation->staff_signature2);
                $mediation->staff_signature2 = null;
                $mediation->save();
            }

            $mediation->delete();

            return redirect()->route('mediations.index')->with('delete', 'Mediation deleted successfully.');
        }
        else
        {
            return redirect()->route('mediations.index')->with('delete', 'No mediation found!.');
        }    
    }
}
