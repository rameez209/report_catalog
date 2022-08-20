@props(['report'])

<x-card>

    <div class="card">
        
        <h5 class="card-header bg-navbarcolor flex justify-between">
            <x-report-department :departmentCsv="$report->Department" />
            <div class="text-xs text-white pt-1 title-shadow">
                <i class="fa-solid fa fa-clock"></i> {{ $report->frequency }}
            </div>
        </h5>
        <div class="card-body">
            <h2 class="card-title text-xl"><a href="/reports/{{ $report->id }}">{{ $report->report_name }}</a></h2>
            <div class="text-xs mt-2 mb-2 text-laravel">
                <i class="fa fa-pencil-square" aria-hidden="true"></i> Updated by {{ $report->updated_by }}
            </div>
            <p class="card-text text-xs">{{ $report->description }}</p>
            <x-report-keyterm :keytermsCsv="$report->key_terms" />
        </div>
    </div>

    {{-- <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $report->screenshot ? asset('storage/' . $report->screenshot) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl font-semibold">
                <a href="/reports/{{ $report->id }}">{{ $report->report_name }}</a>
            </h3>
            <br>
            Departments
            <x-report-department :departmentCsv="$report->Department" />

            Report Descriptions
            <div class="text-xs mt-3">
                {{ $report->description }}
            </div>

            <div class="text-xs mt-4">
                <i class="fa-solid fa fa-clock"></i> {{ $report->frequency }}
            </div>
            Key Terms
            <div class="text-bold">
                <x-report-keyterm :keytermsCsv="$report->key_terms" />
            </div>

            <div class="text-xs mt-6 text-laravel">
                <i class="fa fa-pencil-square" aria-hidden="true"></i> Updated by {{ $report->updated_by }}
            </div>
        </div>
    </div> --}}
</x-card>
