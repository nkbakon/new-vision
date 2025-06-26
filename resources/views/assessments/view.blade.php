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
                <a href="{{ route('assessments.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <br>
                <h1 class="text-center text-xl">Student Self-Assessment Pre-Evaluation</h1>
                <hr style="height:2px; background-color:#333; border:none;"><br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Name:</span>{{ $assessment->student->name }}</span>
                    <span><span class="font-semibold">Date:</span>{{ $assessment->created_at->format('Y-m-d') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Email:</span>{{ $assessment->student->email }}</span>
                    <span><span class="font-semibold">Contact:</span>{{ $assessment->student->contact }}</span>
                </div>
                <span class="font-semibold">In what areas would you like help from staff?</span><br>
                @php 
                    $areas = json_decode($assessment->areas);
                @endphp
                @foreach($areas as $area)
                    @if($area == 'Other')
                    <span>{{ $area }}:</span>
                    @else
                    <span>{{ $area }}</span>,
                    @endif
                @endforeach
                <br>
                <span class="font-semibold">Specify relationships that you would especially like help with:</span><br>
                @php 
                    $relationships = json_decode($assessment->relationships);
                @endphp
                @foreach($relationships as $relationship)
                    @if($relationship == 'Other')
                    <span>{{ $relationship }}:</span>
                    @else
                    <span>{{ $relationship }}</span>,
                    @endif
                @endforeach
                <br><br>
                <div class="flex justify-between mb-2">
                    <div>
                        <span class="font-semibold">I am cooperative with teachers:</span><br>
                        {{ $assessment->cooperative }}
                    </div>
                    <div class="text-left">
                        <span class="font-semibold">My grades are fine:</span><br>
                        {{ $assessment->grades_fine }}
                    </div>
                </div>
                <div class="flex justify-between mb-2">
                    <div>
                        <span class="font-semibold">I have a positive attitude about school</span><br>
                        {{ $assessment->school_attitude }}
                    </div>
                    <div class="text-left">
                        <span class="font-semibold">I am interested in education</span><br>
                        {{ $assessment->interested_in_education }}
                    </div>
                </div>
                <div class="flex justify-between mb-2">
                    <div>
                        <span class="font-semibold">I work well with other students</span><br>
                        {{ $assessment->work_well_with_students }}
                    </div>
                    <div class="text-left">
                        <span class="font-semibold">I am satisfied with my friends</span><br>
                        {{ $assessment->satisfied_with_friends }}
                    </div>
                </div>
                <div class="flex justify-between mb-2">
                    <div>
                        <span class="font-semibold">I do my homework regularly</span><br>
                        {{ $assessment->do_homework }}
                    </div>
                    <div class="text-left">
                        <span class="font-semibold">I have positive attitude about life</span><br>
                        {{ $assessment->life_attitude }}
                    </div>
                </div>
                <div class="flex justify-between mb-2">
                    <div>
                        <span class="font-semibold">I do not hang out in the streets often</span><br>
                        {{ $assessment->dont_hang_street }}
                    </div>
                    <div class="text-left">
                        <span class="font-semibold">I am cooperative with my parent(s)</span><br>
                        {{ $assessment->cooperative_with_parent }}
                    </div>
                </div>
                <div class="flex justify-between mb-2">
                    <div>
                        <span class="font-semibold">I do not get in trouble often</span><br>
                        {{ $assessment->dont_get_trouble }}
                    </div>
                    <div class="text-left">
                        <span class="font-semibold">I am interested in getting a good job someday</span><br>
                        {{ $assessment->getting_job }}
                    </div>
                </div>
                <span class="font-semibold"><strong>In the last school year</strong>, have you been stopped or questioned by police or juvenile officers for something they thought you did wrong?</span><br>
                @if($assessment->have_you_stopped == '1')
                Yes
                @else
                No
                @endif
                <br><br>
                <span class="font-semibold"><strong>In the school year</strong>, if you were stopped or questioned, do you think it was mostly fair?</span><br>
                @if($assessment->stop_fair == '1')
                Yes
                @else
                No
                @endif
                <br><br>
                <span class="font-semibold">If you were stopped or questioned <strong>in the last school year</strong>, what was the most serious thing that ever happened as a result?</span><br>
                @if($assessment->happend_result == '1')
                Let go right away
                @elseif($assessment->happend_result == '2')
                Given a ticket or warning
                @elseif($assessment->happend_result == '3')
                Taken to police station and then released
                @elseif($assessment->happend_result == '4')
                Required to go to court
                @elseif($assessment->happend_result == '5')
                Sent to a detention facility
                @elseif($assessment->happend_result == '6')
                Sent to jail
                @elseif($assessment->happend_result == '7')
                Sent to prison
                @else
                Other: {{ $assessment->happend_result_other }}
                @endif
                <br><br>
                <span class="font-semibold">School (Applicable to school/program)</span><br>
                {{ $assessment->school }}
                <br><br>
                <span class="font-semibold">Student Signature</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $assessment->signature }}">
                <br><br>
            </div>
        </div>
    </div>
</div>
@endsection