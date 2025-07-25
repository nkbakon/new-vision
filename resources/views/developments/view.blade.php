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
                <a href="{{ route('developments.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <br>
                <h1 class="text-center text-xl">Individual Development Plan Form</h1>
                <hr style="height:2px; background-color:#333; border:none;"><br>
                <div class="flex justify-between mb-2">
                    @if($development->student_id != null)
                    <span><span class="font-semibold">Participant Name:</span>@if(isset($development->student)){{ $development->student->name }}@endif</span>
                    @endif
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Enrollment Date:</span>{{ $development->enrollment_date }}</span>
                    <span><span class="font-semibold">Referred By:</span>{{ $development->referred_by }}</span>
                </div>
                <div class="flex justify-between mb-1">
                    <span><span class="font-semibold">Goal Category:</span>
                        @php 
                            $categories = json_decode($development->categories);
                        @endphp
                        @foreach($categories as $category)
                        {{ $category }},
                        @endforeach
                    </span>
                </div>
                <div class="flex justify-between mb-1">
                    <span><span class="font-semibold">Length of Session:</span>
                        @php 
                            $sessions = json_decode($development->sessions);
                        @endphp
                        @foreach($sessions as $session)
                        {{ $session }},
                        @endforeach
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Mentor/Youth Advisor:</span>{{ $development->advisor }}</span>
                </div>

                <h5 class="font-bold text-center text-gray-900 text-xl">Goal Planning</h5><br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Date:</span>{{ $development->date }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Goal:</span>{{ $development->goal }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Motivation (Why do you want to achieve this goal?):</span>{{ $development->motivation }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Action Steps (What actions do I need to take in order to complete this goal?):</span>{{ $development->action_step }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Barriers (What potential distractions will keep me from achieving my goal?):</span>{{ $development->barrier }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Strategies to deal with the barriers/distraction:</span>{{ $development->strategy }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Awards:</span>{{ $development->award }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Comments:</span>{{ $development->comment }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Was Goal Achieved:</span>
                        @if($development->was_goal == '1')
                        Yes
                        @elseif($development->was_goal == '2')
                        No
                        @else
                        In progress
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Date Goal Achieved:</span>{{ $development->date_goal }}</span>
                </div>
                
                @if($development->student_signature != null)
                <span class="font-semibold">Student Signature</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $development->student_signature }}">
                <br><br>
                @endif

                @if($development->mentor_signature != null)
                <span class="font-semibold">Mentor Signature</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $development->mentor_signature }}">
                <br><br>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection