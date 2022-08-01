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
            <div class="mb-6">
                <label for="report_name" class="inline-block text-lg mb-2">Report Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="Report Name"
                    name="report_name" value="{{ old('report_name') }}" />

                @error('report_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Drop down list for Departments --}}
            <div class="mb-6">
                <label for="Department" class="inline-block text-lg mb-2">Department</label>
                {{-- <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Department"
                    value="{{ old('Department') }}" placeholder="Ex. Admission" /> --}}
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
            </div>

            <div class="mb-6">
                <label for="key_terms" class="inline-block text-lg mb-2">Key Terms</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="key_terms"
                    value="{{ old('key_terms') }}" placeholder="Seperate by comma: Ex. Diabetes, Covid, ... " />

                @error('key_terms')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="validated_by" class="inline-block text-lg mb-2">Validated by</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="validated_by"
                    value="{{ old('validated_by') }}" placeholder="Validated by " />

                @error('validated_by')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="frequency" class="inline-block text-lg mb-2">Frequency</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="frequency"
                    placeholder="Ex. Daily" value="{{ old('frequency') }}" />
                @error('frequency')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="updated_by" class="inline-block text-lg mb-2">Updated_by</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="updated_by"
                    placeholder="Ex. Name, on 02/22/2022" value="{{ old('updated_by') }}" />
                @error('updated_by')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Screenshot --}}
            <div class="mb-6">
                <label for="screenshot" class="inline-block text-lg mb-2">
                    Screen Shot: How to run the report
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="screenshot" />
                @error('screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" value="{{ old('description') }}"
                    rows="10" placeholder="Description"></textarea>
                @error('description')
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
