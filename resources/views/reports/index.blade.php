<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="form-check form-switch flex justify-end mr-5 mb-3 pr-2">
            <input class="form-check-input show-details hover:text-laravel" type="checkbox" id="mySwitch" name="darkmode" value="yes" >
            {{-- <label class="form-check-label" for="mySwitch"><i class="fa-solid fa-list"></i></label> --}}
            <label class="form-check-label" for="mySwitch">List</label>
    </div>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 report-list-details">
        @unless(count($reports) == 0)
            @foreach ($reports as $report)
                <x-report-card :report="$report" />
            @endforeach
        @else
            <p>No reports found!</p>
        @endunless
    </div>

    <x-card class="container mt-3 report-list bg-white">
        
        <table class="w-full table-auto">
            <thead>
                {{-- <h1 class="text-3xl text-center font-bold my-6 uppercase">
                        Manage Reports
                    </h1> --}}
                <tr class="text-bold text-2xl border-b border-gray-600">
                    <th>Report Name</th>
                    <th>Requested By</th>
                    <th>Frequency</th>
                </tr>
            </thead>
            <tbody>
                @unless($reports->isEmpty())
                    @foreach ($reports as $report)
                        <tr class="border-gray-300 hover:bg-gray-100">
                            <td class="px-2 py-3 border-t border-b border-gray-300 text-lg">
                                <a href="/reports/{{ $report->id }}">
                                    {{ $report->report_name }}
                                </a>
                            </td>
                            <td class="px-2 py-3 border-t border-b border-gray-300 text-lg">
                                <a href="/?department={{ $report->Department }}" class=" py-2 rounded-xl">
                                    {{ $report->Department }}
                            </td>
                            <td class="px-2 py-3 border-t border-b border-gray-300 text-lg">
                                {{ $report->frequency }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-gray-300 text-lg">
                            <p class="text-center">No reports Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>



    {{-- PAGINATION --}}
    <div class="mt-6 p-4">
        {{ $reports->links() }}
    </div>
</x-layout>
