<div class="bg-white" x-data="{ menuOpen: false }">
    <header class="max-w-3xl mx-auto h-16 flex items-center justify-between px-4 sm:px-0">
        <!-- Logo -->
        <a href="" class="font-bold text-lg">connect</a>

        <!-- Masaüstü Menü -->
        <nav class="hidden sm:flex space-x-4">
            <a href="" class="text-gray-700 hover:text-black">Ana Sayfa</a>
            <a href="" class="text-gray-700 hover:text-black">Gruplar</a>
        </nav>

        <!-- Sağ Kısım (Masaüstü) -->
        <div class="hidden sm:flex space-x-2 items-center">
            <!-- İkonlar -->
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
            </a>

            <!-- Kullanıcı Menüsü -->
            @auth
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.outside="open = false" class="focus:outline-none">
                        <img src="{{ auth()->user()->profile->profile_image ?? asset('default_profile_image.webp') }}" alt="Profil Fotoğrafı"
                             class="w-8 h-8 rounded-full border">
                    </button>

                    <div x-show="open"
                         x-transition
                         class="absolute right-0 mt-1 w-56 bg-white border rounded-md shadow z-50 text-sm"
                         style="display: none">
                        <div class="flex items-center px-3 py-2 border-b">
                            <img src="{{ auth()->user()->profile->profile_image ?? asset('default_profile_image.webp') }}" alt="Profil Fotoğrafı"
                                 class="w-8 h-8 rounded-full mr-2">
                            <div class="leading-tight">
                                <div class="font-medium text-gray-800">{{ auth()->user()->display_name }}</div>
                                <div class="text-xs text-gray-500">{{ auth()->user()->username }}</div>
                            </div>
                        </div>
                        <div class="py-1">
                            <a href="{{ route('user.show', auth()->user()) }}" class="flex items-center px-3 py-1.5 hover:bg-gray-100 text-gray-700">
                                <!-- Profil -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-500"
                                     fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Profil
                            </a>
                            <a href="{{ route('user.edit') }}" class="flex items-center px-3 py-1.5 hover:bg-gray-100 text-gray-700">
                                <!-- Ayarlar -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 text-gray-500  ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                                Ayarlar
                            </a>
                            <a href="#" class="flex items-center px-3 py-1.5 hover:bg-gray-100 text-gray-700">
                                <!-- Yardım -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                </svg>
                                Yardım merkezi
                            </a>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="border-t">
                            @csrf
                            <button type="submit"
                                    class="flex items-center w-full px-3 py-1.5 text-red-600 hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                </svg>
                                Çıkış Yap
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
            @guest
                <a
                    href="{{ route('login') }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-purple-600 text-white font-semibold text-sm rounded-md shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition duration-150 ease-in-out"
                    aria-label="Giriş Yap"
                >
                    Giriş Yap
                </a>
            @endguest
        </div>

        <!-- Hamburger Menü (Mobil) -->
        <button @click="menuOpen = !menuOpen" class="sm:hidden focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.75 5.25h16.5M3.75 12h16.5M3.75 18.75h16.5" />
            </svg>
        </button>
    </header>

    <!-- Mobil Menü -->
    <div x-show="menuOpen" x-transition class="sm:hidden bg-white border-t px-4 py-2 space-y-2 shadow">
        <a href="" class="block text-gray-800 hover:underline">Ana Sayfa</a>
        <a href="" class="block text-gray-800 hover:underline">Gruplar</a>
        <hr>
        <a href="#" class="block text-gray-700 hover:underline">Profil</a>
        <a href="#" class="block text-gray-700 hover:underline">Ayarlar</a>
        <a href="#" class="block text-gray-700 hover:underline">Yardım</a>
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left text-red-600 hover:underline">Çıkış Yap</button>
        </form>
    </div>
</div>
