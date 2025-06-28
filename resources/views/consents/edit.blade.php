@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('consents.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Parental Consent/ Acknowledgement Form</h5><br>                 
                <form action="{{ route('consents.update', $consent) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="">
                        <div class="flex justify-between mb-2">
                            <span><span class="font-semibold">PURPOSE OF THIS AGREEMENT: </span>I am providing personal information regarding my child for participation in the Operation Great Expectations (OGE) Summer Teen Program with  Corporate Community Connections, Inc. (CCCI).</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span><span class="font-semibold">PURPOSE OF DATA SHARING: </span>I voluntarily agree to allow CCCI to collect and share personal information about my child and I with funders and other organizations as CCCI deems appropriate for the intention of evaluating services and recommending program improvements.</span>
                        </div> 
                        <div class="flex justify-between mb-2">
                            <span><span class="font-semibold">VOLUNTARY PARTICIPATION: </span>I understand that I may opt out of having my child’s information shared at any time.  I may also specify information about my child that I do not want to be recorded.</span>
                        </div> 
                        <div class="flex justify-between mb-2">
                            <span><span class="font-semibold">CONSENT FOR MEDICAL TREATMENT</span><br>
                                In the event that my child is the victim of a major accident, injury or illness while on outings or visiting the CCCI facility and I am unable to be reached, I authorize the Program Director or staff designee to take necessary actions to provide appropriate emergency medical care.  I agree to hold CCCI, its staff and affiliates harmless for any injuries or illnesses that my child may incur during or as a result of his/her participation in CCCI programs.  In the event of such emergencies every effort should be made first to reach me at this telephone number:
                                <input type="text" name="telephone" value="{{ $consent->telephone }}" class="mt-2 block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="telephone" required>    
                            </span>
                        </div> 
                        <br>
                        <div class="flex justify-between mb-2">
                            <span>
                                <span class="font-semibold">CONSENT FOR PARTICIPATION IN ACTIVITIES</span><br>
                                I give my consent for my child to participate in supervised sports, educational, social and recreational activities.  I give the CCCI staff  permission to transport my child to and from activities whenever transportation is available.  I agree to not hold CCCI responsible for any unanticipated risks that could result in injury to my child to property or to third parties.  I give my consent to CCCI to take photographs and digital recordings of my child during his/her participation in activities to be used exclusively for the purpose of marketing for the organization.  In addition, I give consent that my child’s identity may be revealed therein or by descriptive text or commentary.
                            </span>
                        </div> 
                        <div class="flex justify-between mb-2">
                            <span>
                                <span class="font-semibold">CONSENT/WAIVER OF RESPONSIBILITY FOR PERSONAL PROPERTY</span><br>
                                I give consent for my child to possess certain items of personal property.  I understand that CCCI is not responsible for the loss, theft or damage of personal property or money.  I acknowledge that if anyone is hurt or property is damaged during my child’s participation in any activity supervised by CCCI staff, I will have no right to make a claim or file a lawsuit against CCCI or their employees and any other person acting in any capacity on their behalf.
                            </span>
                        </div>
                        <br> 
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold">Please complete the following information below as it pertains to your child/student:</span>
                        </div> 
                        <div>
                            <div>
                                @php 
                                    $students = App\Models\Student::all();
                                @endphp
                                <label for="student_id">Select Student</label><br>
                                <select name="student_id" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" selected disabled>Select student from here</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}" @if($consent->student_id == $student->id) selected @endif>{{ $student->name }} - {{ $student->student_email }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('student_id') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                            <br>                                               
                        </div>
                        <div>
                            <label for="doctor">Family Doctor or Specialist</label><br>
                            <input type="text" name="doctor" value="{{ $consent->doctor }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="family doctor or specialist" required>
                        </div>
                        @error('doctor') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="phone">Phone Number</label><br>
                            <input type="text" name="phone" value="{{ $consent->phone }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="phone number" required>
                        </div>
                        @error('phone') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="insurance">Insurance Company</label><br>
                            <input type="text" name="insurance" value="{{ $consent->insurance }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="insurance company" required>
                        </div>
                        @error('insurance') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="hospital">Hospital Preference</label><br>
                            <input type="text" name="hospital" value="{{ $consent->hospital }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="hospital preference" required>
                        </div>
                        @error('hospital') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="allergies">Allergies</label><br>
                            <input type="text" name="allergies" value="{{ $consent->allergies }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="allergies" required>
                        </div>
                        @error('allergies') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
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
@endpush