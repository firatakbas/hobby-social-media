@extends('layout.main.app')

@section('title', $user->username . ' Profili')

@section('content')

    {{-- Kullanıcı Bilgileri Bölümü --}}
    <div class="bg-gray-800 rounded-lg shadow-md p-6 flex flex-col lg:flex-row items-center lg:items-start gap-8 mb-8">
        <!-- Profil Resmi -->
        <div class="flex-shrink-0">
            <img src="{{ $user->profile?->profile_image ? asset('storage/' . $user->profile?->profile_image) : asset('default_profile_image.webp') }}" alt="Profil Resmi"
                 class="w-32 h-32 rounded-full object-cover border-4 border-blue-500 shadow-lg">
        </div>

        <!-- Kullanıcı Bilgileri -->
        <div class="flex-grow text-center lg:text-left">
            <div class="mb-6">
                <h1 class="text-4xl font-bold text-gray-100 mb-2">{{ $user->display_name }}</h1>
                <p class="text-blue-400 text-xl">{{ $user->username }}</p>
                @if(!empty($user->profile?->biography))
                    <p class="text-gray-300 text-base leading-relaxed max-w-2xl mt-3">
                        {{ $user->profile?->biography }}
                    </p>
                @endif
            </div>

            <!-- İstatistikler -->
            <div class="flex justify-center lg:justify-start gap-8 mb-6">
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-100">225</p>
                    <p class="text-gray-400 text-sm font-medium">Takipçi</p>
                </div>
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-100">100</p>
                    <p class="text-gray-400 text-sm font-medium">Takip</p>
                </div>
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-100">35</p>
                    <p class="text-gray-400 text-sm font-medium">Gönderi</p>
                </div>
            </div>

            <!-- Aksiyon Butonları -->
            <div class="flex justify-center lg:justify-start gap-4">
                <button class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700
                             transition-all duration-200 text-sm font-semibold shadow-md hover:shadow-lg">
                    Takip Et
                </button>
                <button class="px-6 py-2.5 border-2 border-gray-600 text-gray-300 rounded-lg
                             hover:bg-gray-700 hover:border-gray-500 transition-all duration-200
                             text-sm font-semibold">
                    Mesaj Gönder
                </button>
            </div>
        </div>

    </div>

    <!-- Sosyal Medya Bağlantıları -->
    <div class="bg-gray-800 rounded-lg shadow-md border-t p-6 border-gray-700 pt-6">
        <h3 class="text-lg font-semibold text-gray-200 mb-4 text-center lg:text-left">Sosyal Medya</h3>
        <div class="flex justify-center lg:justify-start flex-wrap gap-4">
            @if(!empty($user->profile?->instagram))
                <a href="https://www.instagram.com/{{$user->profile->instagram}}" target="_blank" class="flex items-center gap-3 px-4 py-2 bg-gray-700 rounded-lg
                       text-gray-300 hover:text-blue-400 hover:bg-gray-600
                       transition-all duration-200 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                    <span class="text-sm font-medium">Instagram</span>
                </a>
            @endif

            @if(!empty($user->profile?->twitter))
                <a href="#" class="flex items-center gap-3 px-4 py-2 bg-gray-700 rounded-lg
                       text-gray-300 hover:text-blue-400 hover:bg-gray-600
                       transition-all duration-200 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                    </svg>
                    <span class="text-sm font-medium">Twitter</span>
                </a>
            @endif

            @if(!empty($user->profile?->facebook))

                <a href="#" class="flex items-center gap-3 px-4 py-2 bg-gray-700 rounded-lg
                       text-gray-300 hover:text-blue-400 hover:bg-gray-600
                       transition-all duration-200 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.047-1.852-3.047-1.853 0-2.136 1.445-2.136 2.939v5.677H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                    </svg>
                    <span class="text-sm font-medium">LinkedIn</span>
                </a>
            @endif

            @if(!empty($user->profile?->snapchat))
                <a href="#" class="flex items-center gap-3 px-4 py-2 bg-gray-700 rounded-lg
                       text-gray-300 hover:text-blue-400 hover:bg-gray-600
                       transition-all duration-200 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                    </svg>
                    <span class="text-sm font-medium">GitHub</span>
                </a>
            @endif
            @if(!empty($user->profile?->website_url))
                <a href="#" class="flex items-center gap-3 px-4 py-2 bg-gray-700 rounded-lg
                       text-gray-300 hover:text-blue-400 hover:bg-gray-600
                       transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                    </svg>
                    <span class="text-sm font-medium">Bağlantı</span>
                </a>
            @endif
        </div>
    </div>


    {{-- Profil Navigasyon Sekmeleri --}}
    <div class="bg-gray-800 rounded-lg shadow-md p-2 mb-6 flex justify-around md:justify-start space-x-2">
        <a href="{{ route('profile.show', $user->username) }}" class="px-4 py-2 rounded-md text-blue-400 font-medium bg-gray-700">Gönderiler</a>
        <a href="{{ route('profile.friends', $user->username) }}" class="px-4 py-2 rounded-md text-gray-300 hover:bg-gray-700">Arkadaşlar</a>
        <a href="{{ route('profile.groups', $user->username) }}" class="px-4 py-2 rounded-md text-gray-300 hover:bg-gray-700">Gruplar</a>
    </div>

    {{-- Kullanıcının Gönderileri Bölümü --}}
    <div class="space-y-6">
        @foreach($user->posts as $post)
            <article class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                <header class="flex items-center justify-between p-4 pb-0">
                    <div class="flex items-center space-x-3">
                        <img src="{{ $user->profile?->profile_image ? asset('storage/' . $user->profile?->profile_image) : asset('default_profile_image.webp') }}" alt="Kullanıcı Resmi" class="w-10 h-10 rounded-full border-2 border-blue-500">
                        <div>
                            <p class="font-semibold text-gray-100 text-sm">{{ $user->display_name }}</p>
                            <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <button class="p-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h12M6 8h12M6 12h12M6 16h12M6 20h12"></path>
                        </svg>
                    </button>
                </header>

                <div class="p-4">
                    <p class="text-gray-200 mb-4 text-sm">{{ $post->content }}</p>
                    {{--                    @if($i % 2 == 0)--}}
                    {{--                        <div class="relative rounded-lg overflow-hidden mb-4 border border-gray-700">--}}
                    {{--                            <img src="https://source.unsplash.com/random/800x600/?profile-post,{{ $i }}" alt="Gönderi Resmi {{ $i }}" class="w-full h-auto max-h-96 object-cover">--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}
                    <div class="flex items-center space-x-4 text-sm text-gray-400 mt-4">
                        <button class="flex items-center space-x-1 hover:text-blue-400 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21H6a2 2 0 01-2-2V7a2 2 0 012-2h2.5M14 10V5a2 2 0 00-2-2h-2a2 2 0 00-2 2v2M8 10h.01"></path>
                            </svg>
                            <span>Beğeni</span>
                        </button>
                        <button class="flex items-center space-x-1 hover:text-blue-400 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.913 9.913 0 01-3.097-.325M4 12c0-4.418 4.03-8 9-8s9 3.582 9 8M12 13.5V18a2 2 0 002 2h4.75m-4.75-2a2 2 0 01-2-2v-4.5M12 21c4.418 0 8-4.03 8-9S16.418 3 12 3 4 7.03 4 12c0 4.418 4.03 8 9 8"></path>
                            </svg>
                            <span>Yorum</span>
                        </button>
                        <button class="flex items-center space-x-1 hover:text-blue-400 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8.684 13.342C8.865 13.904 9 14.507 9 15a2.997 2.997 0 01-2.997 2.997H6a2 2 0 01-2-2V7a2 2 0 012-2h2.997A2.997 2.997 0 0115 12a2.997 2.997 0 01-2.997 2.997H12M18 19V7a2 2 0 00-2-2h-3.997A2.997 2.997 0 0112 12M18 19v-6"></path>
                            </svg>
                            <span>Paylaş</span>
                        </button>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

@endsection
