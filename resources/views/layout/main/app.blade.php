<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title','Minimalist Social App')</title>
</head>
<body class="min-h-screen bg-gray-900 text-gray-100 antialiased font-sans" x-data="{ sidebarOpen: false }">

    {{-- Header --}}
    @include('layout.main.header')

    {{-- Mobile Sidebar (Off-canvas) --}}
    <div
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        @click.outside="sidebarOpen = false"
        class="fixed inset-y-0 left-0 z-50 w-48 bg-gray-800 shadow-lg p-4 lg:hidden overflow-y-auto"
    >
        <div class="flex items-center justify-between mb-6">
            <span class="text-xl font-bold text-gray-50">Menü</span>
            <button @click="sidebarOpen = false" class="text-gray-400 hover:text-gray-200 p-2 rounded-md focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        @include('layout.main.asidebar')
    </div>

    {{-- Main Content Area --}}
    <div class="container mx-auto px-4 py-6 md:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">

            {{-- Left Sidebar (Desktop Only) --}}
            <aside class="hidden lg:block lg:col-span-2 lg:col-start-2">
                @include('layout.main.asidebar')
            </aside>

            {{-- Main Content --}}
            <main class="lg:col-span-8 space-y-6">
                @yield('content')
            </main>

            {{-- Right Sidebar (Desktop Only) --}}
            

        </div>
    </div>

</body>
</html>
