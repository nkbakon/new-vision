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
                <a href="{{ route('selections.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <br>
                <h1 class="text-center text-xl">Student Selection Sheet</h1>
                <hr style="height:2px; background-color:#333; border:none;"><br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Student's Name:</span>{{ $selection->student->name }}</span>
                    <span><span class="font-semibold">Date:</span>{{ $selection->created_at->format('Y-m-d') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Student's Age:</span>{{ $selection->student->age }}</span>
                    <span><span class="font-semibold">Best time to contact:</span>{{ $selection->time_to_contact }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Teacher’s Name:</span>{{ $selection->teachers_name }}</span>
                    <span><span class="font-semibold">Teacher’s contact number:</span>{{ $selection->teachers_contact }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Why are you referring this student?:</span>{{ $selection->referring_student }}</span>
                </div>

                <span class="font-semibold">Your reasons for referring him/her:</span><br>
                @php 
                    $reasons = json_decode($selection->reasons);
                @endphp
                @foreach($reasons as $reason)
                    @if($reason == '')
                    @else
                    <span>{{ $reason }}</span>,
                    @endif
                @endforeach
                <br><br>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">What are the student’s strong points?:</span>{{ $selection->strong_points }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">What would success look like to you for this student?:</span>{{ $selection->success_like }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection