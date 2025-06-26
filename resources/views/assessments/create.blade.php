@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('assessments.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">New Student Self-Assessment Pre-Evaluation</h5><br>                 
                <form action="{{ route('assessments.store') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="">
                            <div>
                                <label for="areas" class="mb-4">In what areas would you like help from staff? (check all that apply)</label><br>
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="grades" type="checkbox" name="areas[]" value="Grades" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="grades" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Grades</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="after_school" type="checkbox" name="areas[]" value="After-school or Summer Employment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="after_school" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">After-school or Summer Employment</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="attendance" type="checkbox" name="areas[]" value="Attendance" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="attendance" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Attendance</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="behavior" type="checkbox" name="areas[]" value="Behavior in School" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="behavior" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Behavior in School</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="relationships_w_o" type="checkbox" name="areas[]" value="Relationships with Others" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="relationships_w_o" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Relationships with Others</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="other" type="checkbox" name="areas[]" value="Other" onchange="toggleOtherInput1(this)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="other" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                                    </div>
                                </div>
                                <div>
                                    <label for="areas">Specify other comments</label><br>
                                    <input type="text" name="areas[]" id="other-input1" disabled class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="specify other comments">
                                </div>
                                <br>
                            </div>
                            <div>
                                <label for="relationships" class="mb-4">Specify relationships that you would especially like help with:</label><br>
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="friends" type="checkbox" name="relationships[]" value="Friends" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="friends" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Friends</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="other_youth" type="checkbox" name="relationships[]" value="Other youth who are not friends" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="other_youth" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other youth who are not friends</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="teachers" type="checkbox" name="relationships[]" value="Teachers/School staff" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="teachers" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Teachers/School staff</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="parents" type="checkbox" name="relationships[]" value="Parents" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="parents" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Parents</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="sisters_and_brothers" type="checkbox" name="relationships[]" value="Sisters and Brothers" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="sisters_and_brothers" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sisters and Brothers</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="girlfriend" type="checkbox" name="relationships[]" value="Girlfriend/Boyfriend" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="girlfriend" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Girlfriend/Boyfriend</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="other" type="checkbox" name="relationships[]" value="Other" onchange="toggleOtherInput(this)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="other" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                                    </div>
                                </div>
                                <div>
                                    <label for="relationships">Specify other person/people</label><br>
                                    <input type="text" name="relationships[]" id="other-input" disabled class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="specify other person/people">
                                </div>
                                <br>
                            </div>
                            <div>
                                <label for="cooperative" class="mb-4">Please rate yourself on the following as <strong>strongly agree/ agree /no opinion/disagree/strongly disagree</strong>:  (If not applicable, leave blank)</label><br>
                                <div class="flex flex-wrap text-sm">
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="cooperative">I am cooperative with teachers</label><br>
                                        <input type="text" name="cooperative" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i am cooperative with teachers">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="grades_fine">My grades are fine</label><br>
                                        <input type="text" name="grades_fine" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="my grades are fine">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="school_attitude">I have a positive attitude about school</label><br>
                                        <input type="text" name="school_attitude" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i have a positive attitude about school">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="interested_in_education">I am interested in education</label><br>
                                        <input type="text" name="interested_in_education" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i am interested in education">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="work_well_with_students">I work well with other students</label><br>
                                        <input type="text" name="work_well_with_students" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i work well with other students">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="satisfied_with_friends">I am satisfied with my friends</label><br>
                                        <input type="text" name="satisfied_with_friends" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i am satisfied with my friends">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="do_homework">I do my homework regularly</label><br>
                                        <input type="text" name="do_homework" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i do my homework regularly">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="life_attitude">I have positive attitude about life</label><br>
                                        <input type="text" name="life_attitude" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i have positive attitude about life">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="dont_hang_street">I do not hang out in the streets often</label><br>
                                        <input type="text" name="dont_hang_street" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i do not hang out in the streets often">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="cooperative_with_parent">I am cooperative with my parent(s)</label><br>
                                        <input type="text" name="cooperative_with_parent" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i am cooperative with my parent(s)">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="dont_get_trouble">I do not get in trouble often</label><br>
                                        <input type="text" name="dont_get_trouble" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i do not get in trouble often">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="getting_job">I am interested in getting a good job someday</label><br>
                                        <input type="text" name="getting_job" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i am interested in getting a good job someday">
                                    </div>
                                </div>
                                <br>
                            </div>  
                            <div>
                                <label for="have_you_stopped"><strong>In the last school year</strong>, have you been stopped or questioned by police or juvenile officers for something they thought you did wrong?</label><br>
                                <select name="have_you_stopped" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select> 
                            </div>
                            @error('have_you_stopped') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="stop_fair"><strong>In the school year</strong>, if you were stopped or questioned, do you think it was mostly fair?</label><br>
                                <select name="stop_fair" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select> 
                            </div>
                            @error('stop_fair') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="happend_result">If you were stopped or questioned <strong>in the last school year</strong>, what was the most serious thing that ever happened as a result?</label><br>
                                <select name="happend_result" id="happend_result" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required onchange="toggleRequired()">
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1">Let go right away</option>
                                    <option value="2">Given a ticket or warning</option>
                                    <option value="3">Taken to police station and then released</option>
                                    <option value="4">Required to go to court</option>
                                    <option value="5">Sent to a detention facility</option>
                                    <option value="6">Sent to jail</option>
                                    <option value="7">Sent to prison</option>
                                    <option value="8">Other</option>
                                </select> 
                            </div>
                            @error('happend_result') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <div id="happend_other" style="display:none">
                                <label for="happend_result_other">Specify other result</label><br>
                                <input type="text" name="happend_result_other" id="happend_result_other" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="specify other result">
                            </div>
                            <br> 
                            <div>
                                <label for="school">School (Applicable to school/program)</label><br>
                                <input type="text" name="school" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="school (applicable to school/program)" required>
                            </div>
                            @error('school') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="signature">Student Signature</label><br>
                                <input type="file" name="signature" accept=".png, .jpg, .jpeg, .pdf"  class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="signature">
                            </div>
                            @error('signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>                             
                        </div>
                    </div>
                    <button type="submit" class="passwordvalid disabled:opacity-25 inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-900 focus:bg-blue-900 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">Save</button>                        
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function toggleOtherInput1(checkbox) {
        const input1 = document.getElementById('other-input1');
        if (checkbox.checked) {
            input1.disabled = false;
            input1.required = true;
        } else {
            input1.disabled = true;
            input1.value = '';
            input1.required = false;
        }
    }

    function toggleOtherInput(checkbox) {
        const input = document.getElementById('other-input');
        if (checkbox.checked) {
            input.disabled = false;
            input.required = true;
        } else {
            input.disabled = true;
            input.value = '';
            input.required = false;
        }
    }

    function toggleRequired() {
        // Get the selected type of ERO
        var happend_result = document.getElementById('happend_result').value;
        var happend_result_other = document.getElementById('happend_result_other');

        
        if (happend_result == "8") {
            $('#happend_other').show();
            happend_result_other.required = true;
        } else {
            $('#happend_other').hide();
            happend_result_other.required = false;
        }
    }
</script>
@endpush