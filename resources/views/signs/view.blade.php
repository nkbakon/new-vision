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
                <a href="{{ route('signs.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <br>
                <h1 class="text-center text-xl">Student Sign-n Sheet</h1>
                <hr style="height:2px; background-color:#333; border:none;"><br>
                <div class="flex justify-between mb-2">                    
                    <span><span class="font-semibold">Date:</span>{{ $sign->date }}</span>
                </div>
                @foreach($sign_students as $index => $sign_student)           
                    @if(isset($sign_student) && $sign_student != null)
                    <div class="flex justify-between mb-1">
                        <span><span class="font-semibold">{{ $index+1 }}. Student's Name:</span>@if(isset($sign_student->student)){{ $sign_student->student->name }}@endif</span>
                    </div> 
                    <div class="flex justify-between mb-2">
                        <span><span class="font-semibold ml-3">Participant:</span>
                            @if($sign_student->participant == '1')
                            Yes
                            @else
                            No
                            @endif
                        </span>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection