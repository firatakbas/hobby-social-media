<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Site şablonu</title>
</head>
<body class="bg-[#F3F4F6]">

<div class="bg-white">
    <header class="max-w-3xl mx-auto h-16 flex items-center justify-between">
        <a href="" class="font-bold">connect</a>
        <nav class="space-x-4">
            <a href="">Ana Sayfa</a>
            <a href="">Gruplar</a>
        </nav>
        <div class="space-x-2 flex items-center">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
            </a>
            <img src="{{ asset('user.jpg') }}" class="w-10 h-10 rounded-full">
        </div>
    </header>
</div>


<div class="grid grid-cols-1 lg:grid-cols-3 max-w-3xl mx-auto gap-4 my-5">
    <main class="col-span-2 space-y-4">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
            <!-- Üst kısım: Profil resmi + input -->
            <div class="flex items-center gap-3 mb-3">
                <img src="{{ asset('user.jpg') }}" alt="Profil" class="w-10 h-10 rounded-full object-cover">
                <input
                    type="text"
                    placeholder="Aklınızdan ne geçiyor?"
                    class="flex-1 bg-gray-100 text-sm rounded-full px-4 py-2 focus:outline-none"
                >
            </div>

            <hr class="my-2">

            <!-- Alt kısım: Aksiyonlar -->
            <div class="flex items-center justify-between flex-wrap gap-3">
                <div class="flex items-center gap-4 text-gray-600 text-sm">
                    <button class="flex items-center gap-1 hover:text-blue-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        Photo
                    </button>
                </div>

                <button
                    class="bg-gray-200 text-gray-500 text-sm px-4 py-1.5 rounded-md"
                >
                    Paylaş
                </button>
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

            <!-- Görsel -->
            {{--<img src="{{ asset('post.jpeg') }}" alt="Post image" class="w-full h-auto object-cover">--}}

            <!-- Etkileşim Sayıları -->
            <div class="flex justify-end items-center text-xs text-gray-500 px-4 py-4 gap-4 border-t">
                <span>24 Beğeni</span>
                <span>2 Yorum</span>
            </div>
        </div>


    </main>
    <aside class="hidden lg:block space-y-4">
        <!--Arkadaş İstekleri-->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 w-full max-w-sm mx-auto">
            <!-- Başlık -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-sm font-semibold text-gray-800">Arkadaş İstekleri</h2>
                <a href="#" class="text-xs text-blue-600 hover:underline">Tümünü Gör</a>
            </div>

            <div class="space-y-5">
                <!-- İstek Kartı 1 -->
                <div class="flex items-start gap-3">
                    <!-- Profil Resmi Kutusu -->
                    <div class="w-10 h-10 rounded-full overflow-hidden shrink-0">
                        <img src="{{ asset('user.jpg') }}" alt="Michael Chen"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Metin + Butonlar -->
                    <div class="flex flex-col justify-center">
                        <!-- Ad Soyad + Kullanıcı Adı -->
                        <p class="text-sm font-medium text-gray-900 leading-none">
                            Michael Chen <span class="text-gray-500 text-xs">@michaelchen</span>
                        </p>

                        <!-- Butonlar -->
                        <div class="mt-1 flex gap-2">
                            <button class="bg-purple-600 text-white text-xs px-3 py-1 rounded-md hover:bg-purple-700">
                                Onayla
                            </button>
                            <button class="bg-gray-200 text-xs px-3 py-1 rounded-md hover:bg-gray-300">
                                Sil
                            </button>
                        </div>
                    </div>
                </div>


                <!-- İstek Kartı 2 -->
                <div class="flex items-start gap-3">
                    <!-- Profil Resmi Kutusu -->
                    <div class="w-10 h-10 rounded-full overflow-hidden shrink-0">
                        <img src="{{ asset('user.jpg') }}" alt="Michael Chen"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Metin + Butonlar -->
                    <div class="flex flex-col justify-center">
                        <!-- Ad Soyad + Kullanıcı Adı -->
                        <p class="text-sm font-medium text-gray-900 leading-none">
                            Michael Chen <span class="text-gray-500 text-xs">@michaelchen</span>
                        </p>

                        <!-- Butonlar -->
                        <div class="mt-1 flex gap-2">
                            <button class="bg-purple-600 text-white text-xs px-3 py-1 rounded-md hover:bg-purple-700">
                                Onayla
                            </button>
                            <button class="bg-gray-200 text-xs px-3 py-1 rounded-md hover:bg-gray-300">
                                Sil
                            </button>
                        </div>
                    </div>
                </div>

                <!-- İstek Kartı 3 -->
                <div class="flex items-start gap-3">
                    <!-- Profil Resmi Kutusu -->
                    <div class="w-10 h-10 rounded-full overflow-hidden shrink-0">
                        <img src="{{ asset('user.jpg') }}" alt="Michael Chen"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Metin + Butonlar -->
                    <div class="flex flex-col justify-center">
                        <!-- Ad Soyad + Kullanıcı Adı -->
                        <p class="text-sm font-medium text-gray-900 leading-none">
                            Michael Chen <span class="text-gray-500 text-xs">@michaelchen</span>
                        </p>

                        <!-- Butonlar -->
                        <div class="mt-1 flex gap-2">
                            <button class="bg-purple-600 text-white text-xs px-3 py-1 rounded-md hover:bg-purple-700">
                                Onayla
                            </button>
                            <button class="bg-gray-200 text-xs px-3 py-1 rounded-md hover:bg-gray-300">
                                Sil
                            </button>
                        </div>
                    </div>
                </div>

                <!-- İstek Kartı 4 -->
                <div class="flex items-start gap-3">
                    <!-- Profil Resmi Kutusu -->
                    <div class="w-10 h-10 rounded-full overflow-hidden shrink-0">
                        <img src="{{ asset('user.jpg') }}" alt="Michael Chen"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Metin + Butonlar -->
                    <div class="flex flex-col justify-center">
                        <!-- Ad Soyad + Kullanıcı Adı -->
                        <p class="text-sm font-medium text-gray-900 leading-none">
                            Michael Chen <span class="text-gray-500 text-xs">@michaelchen</span>
                        </p>

                        <!-- Butonlar -->
                        <div class="mt-1 flex gap-2">
                            <button class="bg-purple-600 text-white text-xs px-3 py-1 rounded-md hover:bg-purple-700">
                                Onayla
                            </button>
                            <button class="bg-gray-200 text-xs px-3 py-1 rounded-md hover:bg-gray-300">
                                Sil
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!--Popüler Gruplar-->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 w-full max-w-sm mx-auto">
            <!-- Başlık -->
            <div class="flex items-center gap-2 mb-4">
                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 18v-2a4 4 0 0 1 4-4h3V7a4 4 0 0 1 4-4h2m5 5v2a4 4 0 0 1-4 4h-3v5a4 4 0 0 1-4 4h-2" />
                </svg>
                <h2 class="text-sm font-semibold text-gray-800">Popüler Gruplar</h2>
            </div>

            <!-- Liste -->
            <ul class="space-y-3">
                <li class="flex justify-between text-sm">
                    <a href="#" class="text-purple-600 hover:underline font-medium">#TechNews</a>
                    <span class="text-gray-500">12.543 posts</span>
                </li>
                <li class="flex justify-between text-sm">
                    <a href="#" class="text-purple-600 hover:underline font-medium">#DigitalArt</a>
                    <span class="text-gray-500">8.976 posts</span>
                </li>
                <li class="flex justify-between text-sm">
                    <a href="#" class="text-purple-600 hover:underline font-medium">#Innovation</a>
                    <span class="text-gray-500">6.532 posts</span>
                </li>
                <li class="flex justify-between text-sm">
                    <a href="#" class="text-purple-600 hover:underline font-medium">#Startup</a>
                    <span class="text-gray-500">4.321 posts</span>
                </li>
            </ul>
        </div>

    </aside>
</div>

</body>
</html>
