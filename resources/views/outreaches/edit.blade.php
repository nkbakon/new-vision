@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('outreaches.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Outreach Form</h5><br>                 
                <form action="{{ route('outreaches.update', $outreach) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="">
                        <div>
                            <div>
                                @php 
                                    $students = App\Models\Student::all();
                                @endphp
                                <label for="student_id">Select Participant</label><br>
                                <select name="student_id" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select student from here</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}" @if($outreach->student_id == $student->id) selected @endif>{{ $student->name }} - {{ $student->student_email }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('student_id') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>                                               
                        </div>
                        <div>
                            <label for="p_contact">Person Contacted</label><br>
                            <input type="text" name="p_contact" value="{{ $outreach->p_contact }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="person contacted" required>
                        </div>
                        @error('p_contact') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="date">Date</label><br>
                            <input type="date" name="date" value="{{ $outreach->date }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="date" required>
                        </div>
                        @error('date') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <div class="flex flex-wrap">
                                @php 
                                    $types = json_decode($outreach->types);
                                @endphp
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Call" type="checkbox" name="types[]" value="Phone Call" {{ in_array('Phone Call', $types ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Call" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone Call</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Text" type="checkbox" name="types[]" value="E-mail/Text Info" {{ in_array('E-mail/Text Info', $types ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Text" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">E-mail/Text Info</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Home" type="checkbox" name="types[]" value="Home Visit" {{ in_array('Home Visit', $types ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Home" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Home Visit</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="One" type="checkbox" name="types[]" value="One-On-One" {{ in_array('One-On-One', $types ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="One" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">One-On-One</label>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div>
                            <label for="result">Result of Contact</label><br>
                            <textarea name="result" id="result" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="result of contact" required>{{ $outreach->result }}</textarea>
                        </div>
                        @error('result') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>                      
                    </div>
                    <button type="submit" class="disabled:opacity-25 inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-900 focus:bg-blue-900 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush