<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($reports) == 0)
            @foreach ($reports as $report)
                <x-report-card :report="$report" />
            @endforeach
        @else
            <p>No reports found!</p>
        @endunless
    </div>
</x-layout>

