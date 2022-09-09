<x-layout>
    <a href="/" class="inline-block btn btn-laravel bg-laravel text-white ml-4 mb-4 mt-10"><i
            class="fa-solid fa-arrow-left"></i>
        Back
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
                            <form class="ml-6 delete-btn-form" method="POST" action="/reports/{{ $report->id }}">
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
                        {{-- <small class="text-muted text-department text-sm"> --}}
                        <small class="text-laravel text-sm">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i> Updated by {{ $report->updated_by }}
                        </small>
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
                                <div class="text-muted text-capitalize">{{ $report->frequency }}</div>
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
                <div class="flex justify-between border-t-2 pl-6 ">
                    <div class="font-normal mt-2">
                        <x-report-Keyterm :KeytermsCsv="$report->key_terms" />
                    </div>
                    <div class="inline-flex items-baseline pt-1 pr-4 mt-2 mb-2  uppercase ">

                        <a href="/reports/{{ $report->id }}/edit">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a>

                        <form class="ml-6 delete-btn-form" method="POST" action="/reports/{{ $report->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 uppercase"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </x-card>

    {{-- ----------------------- --}}
    {{-- EDIT AND DELETE BUTTONS --}}
    {{-- ----------------------- --}}

    <x-card class="m-4 p-2 flex space-x-6 justify-between">

        {{-- --------------------- --}}
        {{-- HOW TO RUN THE REPORT --}}
        {{-- --------------------- --}}

        {{-- ALPINE-JS TO TOGGLE THE REPORT SCREENSHOT --}}
        <div class="ml-4 py-4" x-data="{ open: false }">
            <button x-on:click="open =! open" class="btn text-white bg-laravel hover:bg-sidenavcolor btn-rounded "
                type="button">How to run the report <i class="fa-solid fa-arrow-down"></i></button>

            <div x-show="open" class="mt-4">
                <div>

                    {{-- SHOW HOW TO RUN THE REPORT --}}
                    <div class="card">
                        <div class="card-body">
                            {{-- DESCRIPTIONS ON HOW TO RUN THE REPORT --}}
                            <h5 class="card-title  text-xl font-bold uppercase text-laravel mytitle title-shadow">How to
                                run report </h5>
                            <p class="card-text">
                                {{ $report->run_report_description }}
                            </p>
                            {{-- <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </p> --}}
                        </div>
                        <img class="object-contain cursor-pointer hover:shadow-2xl m-4 max-w-xs"
                            src="{{ $report->screenshot ? asset('storage/' . $report->screenshot) : asset('/images/no-image.png') }}"
                            alt="screenshot of how to run {{ $report->report_name }} report." />
                    </div>

                    {{-- SHOW DATA EXTRACT LOCATION --}}
                    <div class="card mb-3 mt-3">
                        <div class="card-body">
                            <h5 class="card-title  text-xl font-bold uppercase text-laravel mytitle title-shadow">Data
                                Extract Location</h5>
                            {{-- ADDED THE 'FILE///' TO OPEN FILES ON THE LOCAL SERVERS --}}
                            <p class="card-text">
                                <a href="{{ 'file///' . $report->data_extract_location_link }}" {{-- DISABLE THE LINK WHEN THE USER DOES NOT INPUT DATA EXTRACT LOCATION --}}
                                    class="{{ $report->data_extract_location_link ? 'underline text-department hover:text-laravel' : 'pointer-events-none' }}">
                                    {{-- DISPLAY N/A IF THE USER DOES NOT INPUT THE DATA EXTRACT LOCATION --}}
                                    {{ $report->data_extract_location_link ? $report->data_extract_location_link : 'N/A' }}</a>
                            </p>

                        </div>
                        <img class="object-contain cursor-pointer hover:shadow-2xl m-4 max-w-xs"
                            src="{{ $report->data_extract_location_screenshot ? asset('storage/' . $report->data_extract_location_screenshot) : asset('/images/no-image.png') }}"
                            alt="screenshot of how to run {{ $report->report_name }} report." />
                    </div>
                    {{-- SHOW EXAMPLE OF THE REPORT --}}
                    <div class="mt-6 mb-6 text-lg space-y-6 bg-white p-4">
                        <span class=" text-xl font-bold uppercase text-laravel mytitle title-shadow ">Example </span>
                        <img class="object-contain cursor-pointer hover:shadow-2xl m-4 max-w-xs"
                            src="{{ $report->report_example_screenshot ? asset('storage/' . $report->report_example_screenshot) : asset('/images/no-image.png') }}"
                            alt="screenshot of how to run {{ $report->report_name }} report." />
                    </div>
                </div>
            </div>
        </div>
    </x-card>
    </div>
</x-layout>
