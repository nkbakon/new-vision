@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('signs.index') }}" title="back" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150" ><i class="fa-solid fa-arrow-left-long"></i></a><br><br>
                <h5 class="font-bold text-center text-gray-900 text-xl">Student Sign-n Sheet</h5><br>                 
                <form action="{{ route('signs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div>
                            <label for="date">Date</label><br>
                            <input type="date" name="date" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="date" required>
                        </div>
                        @error('date') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                        <br>
                        <div>
                            @php 
                                $students = App\Models\Student::all();
                            @endphp
                            <div id="records-container" class="">
                                <div class="record"> 
                                    <div>                                
                                        <label for="student_ids">Select Student</label><br>
                                        <select name="student_ids[]" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                            <option value="" selected disabled>Select student from here</option>
                                            @foreach($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->student_email }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    @error('student_ids') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                                    <br>
                                    <div>
                                        <label for="participants">Participant Yes/No</label><br>
                                        <select name="participants[]" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                            <option value="" selected disabled>Select from here</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select> 
                                    </div>
                                    @error('participants') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
                                    <br>                             
                                </div>
                            </div>
                            <div>
                                <button type="button" onclick="addRecord()" class="inline-flex items-center px-4 py-2 mb-4 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">
                                    Add More
                                </button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script>
    function addRecord() {
        // Clone the first record and append it to the container
        var firstRecord = document.querySelector('.record');
        var newRecord = firstRecord.cloneNode(true);
        
        // Reset the values of the cloned inputs
        var inputs = newRecord.querySelectorAll('input');
        inputs.forEach(input => input.value = '');

        // Add delete button to the cloned record only
        var deleteButton = document.createElement('button');
        deleteButton.setAttribute('type', 'button');
        deleteButton.className = 'mt-2 mb-4 inline-flex px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 delete-button';
        deleteButton.innerHTML = '<img src="{{ asset('assets/xmark.svg') }}" alt="xmark Icon" class="w-2 h-2">';
        deleteButton.onclick = function() { removeRecord(deleteButton) };
        newRecord.insertBefore(deleteButton, newRecord.firstChild);

        document.getElementById('records-container').appendChild(newRecord);
    }

    function removeRecord(button) {
        // Remove the parent .record div
        var record = button.parentNode;
        document.getElementById('records-container').removeChild(record);
    }
</script>
@endpush