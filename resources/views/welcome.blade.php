<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    <div class="flex bg-gray-300 h-screen w-screen justify-center items-center">
        <div class="w-[500px] border-xl border-black/20 border flex flex-col bg-white rounded-lg shadow-2xl">
            <div class="m-5 text-2xl items-center justify-center text-gray-600/50"> Admin Log in </div>
            <div class="block">
                <div class="w-full flex-row flex justify-between">
                    <input type="text" class="border border-xl rounded-md w-full m-12 mt-5 h-[50px] placeholder-gray-600/50 placeholder-text-md p-5 focus:border-gray-500/50 focus:ring-0 focus:outline-none" placeholder="Email">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg> -->
                </div>
                <div class="w-full flex-row flex justify-between">
                    <input type="password" class="border border-xl rounded-md w-full mx-12 mt-[5px] h-[50px] placeholder-gray-600/50 placeholder-text-md p-5 focus:border-gray-500/50 focus:ring-0 focus:outline-none" placeholder="Password">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg> -->
                </div>
                <div class="w-full justify-center items-center flex">
                    <Button class="m-12 mt-5px px-5 py-2 bg-red-800 rounded-xl items-center text-white flex justify-center" wire:click="">LOGIN</Button>
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>