@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('mediations.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Mediation Form</h5><br>                 
                <form action="{{ route('mediations.update', $mediation) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
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
                                    <option value="{{ $student->id }}" @if($mediation->student_id1 == $student->id) selected @endif>{{ $student->name }} - {{ $student->student_email }}</option>
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
                                    <option value="{{ $student->id }}" @if($mediation->student_id2 == $student->id) selected @endif>{{ $student->name }} - {{ $student->student_email }}</option>
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
                                    <option value="{{ $student->id }}" @if($mediation->student_id3 == $student->id) selected @endif>{{ $student->name }} - {{ $student->student_email }}</option>
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
                                    <option value="{{ $student->id }}" @if($mediation->student_id4 == $student->id) selected @endif>{{ $student->name }} - {{ $student->student_email }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('student_id4') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>                                               
                        </div>
                        <div>
                            <label for="referred_by">Referred By</label><br>
                            <input type="text" name="referred_by" value="{{ $mediation->referred_by }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="referred by" required>
                        </div>
                        @error('referred_by') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="date">Date of Incident</label><br>
                            <input type="date" name="date" value="{{ $mediation->date }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="date" required>
                        </div>
                        @error('date') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="incident">Incident Details</label><br>
                            <textarea name="incident" id="incident" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="incident details" required>{{ $mediation->incident }}</textarea>
                        </div>
                        @error('incident') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>  
                        <div>
                            <label for="outcomes" class="mb-4">Outcome:</label><br>
                            @php 
                                $outcomes = json_decode($mediation->outcomes);
                            @endphp
                            <div class="flex flex-wrap">
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Resolved" type="checkbox" name="outcomes[]" value="Issue Resolved" {{ in_array('Issue Resolved', $outcomes ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Resolved" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Issue Resolved</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Suspension" type="checkbox" name="outcomes[]" value="Suspension Recommended" {{ in_array('Suspension Recommended', $outcomes ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Suspension" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Suspension Recommended</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Parent" type="checkbox" name="outcomes[]" value="Parent(s) Contacted" {{ in_array('Parent(s) Contacted', $outcomes ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Parent" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Parent(s) Contacted</label>
                                </div>
                            </div>
                            <div>
                                <textarea name="outcome_explain" id="outcome_explain" class="disabled:opacity-50 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="outcome">{{ $mediation->outcome_explain }}</textarea>
                            </div>
                            <br>
                        </div>
                        <div>
                            <label for="referral">Referral(s)</label><br>
                            <textarea name="referral" id="referral" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="referral(s)" required>{{ $mediation->referral }}</textarea>
                        </div>
                        @error('referral') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        
                        @if($mediation->s_signature1 != null)
                        <div class="exists_signature1">
                            <label>Student #1 Signature</label><br>
                            <div class="flex overflow-x-auto space-x-2">                              
                                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->s_signature1 }}">
                            </div><br>
                            <div>
                                <button type="button" id="removes_signature1" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                    Remove
                                </button>
                            </div>
                        </div>
                        <div class="adds_signature1 hidden">
                            <div>
                                <label for="update_s_signature1">Student #1 Signature</label><br>
                                <input type="file" name="update_s_signature1" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('update_s_signature1') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        </div>
                        @else
                        <div>
                            <label for="update_s_signature1">Student #1 Signature</label><br>
                            <input type="file" name="update_s_signature1" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('update_s_signature1') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        @endif
                        <input type="hidden" name="s_signature1_remove" id="s_signature1_remove" value="">
                        <br>

                        @if($mediation->s_signature2 != null)
                        <div class="exists_signature2">
                            <label>Student #2 Signature</label><br>
                            <div class="flex overflow-x-auto space-x-2">                              
                                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->s_signature2 }}">
                            </div><br>
                            <div>
                                <button type="button" id="removes_signature2" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                    Remove
                                </button>
                            </div>
                        </div>
                        <div class="adds_signature2 hidden">
                            <div>
                                <label for="update_s_signature2">Student #2 Signature</label><br>
                                <input type="file" name="update_s_signature2" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('update_s_signature2') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        </div>
                        @else
                        <div>
                            <label for="update_s_signature2">Student #2 Signature</label><br>
                            <input type="file" name="update_s_signature2" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('update_s_signature2') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        @endif
                        <input type="hidden" name="s_signature2_remove" id="s_signature2_remove" value="">
                        <br>

                        @if($mediation->s_signature3 != null)
                        <div class="exists_signature3">
                            <label>Student #3 Signature</label><br>
                            <div class="flex overflow-x-auto space-x-2">                              
                                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->s_signature3 }}">
                            </div><br>
                            <div>
                                <button type="button" id="removes_signature3" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                    Remove
                                </button>
                            </div>
                        </div>
                        <div class="adds_signature3 hidden">
                            <div>
                                <label for="update_s_signature3">Student #3 Signature</label><br>
                                <input type="file" name="update_s_signature3" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('update_s_signature3') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        </div>
                        @else
                        <div>
                            <label for="update_s_signature3">Student #3 Signature</label><br>
                            <input type="file" name="update_s_signature3" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('update_s_signature3') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        @endif
                        <input type="hidden" name="s_signature3_remove" id="s_signature3_remove" value="">
                        <br>

                        @if($mediation->s_signature4 != null)
                        <div class="exists_signature4">
                            <label>Student #4 Signature</label><br>
                            <div class="flex overflow-x-auto space-x-2">                              
                                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->s_signature4 }}">
                            </div><br>
                            <div>
                                <button type="button" id="removes_signature4" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                    Remove
                                </button>
                            </div>
                        </div>
                        <div class="adds_signature4 hidden">
                            <div>
                                <label for="update_s_signature4">Student #4 Signature</label><br>
                                <input type="file" name="update_s_signature4" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('update_s_signature4') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        </div>
                        @else
                        <div>
                            <label for="update_s_signature4">Student #4 Signature</label><br>
                            <input type="file" name="update_s_signature4" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('update_s_signature4') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        @endif
                        <input type="hidden" name="s_signature4_remove" id="s_signature4_remove" value="">
                        <br>

                        @if($mediation->staff_signature1 != null)
                        <div class="existstaff_signature1">
                            <label>NVYS Staff Signature #1</label><br>
                            <div class="flex overflow-x-auto space-x-2">                              
                                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->staff_signature1 }}">
                            </div><br>
                            <div>
                                <button type="button" id="removestaff_signature1" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                    Remove
                                </button>
                            </div>
                        </div>
                        <div class="addstaff_signature1 hidden">
                            <div>
                                <label for="update_staff_signature1">NVYS Staff Signature #1</label><br>
                                <input type="file" name="update_staff_signature1" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('update_staff_signature1') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        </div>
                        @else
                        <div>
                            <label for="update_staff_signature1">NVYS Staff Signature #1</label><br>
                            <input type="file" name="update_staff_signature1" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('update_staff_signature1') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        @endif
                        <input type="hidden" name="staff_signature1_remove" id="staff_signature1_remove" value="">
                        <br>

                        @if($mediation->staff_signature2 != null)
                        <div class="existstaff_signature2">
                            <label>NVYS Staff Signature #2</label><br>
                            <div class="flex overflow-x-auto space-x-2">                              
                                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $mediation->staff_signature2 }}">
                            </div><br>
                            <div>
                                <button type="button" id="removestaff_signature2" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                    Remove
                                </button>
                            </div>
                        </div>
                        <div class="addstaff_signature2 hidden">
                            <div>
                                <label for="update_staff_signature2">NVYS Staff Signature #2</label><br>
                                <input type="file" name="update_staff_signature2" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('update_staff_signature2') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        </div>
                        @else
                        <div>
                            <label for="update_staff_signature2">NVYS Staff Signature #2</label><br>
                            <input type="file" name="update_staff_signature2" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('update_staff_signature2') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        @endif
                        <input type="hidden" name="staff_signature2_remove" id="staff_signature2_remove" value="">
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
<script>
    $('#removes_signature1').on('click', function()
    {
        $('.exists_signature1').hide();
        $('.adds_signature1').show();
        $('#s_signature1_remove').val(1);
    });

    $('#removes_signature2').on('click', function()
    {
        $('.exists_signature2').hide();
        $('.adds_signature2').show();
        $('#s_signature2_remove').val(1);
    });

    $('#removes_signature3').on('click', function()
    {
        $('.exists_signature3').hide();
        $('.adds_signature3').show();
        $('#s_signature3_remove').val(1);
    });

    $('#removes_signature4').on('click', function()
    {
        $('.exists_signature4').hide();
        $('.adds_signature4').show();
        $('#s_signature4_remove').val(1);
    });

    $('#removestaff_signature1').on('click', function()
    {
        $('.existstaff_signature1').hide();
        $('.addstaff_signature1').show();
        $('#staff_signature1_remove').val(1);
    });

    $('#removestaff_signature2').on('click', function()
    {
        $('.existstaff_signature2').hide();
        $('.addstaff_signature2').show();
        $('#staff_signature2_remove').val(1);
    });
</script>
@endpush