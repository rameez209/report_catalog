<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="images/favicon.ico" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- MATERIAL DESIGN BOOTSTRAP 5 --}}
    <link rel="stylesheet" href="{{ asset('mdb5-free-standard/css/mdb.min.css') }}">
    {{-- ALPINJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- TAILWIND CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- JQUERY CDN --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#1E98A6",
                        success: "#198754",
                        // department: "#008080",
                        department: "#33b5e5",
                        info: "#17a2b8",
                        navbarcolor: "#363c3d",
                        sidenavcolor: "#484c4d",
                        greytext: "#333333",
                    },
                },
            },
        };
    </script>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        .department-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding 1%;
            box-shadow: inset 1 0 4px #000000;
            font-family: 'Poppins', sans-serif;
        }

        .department {
            min-width: 290px !important;
            max-width: 400px;
            padding-top: 10px;
            color: #33b5e5 !important;
        }


        .sidenav {
            height: 100%;
            margin-top: 40px;
            width: 280px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            /* background-color: #111; */
            background-color: #484c4d;
            overflow-x: hidden;
            padding-top: 20px;

        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #cfcfcf;
            ;
            display: block;
        }

        .sidenav a:hover {
            color: #ebdfdf;
        }

        .main {
            margin-left: 280px;
            /* Same as the width of the sidenav */
            font-size: 18px;
            /* Increased text to enable scrolling */
            /* padding: 0px 10px; */

        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .top-bar {
            margin-left: -5px;
            /* border-radius: 2px;
            box-shadow: 0px 1px 10px #999; */
        }

        .title-shadow {
            text-shadow: 1px 1px 1px black;
        }

        a:hover {
            color: olivedrab;
        }
    </style>
    <title>SJGH | Report Catalog</title>
</head>

<body class="mb-48 bg-white">
    <nav
        class="sticky top-0 z-50 flex justify-between items-center pl-4 pt-2 pb-2 bg-navbarcolor main top-bar border-b-2 border-sidenavcolor">
        <a href="/">
            {{-- <img class="w-44" src="{{ asset('images/logo.png') }}" alt="" class="logo" /> --}}
            <h1 class="text-2xl font-bold uppercase text-laravel mytitle">
                {{-- Report<span class="text-black">Catalog</span> --}}
                <span class="title-shadow">SJGH Report Catalog</span>
            </h1>
        </a>
        <ul class="flex space-x-6 mr-6 text-lg text-white">

            @auth
                {{-- SHOW IF THE USER IS LOGGED IN --}}
                <li>
                    <span class="font-bold uppercase title-shadow">
                        Welcome {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="/reports/create" class="hover:text-laravel">
                        <i class="fa fa-plus-circle"></i> Add Report
                    </a>
                </li>
                <li>
                    <a href="/reports/manage" class="hover:text-laravel">
                        <i class="fa-solid fa-gear"></i>
                        Manage Reports
                    </a>
                </li>
                {{-- LOGOUT --}}
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="hover:text-laravel">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            @else
                {{-- Hide IF NO USER IS LOGGED IN --}}
                <li>
                    <a href="/register" class="hover:text-laravel">
                        <i class="fa-solid fa-user-plus"></i>
                        Register
                    </a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login
                    </a>
                </li>
            @endauth
        </ul>

    </nav>
    <div class="sidenav pb-10 border-r-2 border-navbarcolor">
        
        {{-- <a href="/">
            <img class="w-44" src="{{ asset('images/logo.png') }}" alt="" class="logo" />
            <h1 class="text-3xl font-bold uppercase text-laravel drop-shadow-lg shadow-black">
                Report<span class="text-black">Catalog</span>
                <span>SJGH Report Catalog</span>
            </h1>
        </a> --}}
        <li class="list-none mb-1 fs-4 text-[#808080] font-semibold uppercase ml-2 mt-4">Dashboard</li>
        <div class="flex flex-col align-left">
            <a class="uppercase leading-2 " target="_blank" href="/">
                <li class="btn mt-0 list-none flex justify-between text-white">
                    claims <i class="fa fa-external-link"></i>
                </li>
            </a>
            <a class="uppercase leading-3 " target="_blank" href="/">
                <li class="btn mt-2 list-none flex justify-between text-white">
                    Revenue Usage <i class="fa fa-external-link"></i>
                </li>
            </a>
            <a class="uppercase leading-3 " target="_blank" href="/">
                <li class="btn mt-2 list-none flex justify-between text-white">
                    Balance Scorecard <i class="fa fa-external-link"></i>
                </li>
            </a>

        </div>
        {{-- IMPORT departments VARIABLE FROM THE DATABASE --}}
        <li class="list-none fs-4 mt-5 text-[#808080] font-semibold uppercase ml-2">Departments</li>
        @php
            $departments = DB::table('departments')
                ->select('departments')
                ->orderBy('departments', 'asc')
                ->distinct()
                ->get();
        @endphp
        @foreach ($departments->unique('departments') as $rpt)
            <a class="uppercase leading-3 " href="/?department={{ $rpt->departments }}">
                <li class="btn mt-2 list-none text-white flex justify-between">
                    <span>{{ $rpt->departments }}</span> <i class="fas fa-folder-open "></i>
                </li>
            </a>
            {{-- <hr> --}}
        @endforeach
        {{-- SPACING --}}
        <div class="mb-5"></div>
    </div>
    <main class="main">
        {{-- VIEW OUTPUT --}}
        {{ $slot }}
    </main>
    {{-- <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-center font-normal bg-laravel text-white h-20 mt-20 opacity-90 md:justify-center">
        <div class="flex items-center justify-center">
            <a href="#" target="_blank"
                class="min-w-max m-5 text-white py-2 px-8 rounded-xl uppercase mt-2 hover:underline hover:scale-105 ">claims
                - denials dashboard <i class="fa fa-external-link"></i></a>
            <a href="#" target="_blank"
                class="min-w-max m-5 text-white py-2 px-8 rounded-xl uppercase mt-2 hover:underline hover:scale-105 ">revenue
                usage <i class="fa fa-external-link"></i></a>
            <a href="#" target="_blank"
                class="min-w-max m-5 text-white py-2 px-8 rounded-xl uppercase mt-2 hover:underline hover:scale-105 ">SJGH
                Balanced scorecard <i class="fa fa-external-link"></i></a>
        </div>
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
    </footer> --}}
    <x-flash-success />

    {{-- MDB JAVASCRIPT --}}
    <script rel="stylesheet" src="{{ asset('mdb5-free-standard/js/mdb.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".mytitle").click(function() {
                $(".sidenav").hide();
            })
        })
    </script>
</body>

</html>
