<div class=" m-14">
    <h1 class="text-2xl font-bold pb-5">Your Links</h1>
    <div class="grid gap-20">
        @foreach ($urls as $url)
            <div class="bg-gray-600  p-5 rounded-md h-50">
                <div class="flex justify-end">
                    <div class="flex gap-2 h-8">
                        <div class="bg-gray-300 px-3 py-1 text-black rounded">
                            <h1><i class="fa-light fa-copy"></i> copy</h1>
                        </div>
                        <div class="bg-gray-300 px-3 py-1 text-black rounded">
                            <h1><a href=""></a><i class="fa-light fa-share"></i></h1>
                        </div>
                        <div class="">
                            <button class="relative bg-gray-300 px-3 py-1 text-black rounded drop_down_btn"><i
                                    class="fa-solid fa-ellipsis"></i></button>
                            <div
                                class="absolute drop_down_contents right-20 bg-gray-300 text-black text-left rounded mt-3 hidden px-10 py-3">
                                <a href="{{ $url->shortened_url }}" target="_blank"
                                    class="w-full flex gap-1 justify-start text-left hover:text-gray-600"><i
                                        class="fa-light fa-diamond-turn-right mt-1"></i> Redirect</a>
                                <a href="{{ route('fast_url.edit', $url->id) }}"
                                    class="w-full flex gap-1 justify-start text-left hover:text-gray-600 mt-2"><i
                                        class="fa-light fa-pen-to-square mt-1"></i> Edit</a>
                                <form action="{{ route('fast_url.delete', $url->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="w-full flex gap-1 justify-start text-left text-red-500 hover:text-red-800 mt-2">
                                        <i class="fa-light fa-trash mt-1"></i> Delete</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class=" flex gap-8 w-10 ">
                    <div class="">
                        <img src="https://bit.ly/3T4X5GX" class="w-10 " alt="">
                    </div>
                    <div class="grid gap-1">
                        <p class="text-white text-xl font-bold ">{{ $url->title }}</p>
                        <a href="{{ $url->shortened_url }}" target="_blank"
                            class="text-blue-300 hover:underline">{{ $url->shortened_url }}</a>
                        <div class=" whitespace-nowrap">
                            <a href="{{ $url->orignal_url }}" target="_blank"
                                class="text-white hover:underline">{{ $url->orignal_url }}</a>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <p class="text-white text-sm"><i class="fa-sharp fa-light fa-calendar-days"></i>
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
