{{-- @props(['reports']) --}}

<section class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4">
    <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
        style="background-image: url('images/laravel-logo.png')"></div>

    <div class="z-10">

        <p class="text-xl text-white font-bold my-4">
            {{-- Created on October 13, 2021 by Rameez Mohammad --}}
            This page provides a comprehensive guide to reporting. The SJGH Report Catalog outlines the best practices
            and recommendations.
        </p>

        <div>
            <a href="/reports/create"
                class="inline-block border-2 border-white text-white py-2 px-8 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
                add the report
            </a>
        </div>
    </div>
</section>

{{-- {{DB::table('reports')->select('Department')->orderBy('Department', 'asc')->distinct()->get();}} --}}

{{-- Used unique() function to get the one value of each departments --}}
<div class="grid lg:grid-cols-6 md:grid-cols-6 sm:grid-cols-4 gap-10 m-10 ">
    @foreach ($departments->unique('departments') as $rpt)
   
        <a href="/?department={{ $rpt->departments }}">
            <div class="bg-black hover:bg-department m-0 p-2 text-white rounded-lg text-center">
                {{-- {{ dd(explode(',',$rpt->Department)) }} --}}
                {{ $rpt->departments }}
            </div>
        </a>
    @endforeach
</div>





{{-- <div class="flex flex-col items-center w-1/6">
        <li class="flex items-center justify-center text-white rounded-xl py-1 px-3 mr-2 text-xs">
                <a href="/?department={{ $rpt->Department }}">{{ $rpt->Department }}</a>
            </li> 
    @foreach ($reports as $rpt)
        <div class="inline-flex bg-purple-500 shadow-lg m-3 p-3 text-white rounded-lg w-full">
            <a href="/?department={{ $rpt->Department }}">{{ $rpt->Department }}</a>
        </div>
    @endforeach
</div> --}}
