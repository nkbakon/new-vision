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
                <h1 class="text-center text-xl">Staff Action Log</h1>
                <hr style="height:2px; background-color:#333; border:none;"><br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Student's Name:</span>@if(isset($log->student)){{ $log->student->name }}@endif</span>
                    <span><span class="font-semibold">Date:</span>{{ $log->created_at->format('Y-m-d') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>
                        <span class="font-semibold">Action:</span>
                        <br>
                        @php 
                            $actions = json_decode($log->actions);
                        @endphp

                        @if(in_array('1', $actions))
                            CDS – Character Development Sessions (inc. life skills): Topical sessions led by youth advisor with mentees.<br>
                        @endif

                        @if(in_array('2', $actions))
                            CDS2 – Character Development Sessions (inc. life skills): Topical sessions led by youth advisor with mentees.<br>
                        @endif

                        @if(in_array('3', $actions))
                            101 – One-on-one work with student (e.g. counseling, discussing grades, attendance, college, social).<br>
                        @endif

                        @if(in_array('4', $actions))
                            CM – Class Monitor: Assisted in monitoring a classroom due to staff shortage or to help maintain classroom order.<br>
                        @endif

                        @if(in_array('5', $actions))
                            HM – Hall Monitoring<br>
                        @endif

                        @if(in_array('6', $actions))
                            CAFM – Cafeteria Monitoring<br>
                        @endif

                        @if(in_array('7', $actions))
                            TSCI – Teacher/Student Conflict Intervention: Addressed and/or resolved conflict between a teacher and a student.<br>
                        @endif

                        @if(in_array('8', $actions))
                            SSCI – Student/Student Conflict Intervention: Addressed and/or resolved a conflict between two or more students.<br>
                        @endif

                        @if(in_array('9', $actions))
                            APC – Advisor/Parent Contact: Communicated with a parent by phone or meeting to address issues or concerns with their child.<br>
                        @endif

                        @if(in_array('10', $actions))
                            SA – Student Advocacy: Spoke to a teacher or faculty member on behalf of a student to address student progress concerns.<br>
                        @endif

                        @if(in_array('11', $actions))
                            AS – Academic Support: Assisting student with schoolwork/homework (e.g. edit English paper, help with math problems, help with research).<br>
                        @endif

                        @if(in_array('12', $actions))
                            FI – Fight Intervention: Assisted student with mediating a fight or potential conflict.<br>
                        @endif

                        @if(in_array('13', $actions))
                            GI – Gang Intervention: Addressed and/or resolved a gang-related conflict or potential conflict.<br>
                        @endif

                        @if(in_array('14', $actions))
                            SP – Student w/police contact: Assisted student with a situation involving police.<br>
                        @endif

                        @if(in_array('15', $actions))
                            ES – Escort student to class<br>
                        @endif

                        @if(in_array('16', $actions))
                            MO – Mentee Outing: Chaperoned mentees to an activity outside of school for enlightenment, incentive, or reward.<br>
                        @endif

                        @if(in_array('17', $actions))
                            HV – Home Visits<br>
                        @endif

                        @if(in_array('18', $actions))
                            PC – Proactive Circles: Ongoing circle discussions to improve school climate before problems occur.<br>
                        @endif

                        @if(in_array('19', $actions))
                            RP – Responsive Circles: Circles that are in response to something that has happened.<br>
                        @endif
                    </span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Youth Advisor/Team:</span>{{ $log->advisor }}</span>
                </div>                
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Length of Session:</span>{{ $log->length }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Participant:</span>
                        @if($log->participant == '1')
                        Yes
                        @else
                        No
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection