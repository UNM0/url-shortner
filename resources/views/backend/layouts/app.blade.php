<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <style>
        ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #2d2e32;
        }

        ::-webkit-text-fill-color {
            background: transparent;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-background-clip: text;
            -webkit-text-fill-color: #ffffff;
            transition: background-color 5000s ease-in-out 0s;
            box-shadow: inset 0 0 20px 20px #23232329;
        }
    </style>
    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">
    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    {{-- Tailwind CSS --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <title>@yield('pagetitle')</title>
</head>

<body
    class="bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    {{-- nav-bar --}}
    <div class="flex">
        <!-- Sidebar -->
        <nav class="block bg-gray-800 text-white font-semibold py-3 h-screen w-[17%] sticky top-0">
            <div class="grid gap-6 justify-items-center m-2">
                <div class="w-full flex justify-start pl-8">
                    <img src="https://logodownload.org/wp-content/uploads/2016/03/real-madrid-logo.png"
                        class="h-30 w-10" alt="">
                </div>
                <a href="{{ route('fast_url.create') }}"><button
                        class="bg-gray-600 text-white py-2 rounded-md w-56 hover:bg-gray-700"><i
                            class="fa-light fa-plus-large"></i>
                        Create new</button>
                </a>
            </div>
            <h2 class=" border-[#a15ec5]"></h2><br>
            <div class="links-container p-3 overflow-y-auto h-5/6">
                <ul class="links text-md cursor-pointer">
                    <a href="{{ route('fast_url.welcome') }}">
                        <li
                            class="hover:bg-gray-700 py-2 pl-3  hover:rounded {{ Request::route()->getName() === 'fast_url.welcome' ? 'bg-gray-700 bg-hover mb-2 rounded border-l-8' : 'bg-gray-800' }}">
                            <i class="fa-sharp fa-light fa-house"></i><span class="pl-5">Home</span>
                        </li>
                    </a>
                    <a href="{{ route('fast_url.links') }}">
                        <li
                            class="hover:bg-gray-700 py-2 mt-3 pl-3 hover:rounded {{ Request::route()->getName() === 'fast_url.links' ? 'bg-gray-700 bg-hover mb-2 mt-2 rounded border-l-8' : 'bg-gray-800' }}">
                            <i class="fa-light fa-link"></i><span class="pl-5">Links</span>
                        </li>
                    </a>
                    <a href="#">
                        <li class="hover:bg-gray-700 py-2 mt-3 pl-3 hover:rounded"> <i class="fa-light fa-gear"></i>
                            <span class="pl-5">Settings</span>
                        </li>
                    </a>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 ml  text-white">
            <div class="grid grid-cols-3 bg-gray-800 p-2 sticky top-0 z-10">
                <div class="">
                    <h2 class="text-xl font-bold p-2">Fast URL Shortner
                    </h2>
                </div>
                <form action="#" >
                    @csrf
                    <div class="mt-2 flex gap-5 w-3/4 border rounded-sm">

                        <button class="text-center bg-gray-600 hover:bg-gray-700 px-4"><i
                                class="fa-light fa-magnifying-glass"></i></button>
                        <input type="search" name="search_value" id="" placeholder="Search....."
                            class="placeholder:text-white h-10 w-80 outline-none bg-transparent pr-4">
                    </div>
                </form>

                <div class="mt-2 flex justify-end gap-2 mr-5 cursor-pointer">
                    <div class="text-lg">
                        <i class="fa-sharp fa-light fa-bell"></i>
                    </div>
                    <div class="">
                        <p>Hey, <span class="font-bold"> Nunam! </span>
                        <h4>
                    </div>
                    <div class="">
                        <i class="fa-duotone fa-user"></i>
                    </div>

                </div>
            </div>
            <div class="">
                @yield('content')
            </div>
        </div>

    </div>
</body>

</html>
