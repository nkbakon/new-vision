@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('selections.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Student Selection Sheet</h5><br>                 
                <form action="{{ route('selections.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div>
                            <div>
                                @php 
                                    $students = App\Models\Student::all();
                                @endphp
                                <label for="student_id">Select Student</label><br>
                                <select name="student_id" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select student from here</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->student_email }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('student_id') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>                                               
                        </div>
                        <div>
                            <label for="time_to_contact">Best time to contact</label><br>
                            <input type="text" name="time_to_contact" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="best time to contact" required>
                        </div>
                        @error('time_to_contact') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="teachers_name">Teacher’s Name</label><br>
                            <input type="text" name="teachers_name" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="teacher's name" required>
                        </div>
                        @error('teachers_name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="teachers_contact">Teacher’s contact number</label><br>
                            <input type="text" name="teachers_contact" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="teachers_contact" required>
                        </div>
                        @error('teachers_contact') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="referring_student">Why are you referring this student?</label><br>
                            <input type="text" name="referring_student" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="why are you referring this student?" required>
                        </div>
                        @error('referring_student') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="reasons" class="mb-4">Please complete by checking the statement(s) that describes your reasons for referring him/her:</label><br>
                            <div class="flex flex-wrap">
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="disruptive" type="checkbox" name="reasons[]" value="The Student is disruptive in class (fights, argues, has loud outbursts, is aggressive, etc.)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="disruptive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">The Student is disruptive in class (fights, argues, has loud outbursts, is aggressive, etc.)</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="problems" type="checkbox" name="reasons[]" value="The student has some home problems with their home life" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="problems" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">The student has some home problems with their home life</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="failing" type="checkbox" name="reasons[]" value="The student is failing" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="failing" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">The student is failing</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="suspended" type="checkbox" name="reasons[]" value="The student has alcohol or drug suspended from school" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="suspended" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">The student has alcohol or drug suspended from school</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="homework" type="checkbox" name="reasons[]" value="The student does not complete homework assignments" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="homework" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">The student does not complete homework assignments</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="criminal" type="checkbox" name="reasons[]" value="The student has encounters with the criminal justice system" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="criminal" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">The student has encounters with the criminal justice system</label>
                                </div>
                            </div>
                            <div>
                                <label for="reasons">Other reason:</label><br>
                                <input type="text" name="reasons[]" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="other reason">
                            </div>
                            <br>
                        </div> 
                        <div>
                            <label for="strong_points">What are the student’s strong points?</label><br>
                            <textarea name="strong_points" id="strong_points" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="what are the student’s strong points?" required></textarea>
                        </div>
                        @error('strong_points') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>   
                        <div>
                            <label for="success_like">What would success look like to you for this student?</label><br>
                            <textarea name="success_like" id="success_like" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="what would success look like to you for this student?" required></textarea>
                        </div>
                        @error('success_like') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>                        
                    </div>
                    <button type="submit" class="passwordvalid disabled:opacity-25 inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-900 focus:bg-blue-900 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">Save</button>                        
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush