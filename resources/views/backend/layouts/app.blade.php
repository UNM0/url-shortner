<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('backend.partials.important_links')
    <title>@yield('pagetitle')</title>
</head>

<body
    class="bg-gray-100 bg-center bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    {{-- nav-bar --}}
    <div class="flex">
        <!-- Sidebar -->
        <nav class="side-bar block bg-gray-800 text-white font-semibold py-3 h-screen w-[17%] sticky top-0 ">
            <div class="grid gap-6 m-2 justify-items-center">
                <div class="flex justify-between w-full pl-8">
                    <div class="">
                        <img src="{{ asset('img/Bob-removebg-preview.png') }}" class="w-40" alt="">
                    </div>
                </div>
                <div class="flex justify-center w-full">
                    <a href="{{ route('fast_url.create') }}"><button
                            class="w-full px-16 py-2 text-white bg-gray-600 rounded-md w-50 hover:bg-gray-700">
                            <i class="fa-light fa-plus-large"></i>
                            Create new</button>
                    </a>
                </div>

            </div>
            <h2 class=" border-[#a15ec5]"></h2><br>
            <div class="p-3 overflow-y-auto links-container h-5/6">
                <ul class="cursor-pointer links text-md">
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
                    <a href="{{ route('fast_url.contact') }}">
                        <li
                            class="hover:bg-gray-700 py-2 mt-3 pl-3 hover:rounded {{ Request::route()->getName() === 'fast_url.contact' ? 'bg-gray-700 bg-hover mb-2 mt-2 rounded border-l-8' : 'bg-gray-800' }}">
                            <i class="fa-light fa-comment"></i><span class="pl-5">Contact us</span>
                        </li>
                    </a>
                    <a href="{{ route('fast_url.setting') }}">
                        <li
                            class="py-2 {{ Request::route()->getName() === 'fast_url.setting' ? 'bg-gray-700 bg-hover mb-2 mt-2 rounded border-l-8' : 'bg-gray-800' }} pl-3 mt-3 hover:bg-gray-700 hover:rounded">
                            <i class="fa-light fa-gear"></i>
                            <span class="pl-5">Settings</span>
                        </li>
                    </a>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 text-white ml">
            <div class="sticky top-0 z-10 grid grid-cols-3 p-2 bg-gray-800">
                <div class="flex gap-5 ">
                    <button class="pl-5 text-xl open-btn ">
                        <i class="fa-light fa-bars"></i>
                    </button>
                    <h2 class="p-2 text-xl font-bold">Fast URL Shortner</h2>
                </div>
                <form action="#">
                    @csrf
                    <div class="flex w-3/4 gap-5 mt-2 border rounded-sm">

                        <button class="px-4 text-center bg-gray-600 hover:bg-gray-700"><i
                                class="fa-light fa-magnifying-glass"></i></button>
                        <input type="search" name="search_value" id="" placeholder="Search....."
                            class="h-10 pr-4 bg-transparent outline-none placeholder:text-white w-80">
                    </div>
                </form>

                <div class="flex justify-end gap-2 mt-2 mr-5 cursor-pointer">
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
<script>
    let openBtn = document.querySelector('.open-btn');
    let sideBar = document.querySelector('.side-bar')
    console.log(openBtn)
    console.log(sideBar)
    openBtn.addEventListener('click', function() {
        sideBar.classList.toggle('hidden');
        sideBar.style.transition = 'ease-in';
        sideBar.style.transitionDuration = "0.7s";
    });
</script>

</html>
