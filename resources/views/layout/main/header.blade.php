<header class="bg-gray-800 text-gray-100 p-4 flex items-center justify-between flex-wrap shadow-md">
    <div class="flex items-center space-x-4">
        {{-- Hamburger Menü Butonu (Sadece mobilde) --}}
        <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600" aria-label="Menü Aç">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <a href="/" class="font-bold text-2xl tracking-tight">SocialApp</a>
    </div>

    {{-- Arama Çubuğu --}}
    <form class="flex-grow max-w-md mx-4 hidden md:block">
        <input type="text" placeholder="Ara..." class="w-full p-2 rounded-md bg-gray-700 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </form>

    {{-- Kullanıcı Menüsü ve Bildirimler --}}
    <div class="flex items-center space-x-4">
        <button class="p-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
        </button>
        @auth
            <div x-data="{ open: false }" class="relative">
                <!-- Profil Butonu -->
                <a href="javascript:void(0)"
                   @click="open = !open"
                   class="flex items-center space-x-2">
                    <img src="{{ auth()->user()->profile?->profile_image ? asset('storage/' . auth()->user()->profile->profile_image) : asset('default_profile_image.webp') }}"
                         alt="User Avatar"
                         class="w-8 h-8 rounded-full border border-gray-600">
                    <span class="hidden md:block text-sm font-medium">Profil</span>
                </a>

                <!-- Dropdown Menü -->
                <div x-show="open"
                     @click.away="open = false"
                     x-transition
                     class="absolute right-0 mt-2 w-64 bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden z-50">

                    <!-- Kullanıcı Bilgisi -->
                    <div class="flex items-center space-x-3 p-4 border-b border-gray-700">
                        <img src="{{ auth()->user()->profile?->profile_image ? asset('storage/' . auth()->user()->profile->profile_image) : asset('default_profile_image.webp') }}"
                             alt="User Avatar"
                             class="w-12 h-12 rounded-full border border-gray-600">
                        <div>
                            <p class="font-semibold">{{ auth()->user()->display_name }}</p>
                            <p class="text-sm text-gray-400">@ {{ auth()->user()->username }}</p>
                        </div>
                    </div>

                    <!-- Menü Seçenekleri -->
                    {{--                    <a href="#" class="flex items-center space-x-3 px-4 py-2 hover:bg-gray-700">--}}
                    {{--                        <span>⚡</span>--}}
                    {{--                        <span class="text-purple-400">Upgrade To Premium</span>--}}
                    {{--                    </a>--}}
                    <a href="{{ route('profile.show', auth()->user()) }}" class="flex items-center space-x-3 px-4 py-2 hover:bg-gray-700">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </span>
                        <span>Profilim</span>
                    </a>
                    <a href="{{ route('account.setting.edit') }}" class="flex items-center space-x-3 px-4 py-2 hover:bg-gray-700">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </span>
                        <span>Ayarlar</span>
                    </a>
                    <div class="flex items-center justify-between px-4 py-2 hover:bg-gray-700">
                        <div class="flex items-center space-x-3">
                            <span>🌙</span>
                            <span>Night mode</span>
                        </div>
                        <input type="checkbox" class="toggle-checkbox" checked>
                    </div>
                    <div href="#" class="flex items-center space-x-3 px-4 py-2 hover:bg-gray-700 border-t border-gray-700">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                            </svg>
                        </span>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">Çıkış Yap</button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
    </div>
</header>
