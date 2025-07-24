@extends('layout.app')

@section('content')

    <!-- Profil Kartı -->
    <div class="bg-white rounded-xl shadow p-6">
        <!-- Üst Kısım -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <!-- Profil Bilgileri -->
            <div class="flex items-center gap-4">
                <!-- Profil Resmi -->
                <div class="relative">
                    <img src="https://i.pravatar.cc/100?img=3" alt="Profile"
                         class="w-20 h-20 rounded-full border-4 object-cover" />
                </div>

                <!-- İsim ve Katılım -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">{{ $user->display_name }}</h2>
                    <small class="text-gray-600">{{ $user->username }}</small>
                    <p class="text-sm text-gray-500 flex items-center gap-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ $user->created_at }}
                    </p>
                    <p>
                        {{ $user->profile->biography }}
                    </p>
                </div>
            </div>

            <!-- Edit Profile Butonu -->
            <div class="sm:self-start">
                <button
                    class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white px-3 py-2 rounded-lg shadow text-sm font-semibold flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    Edit Profile
                </button>
            </div>
        </div>

        <!-- İstatistikler -->
        <div class="flex flex-wrap justify-start gap-6 mt-6 text-sm text-gray-600 font-medium">
            <div class="flex items-baseline gap-1">
                <span class="text-purple-600 text-lg font-bold">2,543</span> Takip
            </div>
            <div class="flex items-baseline gap-1">
                <span class="text-purple-600 text-lg font-bold">10.8K</span> Takipçi
            </div>
            <div class="flex items-baseline gap-1">
                <span class="text-purple-600 text-lg font-bold">127</span> Gönderi
            </div>
        </div>

        <div class="mt-3">
            <nav class="flex gap-3">
                @if(!empty($user->profile->instagram))
                    <a href="https://www.instagram.com/{{ auth()->user()->profile->instagram }}" target="_blank" class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </a>
                @endif
                @if(!empty($user->profile->twitter))
                    <a href="https://x.com/{{ auth()->user()->profile->twitter }}" target="_blank" class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                        </svg>
                    </a>
                @endif
                @if(!empty($user->profile->facebook))
                    <a href="https://facebook.com/{{ auth()->user()->profile->facebook }}" target="_blank" class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg>
                    </a>
                @endif
                @if(!empty($user->profile->website_url))
                    <a href="https://{{ auth()->user()->profile->facebook }}" target="_blank" class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                    </a>
                @endif
                @if(!empty($user->profile->snapchat))
                    <a href="https://{{ auth()->user()->profile->snapchat }}" target="_blank" class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                    </a>
                @endif
            </nav>
        </div>

        <!-- Sekmeler -->
        <div class="flex justify-around mt-6 border-t pt-4 text-sm font-medium text-gray-500">
            <button class="hover:text-purple-600 transition">Gönderi</button>
            <button class="hover:text-purple-600 transition">Gruplar</button>
            <button class="text-purple-600 border-b-2 border-purple-600 flex items-center gap-1">Arkadaşlar</button>
            <button class="hover:text-purple-600 transition">Kütüphanesi</button>
        </div>
    </div>


    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <!-- Üst: Kullanıcı Bilgisi -->
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('user.jpg') }}" alt="Alex Johnson" class="w-10 h-10 rounded-full object-cover">
                <div>
                    <p class="text-sm font-semibold text-gray-800">Alex Johnson</p>
                    <span class="text-xs text-gray-500">5mo ago</span>
                </div>
            </div>
            <button class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </button>
        </div>

        <!-- İçerik Metni -->
        <div class="px-4 pt-1 pb-2 text-sm text-gray-800 leading-relaxed">
            Just finished my latest design project! So excited to share it with everyone.
            What do you think? 😍 <span class="text-blue-500">#design #creativity</span>
        </div>

        <!-- Görsel -->
        <img src="{{ asset('post.jpeg') }}" alt="Post image" class="w-full h-auto object-cover">

        <!-- Etkileşim Sayıları -->
        <div class="flex justify-end items-center text-xs text-gray-500 px-4 py-4 gap-4 border-t">
            <span>24 Beğeni</span>
            <span>2 Yorum</span>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <!-- Üst: Kullanıcı Bilgisi -->
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('user.jpg') }}" alt="Alex Johnson" class="w-10 h-10 rounded-full object-cover">
                <div>
                    <p class="text-sm font-semibold text-gray-800">Alex Johnson</p>
                    <span class="text-xs text-gray-500">5mo ago</span>
                </div>
            </div>
            <button class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </button>
        </div>

        <!-- İçerik Metni -->
        <div class="px-4 pt-1 pb-2 text-sm text-gray-800 leading-relaxed">
            Just finished my latest design project! So excited to share it with everyone.
            What do you think? 😍 <span class="text-blue-500">#design #creativity</span>
        </div>

        <!-- Etkileşim Sayıları -->
        <div class="flex justify-end items-center text-xs text-gray-500 px-4 py-4 gap-4 border-t">
            <span>24 Beğeni</span>
            <span>2 Yorum</span>
        </div>
    </div>

@endsection
