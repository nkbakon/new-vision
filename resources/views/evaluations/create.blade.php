@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('evaluations.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Post Evaluation</h5><br>                 
                <form action="{{ route('evaluations.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="start_date">Date you started in New Vision Youth Services programs</label><br>
                            <input type="date" name="start_date" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="start_date" required>
                        </div>
                        @error('start_date') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="feel_better">Overall, do you feel that you are doing better?</label><br>
                            <select name="feel_better" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select> 
                        </div>
                        @error('feel_better') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="areas" class="mb-4">In what areas are you doing better:</label><br>
                            <div class="flex flex-wrap">
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Grades" type="checkbox" name="areas[]" value="Grades" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Grades" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Grades</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Employment" type="checkbox" name="areas[]" value="Employment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Employment" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Employment</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Tests" type="checkbox" name="areas[]" value="Standardized Tests" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Tests" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Standardized Tests</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Attendance" type="checkbox" name="areas[]" value="Attendance" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Attendance" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Attendance</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Behavior" type="checkbox" name="areas[]" value="Behavior" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Behavior" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Behavior</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Other" type="checkbox" name="areas[]" value="Other" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Other" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div>                                
                            <label for="area_not_well">Are there areas in which you are not doing well?</label><br>
                            <select name="area_not_well" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select> 
                        </div>
                        @error('area_not_well') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <div class="mt-2">
                            <label for="what_area_not_well">What are they?</label><br>
                            <input type="text" name="what_area_not_well" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="what are they?">
                        </div>
                        <br>
                        <span class="mb-2 font-semibold">Since joining New Vision Youth Services, I:</span>
                        <div>
                            <label for="cooperative">Am more cooperative</label><br>
                            <select name="cooperative" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Strongly Agree</option>
                                <option value="2">Agree</option>
                                <option value="3">No Opinion</option>
                                <option value="4">Disagree</option>
                                <option value="5">Strongly Disagree</option>
                                <option value="6">N/A</option>
                            </select> 
                        </div>
                        @error('cooperative') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="positive">Am more positive</label><br>
                            <select name="positive" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Strongly Agree</option>
                                <option value="2">Agree</option>
                                <option value="3">No Opinion</option>
                                <option value="4">Disagree</option>
                                <option value="5">Strongly Disagree</option>
                                <option value="6">N/A</option>
                            </select> 
                        </div>
                        @error('positive') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="organized">Am more organized</label><br>
                            <select name="organized" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Strongly Agree</option>
                                <option value="2">Agree</option>
                                <option value="3">No Opinion</option>
                                <option value="4">Disagree</option>
                                <option value="5">Strongly Disagree</option>
                                <option value="6">N/A</option>
                            </select> 
                        </div>
                        @error('organized') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="trouble_less">Get into trouble less</label><br>
                            <select name="trouble_less" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Strongly Agree</option>
                                <option value="2">Agree</option>
                                <option value="3">No Opinion</option>
                                <option value="4">Disagree</option>
                                <option value="5">Strongly Disagree</option>
                                <option value="6">N/A</option>
                            </select> 
                        </div>
                        @error('trouble_less') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="hanging_street">Spend less time hanging in the streets</label><br>
                            <select name="hanging_street" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Strongly Agree</option>
                                <option value="2">Agree</option>
                                <option value="3">No Opinion</option>
                                <option value="4">Disagree</option>
                                <option value="5">Strongly Disagree</option>
                                <option value="6">N/A</option>
                            </select> 
                        </div>
                        @error('hanging_street') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="education">Am more interested in education</label><br>
                            <select name="education" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Strongly Agree</option>
                                <option value="2">Agree</option>
                                <option value="3">No Opinion</option>
                                <option value="4">Disagree</option>
                                <option value="5">Strongly Disagree</option>
                                <option value="6">N/A</option>
                            </select> 
                        </div>
                        @error('education') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="getting_a_job">Am more interested in getting a job</label><br>
                            <select name="getting_a_job" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Strongly Agree</option>
                                <option value="2">Agree</option>
                                <option value="3">No Opinion</option>
                                <option value="4">Disagree</option>
                                <option value="5">Strongly Disagree</option>
                                <option value="6">N/A</option>
                            </select> 
                        </div>
                        @error('getting_a_job') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="positive_img">Have a positive self-image</label><br>
                            <select name="positive_img" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Strongly Agree</option>
                                <option value="2">Agree</option>
                                <option value="3">No Opinion</option>
                                <option value="4">Disagree</option>
                                <option value="5">Strongly Disagree</option>
                                <option value="6">N/A</option>
                            </select> 
                        </div>
                        @error('positive_img') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="positive_edu">Have a positive view of education</label><br>
                            <select name="positive_edu" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Strongly Agree</option>
                                <option value="2">Agree</option>
                                <option value="3">No Opinion</option>
                                <option value="4">Disagree</option>
                                <option value="5">Strongly Disagree</option>
                                <option value="6">N/A</option>
                            </select> 
                        </div>
                        @error('positive_edu') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        
                        <div>                                
                            <label for="attitude">Has your attitude improved?</label><br>
                            <select name="attitude" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select> 
                        </div>
                        @error('attitude') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <div class="mt-2">
                            <label for="attitude_describe">Please describe:</label><br>
                            <textarea name="attitude_describe" id="attitude_describe" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="please describe"></textarea>
                        </div>
                        <br>
                        <div>
                            <label for="help_improve">In what ways can New Vision Youth Services help you improve?</label><br>
                            <textarea name="help_improve" id="help_improve" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="In what ways can New Vision Youth Services help you improve?"></textarea>
                        </div>
                        <br>
                        <div>
                            <label for="other_comment">Any other comments?</label><br>
                            <textarea name="other_comment" id="other_comment" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="any other comments?"></textarea>
                        </div>
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