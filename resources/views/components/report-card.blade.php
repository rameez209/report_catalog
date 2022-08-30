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
            <div class="text-xs mb-3 text-laravel">
                <i class="fa fa-pencil-square" aria-hidden="true"></i> Updated by {{ $report->updated_by }}
            </div>
            <p class="card-text text-xs">{{ $report->description }}</p>
            <div class="text-xs">
                <x-report-keyterm :keytermsCsv="$report->key_terms" />
            </div>
        </div>
    </div>
</x-card>
