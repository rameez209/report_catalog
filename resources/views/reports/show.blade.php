<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">

        <x-card class="p-10">
            <p class="text-3xl mb-2 text-lg-center items-center justify-center">{{ $report->report_name }}</p>
            <div class="flex flex-col items-left justify-left ">

                <div class="text-sm mt-6 mb-6 text-department">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i> Updated by {{ $report->updated_by }}
                </div>

                {{-- Line divider --}}
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
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
                                    >

                                <a
                                    href="https://test.com"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                    > --}}
                    </div>
                    <x-report-Keyterm :KeytermsCsv="$report->key_terms" />
                    <div class="text-lg my-4">
                        <i class="fa-solid fa fa-clock"></i> {{ $report->frequency }}
                    </div>
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                {{-- AlpineJS to toggle the report screenshot --}}
                <div x-data="{ open: false } ">
                    <button x-on:click="open =! open" class="bg-transparent hover:bg-department font-semibold hover:text-white py-2 px-4 mb-4 border border-department hover:border-transparent rounded">How to run the report</button>
                    <div x-show="open">
                        <img class="object-contain max-w-2xl h-auto"
                            src="{{ $report->screenshot ? asset('storage/' . $report->screenshot) : asset('/images/no-image.png') }}"
                            alt="screenshot of how to run {{ $report->report_name }} report." />
                    </div>
                </div>
            </div>
        </x-card>
        <x-card class="mt-4 p-2 flex space-x-6 justify-end">
            <a href="/reports/{{ $report->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form method="POST" action="/reports/{{ $report->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </x-card>
    </div>
</x-layout>
