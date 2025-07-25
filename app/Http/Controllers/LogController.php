<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::orderBy('id', 'desc')->paginate(25);
        return view('logs.index', compact('logs'));
    }

    public function create()
    {
        return view('logs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $actions= json_encode($request->actions);

        $log = new Log();
        $log->student_id = $request->student_id;
        $log->actions = $actions;
        $log->advisor = $request->advisor;
        $log->length = $request->length;
        $log->participant = $request->participant;
        $log->save();       

        if($log){
            return redirect()->route('logs.index')->with('status', 'Staff action log saved successfully.');         
        }
        return redirect()->route('logs.index')->with('delete', 'Staff action log save faild, try again.');
    }

    public function view(Log $log)
    {
        return view('logs.view', compact('log'));
    }

    public function edit(Log $log)
    {
        return view('logs.edit', compact('log'));
    }

    public function update(Request $request, Log $log)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        $actions= json_encode($request->actions);

        $log->student_id = $request->student_id;
        $log->actions = $actions;
        $log->advisor = $request->advisor;
        $log->length = $request->length;
        $log->participant = $request->participant;
        $log->save(); 

        return redirect()->route('logs.index')->with('success', 'Staff action log updated successfully.');
    }

    public function destroy(Request $request)
    {
        $log = Log::find($request->data_id);
        if($log)
        {
            $log->delete();

            return redirect()->route('logs.index')->with('delete', 'Staff action log deleted successfully.');
        }
        else
        {
            return redirect()->route('logs.index')->with('delete', 'No staff action log found!.');
        }    
    }

    public function code()
    {
        return view('logs.code');
    }
}
