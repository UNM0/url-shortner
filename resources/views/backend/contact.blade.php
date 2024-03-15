@extends('backend.layouts.app')
@section('pagetitle', 'Connect with us')
@section('content')
    <div class="m-14">
        <h1 class="text-2xl font-bold pb-5 ">We would love to hear from you...!</h1>
        <div class="grid">
            {{-- <div class="flex  justify-center">
                <img src="https://d3dy70zhjs5mi1.cloudfront.net/s3fs-public/styles/large/public/2022-10/orl_contact_us_ReachOutToUs__838x796px_121022_D.jpeg?itok=KUcmc14W" class="h-80" alt="">

            </div> --}}
            <div class="w-full h-fit grid justify-start ">
                <div class="bg-gray-700 p-5 rounded-md w-full">
                    <h1 class="text-white font-bold mb-5">Send us a message</h1>
                    <form action="" method="POST">
                        <div class="flex justify-between gap-2">
                            <input type="text" name="fullname"
                                class="mb-4 w-full h-10 rounded-md border-2 bg-transparent border-gray-600 placeholder:text-primary-color outline-none text-black"
                                placeholder=" Full name">
                            <input type="text" name="mobile_number"
                                class="mb-4 w-full justify-end h-10 rounded-md border-2 bg-transparent border-gray-600 placeholder:text-primary-color outline-none text-black"
                                placeholder=" Phone number">
                        </div>
                        <input type="text" name="email"
                            class="mb-4 w-full h-10 rounded-md border-2 bg-transparent border-gray-600 placeholder:text-primary-color outline-none text-black"
                            placeholder=" Email address">
                        <textarea name="message"
                            class="mb-4 w-full h-40 rounded-md border-2 bg-transparent border-gray-600 placeholder:text-primary-color outline-none text-black"
                            name="" id="" cols="30" rows="10" placeholder=" Message"></textarea>
                        <div class="flex gap-6">
                            <button type="submit"
                                class="w-full bg-gray-600 hover:bg-gray-800 text-secondary-color h-10 rounded-sm font-bold text-lg">Send
                                <i class="fa-light fa-paper-plane"></i></button>
                            <button type="reset"
                                class="w-full bg-red-500 hover:bg-red-800 text-secondary-color h-10 rounded-sm font-bold text-lg">Cancel
                                <i class="fa-light fa-trash"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
