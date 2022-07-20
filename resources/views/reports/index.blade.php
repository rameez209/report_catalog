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
    <div>
    </div>
    {{-- @foreach ($reports as $rpt)
        <div>{{ $rpt->Department }}</div>
        <li class="flex items-center justify-center bg-laravel text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?department={{ $rpt->Department }}">{{ $rpt->Department }}</a>
        </li>
    @endforeach --}}

</x-layout>
