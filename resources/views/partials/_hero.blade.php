<section class="relative h-72  flex flex-col justify-center align-center text-center space-y-4 mb-4 bg-sidenavcolor">
    <div class="bg-hero absolute top-0 left-0 w-full h-full opacity-10 bg-repeat bg-center"
        style="background-image: url('images/report-icon.jpg')"></div>

    <div class="z-10 p-10 ">
        {{-- <p class="text-xl text-white font-bold my-4 font-poppins title-shadow">
            This page provides a comprehensive guide to reporting. The SJGH Report Catalog outlines the best practices
            and recommendations.
        </p> --}}
        <div class="pt-2 p-4 md:p-1 my-2 text-[#F8F8FF] title-shadow text-left flex divide-x-2">
            <div class="flex justify-even w-1/4 sm:1/3 text-center pr-2 text-white title-shadow ">
            </div>
            <div class="justify-end pl-3">
                <h3 class="text-2xl uppercase text-laravel font-bold">
                    Overview
                </h3>
                <p class="text-lg text-inherit pb-2 font-poppins">
                    This page provides a comprehensive guide to reporting. The SJGH Report Catalog outlines the best
                    practices
                    and recommendations.
                </p>
                <a href="/reports/create"
                    class="btn btn-laravel text-md bg-laravel inline-block border-2 border-department text-white py-2 px-8 rounded-xl uppercase mt-2 hover:font-semibold title-shadow">
                    <i class="fa fa-plus-circle"></i> &nbsp; add report
                </a>
            </div>


        </div>

    </div>
</section>


{{-- <div class="flex items-center justify-center">
    <a href="#" target="_blank"
            class="min-w-max m-5 text-black py-2 px-8 rounded-xl uppercase mt-2 hover:text-department ">claims
            - denials dashboard <i class="fa fa-external-link"></i></a>
    <a href="#" target="_blank"
            class="min-w-max m-5 text-black py-2 px-8 rounded-xl uppercase mt-2 hover:text-department ">revenue
            usage <i class="fa fa-external-link"></i></a>
    <a href="#" target="_blank"
            class="min-w-max m-5 text-black py-2 px-8 rounded-xl uppercase mt-2 hover:text-department ">SJGH
            Balanced scorecard <i class="fa fa-external-link"></i></a>
</div> --}}



{{-- AlpineJS to toggle the report screenshot --}}
{{-- <div x-data="{ open: false }">
    <button x-on:click="open =! open"
        class="bg-transparent hover:bg-department font-semibold hover:text-white py-2 px-4 mb-4 ml-5 hover:border-transparent rounded">
        Show Departments <i class="fa fa-angle-down"></i> </button>
    <div x-show="open">
        <div class="grid lg:grid-cols-6 md:grid-cols-6 sm:grid-cols-4 gap-5 m-10 ">
            @foreach ($departments->unique('departments') as $rpt)
                <a href="/?department={{ $rpt->departments }}">
                    <div class="bg-department hover:bg-laravel m-0 p-1 text-white rounded-md text-center">
                        {{ $rpt->departments }}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div> --}}




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
