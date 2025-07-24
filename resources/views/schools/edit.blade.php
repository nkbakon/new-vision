@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('schools.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Edit School</h5><br>                 
                <form action="{{ route('schools.update', $school) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="">
                        <div>
                            <label for="name">School Name</label><br>
                            <input type="text" name="name" value="{{ $school->name }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="school name" required>
                        </div>
                        @error('name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            <label for="state">State</label><br>
                            <select name="state" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="" selected disabled>Select from here</option>
                                <option value="Alabama" @if($school->state == 'Alabama') selected @endif>Alabama</option>
                                <option value="Alaska" @if($school->state == 'Alaska') selected @endif>Alaska</option>
                                <option value="Arizona" @if($school->state == 'Arizona') selected @endif>Arizona</option>
                                <option value="Arkansas" @if($school->state == 'Arkansas') selected @endif>Arkansas</option>
                                <option value="California" @if($school->state == 'California') selected @endif>California</option>
                                <option value="Colorado" @if($school->state == 'Colorado') selected @endif>Colorado</option>
                                <option value="Connecticut" @if($school->state == 'Connecticut') selected @endif>Connecticut</option>
                                <option value="Delaware" @if($school->state == 'Delaware') selected @endif>Delaware</option>
                                <option value="Florida" @if($school->state == 'Florida') selected @endif>Florida</option>
                                <option value="Georgia" @if($school->state == 'Georgia') selected @endif>Georgia</option>
                                <option value="Hawaii" @if($school->state == 'Hawaii') selected @endif>Hawaii</option>
                                <option value="Idaho" @if($school->state == 'Idaho') selected @endif>Idaho</option>
                                <option value="Illinois" @if($school->state == 'Illinois') selected @endif>Illinois</option>
                                <option value="Indiana" @if($school->state == 'Indiana') selected @endif>Indiana</option>
                                <option value="Iowa" @if($school->state == 'Iowa') selected @endif>Iowa</option>
                                <option value="Kansas" @if($school->state == 'Kansas') selected @endif>Kansas</option>
                                <option value="Kentucky" @if($school->state == 'Kentucky') selected @endif>Kentucky</option>
                                <option value="Louisiana" @if($school->state == 'Louisiana') selected @endif>Louisiana</option>
                                <option value="Maine" @if($school->state == 'Maine') selected @endif>Maine</option>
                                <option value="Maryland" @if($school->state == 'Maryland') selected @endif>Maryland</option>
                                <option value="Massachusetts" @if($school->state == 'Massachusetts') selected @endif>Massachusetts</option>
                                <option value="Michigan" @if($school->state == 'Michigan') selected @endif>Michigan</option>
                                <option value="Minnesota" @if($school->state == 'Minnesota') selected @endif>Minnesota</option>
                                <option value="Mississippi" @if($school->state == 'Mississippi') selected @endif>Mississippi</option>
                                <option value="Missouri" @if($school->state == 'Missouri') selected @endif>Missouri</option>
                                <option value="Montana" @if($school->state == 'Montana') selected @endif>Montana</option>
                                <option value="Nebraska" @if($school->state == 'Nebraska') selected @endif>Nebraska</option>
                                <option value="Nevada" @if($school->state == 'Nevada') selected @endif>Nevada</option>
                                <option value="New Hampshire" @if($school->state == 'New Hampshire') selected @endif>New Hampshire</option>
                                <option value="New Jersey" @if($school->state == 'New Jersey') selected @endif>New Jersey</option>
                                <option value="New Mexico" @if($school->state == 'New Mexico') selected @endif>New Mexico</option>
                                <option value="New York" @if($school->state == 'New York') selected @endif>New York</option>
                                <option value="North Carolina" @if($school->state == 'North Carolina') selected @endif>North Carolina</option>
                                <option value="North Dakota" @if($school->state == 'North Dakota') selected @endif>North Dakota</option>
                                <option value="Ohio" @if($school->state == 'Ohio') selected @endif>Ohio</option>
                                <option value="Oklahoma" @if($school->state == 'Oklahoma') selected @endif>Oklahoma</option>
                                <option value="Oregon" @if($school->state == 'Oregon') selected @endif>Oregon</option>
                                <option value="Pennsylvania" @if($school->state == 'Pennsylvania') selected @endif>Pennsylvania</option>
                                <option value="Rhode Island" @if($school->state == 'Rhode Island') selected @endif>Rhode Island</option>
                                <option value="South Carolina" @if($school->state == 'South Carolina') selected @endif>South Carolina</option>
                                <option value="South Dakota" @if($school->state == 'South Dakota') selected @endif>South Dakota</option>
                                <option value="Tennessee" @if($school->state == 'Tennessee') selected @endif>Tennessee</option>
                                <option value="Texas" @if($school->state == 'Texas') selected @endif>Texas</option>
                                <option value="Utah" @if($school->state == 'Utah') selected @endif>Utah</option>
                                <option value="Vermont" @if($school->state == 'Vermont') selected @endif>Vermont</option>
                                <option value="Virginia" @if($school->state == 'Virginia') selected @endif>Virginia</option>
                                <option value="Washington" @if($school->state == 'Washington') selected @endif>Washington</option>
                                <option value="West Virginia" @if($school->state == 'West Virginia') selected @endif>West Virginia</option>
                                <option value="Wisconsin" @if($school->state == 'Wisconsin') selected @endif>Wisconsin</option>
                                <option value="Wyoming" @if($school->state == 'Wyoming') selected @endif>Wyoming</option>
                            </select>
                        </div>
                        @error('state') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
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