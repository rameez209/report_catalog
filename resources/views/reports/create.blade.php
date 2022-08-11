<x-layout>

    <x-card class="rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Post a Report
            </h2>
            <p class="mb-4">Add Report</p>
        </header>

        <form method="POST" action="/reports" enctype="multipart/form-data">
            @csrf
            {{-- REPORT NAME --}}
            <div class="mb-6">
                <label for="report_name" class="inline-block text-lg mb-2">Report Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="Report Name"
                    name="report_name" value="{{ old('report_name') }}" />

                @error('report_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- DROP DOWN LIST FOR DEPARTMENTS --}}
            <div class="mb-6">
                <label for="Department" class="inline-block text-lg mb-2">Department</label>
                @php
                    $dpts = DB::table('departments')
                        ->select('departments')
                        ->orderBy('departments', 'asc')
                        ->distinct()
                        ->get();
                @endphp

                <select name="Department" multiple class="border border-gray-200 rounded p-2 w-full">
                    <option selected disabled>Select a department</option>
                    @foreach ($dpts as $dpt)
                        <option value="{{ $dpt->departments }}">{{ $dpt->departments }}</option>
                    @endforeach
                </select>

                @error('Department')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- KEY TERMS --}}
            <div class="mb-6">
                <label for="key_terms" class="inline-block text-lg mb-2">Key Terms (Optional)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="key_terms"
                    value="{{ old('key_terms') }}" placeholder="Seperate by comma: Ex. Diabetes, Covid, ... " />

                @error('key_terms')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- VALIDATED BY --}}
            <div class="mb-6">
                <label for="validated_by" class="inline-block text-lg mb-2">Validated by</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="validated_by"
                    value="{{ old('validated_by') }}" placeholder="Validated by " />

                @error('validated_by')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- FREQUENCY --}}
            <div class="mb-6">
                <label for="frequency" class="inline-block text-lg mb-2">Frequency</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="frequency"
                    placeholder="Ex. Daily" value="{{ old('frequency') }}" />
                @error('frequency')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- UPDATED BY --}}
            <div class="mb-6">
                <label for="updated_by" class="inline-block text-lg mb-2">Updated_by</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="updated_by"
                    placeholder="Ex. Name, on 02/22/2022" value="{{ old('updated_by') }}" />
                @error('updated_by')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
           
            {{-- REPORT DESCRIPTION --}}
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Report Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" 
                    rows="10" placeholder="Report Description">{{ old('description') }}</textarea>
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
                    Add Report
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
