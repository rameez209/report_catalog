<section class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4">
    <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
        style="background-image: url('images/report image.jpeg')"></div>

    <div class="z-10">
        <p class="text-xl text-white font-bold my-4">
            This page provides a comprehensive guide to reporting. The SJGH Report Catalog outlines the best practices
            and recommendations.
        </p>

        <div>
            <a href="/reports/create"
                class="inline-block border-2 border-white text-white py-2 px-8 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
                add report
            </a>
        </div>
    </div>
</section>
<div class="flex items-center justify-center">
    <a href="#" target="_blank"><button
            class="min-w-max border-2 m-5 border-black text-black py-2 px-8 rounded-xl uppercase mt-2 hover:text-department hover:border-department">claims
            - denials dashboard <i class="fa fa-external-link"></i></button></a>
    <a href="#" target="_blank"><button
            class="min-w-max border-2 m-5 border-black text-black py-2 px-8 rounded-xl uppercase mt-2 hover:text-department hover:border-department">revenue
            usage <i class="fa fa-external-link"></i></button></a>
    <a href="#" target="_blank"><button
            class="min-w-max border-2 m-5 border-black text-black py-2 px-8 rounded-xl uppercase mt-2 hover:text-department hover:border-department">SJGH
            Balanced scorecard <i class="fa fa-external-link"></i></button></a>
</div>



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
