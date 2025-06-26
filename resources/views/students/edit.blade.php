@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('students.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">PRE-DEMOGRAPHIC - INTAKE DATA</h5><br>                 
                <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="">
                        <div>
                            <div>
                                <label for="name">Student's Full Name</label><br>
                                <input type="text" name="name" value="{{ $student->name }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="full name" required>
                            </div>
                            @error('name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="school">School</label><br>
                                <input type="text" name="school" value="{{ $student->school }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="school" required>
                            </div>
                            @error('school') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="address">Address</label><br>
                                <input type="text" name="address" value="{{ $student->address }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="address" required>
                            </div>
                            @error('address') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="city">City</label><br>
                                <input type="text" name="city" value="{{ $student->city }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="city" required>
                            </div>
                            @error('city') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="state">State</label><br>
                                <input type="text" name="state" value="{{ $student->state }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="state" required>
                            </div>
                            @error('state') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="zip">Zip</label><br>
                                <input type="text" name="zip" value="{{ $student->zip }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="zip" required>
                            </div>
                            @error('zip') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="home_phone">Home Phone</label><br>
                                <input type="number" name="home_phone" value="{{ $student->home_phone }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="home phone" required>
                            </div>
                            @error('home_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="work_phone">Work Phone</label><br>
                                <input type="number" name="work_phone" value="{{ $student->work_phone }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="work phone">
                            </div>
                            @error('work_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="cell_phone">Cell Phone</label><br>
                                <input type="number" name="cell_phone" value="{{ $student->cell_phone }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="cell phone">
                            </div>
                            @error('cell_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="gender">Gender</label><br>
                                <input type="text" name="gender" value="{{ $student->gender }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="gender" required>
                            </div>
                            @error('gender') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="ethnicity">Ethnicity</label><br>
                                <input type="text" name="ethnicity" value="{{ $student->ethnicity }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="ethnicity" required>
                            </div>
                            @error('ethnicity') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="age">Age</label><br>
                                <input type="text" name="age" value="{{ $student->age }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="age" required>
                            </div>
                            @error('age') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="dob">Date of Birth</label><br>
                                <input type="date" name="dob" value="{{ $student->dob }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="dob" required>
                            </div>
                            @error('dob') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="father">Parents / Legal Guardian (Father)</label><br>
                                <input type="text" name="father" value="{{ $student->father }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="parents / legal guardian (father)" required>
                            </div>
                            @error('father') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="mother">Parents / Legal Guardian (Mother)</label><br>
                                <input type="text" name="mother" value="{{ $student->mother }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="parents / legal guardian (mother)" required>
                            </div>
                            @error('mother') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="parents_home_phone">Parents Home Phone</label><br>
                                <input type="number" name="parents_home_phone" value="{{ $student->parents_home_phone }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="parents home phone" required>
                            </div>
                            @error('parents_home_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="parents_work_phone">Parents Work Phone</label><br>
                                <input type="number" name="parents_work_phone" value="{{ $student->parents_work_phone }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="parents work phone">
                            </div>
                            @error('parents_work_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="parents_cell_phone">Parents Cell Phone</label><br>
                                <input type="number" name="parents_cell_phone" value="{{ $student->parents_cell_phone }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="parents cell phone">
                            </div>
                            @error('parents_cell_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="student_lives_with">Name of the Person Student Currently Lives With</label><br>
                                <input type="text" name="student_lives_with" value="{{ $student->student_lives_with }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="name of the person student currently lives with" required>
                            </div>
                            @error('student_lives_with') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="gpa">Grades / GPA</label><br>
                                <input type="text" name="gpa" value="{{ $student->gpa }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="gpa" required>
                            </div>
                            @error('gpa') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="counselor">Guidance Counselor</label><br>
                                <input type="text" name="counselor" value="{{ $student->counselor }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="guidance counselor" required>
                            </div>
                            @error('counselor') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="emergency_contact">Name of Emergency Contact</label><br>
                                <input type="text" name="emergency_contact" value="{{ $student->emergency_contact }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="name of emergency contact" required>
                            </div>
                            @error('emergency_contact') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="relationship_to_student">Relationship to Student</label><br>
                                <input type="text" name="relationship_to_student" value="{{ $student->relationship_to_student }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="relationship to student" required>
                            </div>
                            @error('relationship_to_student') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="emergency_home_phone">Emergency Home Phone</label><br>
                                <input type="number" name="emergency_home_phone" value="{{ $student->emergency_home_phone }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="emergency home phone" required>
                            </div>
                            @error('emergency_home_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="emergency_work_phone">Emergency Work Phone</label><br>
                                <input type="number" name="emergency_work_phone" value="{{ $student->emergency_work_phone }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="emergency work phone">
                            </div>
                            @error('emergency_work_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="emergency_cell_phone">Emergency Cell Phone</label><br>
                                <input type="number" name="emergency_cell_phone" value="{{ $student->emergency_cell_phone }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="emergency cell phone">
                            </div>
                            @error('emergency_cell_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="guardian_email">Guardian Email Address</label><br>
                                <input type="text" name="guardian_email" value="{{ $student->guardian_email }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="guardian email address" required>
                            </div>
                            @error('guardian_email') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="student_email">Student Email Address</label><br>
                                <input type="text" name="student_email" value="{{ $student->student_email }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="student email address" required>
                            </div>
                            @error('student_email') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            @if($student->parent_signature != null)
                            <div class="exist_psignature">
                                <label>Parent / Legal Guardian Signature</label><br>
                                <div class="flex overflow-x-auto space-x-2">                              
                                    <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $student->parent_signature }}">
                                </div><br>
                                <div>
                                    <button type="button" id="remove_psignature" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                        Remove
                                    </button>
                                </div>
                            </div>
                            <div class="add_psignature hidden">
                                <div>
                                    <label for="update_parent_signature">Parent / Legal Guardian Signature</label><br>
                                    <input type="file" name="update_parent_signature" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                                @error('update_parent_signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            </div>
                            @else
                            <div>
                                <label for="update_parent_signature">Parent / Legal Guardian Signature</label><br>
                                <input type="file" name="update_parent_signature" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('update_parent_signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            @endif
                            <input type="hidden" name="parent_signature_remove" id="parent_signature_remove" value="">

                            @if($student->student_signature != null)
                            <div class="existsignature">
                                <label>Student Signature</label><br>
                                <div class="flex overflow-x-auto space-x-2">                              
                                    <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $student->student_signature }}">
                                </div><br>
                                <div>
                                    <button type="button" id="removesignature" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                        Remove
                                    </button>
                                </div>
                            </div>
                            <div class="addsignature hidden">
                                <div>
                                    <label for="update_student_signature">Student Signature</label><br>
                                    <input type="file" name="update_student_signature" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                                @error('update_student_signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            </div>
                            @else
                            <div>
                                <label for="update_student_signature">Student Signature</label><br>
                                <input type="file" name="update_student_signature" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('update_student_signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            @endif
                            <input type="hidden" name="student_signature_remove" id="student_signature_remove" value="">
                            
                            <div>
                                @php 
                                    $lives = json_decode($student->lives);
                                @endphp
                                <p class="font-semibold mb-2">Family Structure: (Please check all that apply and Provide Details)</p>
                                <label for="lives" class="mb-4">1. With whom does the child live?</label><br>
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="parents" type="checkbox" name="lives[]" value="Mother & Father" {{ in_array('Mother & Father', $lives ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="parents" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mother & Father</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="group_home" type="checkbox" name="lives[]" value="Group Home" {{ in_array('Group Home', $lives ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="group_home" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Group Home</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="other_relative" type="checkbox" name="lives[]" value="Other Relative" {{ in_array('Other Relative', $lives ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="other_relative" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other Relative</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="mother" type="checkbox" name="lives[]" value="Mother" {{ in_array('Mother', $lives ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="mother" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mother</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="father" type="checkbox" name="lives[]" value="Father" {{ in_array('Father', $lives ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="father" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Father</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="foster" type="checkbox" name="lives[]" value="Foster Care" {{ in_array('Foster Care', $lives ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="foster" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Foster Care</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="grandparents" type="checkbox" name="lives[]" value="Grandparents" {{ in_array('Grandparents', $lives ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="grandparents" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Grandparents</label>
                                    </div>
                                </div>
                                <br>
                            </div>  
                            <div>
                                <p class="font-semibold mb-2">Involvement with court system or Criminal Justice System: (Please check all that apply and Provide Details)</p>
                                <label for="contact_with_police">Has He/She had any contact with the Police</label><br>
                                <select name="contact_with_police" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1" @if($student->contact_with_police === 1) selected @endif>Yes</option>
                                    <option value="2" @if($student->contact_with_police === 2) selected @endif>No</option>
                                </select> 
                            </div>
                            @error('contact_with_police') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <div class="mt-2">
                                <label for="explain_contact_with_police">Explain</label><br>
                                <input type="text" name="explain_contact_with_police" value="{{ $student->explain_contact_with_police }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="explain has he/she had any contact with the police">
                            </div>
                            <br> 
                            <div>
                                <label for="court_involement">Please Explain Any Involement with the Court System</label><br>
                                <input type="text" name="court_involement" value="{{ $student->court_involement }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="involement with the court system" required>
                            </div>
                            @error('court_involement') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>  
                            <div>                                
                                <label for="incarcerated">Has this child been incarcerated before?</label><br>
                                <select name="incarcerated" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1" @if($student->incarcerated === 1) selected @endif>Yes</option>
                                    <option value="2" @if($student->incarcerated === 2) selected @endif>No</option>
                                </select> 
                            </div>
                            @error('incarcerated') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <div class="mt-2">
                                <label for="explain_incarcerated">Explain</label><br>
                                <input type="text" name="explain_incarcerated" value="{{ $student->explain_incarcerated }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="explain has this Child been incarcerated before?">
                            </div>
                            <br>
                            <div>
                                @php 
                                    $events = json_decode($student->events);
                                    $other_events = '';
                                    $defined_events = [
                                        'Separation / divorce of parents',
                                        'Natural disaster',
                                        'Turmoil',
                                        'Abuse / neglect',
                                        'Incarceration (family / friend)',
                                        'Homelessness',
                                        'Death (family / friend / pet)',
                                        'Violent attack',
                                        'AODA (family / friend)',
                                        'Refugee / political',
                                        'Other trauma',
                                    ];
                                    $other_events = array_diff($events, $defined_events);
                                    $other_events = is_array($other_events) ? implode(', ', $other_events) : $other_events;
                                @endphp
                                <label for="events" class="mb-4">Recent traumatic events (please check all that apply and provide details below)</label><br>
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="divorce" type="checkbox" name="events[]" value="Separation / divorce of parents" {{ in_array('Separation / divorce of parents', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="divorce" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Separation / divorce of parents</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="disaster" type="checkbox" name="events[]" value="Natural disaster" {{ in_array('Natural disaster', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="disaster" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Natural disaster</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="turmoil" type="checkbox" name="events[]" value="Turmoil" {{ in_array('Turmoil', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="turmoil" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Turmoil</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="neglect" type="checkbox" name="events[]" value="Abuse / neglect" {{ in_array('Abuse / neglect', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="neglect" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Abuse / neglect</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="incarceration" type="checkbox" name="events[]" value="Incarceration (family / friend)" {{ in_array('Incarceration (family / friend)', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="incarceration" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Incarceration (family / friend)</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="homelessness" type="checkbox" name="events[]" value="Homelessness" {{ in_array('Homelessness', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="homelessness" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Homelessness</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="death" type="checkbox" name="events[]" value="Death (family / friend / pet)" {{ in_array('Death (family / friend / pet)', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="death" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Death (family / friend / pet)</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="violent" type="checkbox" name="events[]" value="Violent attack" {{ in_array('Violent attack', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="violent" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Violent attack</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="aoda" type="checkbox" name="events[]" value="AODA (family / friend)" {{ in_array('AODA (family / friend)', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="aoda" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">AODA (family / friend)</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="political" type="checkbox" name="events[]" value="Refugee / political" {{ in_array('Refugee / political', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="political" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Refugee / political</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="trauma" type="checkbox" name="events[]" value="Other trauma" {{ in_array('Other trauma', $events ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="trauma" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other trauma</label>
                                    </div>
                                </div>
                                <div>
                                    <label for="events">Please provide any details</label><br>
                                    <input type="text" name="events[]" value="{{ $other_events }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="please provide any details">
                                </div>
                                <br>
                            </div>   
                            <div>
                                @php 
                                    $other_infos = json_decode($student->other_infos);
                                    $other_other_infos = '';
                                    $defined_other_infos = [
                                        'Currently enrolled in special education',
                                        'Currently on probation',
                                    ];
                                    $other_other_infos = array_diff($other_infos, $defined_other_infos);
                                    $other_other_infos = is_array($other_other_infos) ? implode(', ', $other_other_infos) : $other_other_infos;

                                @endphp
                                <label for="other_infos" class="mb-4">Other information on student:</label><br>
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="special_edu" type="checkbox" name="other_infos[]" value="Currently enrolled in special education" {{ in_array('Currently enrolled in special education', $other_infos ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="special_edu" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Currently enrolled in special education</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="probation" type="checkbox" name="other_infos[]" value="Currently on probation" {{ in_array('Currently on probation', $other_infos ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="probation" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Currently on probation</label>
                                    </div>
                                </div>
                                <div>
                                    <label for="other_infos">Other</label><br>
                                    <input type="text" name="other_infos[]" value="{{ $other_other_infos }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="other">
                                </div>
                                <br>
                            </div> 
                            <p class="font-semibold mb-2">Previous Year School Information</p> 
                            <div class="last_school">
                                <label for="last_school">Last School Attended</label><br>
                                <input type="text" name="last_school" value="{{ $student->last_school }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="last school attended">
                            </div>
                            <br>
                            <div>
                                @php 
                                    $previous_conducts = json_decode($student->previous_conducts);
                                    $other_incidents = '';
                                    $defined_options = [
                                        'Fighting',
                                        'Failed Classes',
                                        'Arson',
                                        'Class Misconduct',
                                        'Lateness',
                                        'Gambling',
                                        'Class Cutting',
                                        'Truancy',
                                        'Drug Use'
                                    ];
                                    $other_incidents = array_diff($previous_conducts, $defined_options);
                                    $other_incidents = is_array($other_incidents) ? implode(', ', $other_incidents) : $other_incidents;
                                @endphp
                                <label for="previous_conducts" class="mb-4">Previous school conduct (please check all that apply)</label><br>
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="fighting" type="checkbox" name="previous_conducts[]" value="Fighting" {{ in_array('Fighting', $previous_conducts ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="fighting" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fighting</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="failed_classes" type="checkbox" name="previous_conducts[]" value="Failed Classes" {{ in_array('Failed Classes', $previous_conducts ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="failed_classes" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Failed Classes</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="arson" type="checkbox" name="previous_conducts[]" value="Arson" {{ in_array('Arson', $previous_conducts ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="arson" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Arson</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="misconduct" type="checkbox" name="previous_conducts[]" value="Class Misconduct" {{ in_array('Class Misconduct', $previous_conducts ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="misconduct" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Class Misconduct</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="lateness" type="checkbox" name="previous_conducts[]" value="Lateness" {{ in_array('Lateness', $previous_conducts ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="lateness" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lateness</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="gambling" type="checkbox" name="previous_conducts[]" value="Gambling" {{ in_array('Gambling', $previous_conducts ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="gambling" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gambling</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="class_cut" type="checkbox" name="previous_conducts[]" value="Class Cutting" {{ in_array('Class Cutting', $previous_conducts ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="class_cut" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Class Cutting</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="truancy" type="checkbox" name="previous_conducts[]" value="Truancy" {{ in_array('Truancy', $previous_conducts ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="truancy" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Truancy</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="drug_use" type="checkbox" name="previous_conducts[]" value="Drug Use" {{ in_array('Drug Use', $previous_conducts ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="drug_use" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drug Use</label>
                                    </div>
                                </div>
                                <div>
                                    <label for="previous_conducts">Other violent incident:</label><br>
                                    <input type="text" name="previous_conducts[]" value="{{ $other_incidents }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="other violent incident">
                                </div>
                                <br>
                            </div>
                            <div class="suspended_time">
                                <label for="suspended_time">How many times has this child been suspended in his/her previous year?</label><br>
                                <input type="text" name="suspended_time" value="{{ $student->suspended_time }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="how many times has this child been suspended in his/her previous year?" required>
                            </div>
                            <br>
                            <div>                                
                                <label for="ever_expelled">Has this child ever been expelled?</label><br>
                                <select name="ever_expelled" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1" @if($student->ever_expelled === 1) selected @endif>Yes</option>
                                    <option value="2" @if($student->ever_expelled === 2) selected @endif>No</option>
                                </select> 
                            </div>
                            @error('ever_expelled') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <div class="mt-2">
                                <label for="explain_ever_expelled">Explain</label><br>
                                <input type="text" name="explain_ever_expelled" value="{{ $student->explain_ever_expelled }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="explain has this child ever been expelled?">
                            </div>
                            <br> 
                            <div class="additional_info">
                                <label for="additional_info">Any additional information about the previous year</label><br>
                                <input type="text" name="additional_info" value="{{ $student->additional_info }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="any additional information about the previous year">
                            </div>
                            <br> 
                            <div class="advisor">
                                <label for="advisor">Youth advisor</label><br>
                                <input type="text" name="advisor" value="{{ $student->advisor }}" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="youth advisor">
                            </div>
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
    $('#removesignature').on('click', function()
    {
        $('.existsignature').hide();
        $('.addsignature').show();
        $('#student_signature_remove').val(1);
    });

    $('#remove_psignature').on('click', function()
    {
        $('.exist_psignature').hide();
        $('.add_psignature').show();
        $('#parent_signature_remove').val(1);
    });
</script>
@endpush