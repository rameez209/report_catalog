<x-layout>
    <x-card class="rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Report
            </h2>
            <p class="mb-4">Edit: {{ $report->report_name }}</p>
        </header>

        <form method="POST" action="/reports/{{ $report->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="report_name" class="inline-block text-lg mb-2">Report Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="report_name"
                    value="{{ $report->report_name }}" />

                @error('report_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Department" class="inline-block text-lg mb-2">Requested By</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Department"
                    value="{{ $report->Department }}" placeholder="Example: Admission" />

                @error('Department')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Drop down list for Departments --}}
            {{-- <div class="mb-6">
                <label for="Department" class="inline-block text-lg mb-2">Department</label>
                @php
                    $dpts = DB::table('departments')
                        ->select('departments')
                        ->orderBy('departments', 'asc')
                        ->distinct()
                        ->get();
                @endphp

                <select name="Department" class="border border-gray-200 rounded p-2 w-full">
                    <option selected disabled>Select a department</option>
                    @foreach ($dpts as $dpt)
                        <option value="{{ $dpt->departments }}">{{ $dpt->departments }}</option>
                    @endforeach
                </select>

                @error('Department')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-6">
                <label for="key_terms" class="inline-block text-lg mb-2">Key Terms</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="key_terms" 
                    value="{{ $report->key_terms }}"
                    placeholder="Seperate by comma: Ex. Diabetes, ... " />

                    @error('key_terms')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="validated_by" class="inline-block text-lg mb-2">Validated By</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="validated_by"
                    value="{{ $report->validated_by }}" placeholder="Example: Remote, Boston MA, etc" />

                @error('validated_by')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="frequency" class="inline-block text-lg mb-2">Frequency</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="frequency"
                    value="{{ $report->frequency }}" placeholder="Example: Remote, Boston MA, etc" />

                @error('frequency')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-6">
                <label for="frequency" class="inline-block text-lg mb-2">Frequency</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="frequency"
                    value="{{ $report->frequency }}" />
                @error('frequency')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-6">
                <label for="updated_by" class="inline-block text-lg mb-2">
                    Updated by
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="updated_by"
                    value="{{ $report->updated_by }}" />
                @error('updated_by')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="screenshot" class="inline-block text-lg mb-2">
                    Screenshot: How to run report
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="screenshot" />

                <img class="w-48 mr-6 mb-6"
                    src="{{ $report->screenshot ? asset('storage/' . $report->screenshot) : asset('/images/no-image.png') }}"
                    alt="" />

                @error('screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full text-black-50" name="description"
                    rows="10" placeholder="Description"> {{$report->description}} </textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>




            {{-- FOR THE BORDER --}}
            <div class="border border-gray-200 w-full mb-6"></div>
            
            {{-- ----------------------- --}}
            {{--   OPTIONAL FIELDS       --}}
            {{--   HOW TO RUN THE REPORT --}}
            {{-- ----------------------- --}}
            
            <div class="mb-6">
                <label for="run_report_description" class="inline-block text-lg mb-2">
                    How to run the report description (Optional)
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="run_report_description" 
                    rows="10" placeholder="ex. report location, and how to run it">{{ old('run_report_description') }}</textarea>
                @error('run_report_description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

             {{-- SCREENSHOT HOW-TO  --}}
             <div class="mb-6">
                <label for="screenshot" class="inline-block text-lg mb-2">
                    Screen Shot: How to run the report (Optional)
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="screenshot" />
                @error('screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- DATA EXTRACT LOCATION --}}
            <div class="mb-6">
                <label for="data_extract_location_link" class="inline-block text-lg mb-2">Data Extract Location Link (Optional) </label>

                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="data_extract_location_link"
                    placeholder="copy and paste url (Ex. //sjgh-fs19-02/acct2$/DECISION SUPPORT/DA2 Cerner Extracts)" value="{{ old('data_extract_location_link') }}" />

                @error('data_extract_location_link')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- DATA EXTRACT LOCATION SCREENSHOT --}}
            <div class="mb-6">
                <label for="data_extract_location_screenshot" class="inline-block text-lg mb-2">
                    Data Extract Location Screen Shot (Optional)
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="data_extract_location_screenshot" />
                @error('data_extract_location_screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- REPORT EXAMPLE SCREENSHOT --}}
            <div class="mb-6">
                <label for="report_example_screenshot" class="inline-block text-lg mb-2">
                   Report Example screen shot (Optional)
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="report_example_screenshot" />
                @error('report_example_screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            
            


            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Report
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
