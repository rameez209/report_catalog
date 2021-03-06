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
                    updated_by/Application URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="updated_by"
                    value="{{ $report->updated_by }}" />
                @error('updated_by')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-6">
                <label for="Department" class="inline-block text-lg mb-2">
                    Department (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Department"
                    value="{{ $report->Department }}" placeholder="Example: Laravel, Backend, Postgres, etc" />
                @error('Department')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

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
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" value="{{ $report->description }}"
                    rows="10" placeholder="Include tasks, requirements, salary, etc"></textarea>
                @error('description')
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
