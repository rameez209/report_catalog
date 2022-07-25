@props(['report'])

<x-card>
    <div class="flex">
        {{-- <img class="hidden w-48 mr-6 md:block" src="{{ asset('/images/no-image.png') }}" alt="" /> --}}

        {{-- <img class="hidden w-48 mr-6 md:block"
            src="{{ $report->screenshot ? asset('storage/' . $report->screenshot) : asset('/images/no-image.png') }}"
            alt="" /> --}}
        <div>
            <h3 class="text-2xl">
                <a href="/reports/{{ $report->id }}">{{ $report->report_name }}</a>
            </h3>
            <br>
            {{-- Departments --}}
            <x-report-department :departmentCsv="$report->Department" />

            {{-- Report Descriptions --}}
            <div class="text-xs mt-3">
                {{ $report->description }}
            </div>

            <div class="text-xs mt-4">
                <i class="fa-solid fa fa-clock"></i> {{ $report->frequency }}
            </div>
            {{-- Key Terms --}}
            <div class="text-bold">
                <x-report-keyterm :keytermsCsv="$report->key_terms" />
            </div>

            <div class="text-xs mt-6 text-laravel">
                <i class="fa fa-pencil-square" aria-hidden="true"></i> Updated by {{ $report->updated_by }}
            </div>
        </div>
    </div>
</x-card>
