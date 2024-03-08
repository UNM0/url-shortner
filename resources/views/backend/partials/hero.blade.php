<div class=" m-14">
    <h1 class="text-2xl font-bold pb-5 ">Your Connections Platform</h1>
    <div class="grid grid-cols-2 gap-5 bg-gray-700 mb-10 rounded-sm p-5">
        <div class="bg-gray-500 w-full p-2 flex gap-5 justify-center rounded-sm">
            <div class="">
                <img src="https://app.bitly.com/s/bbt2/images/dashboard_links.png" class="w-40" alt="">
            </div>
            <div class="grid place-content-center">
                <h1 class="text-xl mb-2 text-gray-300 font-semibold">Make it short</h1>
                <a href="{{ route('fast_url.links') }}"><button class="hover:bg-gray-700 px-4 py-1 rounded-sm border">Go
                        to Links</button></a>
            </div>
        </div>
        <div class="bg-gray-500 w-full p-2 flex gap-5 justify-center rounded-sm">
            <div class="">
                <img src="https://app.bitly.com/s/bbt2/images/dashboard_qrcs.png" class="w-40" alt="">
            </div>
            <div class="relative grid place-content-center ">
                <h1 class="text-xl mb-2 text-gray-300 font-semibold">Make it scannable</h1>
                <button disabled class="hover:bg-gray-700 px-2 py-1 rounded-sm border">Go to QR codes</button>
            </div>
            <div class="absolute right-24 rounded-sm bg-red- p-1 font-semibold rotate-12 w-24 px-3">
                <img src="https://cdn-icons-png.flaticon.com/128/4771/4771343.png" alt="">
            </div>
        </div>
    </div>
    <div class="bg-gray-700 w-full p-10 flex justify-center rounded-sm">
        <div class="w-1/2 bg--900 flex justify-center">
            <img src="{{ asset('flaticons/search-engine.png') }}" class="h-80 mb-4" alt="">
        </div>
        <div class="grid w-1/2 text-xl text-left mr-14 mt-20">
            <h1 class="">An effective URL shortener simplifies long web addresses into concise links, making them
                easier to share on platforms with character limits. Additionally, it provides analytics tools to track
                link engagement and performance.
            </h1>
            <a href="{{ route('fast_url.create') }}"><button
                    class="bg-gray-500 text-white py-2 rounded-md w-56 hover:bg-gray-600"><i
                        class="fa-light fa-plus-large"></i>
                    Try now</button>
            </a>
        </div>
    </div>
</div>
