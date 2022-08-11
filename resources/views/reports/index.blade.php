<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div>
        <div class="grid lg:grid-cols-12 p-4 m-2">
            {{-- Used unique() function to get the one value of each departments --}}
            <div class="md:col-span-3 p-4 space-y-4 bg-gray-50 border border-gray-200 rounded">
                @foreach ($departments->unique('departments') as $rpt)
                    <li class="list-none hover:text-laravel hover:border-r-4 border-laravel text-black font-semibold">
                        <a class="m-0 pl-2 rounded-md text-md leading-3" href="/?department={{ $rpt->departments }}">
                            {{ $rpt->departments }}
                        </a>
                    </li>
                    <hr>
                @endforeach
            </div>
            <div class="md:col-span-9 pl-6 space-y-6">
                @unless(count($reports) == 0)
                    @foreach ($reports as $report)
                        <x-report-card :report="$report" />
                    @endforeach
                @else
                    <p>No reports found!</p>
                @endunless
            </div>
        </div>
    </div>
</x-layout>
