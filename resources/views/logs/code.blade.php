@extends('layouts.app')
@section('bodycontent')

@if (session('status'))
    <div class="text-black m-2 p-4 bg-green-200">
        {{ session('status') }}
    </div>
@endif
@if (session('success'))
    <div class="text-black m-2 p-4 bg-yellow-200">
        {{ session('success') }}
    </div>
@endif
@if (session('delete'))
    <div class="text-black m-2 p-4 bg-red-200">
        {{ session('delete') }}
    </div>
@endif

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('logs.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <br>
                <h1 class="text-center text-xl">Codes for Staff Action Log</h1>
                <hr style="height:2px; background-color:#333; border:none;"><br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">TSC I:</span>
                        Teacher/Mentee Conflict Intervention <br>
                        Addressed and/or resolving a conflict between a teacher and a mentee.
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">SSCI:</span>
                        Student/Student Conflict Intervention <br>
                        Addressed and/or resolving a conflict between two or more mentee/Includes restorative circle
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">APC:</span>Advisor/Parent Contact <br>
                        Communicated with a parent by phone or meeting to address issues or concerns with their child.
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">CM:</span>Class Monitor <br>
                        Assisted in monitoring a classroom due to staff shortage or assisting in maintaining classroom order.
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">SA:</span>Student Advocacy <br>
                        Spoke to a teacher or faculty member on behalf of a mentee specifically to address mentee
                        progress concerns.
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">AS:</span>Academic Support/Student Support Team (SST) <br>
                        Assisting mentee with schoolwork/homework
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">101:</span>one on one work with mentee. (i.e. counseling, discussing grades, attendance, social work)</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">FI:</span>Fight Intervention <br>
                        Assisted with the break-up of a physical fight
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">GI:</span>Gang intervention <br>
                        Addressed and/or resolved a gang related conflict or potential conflict
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">MP:</span>Mentee w/police contact <br>
                        Assisted student with situation involving police
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">ES:</span>Escort mentee to class</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">HV/WC:</span>Home Visit/ Wellness Check <br>
                        Visiting the home or doing a wellness check to drop off resources (laptop, food assignments)
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">RC:</span>Restorative Circle/Character Development Sessions (inc. life skills) <br>
                        Topical sessions lead by youth advisor with mentees.
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection