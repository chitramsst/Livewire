<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <div class="flex flex-col  w-full h-screen " x-data="{ sidebarOpen: true }">
        <div class="w-full h-full flex flex-row mt-[0.15rem]">
            <div class="w-[15%] h-full bg-gray-800 text-white rounded-r-2xl p-5 transition-all duration-300" :class="{ 'w-[5%] min-w-[100px]': !sidebarOpen }">
                @livewire('components.sidebar')
            </div>
            <div class="w-full h-full bg-gray-300 mx-1 rounded-l-2xl">
                <div class="w-auto h-[calc(10%-1rem)] bg-gray-800 text-white mt-[0.15rem] rounded-2xl">
                    @livewire('components.header')
                </div>
                <div class="m-2 bg-white shadow-2xl w-auto h-[calc(90%-1rem)] rounded-2xl">
                    {{$slot}}
                </div>
            </div>
        </div>
        @livewireScripts
    </div>
</body>

</html>