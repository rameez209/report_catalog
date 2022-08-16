<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div>
        <div class="grid lg:grid-cols-12">
            {{-- USED unique() FUNCTION TO GET ONE VALUE FOR DEPARTMENTS --}}
            {{-- <div
                class="md:col-span-3 sm:col-span-12 sm:ml-6 max-w-[80%] min-w-300 p-4 space-y-4 bg-gray-50 border border-gray-200">
                @foreach ($departments->unique('departments') as $rpt)
                    <a class="pt-2 rounded-md text-md  uppercase leading-3 " href="/?department={{ $rpt->departments }}">
                        <li
                            class="list-none p-3 rounded-3 text-black font-semibold flex justify-between hover:bg-laravel">
                            <span>{{ $rpt->departments }}</span> <i class="fas fa-folder-open "></i>
                        </li>
                    </a>
                @endforeach
            </div> --}}
            <div class="md:col-span-9 pl-4 space-y-6">
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
