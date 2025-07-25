@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('developments.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Individual Development Plan</h5><br>                 
                <form action="{{ route('developments.update', $development) }}" method="POST" enctype="multipart/form-data">
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
                                    <option value="{{ $student->id }}" @if($development->student_id == $student->id) selected @endif>{{ $student->name }} - {{ $student->student_email }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('student_id') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>                                               
                        </div>
                        <div>
                            <label for="enrollment_date">Enrollment Date</label><br>
                            <input type="date" name="enrollment_date" value="{{ $development->enrollment_date }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="enrollment_date" required>
                        </div>
                        @error('enrollment_date') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="referred_by">Referred By</label><br>
                            <select name="referred_by" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="Baltimore City Police Dept" @if($development->referred_by == 'Baltimore City Police Dept') selected @endif>Baltimore City Police Dept</option>
                                <option value="Baltimore City Public Schools" @if($development->referred_by == 'Baltimore City Public Schools') selected @endif>Baltimore City Public Schools</option>
                                <option value="Community Organization" @if($development->referred_by == 'Community Organization') selected @endif>Community Organization</option>
                                <option value="Dept of Juvenile Services" @if($development->referred_by == 'Dept of Juvenile Services') selected @endif>Dept of Juvenile Services</option>
                                <option value="Dept of Social Services" @if($development->referred_by == 'Dept of Social Services') selected @endif>Dept of Social Services</option>
                                <option value="Family Member" @if($development->referred_by == 'Family Member') selected @endif>Family Member</option>
                                <option value="Group Home" @if($development->referred_by == 'Group Home') selected @endif>Group Home</option>
                                <option value="Juvenile Court Early Intervention" @if($development->referred_by == 'Juvenile Court Early Intervention') selected @endif>Juvenile Court Early Intervention</option>
                                <option value="Self-Referral" @if($development->referred_by == 'Self-Referral') selected @endif>Self-Referral</option>
                                <option value="Other" @if($development->referred_by == 'Other') selected @endif>Other</option>
                            </select>
                        </div>
                        @error('referred_by') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="categories" class="mb-4">Goal Category:</label><br>
                            @php 
                                $categories = json_decode($development->categories);
                            @endphp
                            <div class="flex flex-wrap">
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Academic" type="checkbox" name="categories[]" value="Academic" {{ in_array('Academic', $categories ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Academic" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Discipline" type="checkbox" name="categories[]" value="Discipline" {{ in_array('Discipline', $categories ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Discipline" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Discipline</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Behavioral" type="checkbox" name="categories[]" value="Behavioral (includes attendance)" {{ in_array('Behavioral (includes attendance)', $categories ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Behavioral" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Behavioral (includes attendance)</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="Personal" type="checkbox" name="categories[]" value="Personal" {{ in_array('Personal', $categories ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Personal" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Personal</label>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div>
                            <label for="sessions" class="mb-4">Length of Session:</label><br>
                            @php 
                                $sessions = json_decode($development->sessions);
                            @endphp
                            <div class="flex flex-wrap">
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="5min" type="checkbox" name="sessions[]" value="5min" {{ in_array('5min', $sessions ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="5min" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">5min</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="10min" type="checkbox" name="sessions[]" value="10min" {{ in_array('10min', $sessions ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="10min" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">10min</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="15min" type="checkbox" name="sessions[]" value="15min" {{ in_array('15min', $sessions ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="15min" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">15min</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="20min" type="checkbox" name="sessions[]" value="20min" {{ in_array('20min', $sessions ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="20min" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">20min</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="25min" type="checkbox" name="sessions[]" value="25min" {{ in_array('25min', $sessions ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="25min" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">25min</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="30min" type="checkbox" name="sessions[]" value="30min" {{ in_array('30min', $sessions ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="30min" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">30min</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="40min" type="checkbox" name="sessions[]" value="40min" {{ in_array('40min', $sessions ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="40min" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">40min</label>
                                </div>
                                <div class="w-1/3 p-2 flex items-center">
                                    <input id="45min" type="checkbox" name="sessions[]" value="45min" {{ in_array('45min', $sessions ?? []) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="45min" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">45min</label>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div>
                            <label for="advisor">Mentor/Youth Advisor</label><br>
                            <input type="text" name="advisor" value="{{ $development->advisor }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="mentor/youth advisor" required>
                        </div>
                        @error('advisor') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        
                        <h5 class="font-bold text-center text-gray-900 text-xl">Goal Planning</h5><br>  
                        <div>
                            <label for="date">Date</label><br>
                            <input type="date" name="date" value="{{ $development->date }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="date" required>
                        </div>
                        @error('date') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="goal">Goal</label><br>
                            <input type="text" name="goal" value="{{ $development->goal }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="goal" required>
                        </div>
                        @error('goal') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="motivation">Motivation: (Why do you want to achieve this goal?)</label><br>
                            <textarea name="motivation" id="motivation" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="motivation" required>{{ $development->motivation }}</textarea>
                        </div>
                        @error('motivation') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br> 
                        <div>
                            <label for="action_step">Action Steps: (What actions do I need to take in order to complete this goal?)</label><br>
                            <textarea name="action_step" id="action_step" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="action steps" required>{{ $development->action_step }}</textarea>
                        </div>
                        @error('action_step') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br> 
                        <div>
                            <label for="barrier">Barriers: (What potential distractions will keep me from achieving my goal?)</label><br>
                            <textarea name="barrier" id="barrier" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="barrier" required>{{ $development->barrier }}</textarea>
                        </div>
                        @error('barrier') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="strategy">Strategies to deal with the barriers/distraction</label><br>
                            <textarea name="strategy" id="strategy" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="strategies to deal with the barriers/distraction" required>{{ $development->strategy }}</textarea>
                        </div>
                        @error('strategy') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="award">Awards</label><br>
                            <textarea name="award" id="award" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="awards">{{ $development->award }}</textarea>
                        </div>
                        @error('award') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="comment">Comments</label><br>
                            <textarea name="comment" id="comment" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="comments">{{ $development->comment }}</textarea>
                        </div>
                        @error('comment') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="was_goal">Was Goal Achieved</label><br>
                            <select name="was_goal" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="1" @if($development->was_goal === 1) selected @endif>Yes</option>
                                <option value="2" @if($development->was_goal === 2) selected @endif>No</option>
                                <option value="3" @if($development->was_goal === 3) selected @endif>In progress</option>
                            </select> 
                        </div>
                        @error('was_goal') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br> 
                        <div>
                            <label for="date_goal">Date Goal Achieved</label><br>
                            <input type="date" name="date_goal" value="{{ $development->date_goal }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="date_goal">
                        </div>
                        @error('date_goal') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        
                        @if($development->student_signature != null)
                        <div class="existstudent_signature">
                            <label>Student Signature</label><br>
                            <div class="flex overflow-x-auto space-x-2">                              
                                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $development->student_signature }}">
                            </div><br>
                            <div>
                                <button type="button" id="removestudent_signature" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                    Remove
                                </button>
                            </div>
                        </div>
                        <div class="addstudent_signature hidden">
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
                        <br>

                        @if($development->mentor_signature != null)
                        <div class="existmentor_signature">
                            <label>Mentor Signature</label><br>
                            <div class="flex overflow-x-auto space-x-2">                              
                                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $development->mentor_signature }}">
                            </div><br>
                            <div>
                                <button type="button" id="removementor_signature" title="change signature" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                    Remove
                                </button>
                            </div>
                        </div>
                        <div class="addmentor_signature hidden">
                            <div>
                                <label for="update_mentor_signature">Mentor Signature</label><br>
                                <input type="file" name="update_mentor_signature" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('update_mentor_signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        </div>
                        @else
                        <div>
                            <label for="update_mentor_signature">Mentor Signature</label><br>
                            <input type="file" name="update_mentor_signature" accept=".png, .jpg, .jpeg, .pdf" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('update_mentor_signature') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        @endif
                        <input type="hidden" name="mentor_signature_remove" id="mentor_signature_remove" value="">
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
    $('#removestudent_signature').on('click', function()
    {
        $('.existstudent_signature').hide();
        $('.addstudent_signature').show();
        $('#student_signature_remove').val(1);
    });

    $('#removementor_signature').on('click', function()
    {
        $('.existmentor_signature').hide();
        $('.addmentor_signature').show();
        $('#mentor_signature_remove').val(1);
    });
</script>
@endpush