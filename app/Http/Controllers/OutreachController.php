<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outreach;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OutreachController extends Controller
{
    public function index()
    {
        $outreaches = Outreach::orderBy('id', 'desc')->paginate(25);
        return view('outreaches.index', compact('outreaches'));
    }

    public function create()
    {
        return view('outreaches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $types= json_encode($request->types);

        $outreach = new Outreach();
        $outreach->student_id = $request->student_id;
        $outreach->p_contact = $request->p_contact;
        $outreach->date = $request->date;
        $outreach->types = $types;
        $outreach->result = $request->result;
        $outreach->save();       

        if($outreach){
            return redirect()->route('outreaches.index')->with('status', 'Outreach saved successfully.');         
        }
        return redirect()->route('outreaches.index')->with('delete', 'Outreach save faild, try again.');
    }

    public function view(Outreach $outreach)
    {
        return view('outreaches.view', compact('outreach'));
    }

    public function edit(Outreach $outreach)
    {
        return view('outreaches.edit', compact('outreach'));
    }

    public function update(Request $request, Outreach $outreach)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $types= json_encode($request->types);

        $outreach->student_id = $request->student_id;
        $outreach->p_contact = $request->p_contact;
        $outreach->date = $request->date;
        $outreach->types = $types;
        $outreach->result = $request->result;
        $outreach->save();

        return redirect()->route('outreaches.index')->with('success', 'Outreach updated successfully.');
    }

    public function destroy(Request $request)
    {
        $outreach = Outreach::find($request->data_id);
        if($outreach)
        {
            $outreach->delete();

            return redirect()->route('outreaches.index')->with('delete', 'Outreach deleted successfully.');
        }
        else
        {
            return redirect()->route('outreaches.index')->with('delete', 'No outreach found!.');
        }    
    }
}
