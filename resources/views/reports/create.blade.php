<x-layout>

    <!-- Section: Design Block -->
    <section class="text-left "
        style="
            /* background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg'); */
            
            background: #FFFFFF;
            background: -webkit-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: -moz-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: linear-gradient(to top, #FFFFFF, #363C3D);
    ">
        <!-- Background image -->
        <div class="p-5 bg-image" style=" height: 300px; ">
        </div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong bg-white col lg:w-3/5 md:w-50 sm:w-fit pt-4 pb-4"
            style="
          margin-top: -250px;
          backdrop-filter: blur(30px);
          ">
            <div class="card-body px-md-5">

                <x-card class="bg-white rounded mx-auto outline outline-2 outline-offset-2">
                    <header class="text-center mb-2">
                        <h2 class="text-2xl mb-4 font-bold uppercase">
                            Add a Report
                        </h2>
                        {{-- <p class="mb-4">Add Report</p> --}}
                    </header>

                    <form method="POST" action="/reports" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="flex row gap-4 divide-x ">
                        <div class="w-1/2 col md:w-full sm-w-full p-4"> --}}
                        <div>
                            <div>
                                {{-- REPORT NAME --}}
                                <div class="mb-6">
                                    <label for="report_name" class="inline-block text-lg mb-2">Report Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        placeholder="Report Name" name="report_name" value="{{ old('report_name') }}" />

                                    @error('report_name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- DROP DOWN LIST FOR DEPARTMENTS --}}
                                <div class="mb-6">
                                    <label for="Department" class="inline-block text-lg mb-2">Department <span
                                            class="text-red-500">*</span></label>
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
                                {{-- <div class="mb-6">
                                    <label for="Department" class="inline-block text-lg mb-2">Department <span class="text-red-500">*</span></label>
                                    @php
                                        $dpts = DB::table('departments')
                                            ->select('departments')
                                            ->orderBy('departments', 'asc')
                                            ->distinct()
                                            ->get();
                    
                                    @endphp
                    
                                    <select name="Department" class="form-control selectpicker multi_select full-width"
                                        data-silent-initial-value-set="true" multiple data-live-search="true"
                                        title="Choose one of the following...">
                                        @foreach ($dpts as $dpt)
                                            <option value="{{ $dpt->departments }} {{old('dpt-departments')}}">{{ $dpt->departments }}</option>
                                        @endforeach
                                    </select>
                    
                                    @error('Department')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div> --}}


                                {{-- KEY TERMS --}}
                                <div class="mb-6">
                                    <label for="key_terms" class="inline-block text-lg mb-2">Key Terms <span
                                            class="text-[#808080]">(Optional)</span></label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="key_terms" value="{{ old('key_terms') }}"
                                        placeholder="Seperate by comma: Ex. Diabetes, Covid, ... " />

                                    @error('key_terms')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- VALIDATED BY --}}
                                <div class="mb-6">
                                    <label for="validated_by" class="inline-block text-lg mb-2">Validated by <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="validated_by" value="{{ old('validated_by') }}"
                                        placeholder="Validated by " />

                                    @error('validated_by')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- FREQUENCY --}}
                                <div class="mb-6">
                                    <label for="frequency" class="inline-block text-lg mb-2">Frequency <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="frequency" placeholder="Ex. Daily" value="{{ old('frequency') }}" />
                                    @error('frequency')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- UPDATED BY --}}
                                <div class="mb-6">
                                    <label for="updated_by" class="inline-block text-lg mb-2">Updated_by <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="updated_by" placeholder="Ex. Name, on 02/22/2022"
                                        value="{{ old('updated_by') }}" />
                                    @error('updated_by')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- REPORT DESCRIPTION --}}
                                <div class="mb-3">
                                    <label for="description" class="inline-block text-lg mb-2">
                                        Report Description <span class="text-red-500">*</span>
                                    </label>
                                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                                        placeholder="Report Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            {{-- DIVIDER LINE --}}
                            <div class="relative py-4">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-b border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center">
                                    <span class="bg-white px-4 text-sm text-gray-500">Optional</span>
                                </div>
                            </div>
                            {{-- <div class="w-1/2 col md:w-full p-4"> --}}
                            <div class="mt-3">
                                {{-- ----------------------- --}}
                                {{-- OPTIONAL FIELDS --}}
                                {{-- HOW TO RUN THE REPORT --}}
                                {{-- ----------------------- --}}

                                <div class="mb-6">
                                    <label for="run_report_description" class="inline-block text-lg mb-2">
                                        How to run the report description <span class="text-[#808080]">(Optional)</span>
                                    </label>
                                    <textarea class="border border-gray-200 rounded p-2 w-full" name="run_report_description" rows="10"
                                        placeholder="ex. report location, and how to run it">{{ old('run_report_description') }}</textarea>
                                    @error('run_report_description')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- SCREENSHOT HOW-TO --}}
                                <div class="mb-6">
                                    <label for="screenshot" class="inline-block text-lg mb-2">
                                        Screen Shot: How to run the report <span
                                            class="text-[#808080]">(Optional)</span>
                                    </label>
                                    <input type="file" class="border border-gray-200 rounded p-2 w-full"
                                        name="screenshot" />
                                    @error('screenshot')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- DATA EXTRACT LOCATION --}}
                                <div class="mb-6">
                                    <label for="data_extract_location_link" class="inline-block text-lg mb-2">Data
                                        Extract
                                        Location Path
                                        <span class="text-[#808080]">(Optional)</span> </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="data_extract_location_link"
                                        placeholder="copy and paste url (Ex. //sjgh-fs19-02/acct2$/DECISION SUPPORT/DA2 Cerner Extracts)"
                                        value="{{ old('data_extract_location_link') }}" />
                                    @error('data_extract_location_link')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- DATA EXTRACT LOCATION SCREENSHOT --}}
                                <div class="mb-6">
                                    <label for="data_extract_location_screenshot" class="inline-block text-lg mb-2">
                                        Data Extract Location Path Screenshot <span
                                            class="text-[#808080]">(Optional)</span>
                                    </label>
                                    <input type="file" class="border border-gray-200 rounded p-2 w-full"
                                        name="data_extract_location_screenshot" />
                                    @error('data_extract_location_screenshot')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- REPORT EXAMPLE SCREENSHOT --}}
                                <div class="mb-6">
                                    <label for="report_example_screenshot" class="inline-block text-lg mb-2">
                                        Example screenshot <span class="text-[#808080]">(Optional)</span>
                                    </label>
                                    <input type="file" class="border border-gray-200 rounded p-2 w-full"
                                        name="report_example_screenshot" />
                                    @error('report_example_screenshot')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- SUBMIT AND CANCEL BUTTON --}}
                        <div class="flex mb-4 gap-x-4 justify-center">
                            <a type="submit" class=" pr-4">
                                <button class="btn btn-laravel text-white bg-laravel">
                                    Add Report
                                </button></a>
                            <a href="/" class="btn btn-danger bg-danger text-white "><i
                                    class="fa-solid fa-arrow-left"></i>
                                Cancel
                            </a>
                        </div>

                    </form>
                </x-card>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->






    {{-- <x-card class="rounded max-w-2xl mx-auto mt-24">
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

            <div class="mb-6">
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
            </div>
            


            <div class="mb-6">
                <label for="key_terms" class="inline-block text-lg mb-2">Key Terms <span class="text-[#808080]">(Optional)</span></label>
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

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Report Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Report Description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="border border-gray-200 w-full mb-6"></div>

            <div class="mb-6">
                <label for="run_report_description" class="inline-block text-lg mb-2">
                    How to run the report description <span class="text-[#808080]">(Optional)</span>
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="run_report_description" rows="10"
                    placeholder="ex. report location, and how to run it">{{ old('run_report_description') }}</textarea>
                @error('run_report_description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="screenshot" class="inline-block text-lg mb-2">
                    Screen Shot: How to run the report <span class="text-[#808080]">(Optional)</span>
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="screenshot" />
                @error('screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="data_extract_location_link" class="inline-block text-lg mb-2">Data Extract Location Path
                    <span class="text-[#808080]">(Optional)</span> </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full"
                    name="data_extract_location_link"
                    placeholder="copy and paste url (Ex. //sjgh-fs19-02/acct2$/DECISION SUPPORT/DA2 Cerner Extracts)"
                    value="{{ old('data_extract_location_link') }}" />
                @error('data_extract_location_link')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="data_extract_location_screenshot" class="inline-block text-lg mb-2">
                    Data Extract Location Path Screenshot <span class="text-[#808080]">(Optional)</span>
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full"
                    name="data_extract_location_screenshot" />
                @error('data_extract_location_screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="report_example_screenshot" class="inline-block text-lg mb-2">
                    Example screenshot <span class="text-[#808080]">(Optional)</span>
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full"
                    name="report_example_screenshot" />
                @error('report_example_screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="btn btn-success">
                    Add Report
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>

            <div class="flex mb-4 gap-x-4">
                <a type="submit" class="btn btn-laravel text-white bg-laravel  pr-4">
                    Add Report </a>
                <a href="/" class="btn btn-danger bg-danger text-white "><i
                        class="fa-solid fa-arrow-left"></i>
                    Back
                </a>
            </div>

        </form>
    </x-card> --}}
</x-layout>

@push('scripts')
    <script>
        $(function() {
            $('select').selectpicker();
        });
    </script>
@endpush
