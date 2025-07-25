@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('logs.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Staff Action Log</h5><br>                 
                <form action="{{ route('logs.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="actions" class="font-semibold">Action</label><br>
                            <label for="actions" class="mb-4 text-gray-700">Select at least one Action item.</label><br>
                            <div>
                                <div class="mb-2 flex items-center">
                                    <input id="CDS" type="checkbox" name="actions[]" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="CDS" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">CDS – Character Development Sessions (inc. life skills): Topical sessions lead by youth advisor with mentees.</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="CDS2" type="checkbox" name="actions[]" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="CDS2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">CDS2 – Character Development Sessions (inc. life skills): Topical sessions lead by youth advisor with mentees.</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="101" type="checkbox" name="actions[]" value="3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="101" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">101 – one on one work with student. (i.e. counseling, discussing grades , attendance, college, social)</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="CM" type="checkbox" name="actions[]" value="4" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="CM" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">CM – Class Monitor: Assisted in monitoring a classroom due to staff shortage or assisting in maintaining classroom order.</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="HM" type="checkbox" name="actions[]" value="5" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="HM" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">HM - Hall Monitoring</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="CAFM" type="checkbox" name="actions[]" value="6" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="CAFM" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">CAFM- Cafeteria Monitoring</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="TSCI" type="checkbox" name="actions[]" value="7" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="TSCI" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">TSCI – Teacher/Student Conflict intervention: Addressed and/or resolving conflict between a teacher and a student.</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="SSCI" type="checkbox" name="actions[]" value="8" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="SSCI" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SSCI - Student/Student Conflict intervention: Addressed and/or resolving a conflict between two or more students.</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="APC" type="checkbox" name="actions[]" value="9" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="APC" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">APC – Advisor/Parent Contact: Communicated with a parent by phone or meeting to address issues or concerns with their child.</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="SA" type="checkbox" name="actions[]" value="10" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="SA" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SA – Student Advocacy: Spoke to a teacher or faculty member on behalf of a student specifically to address student progress concerns.</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="AS" type="checkbox" name="actions[]" value="11" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="AS" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">AS – Academic Support: Assisting student with schoolwork/ homework (e.g. edit English paper, help with math problems, help with research)</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="FI" type="checkbox" name="actions[]" value="12" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="FI" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">FI – Fight intervention: Assisted student with mediating a fight or potential conflict</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="GI" type="checkbox" name="actions[]" value="13" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="GI" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">GI – Gang intervention: Addressed and/or resolved a gang related conflict or potential conflict.</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="SP" type="checkbox" name="actions[]" value="14" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="SP" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SP – Student w/police contact: Assisted student with situation involving police</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="ES" type="checkbox" name="actions[]" value="15" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ES" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">ES – Escort student to class</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="MO" type="checkbox" name="actions[]" value="16" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="MO" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">MO – Mentee outing: Chaperoned mentees to an activity outside of school for enlightenment, incentive or reward</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="HV" type="checkbox" name="actions[]" value="17" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="HV" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">HV - Home Visits</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="PC" type="checkbox" name="actions[]" value="18" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="PC" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">PC - Proactive Circles: Ongoing circle discussions to improve school climate before problems occur</label>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <input id="RP" type="checkbox" name="actions[]" value="19" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="RP" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">RP - Responsive Circles: Circles that are in response to something that has happened</label>
                                </div>
                            </div>                            
                        </div>
                        @error('actions') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>                        
                        <div>
                            <label for="advisor">Youth Advisor/Team</label><br>
                            <input type="text" name="advisor" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="youth advisor/team" required>
                        </div>
                        @error('advisor') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="length">Length of Session</label><br>
                            <select name="length" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="15 minutes">15 minutes</option>
                                <option value="20 minutes">20 minutes</option>
                                <option value="25 minutes">25 minutes</option>
                                <option value="30 minutes">30 minutes</option>
                                <option value="35 minutes">35 minutes</option>
                                <option value="40 minutes">40 minutes</option>
                                <option value="45 minutes">45 minutes</option>
                                <option value="1 hr">1 hr</option>
                                <option value="1 hr 30 min">1 hr 30 min</option>
                                <option value="2 hrs">2 hrs</option>
                                <option value="2 hrs 30 min">2 hrs 30 min</option>
                                <option value="3 hrs">3 hrs</option>
                                <option value="3 hrs 30 min">3 hrs 30 min</option>
                                <option value="4 hrs">4 hrs</option>
                                <option value="5 hrs">5 hrs</option>
                            </select>
                        </div>
                        @error('length') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="participant">Participant</label><br>
                            <select name="participant" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select> 
                        </div>
                        @error('participant') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
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