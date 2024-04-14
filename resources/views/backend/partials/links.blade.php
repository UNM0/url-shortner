<div class=" m-14">
    <h1 class="pb-5 text-2xl font-bold">Your Links </h1>
    <h1 class="pb-5 text-xl font-bold text-gray-400">Total URL {{ $count }} </h1>
    <div class="grid gap-20">
        @if ($urls != '')
            @foreach ($urls as $url)
                <div class="p-5 bg-gray-600 rounded-md h-50">
                    <div class="flex justify-end">
                        <div class="flex h-8 gap-2">
                            <div class="px-3 py-1 text-black bg-gray-300 rounded">
                                <h1><i class="fa-light fa-copy"></i> copy</h1>
                            </div>
                            <div class="px-3 py-1 text-black bg-gray-300 rounded">
                                <h1><a href=""></a><i class="fa-light fa-share"></i></h1>
                            </div>
                            <div class="">
                                <button class="relative px-3 py-1 text-black bg-gray-300 rounded drop_down_btn"><i
                                        class="fa-solid fa-ellipsis"></i></button>
                                <div
                                    class="absolute hidden px-10 py-3 mt-3 text-left text-black bg-gray-300 rounded drop_down_contents right-20">
                                    <a href="{{ $url->shortened_url }}" target="_blank"
                                        class="flex justify-start w-full gap-1 text-left hover:text-gray-600"><i
                                            class="mt-1 fa-light fa-diamond-turn-right"></i> Redirect</a>
                                    <a href="{{ route('fast_url.edit', $url->id) }}"
                                        class="flex justify-start w-full gap-1 mt-2 text-left hover:text-gray-600"><i
                                            class="mt-1 fa-light fa-pen-to-square"></i> Edit</a>
                                    <a href="{{ route('fast_url.analyze', $url->id) }}"
                                        class="flex justify-start w-full gap-1 mt-2 text-left hover:text-gray-600"><i
                                            class="mt-1 fa-light fa-chart-mixed"></i> Analytics</a>
                                    <form action="{{ route('fast_url.destroy', [$url->id]) }}" method="POST">
                                        @csrf
                                        <button
                                            class="flex justify-start w-full gap-1 mt-2 text-left text-red-500 hover:text-red-800">
                                            <i class="mt-1 fa-light fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="">
                        {{ $loop->iteration }}
                    </div>
                    <div class="flex w-10 gap-8 pl-10">
                        <div class="grid gap-1">
                            <p class="text-xl font-bold text-white ">{{ $url->title }}</p>
                            <a href="{{ $url->shortened_url }}" target="_blank"
                                class="text-blue-300 hover:underline">{{ $url->shortened_url }}</a>
                            <div class=" whitespace-nowrap">
                                <a href="{{ $url->orignal_url }}" target="_blank"
                                    class="text-white hover:underline">{{ $url->orignal_url }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="pl-10 mt-10">
                        <p class="text-sm text-white"><i class="fa-light fa-clock"></i>
                            {{ $url->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
            {{ $urls->links() }}

            <h1 class="text-center text-red-500">
                You've reached the end of your links
            </h1>
        @else
            <div class="grid justify-center gap-10">
                <span class="text-xl text-red-400">You haven't created a link yet !</span>
                <div class="flex justify-center">
                    <a href="{{ route('fast_url.create') }}"><button
                            class="px-16 py-2 text-white bg-gray-600 rounded-md w- w-50 hover:bg-gray-700">
                            <i class="fa-light fa-plus-large"></i>
                            Create now</button>
                    </a>
                </div>
            </div>
        @endif
    </div><br><br><br>
</div>

<script>
    let dropDownBtn = document.querySelectorAll('.drop_down_btn');
    let dropDownContents = document.querySelectorAll('.drop_down_contents');

    dropDownBtn.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            dropDownContents.forEach((content, contentindex) => {
                if (index != contentindex) {
                    content.classList.add('hidden');
                }
            });
            // console.log(dropDownContents[index]);

            dropDownContents[index].classList.toggle('hidden');
            console.log(dropDownContents[index]);
        })
    });
    // document.body.addEventListener("click", (e) => {
    //     if (!e.target.classList.contains("drop_down_btn")) {
    //         dropDownContents.classList.add("hidden");
    //     }
    // });
    // dropDownBtn.forEach((btn, index) => {
    //     btn.addEventListener('click', () => {
    //         console.log('hy')
    //     } )
    // })
    // body.addEventListener('click', () => {
    //     dropDownContents.forEach(content => {
    //         content.classList.add('hidden');
    //     });
    // });
</script>
