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
<h1 class="text-center font-bold text-neutral-800 uppercase">Dashboard</h1>
<div class="py-12 ml-4 md:ml-0">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg sm:px-24 lg:px-26">
            <div class="sm:flex sm:space-x-5 sm:justify-center ml-12 md:ml-0">
                <a href="{{ route('students.create') }}" class="mb-2 justify-center font-semibold text-center inline-flex text-gray-700 m-1 p-2 rounded bg-blue-200 w-1/2 hover:bg-blue-300 hover:border-blue-400">
                    <div>
                      Add New Student
                    </div> 
                </a>
                <a href="{{ route('logs.create') }}" class="mb-2 justify-center font-semibold text-center inline-flex text-gray-700 m-1 p-2 rounded bg-green-300 w-1/2 hover:bg-green-400 hover:border-green-400">
                    <div>
                        Add Staff Action Log
                    </div> 
                </a>
            </div><br>
            <div class="md:flex md:space-x-40">
                <a href="{{ route('students.index') }}">
                    <div class="justify-center inline-flex bg-gray-200 rounded-2xl overflow-hidden shadow-lg" style="width:320px; height:128px;">
                        <div class="px-6 py-4 text-center">                        
                            <p class="text-gray-500">
                            Students
                            </p>
                            <div class="font-bold text-5xl text-blue-600">
                            {{ App\Models\Student::count() }}
                            </div>
                            <span class="text-gray-500 text-sm">(No. of Students)</span>
                        </div>
                    </div>
                </a>
                <div class="block md:hidden"><br></div>
                <a href="{{ route('assessments.index') }}">
                    <div class="justify-center inline-flex bg-gray-200 rounded-2xl overflow-hidden shadow-lg" style="width:320px; height:128px;">
                        <div class="px-6 py-4 text-center">                      
                            <p class="text-gray-500">
                            Self-Assessment Pre-Evaluations
                            </p>
                            <div class="font-bold text-5xl text-green-500">
                            {{ App\Models\Assessment::count() }}
                            </div>
                            <span class="text-gray-500 text-sm">(No. of Records)</span>
                        </div>
                    </div>
                </a>
            </div><br>
            <div class="md:flex md:space-x-40">
                <a href="{{ route('evaluations.index') }}">
                    <div class="justify-center inline-flex bg-gray-200 rounded-2xl overflow-hidden shadow-lg" style="width:320px; height:128px;">
                        <div class="px-6 py-4 text-center">                        
                            <p class="text-gray-500">
                            Post Evaluations
                            </p>
                            <div class="font-bold text-5xl text-gray-500">
                            {{ App\Models\Evaluation::count() }}
                            </div>
                            <span class="text-gray-500 text-sm">(No. of Records)</span>
                        </div>
                    </div>
                </a>
                <div class="block md:hidden"><br></div>
                <a href="{{ route('mediations.index') }}">
                    <div class="justify-center inline-flex bg-gray-200 rounded-2xl overflow-hidden shadow-lg" style="width:320px; height:128px;">
                        <div class="px-6 py-4 text-center">                      
                            <p class="text-gray-500">
                            Mediations
                            </p>
                            <div class="font-bold text-5xl text-red-500">
                            {{ App\Models\Mediation::count() }}
                            </div>
                            <span class="text-gray-500 text-sm">(No. of Records)</span>
                        </div>
                    </div>
                </a>
            </div><br>
        </div>
    </div>
</div>
@endsection