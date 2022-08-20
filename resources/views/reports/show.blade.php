<x-layout>
    <a href="/" class="inline-block btn btn-info text-white ml-4 mb-4 mt-10"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">

        <x-card class="p-10">

            <div class="card">
                <div class="card-header bg-navbarcolor">
                    <div class="flex justify-between ">
                        <div class="">
                                <x-report-department :departmentCsv="$report->Department" />
                            </div>
                            <div class="inline-flex items-baseline pt-1 pr-4 text-white uppercase ">
        
                                <a href="/reports/{{ $report->id }}/edit">
                                    <i class="fa-solid fa-pencil"></i> Edit
                                </a>
        
                                <form class="ml-6" method="POST" action="/reports/{{ $report->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 uppercase"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <h2 class="card-title text-2xl text-navbarcolor font-semibold">{{ $report->report_name }}</h2>
                    <p class="card-text">
                        <small class="text-muted text-department text-sm"><i class="fa fa-pencil-square"
                                aria-hidden="true"></i> Updated by
                            {{ $report->updated_by }}</small>
                    </p>
                    

                    <ul class="list-group list-group-light">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-bold">Report Description</div>
                                <div class="text-muted">{{ $report->description }} </div>
                            </div>
                            {{-- <span class="badge rounded-pill badge-success">Active</span> --}}
                        </li>
                        <li lass="list-group-item d-flex justify-content-between align-items-center">
                            <div>

                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-bold">Requested By</div>
                                <div class="text-muted">{{ $report->Department }} </div>
                            </div>
                            {{-- <span class="badge rounded-pill badge-primary">Onboarding</span> --}}
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-bold">Frequency</div>
                                <div class="text-muted">{{ $report->frequency }}</div>
                            </div>
                            {{-- <span class="badge rounded-pill badge-primary">Onboarding</span> --}}
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-bold">Validated By</div>
                                <div class="text-muted">{{ $report->validated_by }}</div>
                            </div>
                            {{-- <span class="badge rounded-pill badge-warning">Awaiting</span> --}}
                        </li>
                    </ul>

                    {{-- ----------------------- --}}
                    {{-- EDIT AND DELETE BUTTONS --}}
                    {{-- ----------------------- --}}
                </div>
                {{-- <hr> --}}
                <div class="flex justify-between border-t-2 pl-6">
                    <div class="">
                        <x-report-Keyterm :KeytermsCsv="$report->key_terms" />
                    </div>
                    <div class="inline-flex items-baseline pt-1 pr-4 mt-2 mb-2  uppercase ">

                        <a href="/reports/{{ $report->id }}/edit">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a>

                        <form class="ml-6" method="POST" action="/reports/{{ $report->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 uppercase"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>




            {{-- <p class="text-3xl mb-2 text-lg-center items-center justify-center font-bold">
                {{ $report->report_name }}
            </p> --}}

            <div class="flex flex-col items-left justify-left">

                {{-- <div class="text-sm mt-6 mb-6 text-department">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i> Updated by {{ $report->updated_by }}
                </div> --}}

                {{-- LINE DIVIDER --}}
                {{-- <div class="border border-gray-200 w-full mb-6"></div> --}}

                <div>
                    {{-- <span class="font-semibold">Requested By: </span> --}}
                    {{-- <x-report-department :departmentCsv="$report->Department" /> --}}

                    {{-- <div class="text-lg space-y-6 mt-6">
                        <p>
                            {{ $report->description }}
                        </p> --}}
                    {{-- <a
                            href="mailto:test@test.com"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                    > --}}
                </div>
                {{-- LINE DIVIDER --}}
                {{-- <div class="border border-gray-200 w-full mb-6"></div>

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
                    </div> --}}
            </div>

            {{-- FOR THE BORDER --}}
            <div class="border border-gray-200 w-full mb-6"></div>
    </div>
    </x-card>

    {{-- ----------------------- --}}
    {{-- EDIT AND DELETE BUTTONS --}}
    {{-- ----------------------- --}}

    {{-- <div class="inline-flex items-baseline mr-4 mt-4 uppercase justify-end">
            <a href="/reports/{{ $report->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form class="ml-6" method="POST" action="/reports/{{ $report->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500 uppercase"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </div> --}}

    <x-card class="m-4 p-2 flex space-x-6 justify-between">

        {{-- --------------------- --}}
        {{-- HOW TO RUN THE REPORT --}}
        {{-- --------------------- --}}

        {{-- ALPINE-JS TO TOGGLE THE REPORT SCREENSHOT --}}
        <div class="ml-4" x-data="{ open: false }">
            <button x-on:click="open =! open"
                {{-- class="btn btn-dark text-department hover:text-laravel background-transparent uppercase px-3 py-1 outline-none focus:outline-none rounded shadow-md mr-1 mb-1 ease-linear transition-all duration-150" --}}
                class="btn btn-info bg-info btn-rounded"
                type="button">How to run the report <i class="fa-solid fa-arrow-down"></i></button>

            <div x-show="open" class="mt-4">
                <div>
                    <div class="card">
                        <div class="card-body">
                            {{-- DESCRIPTIONS ON HOW TO RUN THE REPORT --}}
                            <h5 class="card-title font-semibold">How to run report: </h5>
                            <p class="card-text">
                                {{ $report->run_report_description }}
                            </p>
                            {{-- <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </p> --}}
                        </div>
                        <img class="object-contain max-w-2xl h-auto"
                            src="{{ $report->screenshot ? asset('storage/' . $report->screenshot) : asset('/images/no-image.png') }}"
                            alt="screenshot of how to run {{ $report->report_name }} report." />
                    </div>

                    <div class="card mb-3 mt-3">
                        <div class="card-body">
                            <h5 class="card-title font-semibold">Data Extract Location</h5>
                            {{-- ADDED THE 'FILE///' TO OPEN FILES ON THE LOCAL SERVERS --}}
                            <p class="card-text">
                                <a href="{{ 'file///' . $report->data_extract_location_link }}" {{-- DISABLE THE LINK WHEN THE USER DOES NOT INPUT DATA EXTRACT LOCATION --}}
                                    class="{{ $report->data_extract_location_link ? 'underline text-department hover:text-laravel' : 'pointer-events-none' }}">
                                    {{-- DISPLAY N/A IF THE USER DOES NOT INPUT THE DATA EXTRACT LOCATION --}}
                                    {{ $report->data_extract_location_link ? $report->data_extract_location_link : 'N/A' }}</a>
                            </p>
                            {{-- <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </p> --}}
                        </div>
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


    </x-card>
    </div>
</x-layout>
