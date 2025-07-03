@extends('layouts.app')
@section('bodycontent')

@if (session('status'))
    <div class="text-black m-2 p-4 bg-green-200">
        {{ session('status') }}
    </div>
@endif
@if (session('success'))
    <div class="text-black m-2 p-4 bg-yellow-200">
        {{ session('success') }}
    </div>
@endif
@if (session('delete'))
    <div class="text-black m-2 p-4 bg-red-200">
        {{ session('delete') }}
    </div>
@endif

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('consents.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <br>
                <h1 class="text-center text-xl">Parental Consent/ Acknowledgement Form</h1>
                <hr style="height:2px; background-color:#333; border:none;"><br>
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
                        In the event that my child is the victim of a major accident, injury or illness while on outings or visiting the CCCI facility and I am unable to be reached, I authorize the Program Director or staff designee to take necessary actions to provide appropriate emergency medical care.  I agree to hold CCCI, its staff and affiliates harmless for any injuries or illnesses that my child may incur during or as a result of his/her participation in CCCI programs.  In the event of such emergencies every effort should be made first to reach me at this telephone number: <u>{{ $consent->telephone }}</u>   
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
                    <span><span class="font-semibold">Student's Name:</span>@if(isset($consent->student)){{ $consent->student->name }}@endif</span>
                    <span><span class="font-semibold">Date:</span>{{ $consent->created_at->format('Y-m-d') }}</span>
                </div>

                <span class="font-semibold">Signature of Student</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $consent->student->student_signature }}">
                <br><br>

                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Date of Birth:</span>{{ $consent->student->dob }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Cell Phone Number:</span>{{ $consent->student->cell_phone }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">E-mail Address:</span>{{ $consent->student->student_email }}</span>
                </div>
                <span class="font-semibold">Signature of Parent/Legal Guardian</span><br>
                <img class="h-24 w-28" src="{{ asset('storage') }}/{{ $consent->student->parent_signature }}">
                <br><br>                
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Relationship to Student:</span>{{ $consent->student->relationship_to_student }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Cell Phone Number:</span>{{ $consent->student->parents_cell_phone }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">E-mail Address:</span>{{ $consent->student->guardian_email }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Home Address:</span>{{ $consent->student->address }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Family Doctor or Specialist:</span>{{ $consent->doctor }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Phone Number:</span>{{ $consent->phone }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Insurance Company:</span>{{ $consent->insurance }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Hospital Preference:</span>{{ $consent->hospital }}</span>
                </div> 
                <div class="flex justify-between mb-2">
                    <span><span class="font-semibold">Allergies:</span>{{ $consent->allergies }}</span>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection