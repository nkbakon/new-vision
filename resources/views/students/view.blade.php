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
                <a href="{{ route('students.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <br>
                <h1 class="text-center text-xl">PRE-DEMOGRAPHIC - INTAKE DATA</h1>
                <hr style="height:2px; background-color:#333; border:none;"><br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Student's Full Name:</span>{{ $student->name }}</span>
                    <span><span class="font-semibold">Date:</span>{{ $student->created_at->format('Y-m-d') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>
                        <span class="font-semibold">School:</span>
                        @if(isset($student->school))
                        {{ $student->school->name }}
                        @endif
                    </span>
                    <span><span class="font-semibold">Address:</span>{{ $student->address }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">City:</span>{{ $student->city }}</span>
                    <span><span class="font-semibold">State:</span>{{ $student->state }}</span>
                </div>
                <div class="flex justify-between mb-2">                    
                    <span><span class="font-semibold">Phone Type:</span>{{ $student->phone_type }}</span>
                    <span><span class="font-semibold">Zip:</span>{{ $student->zip }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Phone:</span>{{ $student->phone }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Gender:</span>{{ $student->gender }}</span>
                    <span><span class="font-semibold">Ethnicity:</span>{{ $student->ethnicity }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Age:</span>{{ $student->age }}</span>
                    <span><span class="font-semibold">Date of Birth:</span>{{ $student->dob }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Parents / Legal Guardian (Father):</span>{{ $student->father }}</span>
                    <span><span class="font-semibold">Parents / Legal Guardian (Mother):</span>{{ $student->mother }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Parents / Legal Guardian Phone Type:</span>{{ $student->parents_phone_type }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Parents / Legal Guardian Phone:</span>{{ $student->parents_phone }}</span>
                    <span><span class="font-semibold">Name of the Person Student Currently Lives With:</span>{{ $student->student_lives_with }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Grades / GPA:</span>{{ $student->gpa }}</span>
                    <span><span class="font-semibold">Guidance Counselor:</span>{{ $student->counselor }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Name of Emergency Contact:</span>{{ $student->emergency_contact }}</span>
                    <span><span class="font-semibold">Relationship to Student:</span>{{ $student->relationship_to_student }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Emergency Phone Type:</span>{{ $student->emergency_phone_type }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Emergency Phone:</span>{{ $student->emergency_phone }}</span>
                    <span><span class="font-semibold">Guardian Email Address:</span>{{ $student->guardian_email }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Student Email Address:</span>{{ $student->student_email }}</span>
                </div>

                <span class="font-semibold">Parent / Legal Guardian Signature</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $student->parent_signature }}">
                <br><br>
                <span class="font-semibold">Student Signature</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $student->student_signature }}">
                <br><br>

                <p class="font-semibold mb-2">Family Structure: (Please check all that apply and Provide Details)</p>
                <span class="font-semibold">With whom does the child live?</span><br>
                @php 
                    $lives = json_decode($student->lives);
                @endphp
                @foreach($lives as $live)
                    <span>{{ $live }}</span>,
                @endforeach
                <br>
                <p class="font-semibold mb-2">Involvement with court system or Criminal Justice System:</p>
                <span class="font-semibold">Has He/She had any contact with the Police</span><br>
                @if($student->contact_with_police == '1')
                Yes
                @else
                No
                @endif
                <br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Explain:</span>{{ $student->explain_contact_with_police }}</span>
                </div>
                <br><br>

                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Please Explain Any Involement with the Court System:</span>{{ $student->court_involement }}</span>
                </div>
                <br>
                <span class="font-semibold">Has this child been incarcerated before?</span><br>
                @if($student->incarcerated == '1')
                Yes
                @else
                No
                @endif
                <br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Explain:</span>{{ $student->explain_incarcerated }}</span>
                </div>
                <br><br>

                <span class="font-semibold">Recent traumatic events</span><br>
                @php 
                    $events = json_decode($student->events);
                @endphp
                @foreach($events as $event)
                    <span>{{ $event }}</span>,
                @endforeach
                <br>

                <span class="font-semibold">Other information on student</span><br>
                @php 
                    $other_infos = json_decode($student->other_infos);
                @endphp
                @foreach($other_infos as $other_info)
                    <span>{{ $other_info }}</span>,
                @endforeach
                <br>

                <p class="font-semibold mb-2">Previous Year School Information</p>
                <div class="flex justify-between mb-2">
                    <span>
                        <span class="font-semibold">Last School Attended:</span>
                        @if(isset($student->last_school))
                        {{ $student->last_school->name }}
                        @endif
                    </span>
                </div>
                <br> 

                <span class="font-semibold">Previous school conduct</span><br>
                @php 
                    $previous_conducts = json_decode($student->previous_conducts);
                @endphp
                @foreach($previous_conducts as $previous_conduct)
                    <span>{{ $previous_conduct }}</span>,
                @endforeach
                <br>

                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">How many times has this child been suspended in his/her previous year?:</span>{{ $student->suspended_time }}</span>
                </div>
                <br> 

                <span class="font-semibold">Has this child ever been expelled?</span><br>
                @if($student->ever_expelled == '1')
                Yes
                @else
                No
                @endif
                <br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Explain:</span>{{ $student->explain_ever_expelled }}</span>
                </div>
                <br><br>

                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Any additional information about the previous year:</span>{{ $student->additional_info }}</span>
                </div>
                <br>

                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Youth advisor:</span>{{ $student->advisor }}</span>
                </div>
                <br>                
            </div>
        </div>
    </div>
</div>
@endsection