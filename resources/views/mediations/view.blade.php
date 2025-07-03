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
                <a href="{{ route('mediations.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <br>
                <h1 class="text-center text-xl">Mediation Form</h1>
                <hr style="height:2px; background-color:#333; border:none;"><br>
                <div class="flex justify-between mb-2">
                    @if($mediation->student_id1 != null)
                    <span><span class="font-semibold">Student #1 Name:</span>@if(isset($mediation->student1)){{ $mediation->student1->name }}@endif</span>
                    @endif
                    @if($mediation->student_id2 != null)
                    <span><span class="font-semibold">Student #2 Name:</span>@if(isset($mediation->student2)){{ $mediation->student2->name }}@endif</span>
                    @endif
                </div>
                <div class="flex justify-between mb-2">
                    @if($mediation->student_id3 != null)
                    <span><span class="font-semibold">Student #3 Name:</span>@if(isset($mediation->student3)){{ $mediation->student3->name }}@endif</span>
                    @endif
                    @if($mediation->student_id4 != null)
                    <span><span class="font-semibold">Student #4 Name:</span>@if(isset($mediation->student4)){{ $mediation->student4->name }}@endif</span>
                    @endif
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Referred By:</span>{{ $mediation->referred_by }}</span>
                    <span><span class="font-semibold">Date of Incident:</span>{{ $mediation->date }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Incident Details:</span>{{ $mediation->incident }}</span>
                </div>
                <div class="flex justify-between mb-1">
                    <span><span class="font-semibold">Outcome:</span>
                        @php 
                            $outcomes = json_decode($mediation->outcomes);
                        @endphp
                        @foreach($outcomes as $outcome)
                        {{ $outcome }},
                        @endforeach
                    </span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>{{ $mediation->outcome_explain }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Referral(s):</span>{{ $mediation->referral }}</span>
                </div>
                
                @if($mediation->s_signature1 != null)
                <span class="font-semibold">Student #1 Signature</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->s_signature1 }}">
                <br><br>
                @endif

                @if($mediation->s_signature2 != null)
                <span class="font-semibold">Student #2 Signature</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->s_signature2 }}">
                <br><br>
                @endif

                @if($mediation->s_signature3 != null)
                <span class="font-semibold">Student #3 Signature</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->s_signature3 }}">
                <br><br>
                @endif

                @if($mediation->s_signature4 != null)
                <span class="font-semibold">Student #4 Signature</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->s_signature4 }}">
                <br><br>
                @endif

                @if($mediation->staff_signature1 != null)
                <span class="font-semibold">NVYS Staff Signature #1</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->staff_signature1 }}">
                <br><br>
                @endif

                @if($mediation->staff_signature2 != null)
                <span class="font-semibold">NVYS Staff Signature #2</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->staff_signature2 }}">
                <br><br>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection