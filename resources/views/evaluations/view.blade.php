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
                <h1 class="text-center text-xl">Post Evaluation</h1>
                <hr style="height:2px; background-color:#333; border:none;"><br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Student's Name:</span>{{ $evaluation->student->name }}</span>
                    <span><span class="font-semibold">Date:</span>{{ $evaluation->created_at->format('Y-m-d') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Date you started in New Vision Youth Services programs:</span>{{ $evaluation->start_date }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">In what areas are you doing better:</span>
                        @php 
                            $areas = json_decode($evaluation->areas);
                        @endphp
                        @foreach($areas as $area)
                        {{ $area }},
                        @endforeach
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Are there areas in which you are not doing well?:</span>
                        @if($evaluation->area_not_well == '1')
                        Yes
                        @else
                        No
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">What are they?:</span>{{ $evaluation->what_area_not_well }}</span>
                </div> 
                <br>
                <span class="mb-2 font-semibold">Since joining New Vision Youth Services, I:</span>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Am more cooperative:</span>
                        @if($evaluation->cooperative == '1')
                        Strongly Agree
                        @elseif($evaluation->cooperative == '2')
                        Agree
                        @elseif($evaluation->cooperative == '3')
                        No Opinion
                        @elseif($evaluation->cooperative == '4')
                        Disagree
                        @elseif($evaluation->cooperative == '5')
                        Strongly Disagree
                        @else
                        N/A
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Am more positive:</span>
                        @if($evaluation->positive == '1')
                        Strongly Agree
                        @elseif($evaluation->positive == '2')
                        Agree
                        @elseif($evaluation->positive == '3')
                        No Opinion
                        @elseif($evaluation->positive == '4')
                        Disagree
                        @elseif($evaluation->positive == '5')
                        Strongly Disagree
                        @else
                        N/A
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Am more organized:</span>
                        @if($evaluation->organized == '1')
                        Strongly Agree
                        @elseif($evaluation->organized == '2')
                        Agree
                        @elseif($evaluation->organized == '3')
                        No Opinion
                        @elseif($evaluation->organized == '4')
                        Disagree
                        @elseif($evaluation->organized == '5')
                        Strongly Disagree
                        @else
                        N/A
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Get into trouble less:</span>
                        @if($evaluation->trouble_less == '1')
                        Strongly Agree
                        @elseif($evaluation->trouble_less == '2')
                        Agree
                        @elseif($evaluation->trouble_less == '3')
                        No Opinion
                        @elseif($evaluation->trouble_less == '4')
                        Disagree
                        @elseif($evaluation->trouble_less == '5')
                        Strongly Disagree
                        @else
                        N/A
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Spend less time hanging in the streets:</span>
                        @if($evaluation->hanging_street == '1')
                        Strongly Agree
                        @elseif($evaluation->hanging_street == '2')
                        Agree
                        @elseif($evaluation->hanging_street == '3')
                        No Opinion
                        @elseif($evaluation->hanging_street == '4')
                        Disagree
                        @elseif($evaluation->hanging_street == '5')
                        Strongly Disagree
                        @else
                        N/A
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Am more interested in education:</span>
                        @if($evaluation->education == '1')
                        Strongly Agree
                        @elseif($evaluation->education == '2')
                        Agree
                        @elseif($evaluation->education == '3')
                        No Opinion
                        @elseif($evaluation->education == '4')
                        Disagree
                        @elseif($evaluation->education == '5')
                        Strongly Disagree
                        @else
                        N/A
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Am more interested in getting a job:</span>
                        @if($evaluation->getting_a_job == '1')
                        Strongly Agree
                        @elseif($evaluation->getting_a_job == '2')
                        Agree
                        @elseif($evaluation->getting_a_job == '3')
                        No Opinion
                        @elseif($evaluation->getting_a_job == '4')
                        Disagree
                        @elseif($evaluation->getting_a_job == '5')
                        Strongly Disagree
                        @else
                        N/A
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Have a positive self-image:</span>
                        @if($evaluation->positive_img == '1')
                        Strongly Agree
                        @elseif($evaluation->positive_img == '2')
                        Agree
                        @elseif($evaluation->positive_img == '3')
                        No Opinion
                        @elseif($evaluation->positive_img == '4')
                        Disagree
                        @elseif($evaluation->positive_img == '5')
                        Strongly Disagree
                        @else
                        N/A
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Have a positive view of education:</span>
                        @if($evaluation->positive_edu == '1')
                        Strongly Agree
                        @elseif($evaluation->positive_edu == '2')
                        Agree
                        @elseif($evaluation->positive_edu == '3')
                        No Opinion
                        @elseif($evaluation->positive_edu == '4')
                        Disagree
                        @elseif($evaluation->positive_edu == '5')
                        Strongly Disagree
                        @else
                        N/A
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Has your attitude improved?:</span>
                        @if($evaluation->attitude == '1')
                        Yes
                        @else
                        No
                        @endif
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Please describe:</span>{{ $evaluation->attitude_describe }}</span>
                </div> 
                <br>

                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">In what ways can New Vision Youth Services help you improve?:</span>{{ $evaluation->help_improve }}</span>
                </div>                
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Any other comments?:</span>{{ $evaluation->other_comment }}</span>
                </div> 
                
            </div>
        </div>
    </div>
</div>
@endsection