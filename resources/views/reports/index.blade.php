<x-layout>
    @include('partials._hero')
    @include('partials._search')

    
    <div class=" flex justify-end mb-2 ">
        <label for="teal-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
            <input type="checkbox" value="" id="teal-toggle" class="sr-only peer show-details" >
            <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-teal-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">List</span>
          </label>
    </div>

    <div class="lg:grid lg:grid-cols-2 sm:grid-col-1 sm:grid-col-1 gap-4 space-y-4 md:space-y-0 mx-4 report-list-details">
        @unless(count($reports) == 0)
            @foreach ($reports as $report)
                <x-report-card :report="$report" />
            @endforeach
        @else
            <p>No reports found!</p>
        @endunless
    </div>

    <x-card class="container mt-3 report-list hide-div">

        <table class="w-full table table table-borderless">
            <thead class="bg-navbarcolor text-white border-l border-gray-600">
                {{-- <h1 class="text-3xl text-center font-bold my-6 uppercase">
                        Manage Reports
                    </h1> --}}
                <tr class="text-bold text-xl">
                    <th>Report Name</th>
                    <th>Requested By</th>
                    <th>Frequency</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @unless($reports->isEmpty())
                    @foreach ($reports as $report)
                        <tr class="border-b border-r border-l border-gray-600 hover:bg-gray-100">
                            <td class="py-2 text-lg">
                                <a href="/reports/{{ $report->id }}">
                                    {{ $report->report_name }}
                                </a>
                            </td>
                            <td class=" py-2  text-lg">
                                <a href="/?department={{ $report->Department }}" class="py-2 rounded-xl">
                                    {{ $report->Department }}
                                </a>
                            </td>
                            <td class=" py-2  text-lg capitalize">
                                {{ $report->frequency }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="">
                        <td class="px-4 py-8 text-lg">
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
