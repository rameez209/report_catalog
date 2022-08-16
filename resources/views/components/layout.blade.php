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
                        navbarcolor: "#363c3d"
                    },
                },
            },
        };
    </script>
    <style>
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
            /* margin-top: 50px; */
            width: 280px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            /* background-color: #111; */
            background-color: #363c3d;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #cfcfcf;;
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
            padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
    <title>SJGH | Report Catalog</title>
</head>

<body class="mb-48 bg-white">
    <nav class="sticky top-0 z-50 flex justify-between items-center mb-2 pl-4 pt-2 pb-2 bg-navbarcolor main">
        <a href="/">
            <img class="w-44" src="{{ asset('images/logo.png') }}" alt="" class="logo" />
            <h1 class="text-2xl font-bold uppercase text-laravel drop-shadow-lg shadow-black">
                Report<span class="text-black">Catalog</span>
                <span>SJGH Report Catalog</span>
            </h1>
        </a>
        <ul class="flex space-x-6 mr-6 text-lg text-white">

            @auth
                {{-- SHOW IF THE USER IS LOGGED IN --}}
                <li>
                    <span class="font-bold uppercase">
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
    <div class="sidenav">
        <li class="list-none mb-1 fs-3 text-white-300 font-semibold uppercase ml-2">Dashboard</li><br>
        <div class="flex flex-col align-left">
            <a class="uppercase leading-3 " target="_blank" href="/">
                <li class="btn mt-2 list-none flex justify-between text-white">
                    claims  <i class="fa fa-external-link"></i>
                </li>
            </a>
            <a class="uppercase leading-3 " target="_blank" href="/">
                <li class="btn mt-2 list-none flex justify-between text-white">
                    Revenue Usage  <i class="fa fa-external-link"></i>
                </li>
            </a>
            <a class="uppercase leading-3 " target="_blank" href="/">
                <li class="btn mt-2 list-none flex justify-between text-white">
                    Balance Scorecard  <i class="fa fa-external-link"></i>
                </li>
            </a>
            
        </div>
            {{--  IMPORT departments VARIABLE FROM THE DATABASE --}}
            <li class="list-none fs-3 mt-5 text-white-300 font-semibold uppercase ml-2">Departments</li>
            @php
                $departments = DB::table('departments')->select('departments')->orderBy('departments', 'asc')->distinct()->get()
            @endphp
            @foreach ($departments->unique('departments') as $rpt)
                <a class="uppercase leading-3 " href="/?department={{ $rpt->departments }}">
                    <li class="btn mt-2 list-none text-white flex justify-between">
                        <span>{{ $rpt->departments }}</span> <i class="fas fa-folder-open "></i>
                    </li>
                </a>
                {{-- <hr> --}}
            @endforeach
       
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
</body>

</html>
