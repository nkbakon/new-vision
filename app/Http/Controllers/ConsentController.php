<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ConsentController extends Controller
{
    public function index()
    {
        $consents = Consent::orderBy('id', 'desc')->paginate(25);
        return view('consents.index', compact('consents'));
    }

    public function create()
    {
        return view('consents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $consent = new Consent();
        $consent->student_id = $request->student_id;
        $consent->telephone = $request->telephone;
        $consent->doctor = $request->doctor;
        $consent->phone = $request->phone;
        $consent->insurance = $request->insurance;
        $consent->hospital = $request->hospital;
        $consent->allergies = $request->allergies;
        $consent->save();       

        if($consent){
            return redirect()->route('consents.index')->with('status', 'Parental consent/acknowledgement saved successfully.');         
        }
        return redirect()->route('consents.index')->with('delete', 'Parental consent/acknowledgement save faild, try again.');
    }

    public function view(Consent $consent)
    {
        return view('consents.view', compact('consent'));
    }

    public function edit(Consent $consent)
    {
        return view('consents.edit', compact('consent'));
    }

    public function update(Request $request, Consent $consent)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $consent->student_id = $request->student_id;
        $consent->telephone = $request->telephone;
        $consent->doctor = $request->doctor;
        $consent->phone = $request->phone;
        $consent->insurance = $request->insurance;
        $consent->hospital = $request->hospital;
        $consent->allergies = $request->allergies;
        $consent->save(); 

        return redirect()->route('consents.index')->with('success', 'Parental consent/acknowledgement updated successfully.');
    }

    public function destroy(Request $request)
    {
        $consent = Consent::find($request->data_id);
        if($consent)
        {
            $consent->delete();

            return redirect()->route('consents.index')->with('delete', 'Parental consent/acknowledgement deleted successfully.');
        }
        else
        {
            return redirect()->route('consents.index')->with('delete', 'No parental consent/acknowledgement found!.');
        }    
    }
}
