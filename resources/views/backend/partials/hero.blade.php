<div class=" m-14">
    <h1 class="pb-5 text-2xl font-bold ">Your Connections Platform</h1>
    <div class="grid grid-cols-2 gap-5 p-5 mb-10 bg-gray-700 rounded-sm">
        <div class="flex justify-center w-full gap-5 p-2 bg-gray-500 rounded-sm">
            <div class="">
                <img src="https://app.bitly.com/s/bbt2/images/dashboard_links.png" class="w-40" alt="">
            </div>
            <div class="grid place-content-center">
                <h1 class="mb-2 text-xl font-semibold text-gray-300">Make it short</h1>
                <a href="{{ route('fast_url.links') }}"><button class="px-4 py-1 border rounded-sm hover:bg-gray-700">Go
                        to Links</button></a>
            </div>
        </div>
        <div class="flex justify-center w-full gap-5 p-2 bg-gray-500 rounded-sm cursor-not-allowed">
            <div class="">
                <img src="https://app.bitly.com/s/bbt2/images/dashboard_qrcs.png" class="w-40" alt="">
            </div>
            <div class="relative grid cursor-not-allowed place-content-center ">
                <h1 class="mb-2 text-xl font-semibold text-gray-300">Make it scannable</h1>
                <button disabled class="px-2 py-1 border rounded-sm cursor-not-allowed hover:bg-gray-700">Go to QR
                    codes</button>
            </div>
            <div class="absolute w-24 p-1 px-3 font-semibold rounded-sm right-24 bg-red- rotate-12">
                <img src="https://cdn-icons-png.flaticon.com/128/4771/4771343.png" alt="">
            </div>
        </div>
    </div>
    <div class="flex justify-center w-full p-10 bg-gray-700 rounded-sm">
        <div class="flex justify-center w-1/2 bg--900">
            <img src="{{ asset('flaticons/search-engine.png') }}" class="mb-4 h-80" alt="">
        </div>
        <div class="grid w-1/2 mt-20 text-xl text-left mr-14">
            <h1 class="">Trimly, url shortner tool simplifies long web addresses into concise links, making them
                easier to share on platforms with character limits. Additionally, it provides analytics tools to track
                link engagement and performance.
            </h1>
            <a href="{{ route('fast_url.create') }}"><button
                    class="w-56 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600">
                    <i class="fa-light fa-glasses"></i>
                    Try now</button>
            </a>
        </div>
    </div>
</div>
