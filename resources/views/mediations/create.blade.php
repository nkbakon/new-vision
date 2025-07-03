@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('mediations.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Mediation Form</h5><br>                 
                <form action="{{ route('mediations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        @php 
                            $students = App\Models\Student::all();
                        @endphp
                        <div>
                            <div>                                
                                <label for="student_id1">Select Student #1</label><br>
                                <select name="student_id1" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select student from here</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->student_email }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('student_id1') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>    
                            <div>                                
                                <label for="student_id2">Select Student #2</label><br>
                                <select name="student_id2" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option value="" selected disabled>Select student from here</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->student_email }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('student_id2') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>    
                            <div>                                
                                <label for="student_id3">Select Student #3</label><br>
                                <select name="student_id3" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option value="" selected disabled>Select student from here</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->student_email }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('student_id3') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>    
                            <div>                                
                                <label for="student_id4">Select Student #4</label><br>
                                <select name="student_id4" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option value="" selected disabled>Select student from here</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->student_email }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('student_id4') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>                                               
                        </div>
                        <div>
                            <label for="referred_by">Referred By</label><br>
                            <input type="text" name="referred_by" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="referred by" required>
                        </div>
                        @error('referred_by') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="date">Date of Incident</label><br>
                            <input type="date" name="date" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="date" required>
                        </div>
                        @error('date') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="incident">Incident Details</label><br>
                            <textarea name="incident" id="incident" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="incident details" required></textarea>
                        </div>
                        @error('incident') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>  
                        <div>
                            <label for="outcomes" class="mb-4">Outcome:</label><br>
                            <div class="flex flex-wrap">
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Resolved" type="checkbox" name="outcomes[]" value="Issue Resolved" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Resolved" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Issue Resolved</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Suspension" type="checkbox" name="outcomes[]" value="Suspension Recommended" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Suspension" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Suspension Recommended</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Parent" type="checkbox" name="outcomes[]" value="Parent(s) Contacted" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Parent" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Parent(s) Contacted</label>
                                </div>
                            </div>
                            <div>
                                <textarea name="outcome_explain" id="outcome_explain" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="outcome"></textarea>
                            </div>
                            <br>
                        </div>
                        <div>
                            <label for="referral">Referral(s)</label><br>
                            <textarea name="referral" id="referral" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="referral(s)" required></textarea>
                        </div>
                        @error('referral') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br> 
                        <div>
                            <label for="s_signature1">Student #1 Signature</label><br>
                            <input type="file" name="s_signature1" accept=".png, .jpg, .jpeg, .pdf"  class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="signature">
                        </div>
                        @error('s_signature1') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="s_signature2">Student #2 Signature</label><br>
                            <input type="file" name="s_signature2" accept=".png, .jpg, .jpeg, .pdf"  class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="signature">
                        </div>
                        @error('s_signature2') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="s_signature3">Student #3 Signature</label><br>
                            <input type="file" name="s_signature3" accept=".png, .jpg, .jpeg, .pdf"  class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="signature">
                        </div>
                        @error('s_signature3') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="s_signature4">Student #4 Signature</label><br>
                            <input type="file" name="s_signature4" accept=".png, .jpg, .jpeg, .pdf"  class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="signature">
                        </div>
                        @error('s_signature4') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br> 
                        <div>
                            <label for="staff_signature1">NVYS Staff Signature #1</label><br>
                            <input type="file" name="staff_signature1" accept=".png, .jpg, .jpeg, .pdf"  class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="signature">
                        </div>
                        @error('staff_signature1') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>  
                        <div>
                            <label for="staff_signature2">NVYS Staff Signature #2</label><br>
                            <input type="file" name="staff_signature2" accept=".png, .jpg, .jpeg, .pdf"  class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="signature">
                        </div>
                        @error('staff_signature2') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
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