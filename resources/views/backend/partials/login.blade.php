<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('backend.layouts.extensions')
    <title>Login Admin</title>
</head>

<body>
    <div class="relative flex justify-center items-center bg-gray-800 h-screen">
        <div class="absolute bg-gray-700 rounded-sm text-center w-" style="top: 20%">
            <div class="grid gap-7 outline-none p-10">
                <div class="flex justify-center">
                    <img src="https://logodownload.org/wp-content/uploads/2016/03/real-madrid-logo.png"
                        style="width: 40px" alt="">
                </div>
                <h1 class="text-white">Welcome! Admin</h1>
                {{-- <label for="user_name">User Name</label> --}}
                <input type="text" name="user_name" placeholder=" User Name"
                    class="placeholder:text-white  text-white border h-10 w-72  rounded-md outline-none bg-transparent"
                    id="">
                <input type="text" name="password" placeholder=" Password"
                    class="placeholder:text-white  text-white border h-10 w-72  rounded-md outline-none bg-transparent"
                    id="">
                <button class="text-white font-bold bg-gray-500 hover:bg-gray-600 h-10 w-72  rounded-md ">Login</button>
                <a href="#" class="hover:underline text-sm mt-10">Forgot Password?</a>
            </div>
        </div>
    </div>
</body>

</html>
