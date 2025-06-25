@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('students.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Edit Student</h5><br>                 
                <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="">
                        <div>
                            <div>
                                <label for="name">Full Name</label><br>
                                <input type="text" name="name" value="{{ $student->name }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="full name" required>
                            </div>
                            @error('name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="email">Email</label><br>
                                <input type="text" name="email" id="email" value="{{ $student->email }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="email" required>
                            </div>
                            <p id="danger_alert1" class="text-sm text-red-500 mb-2" style="display:none;"></p>
                            @error('email') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="contact">Contact Number</label><br>
                                <input type="number" name="contact" id="contact" value="{{ $student->contact }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="contact number" required>
                            </div>
                            <p id="danger_alert2" class="text-sm text-red-500 mb-2" style="display:none;"></p>
                            @error('contact') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>                                                 
                        </div>
                        <div class="">
                            <div>
                                <label for="areas" class="mb-4">In what areas would you like help from staff? (check all that apply)</label><br>
                                @php 
                                    $areas = json_decode($student->areas);
                                    $other_value = '';

                                    if (is_array($areas)) {
                                        $other_index = array_search('Other', $areas);
                                        if ($other_index !== false && isset($areas[$other_index + 1])) {
                                            $other_value = $areas[$other_index + 1];
                                        }
                                    }
                                @endphp
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="grades" type="checkbox" name="areas[]" value="Grades" {{ in_array('Grades', $areas ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="grades" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Grades</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="after_school" type="checkbox" name="areas[]" value="After-school or Summer Employment" {{ in_array('After-school or Summer Employment', $areas ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="after_school" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">After-school or Summer Employment</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="attendance" type="checkbox" name="areas[]" value="Attendance" {{ in_array('Attendance', $areas ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="attendance" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Attendance</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="behavior" type="checkbox" name="areas[]" value="Behavior in School" {{ in_array('Behavior in School', $areas ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="behavior" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Behavior in School</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="relationships_w_o" type="checkbox" name="areas[]" value="Relationships with Others" {{ in_array('Relationships with Others', $areas ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="relationships_w_o" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Relationships with Others</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="other" type="checkbox" name="areas[]" value="Other" {{ in_array('Other', $areas ?? []) ? 'checked' : '' }} onchange="toggleOtherInput1(this)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="other" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                                    </div>
                                </div>
                                <div>
                                    <label for="areas">Specify other comments</label><br>
                                    <input type="text" name="areas[]" id="other-input1" disabled value="{{ $other_value }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="specify other comments">
                                </div>
                                <br>
                            </div>
                            <div>
                                <label for="relationships" class="mb-4">Specify relationships that you would especially like help with:</label><br>
                                @php 
                                    $relationships = json_decode($student->relationships);
                                    $other_value1 = '';

                                    if (is_array($relationships)) {
                                        $other_index1 = array_search('Other', $relationships);
                                        if ($other_index1 !== false && isset($relationships[$other_index1 + 1])) {
                                            $other_value1 = $relationships[$other_index1 + 1];
                                        }
                                    }
                                @endphp
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="friends" type="checkbox" name="relationships[]" value="Friends" {{ in_array('Friends', $relationships ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="friends" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Friends</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="other_youth" type="checkbox" name="relationships[]" value="Other youth who are not friends" {{ in_array('Other youth who are not friends', $relationships ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="other_youth" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other youth who are not friends</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="teachers" type="checkbox" name="relationships[]" value="Teachers/School staff" {{ in_array('Teachers/School staff', $relationships ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="teachers" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Teachers/School staff</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="parents" type="checkbox" name="relationships[]" value="Parents" {{ in_array('Parents', $relationships ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="parents" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Parents</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="sisters_and_brothers" type="checkbox" name="relationships[]" value="Sisters and Brothers" {{ in_array('Sisters and Brothers', $relationships ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="sisters_and_brothers" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sisters and Brothers</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="girlfriend" type="checkbox" name="relationships[]" value="Girlfriend/Boyfriend" {{ in_array('Girlfriend/Boyfriend', $relationships ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="girlfriend" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Girlfriend/Boyfriend</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="other1" type="checkbox" name="relationships[]" value="Other" onchange="toggleOtherInput(this)" {{ in_array('Other', $relationships ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="other" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                                    </div>
                                </div>
                                <div>
                                    <label for="relationships">Specify other person/people</label><br>
                                    <input type="text" name="relationships[]" id="other-input" disabled value="{{ $other_value1 }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="specify other person/people">
                                </div>
                                <br>
                            </div>
                            <div>
                                <label for="cooperative" class="mb-4">Please rate yourself on the following as <strong>strongly agree/ agree /no opinion/disagree/strongly disagree</strong>:  (If not applicable, leave blank)</label><br>
                                <div class="flex flex-wrap text-sm">
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="cooperative">I am cooperative with teachers</label><br>
                                        <input type="text" name="cooperative" value="{{ $student->cooperative }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i am cooperative with teachers">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="grades_fine">My grades are fine</label><br>
                                        <input type="text" name="grades_fine" value="{{ $student->grades_fine }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="my grades are fine">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="school_attitude">I have a positive attitude about school</label><br>
                                        <input type="text" name="school_attitude" value="{{ $student->school_attitude }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i have a positive attitude about school">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="interested_in_education">I am interested in education</label><br>
                                        <input type="text" name="interested_in_education" value="{{ $student->interested_in_education }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i am interested in education">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="work_well_with_students">I work well with other students</label><br>
                                        <input type="text" name="work_well_with_students" value="{{ $student->work_well_with_students }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i work well with other students">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="satisfied_with_friends">I am satisfied with my friends</label><br>
                                        <input type="text" name="satisfied_with_friends" value="{{ $student->satisfied_with_friends }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i am satisfied with my friends">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="do_homework">I do my homework regularly</label><br>
                                        <input type="text" name="do_homework" value="{{ $student->do_homework }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i do my homework regularly">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="life_attitude">I have positive attitude about life</label><br>
                                        <input type="text" name="life_attitude" value="{{ $student->life_attitude }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i have positive attitude about life">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="dont_hang_street">I do not hang out in the streets often</label><br>
                                        <input type="text" name="dont_hang_street" value="{{ $student->dont_hang_street }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i do not hang out in the streets often">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="cooperative_with_parent">I am cooperative with my parent(s)</label><br>
                                        <input type="text" name="cooperative_with_parent" value="{{ $student->cooperative_with_parent }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i am cooperative with my parent(s)">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="dont_get_trouble">I do not get in trouble often</label><br>
                                        <input type="text" name="dont_get_trouble" value="{{ $student->dont_get_trouble }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i do not get in trouble often">
                                    </div>
                                    <div class="w-1/3 p-2 items-center">
                                        <label for="getting_job">I am interested in getting a good job someday</label><br>
                                        <input type="text" name="getting_job" value="{{ $student->getting_job }}" class="block w-64 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="i am interested in getting a good job someday">
                                    </div>
                                </div>
                                <br>
                            </div>  
                            <div>
                                <label for="have_you_stopped"><strong>In the last school year</strong>, have you been stopped or questioned by police or juvenile officers for something they thought you did wrong?</label><br>
                                <select name="have_you_stopped" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1" @if($student->have_you_stopped === 1) selected @endif>Yes</option>
                                    <option value="2" @if($student->have_you_stopped === 2) selected @endif>No</option>
                                </select> 
                            </div>
                            @error('have_you_stopped') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="stop_fair"><strong>In the school year</strong>, if you were stopped or questioned, do you think it was mostly fair?</label><br>
                                <select name="stop_fair" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1" @if($student->stop_fair === 1) selected @endif>Yes</option>
                                    <option value="2" @if($student->stop_fair === 2) selected @endif>No</option>
                                </select> 
                            </div>
                            @error('stop_fair') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="happend_result">If you were stopped or questioned <strong>in the last school year</strong>, what was the most serious thing that ever happened as a result?</label><br>
                                <select name="happend_result" id="happend_result" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required onchange="toggleRequired()">
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1" @if($student->happend_result === 1) selected @endif>Let go right away</option>
                                    <option value="2" @if($student->happend_result === 2) selected @endif>Given a ticket or warning</option>
                                    <option value="3" @if($student->happend_result === 3) selected @endif>Taken to police station and then released</option>
                                    <option value="4" @if($student->happend_result === 4) selected @endif>Required to go to court</option>
                                    <option value="5" @if($student->happend_result === 5) selected @endif>Sent to a detention facility</option>
                                    <option value="6" @if($student->happend_result === 6) selected @endif>Sent to jail</option>
                                    <option value="7" @if($student->happend_result === 7) selected @endif>Sent to prison</option>
                                    <option value="8" @if($student->happend_result === 8) selected @endif>Other</option>
                                </select> 
                            </div>
                            @error('happend_result') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <div id="happend_other" style="display:none">
                                <label for="happend_result_other">Specify other result</label><br>
                                <input type="text" name="happend_result_other" id="happend_result_other" value="{{ $student->happend_result_other }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="specify other result">
                            </div>
                            <br> 
                            <div>
                                <label for="school">School (Applicable to school/program)</label><br>
                                <input type="text" name="school" value="{{ $student->school }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="school (applicable to school/program)" required>
                            </div>
                            @error('school') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            @if($student->signature != null)
                            <div class="existsignature">
                                <label>Student Signature</label><br>
                                <div class="flex overflow-x-auto space-x-2">                              
                                    <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $student->signature }}">
                                </div><br>
                                <div>
                                    <button type="button" id="removesignature" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                        Remove
                                    </button>
                                </div>
                            </div>
                            <div class="addsignature hidden">
                                <div>
                                    <label for="update_signature">Student Signature</label><br>
                                    <input type="file" name="update_signature" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                                @error('update_signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            </div>
                            @else
                            <div>
                                <label for="update_signature">Student Signature</label><br>
                                <input type="file" name="update_signature" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('update_signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            @endif
                            <input type="hidden" name="signature_remove" id="signature_remove" value="">
                            <br>                            
                        </div>
                    </div>
                    <button type="submit" class="disabled:opacity-25 inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-900 focus:bg-blue-900 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('#removesignature').on('click', function()
    {
        $('.existsignature').hide();
        $('.addsignature').show();
        $('#signature_remove').val(1);
    });

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

    window.onload = function () {
        toggleOtherInput1(document.getElementById('other'));
        toggleOtherInput(document.getElementById('other1'));
        toggleRequired();
    };
</script>
@endpush