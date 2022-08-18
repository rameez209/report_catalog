<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4 mt-10"><i class="fa-solid fa-arrow-left"></i>  Back
    </a>
    <div class="mx-4">

        <x-card class="p-10">
            <p class="text-3xl mb-2 text-lg-center items-center justify-center font-bold">
                {{ $report->report_name }}
            </p>

            <div class="flex flex-col items-left justify-left">

                <div class="text-sm mt-6 mb-6 text-department">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i> Updated by {{ $report->updated_by }}
                </div>

                {{-- LINE DIVIDER --}}
                <div class="border border-gray-200 w-full mb-6"></div>

                <div>
                    {{-- <span class="font-semibold">Requested By: </span> --}}
                    <x-report-department :departmentCsv="$report->Department" />

                    <div class="text-lg space-y-6 mt-6">
                        <p>
                            {{ $report->description }}
                        </p>
                        {{-- <a
                            href="mailto:test@test.com"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                    > --}}
                    </div>
                    {{-- LINE DIVIDER --}}
                    <div class="border border-gray-200 w-full mb-6"></div>

                    <div class="text-lg my-4">
                        <span class="font-semibold">Requested By: </span>{{ $report->department }}
                    </div>
                    <div class="text-lg my-4">
                        <span class="font-semibold">Frequency: </span>{{ $report->frequency }}
                    </div>
                    <div class="text-lg my-4">
                        <span class="font-semibold">Validated By: </span>{{ $report->validated_by }}
                    </div>
                    <div>
                        <x-report-Keyterm :KeytermsCsv="$report->key_terms" />
                    </div>
                </div>

                {{-- FOR THE BORDER --}}
                <div class="border border-gray-200 w-full mb-6"></div>
            </div>
        </x-card>

        <x-card class="mt-4 p-2 flex space-x-6 justify-between">

            {{-- --------------------- --}}
            {{-- HOW TO RUN THE REPORT --}}
            {{-- --------------------- --}}

            {{-- ALPINE-JS TO TOGGLE THE REPORT SCREENSHOT --}}
            <div class="ml-4" x-data="{ open: false }">
                <button x-on:click="open =! open"
                    class="text-department hover:text-laravel background-transparent uppercase px-3 py-1 outline-none focus:outline-none  rounded shadow-md mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button">How to run the report <i class="fa-solid fa-arrow-down"></i></button>


                <div x-show="open">
                    <div>
                        {{-- DESCRIPTIONS ON HOW TO RUN THE REPORT --}}
                        <div class="text-lg space-y-6 mt-6 bg-white p-4">
                            <span class="font-semibold">How to run report: </span>
                            <p>
                                {{ $report->run_report_description }}
                            </p>
                            <img class="object-contain max-w-2xl h-auto"
                                src="{{ $report->screenshot ? asset('storage/' . $report->screenshot) : asset('/images/no-image.png') }}"
                                alt="screenshot of how to run {{ $report->report_name }} report." />
                        </div>

                        <div class="mt-6 mb-6 text-lg space-y-6 bg-white p-4">
                            <span class="font-semibold"> Data Extract Location: </span>
                            {{-- ADDED THE 'FILE///' TO OPEN FILES ON THE LOCAL SERVERS --}}
                            <a href="{{ 'file///' . $report->data_extract_location_link }}" {{-- DISABLE THE LINK WHEN THE USER DOES NOT INPUT DATA EXTRACT LOCATION --}}
                                class="{{ $report->data_extract_location_link ? 'underline text-department hover:text-laravel' : 'pointer-events-none' }}">
                                {{-- DISPLAY N/A IF THE USER DOES NOT INPUT THE DATA EXTRACT LOCATION --}}
                                {{ $report->data_extract_location_link ? $report->data_extract_location_link : 'N/A' }}</a>

                            <img class="object-contain max-w-2xl h-auto"
                                src="{{ $report->data_extract_location_screenshot ? asset('storage/' . $report->data_extract_location_screenshot) : asset('/images/no-image.png') }}"
                                alt="screenshot of how to run {{ $report->report_name }} report." />
                        </div>

                        <div class="mt-6 mb-6 text-lg space-y-6 bg-white p-4">
                            <span class="font-semibold">Example: </span>
                            <img class="object-contain max-w-2xl h-auto"
                                src="{{ $report->report_example_screenshot ? asset('storage/' . $report->report_example_screenshot) : asset('/images/no-image.png') }}"
                                alt="screenshot of how to run {{ $report->report_name }} report." />
                        </div>
                    </div>
                </div>
            </div>

            {{-- ----------------------- --}}
            {{-- EDIT AND DELETE BUTTONS --}}
            {{-- ----------------------- --}}

            <div class="inline-flex items-baseline mr-4 uppercase">
                <a href="/reports/{{ $report->id }}/edit">
                    <i class="fa-solid fa-pencil"></i> Edit
                </a>

                <form class="ml-6" method="POST" action="/reports/{{ $report->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 uppercase"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
            </div>
        </x-card>
    </div>
</x-layout>
