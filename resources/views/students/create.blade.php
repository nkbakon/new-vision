@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('students.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">PRE-DEMOGRAPHIC - INTAKE DATA</h5><br>                 
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div>
                            <div>
                                <label for="name">Student's Full Name</label><br>
                                <input type="text" name="name" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="full name" required>
                            </div>
                            @error('name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                @php 
                                    $schools = App\Models\School::all();
                                @endphp
                                <label for="school_id">Select School</label><br>
                                <select name="school_id" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select school from here</option>
                                    @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }} ({{ $school->state }})</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('school_id') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="address">Address</label><br>
                                <input type="text" name="address" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="address" required>
                            </div>
                            @error('address') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="city">City</label><br>
                                <input type="text" name="city" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="city" required>
                            </div>
                            @error('city') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="state">State</label><br>
                                <select name="state" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="Alabama">Alabama</option>
                                    <option value="Alaska">Alaska</option>
                                    <option value="Arizona">Arizona</option>
                                    <option value="Arkansas">Arkansas</option>
                                    <option value="California">California</option>
                                    <option value="Colorado">Colorado</option>
                                    <option value="Connecticut">Connecticut</option>
                                    <option value="Delaware">Delaware</option>
                                    <option value="Florida">Florida</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Idaho">Idaho</option>
                                    <option value="Illinois">Illinois</option>
                                    <option value="Indiana">Indiana</option>
                                    <option value="Iowa">Iowa</option>
                                    <option value="Kansas">Kansas</option>
                                    <option value="Kentucky">Kentucky</option>
                                    <option value="Louisiana">Louisiana</option>
                                    <option value="Maine">Maine</option>
                                    <option value="Maryland">Maryland</option>
                                    <option value="Massachusetts">Massachusetts</option>
                                    <option value="Michigan">Michigan</option>
                                    <option value="Minnesota">Minnesota</option>
                                    <option value="Mississippi">Mississippi</option>
                                    <option value="Missouri">Missouri</option>
                                    <option value="Montana">Montana</option>
                                    <option value="Nebraska">Nebraska</option>
                                    <option value="Nevada">Nevada</option>
                                    <option value="New Hampshire">New Hampshire</option>
                                    <option value="New Jersey">New Jersey</option>
                                    <option value="New Mexico">New Mexico</option>
                                    <option value="New York">New York</option>
                                    <option value="North Carolina">North Carolina</option>
                                    <option value="North Dakota">North Dakota</option>
                                    <option value="Ohio">Ohio</option>
                                    <option value="Oklahoma">Oklahoma</option>
                                    <option value="Oregon">Oregon</option>
                                    <option value="Pennsylvania">Pennsylvania</option>
                                    <option value="Rhode Island">Rhode Island</option>
                                    <option value="South Carolina">South Carolina</option>
                                    <option value="South Dakota">South Dakota</option>
                                    <option value="Tennessee">Tennessee</option>
                                    <option value="Texas">Texas</option>
                                    <option value="Utah">Utah</option>
                                    <option value="Vermont">Vermont</option>
                                    <option value="Virginia">Virginia</option>
                                    <option value="Washington">Washington</option>
                                    <option value="West Virginia">West Virginia</option>
                                    <option value="Wisconsin">Wisconsin</option>
                                    <option value="Wyoming">Wyoming</option>
                                </select>
                            </div>
                            @error('state') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="zip">Zip</label><br>
                                <input type="text" name="zip" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="zip" required>
                            </div>
                            @error('zip') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="phone_type">Phone Type</label><br>
                                <select name="phone_type" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="Home Phone">Home Phone</option>
                                    <option value="Work Phone">Work Phone</option>
                                    <option value="Cell Phone">Cell Phone</option>
                                </select>
                            </div>
                            @error('phone_type') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="phone">Phone</label><br>
                                <input type="number" name="phone" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="phone number" required>
                            </div>
                            @error('phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="gender">Gender</label><br>
                                <select name="gender" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Non-binary/Genderqueer/Gender Fluid/A-Gender">Non-binary/Genderqueer/Gender Fluid/A-Gender</option>
                                    <option value="Prefer not to say">Prefer not to say</option>
                                     <option value="Other">Other</option>
                                </select>
                            </div>
                            @error('gender') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="ethnicity">Ethnicity</label><br>
                                <select name="ethnicity" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="African American/Black">African American/Black</option>
                                    <option value="American Indian or Alaska Native">American Indian or Alaska Native</option>
                                    <option value="Asian">Asian</option>
                                    <option value="Hispanic or Latino">Hispanic or Latino</option>
                                    <option value="Middle Eastern or North African">Middle Eastern or North African</option>
                                    <option value="Native Hawaiian or Pacific Islander">Native Hawaiian or Pacific Islander</option>
                                    <option value="Caucasian/White">Caucasian/White</option>
                                </select>
                            </div>
                            @error('ethnicity') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>                            
                            <div>
                                <label for="dob">Date of Birth</label><br>
                                <input type="date" id="dob" name="dob" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="dob" required>
                            </div>
                            @error('dob') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="age">Age</label><br>
                                <input type="text" id="age" name="age" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="age" required>
                            </div>
                            @error('age') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>                            
                            <div>
                                <label for="father">Parents / Legal Guardian (Father)</label><br>
                                <input type="text" name="father" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="parents / legal guardian (father)" required>
                            </div>
                            @error('father') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="mother">Parents / Legal Guardian (Mother)</label><br>
                                <input type="text" name="mother" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="parents / legal guardian (mother)">
                            </div>
                            @error('mother') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="parents_phone_type">Parents / Legal Guardian Phone Type</label><br>
                                <select name="parents_phone_type" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="Home Phone">Home Phone</option>
                                    <option value="Work Phone">Work Phone</option>
                                    <option value="Cell Phone">Cell Phone</option>
                                </select>
                            </div>
                            @error('parents_phone_type') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>  
                            <div>
                                <label for="parents_phone">Parents / Legal Guardian Phone</label><br>
                                <input type="number" name="parents_phone" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="parents phone" required>
                            </div>
                            @error('parents_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="student_lives_with">Name of the Person Student Currently Lives With</label><br>
                                <input type="text" name="student_lives_with" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="name of the person student currently lives with" required>
                            </div>
                            @error('student_lives_with') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="gpa">Grades / GPA</label><br>
                                <input type="text" name="gpa" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="gpa" required>
                            </div>
                            @error('gpa') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="counselor">Guidance Counselor</label><br>
                                <input type="text" name="counselor" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="guidance counselor" required>
                            </div>
                            @error('counselor') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="emergency_contact">Name of Emergency Contact</label><br>
                                <input type="text" name="emergency_contact" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="name of emergency contact" required>
                            </div>
                            @error('emergency_contact') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="relationship_to_student">Relationship to Student</label><br>
                                <select name="relationship_to_student" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Father">Father</option>
                                    <option value="Foster Parent">Foster Parent</option>
                                    <option value="Aunt">Aunt</option>
                                    <option value="Uncle">Uncle</option>
                                    <option value="Grandparent">Grandparent</option>
                                    <option value="Other Relative">Other Relative</option>
                                </select>
                            </div>
                            @error('relationship_to_student') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="emergency_phone_type">Emergency Phone Type</label><br>
                                <select name="emergency_phone_type" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="Home Phone">Home Phone</option>
                                    <option value="Work Phone">Work Phone</option>
                                    <option value="Cell Phone">Cell Phone</option>
                                </select>
                            </div>
                            @error('emergency_phone_type') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="emergency_phone">Emergency Phone</label><br>
                                <input type="number" name="emergency_phone" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="emergency phone number">
                            </div>
                            @error('emergency_phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="guardian_email">Guardian Email Address</label><br>
                                <input type="text" name="guardian_email" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="guardian email address" required>
                            </div>
                            @error('guardian_email') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="student_email">Student Email Address</label><br>
                                <input type="text" name="student_email" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="student email address" required>
                            </div>
                            @error('student_email') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="parent_signature">Parent / Legal Guardian Signature</label><br>
                                <input type="file" name="parent_signature" accept=".png, .jpg, .jpeg, .pdf"  class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="parent signature">
                            </div>
                            @error('parent_signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <label for="student_signature">Student Signature</label><br>
                                <input type="file" name="student_signature" accept=".png, .jpg, .jpeg, .pdf"  class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="student signature">
                            </div>
                            @error('student_signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br> 
                            <div>
                                <p class="font-semibold mb-2">Family Structure: (Please check all that apply and Provide Details)</p>
                                <label for="lives" class="mb-4">With whom does the child live?</label><br>
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="parents" type="checkbox" name="lives[]" value="Mother & Father" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="parents" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mother & Father</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="group_home" type="checkbox" name="lives[]" value="Group Home" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="group_home" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Group Home</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="other_relative" type="checkbox" name="lives[]" value="Other Relative" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="other_relative" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other Relative</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="mother" type="checkbox" name="lives[]" value="Mother" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="mother" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mother</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="father" type="checkbox" name="lives[]" value="Father" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="father" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Father</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="foster" type="checkbox" name="lives[]" value="Foster Care" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="foster" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Foster Care</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="grandparents" type="checkbox" name="lives[]" value="Grandparents" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
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
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select> 
                            </div>
                            @error('contact_with_police') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <div class="mt-2">
                                <label for="explain_contact_with_police">Explain</label><br>
                                <input type="text" name="explain_contact_with_police" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="explain has he/she had any contact with the police">
                            </div>
                            <br> 
                            <div>
                                <label for="court_involement">Please Explain Any Involement with the Court System</label><br>
                                <input type="text" name="court_involement" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="involement with the court system" required>
                            </div>
                            @error('court_involement') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>  
                            <div>                                
                                <label for="incarcerated">Has this child been incarcerated before?</label><br>
                                <select name="incarcerated" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select> 
                            </div>
                            @error('incarcerated') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <div class="mt-2">
                                <label for="explain_incarcerated">Explain</label><br>
                                <input type="text" name="explain_incarcerated" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="explain has this Child been incarcerated before?">
                            </div>
                            <br>
                            <div>
                                <label for="events" class="mb-4">Recent traumatic events (please check all that apply and provide details below)</label><br>
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="divorce" type="checkbox" name="events[]" value="Separation / divorce of parents" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="divorce" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Separation / divorce of parents</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="disaster" type="checkbox" name="events[]" value="Natural disaster" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="disaster" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Natural disaster</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="turmoil" type="checkbox" name="events[]" value="Turmoil" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="turmoil" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Turmoil</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="neglect" type="checkbox" name="events[]" value="Abuse / neglect" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="neglect" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Abuse / neglect</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="incarceration" type="checkbox" name="events[]" value="Incarceration (family / friend)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="incarceration" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Incarceration (family / friend)</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="homelessness" type="checkbox" name="events[]" value="Homelessness" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="homelessness" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Homelessness</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="death" type="checkbox" name="events[]" value="Death (family / friend / pet)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="death" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Death (family / friend / pet)</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="violent" type="checkbox" name="events[]" value="Violent attack" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="violent" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Violent attack</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="aoda" type="checkbox" name="events[]" value="AODA (family / friend)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="aoda" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">AODA (family / friend)</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="political" type="checkbox" name="events[]" value="Refugee / political" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="political" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Refugee / political</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="trauma" type="checkbox" name="events[]" value="Other trauma" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="trauma" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other trauma</label>
                                    </div>
                                </div>
                                <div>
                                    <label for="events">Please provide any details</label><br>
                                    <input type="text" name="events[]" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="please provide any details">
                                </div>
                                <br>
                            </div>   
                            <div>
                                <label for="other_infos" class="mb-4">Other information on student:</label><br>
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="special_edu" type="checkbox" name="other_infos[]" value="Currently enrolled in special education" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="special_edu" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Currently enrolled in special education</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="probation" type="checkbox" name="other_infos[]" value="Currently on probation" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="probation" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Currently on probation</label>
                                    </div>
                                </div>
                                <div>
                                    <label for="other_infos">Other</label><br>
                                    <input type="text" name="other_infos[]" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="other">
                                </div>
                                <br>
                            </div> 
                            <p class="font-semibold mb-2">Previous Year School Information</p> 
                            <div>
                                @php 
                                    $schools = App\Models\School::all();
                                @endphp
                                <label for="last_school_id">Select Last School Attended</label><br>
                                <select name="last_school_id" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select school from here</option>
                                    @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }} ({{ $school->state }})</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('last_school_id') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>
                            <div>
                                <label for="previous_conducts" class="mb-4">Previous school conduct (please check all that apply)</label><br>
                                <div class="flex flex-wrap">
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="fighting" type="checkbox" name="previous_conducts[]" value="Fighting" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="fighting" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fighting</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="failed_classes" type="checkbox" name="previous_conducts[]" value="Failed Classes" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="failed_classes" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Failed Classes</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="arson" type="checkbox" name="previous_conducts[]" value="Arson" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="arson" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Arson</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="misconduct" type="checkbox" name="previous_conducts[]" value="Class Misconduct" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="misconduct" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Class Misconduct</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="lateness" type="checkbox" name="previous_conducts[]" value="Lateness" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="lateness" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lateness</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="gambling" type="checkbox" name="previous_conducts[]" value="Gambling" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="gambling" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gambling</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="class_cut" type="checkbox" name="previous_conducts[]" value="Class Cutting" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="class_cut" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Class Cutting</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="truancy" type="checkbox" name="previous_conducts[]" value="Truancy" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="truancy" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Truancy</label>
                                    </div>
                                    <div class="w-1/3 p-2 flex items-center">
                                        <input id="drug_use" type="checkbox" name="previous_conducts[]" value="Drug Use" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="drug_use" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drug Use</label>
                                    </div>
                                </div>
                                <div>
                                    <label for="previous_conducts">Other violent incident:</label><br>
                                    <input type="text" name="previous_conducts[]" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="other violent incident">
                                </div>
                                <br>
                            </div>
                            <div class="suspended_time">
                                <label for="suspended_time">How many times has this child been suspended in his/her previous year?</label><br>
                                <input type="text" name="suspended_time" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="how many times has this child been suspended in his/her previous year?" required>
                            </div>
                            <br>
                            <div>                                
                                <label for="ever_expelled">Has this child ever been expelled?</label><br>
                                <select name="ever_expelled" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select from here</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select> 
                            </div>
                            @error('ever_expelled') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <div class="mt-2">
                                <label for="explain_ever_expelled">Explain</label><br>
                                <input type="text" name="explain_ever_expelled" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="explain has this child ever been expelled?">
                            </div>
                            <br> 
                            <div class="additional_info">
                                <label for="additional_info">Any additional information about the previous year</label><br>
                                <input type="text" name="additional_info" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="any additional information about the previous year">
                            </div>
                            <br> 
                            <div class="advisor">
                                <label for="advisor">Youth advisor</label><br>
                                <input type="text" name="advisor" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="youth advisor">
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
    document.getElementById('dob').addEventListener('change', function () {
        const dob = new Date(this.value);
        const today = new Date();

        if (!isNaN(dob)) {
            let age = today.getFullYear() - dob.getFullYear();
            const m = today.getMonth() - dob.getMonth();

            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }

            document.getElementById('age').value = age;
        } else {
            document.getElementById('age').value = '';
        }
    });
</script>
@endpush