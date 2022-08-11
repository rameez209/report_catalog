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
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#1e98a6",
                        success: "#198754",
                        department: "#008080",
                    },
                },
            },
        };
    </script>
    <title>SJGH | Report Catalog</title>
</head>

<body class="mb-48">
    <nav class="sticky top-0 z-50 flex justify-between items-center mb-2 pl-4 pt-2 pb-2 bg-white">
        <a href="/">
            {{-- <img class="w-44" src="{{ asset('images/logo.png') }}" alt="" class="logo" /> --}}
            <h1 class="text-2xl font-bold uppercase text-laravel">
                {{-- Report<span class="text-black">Catalog</span> --}}
                <span>SJGH Report Catalog</span>
            </h1>
        </a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                {{-- Show if the user is logged in --}}
                <li>
                    <span class="font-bold uppercase">
                        Welcome {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="/reports/manage" class="hover:text-laravel">
                        <i class="fa-solid fa-gear"></i>
                        Manage Reports
                    </a>
                </li>
                {{-- logout --}}
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            @else
                {{-- Hide if no user logged in --}}
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
    <main>
        {{-- VIEW OUTPUT --}}
        {{ $slot }}
    </main>
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-center font-normal bg-laravel text-white h-20 mt-20 opacity-90 md:justify-center">
        <div class="flex items-center justify-center">
            <a href="#" target="_blank"
                    class="min-w-max m-5 text-white py-2 px-8 rounded-xl uppercase mt-2 hover:text-gray-700 ">claims
                    - denials dashboard <i class="fa fa-external-link"></i></a>
            <a href="#" target="_blank"
                    class="min-w-max m-5 text-white py-2 px-8 rounded-xl uppercase mt-2 hover:text-gray-700 ">revenue
                    usage <i class="fa fa-external-link"></i></a>
            <a href="#" target="_blank"
                    class="min-w-max m-5 text-white py-2 px-8 rounded-xl uppercase mt-2 hover:text-gray-700 ">SJGH
                    Balanced scorecard <i class="fa fa-external-link"></i></a>
        </div>
        {{-- <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p> --}}
        {{-- <a href="/reports/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">
            Add Report
        </a> --}}
    </footer>
    <x-flash-success />
</body>
</html>
