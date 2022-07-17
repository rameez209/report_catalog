@props(['report'])

<x-card>
    <div class="flex">
        {{-- <img class="hidden w-48 mr-6 md:block" src="{{ asset('/images/no-image.png') }}" alt="" /> --}}

        <img class="hidden w-48 mr-6 md:block"
            src="{{ $report->screenshot ? asset('storage/' . $report->screenshot) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/reports/{{ $report->id }}">{{ $report->report_name }}</a>
            </h3>
            <br>
            {{-- <div class="text-xl font-bold mb-4">{{ $report->Department }}</div> --}}
            <x-report-department :departmentCsv="$report->Department" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $report->frequency}}
            </div>
        </div>
    </div>
</x-card>
