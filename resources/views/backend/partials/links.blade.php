<div class=" m-14">
    <h1 class="pb-5 text-2xl font-bold">Your Links</h1>
    <div class="grid gap-20">
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
                                <form action="{{ route('fast_url.destroy', $url->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="flex justify-start w-full gap-1 mt-2 text-left text-red-500 hover:text-red-800">
                                        <i class="mt-1 fa-light fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="flex w-10 gap-8 ">
                    <div class="">
                        <img src="https://bit.ly/3T4X5GX" class="w-10 " alt="">
                    </div>
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
                <div class="mt-10">
                    <p class="text-sm text-white"><i class="fa-sharp fa-light fa-calendar-days"></i>
                        {{ $url->created_at }}</p>
                </div>
            </div>
        @endforeach
    </div>
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
