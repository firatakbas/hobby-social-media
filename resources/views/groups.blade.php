<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Site şablonu Profile</title>
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

        <section class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg p-6 max-w-3xl mx-auto text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-medium mb-1">Kendi grubunu oluştur</h3>
                    <p class="text-blue-100 text-sm">İlgi alanlarını paylaş ve yeni insanlarla tanış</p>
                </div>
                <a href="" class="bg-white text-blue-600 px-5 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors whitespace-nowrap">
                    Grup Oluştur
                </a>
            </div>
        </section>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <!-- Grup Üst Bilgileri -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-6">

                <!-- Grup Avatarı -->
                <a href="#"
                   class="w-20 h-20 rounded-full overflow-hidden bg-gray-100 block shrink-0 hover:opacity-90 transition">
                    <img src="{{ asset('post.jpeg') }}" alt="Grup Avatarı"
                         class="w-full h-full object-cover">
                </a>

                <!-- Grup Bilgileri -->
                <div class="flex-1">
                    <a href="#"
                       class="text-xl font-semibold text-gray-900 hover:text-purple-600 transition block mb-1">
                        Haikyuu! Voleybol Aşıkları
                    </a>
                    <p class="text-sm text-gray-600 mb-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea earum ex hic laudantium sunt? Illo.
                    </p>
                    <p class="text-xs text-gray-500">
                        Grubu kuran kişi:
                        <span class="font-semibold text-gray-700">firatakbas</span>
                    </p>
                </div>
            </div>

            <!-- Sayaçlar ve Butonlar -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pt-4 gap-4">
                <!-- Takipçi Sayısı -->
                <div class="text-sm text-gray-500">
                    <strong class="text-gray-900 font-semibold">1.2K</strong> takipçi
                </div>

                <!-- Aksiyon Butonları -->
                <div class="flex gap-3 flex-wrap">
                    <!-- Katıl Butonu -->
                    <button
                        class="px-6 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-md transition">
                        Katıl
                    </button>

                    <!-- Paylaş Butonu -->
                    <button
                        class="px-5 py-2 text-sm font-medium text-gray-600 border border-gray-300 hover:bg-gray-100 rounded-md transition">
                        Grubu Paylaş
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <!-- Grup Üst Bilgileri -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-6">

                <!-- Grup Avatarı -->
                <a href="#"
                   class="w-20 h-20 rounded-full overflow-hidden bg-gray-100 block shrink-0 hover:opacity-90 transition">
                    <img src="{{ asset('post.jpeg') }}" alt="Grup Avatarı"
                         class="w-full h-full object-cover">
                </a>

                <!-- Grup Bilgileri -->
                <div class="flex-1">
                    <a href="#"
                       class="text-xl font-semibold text-gray-900 hover:text-purple-600 transition block mb-1">
                        Haikyuu! Voleybol Aşıkları
                    </a>
                    <p class="text-sm text-gray-600 mb-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea earum ex hic laudantium sunt? Illo.
                    </p>
                    <p class="text-xs text-gray-500">
                        Grubu kuran kişi:
                        <span class="font-semibold text-gray-700">firatakbas</span>
                    </p>
                </div>
            </div>

            <!-- Sayaçlar ve Butonlar -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pt-4 gap-4">
                <!-- Takipçi Sayısı -->
                <div class="text-sm text-gray-500">
                    <strong class="text-gray-900 font-semibold">1.2K</strong> takipçi
                </div>

                <!-- Aksiyon Butonları -->
                <div class="flex gap-3 flex-wrap">
                    <!-- Katıl Butonu -->
                    <button
                        class="px-6 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-md transition">
                        Katıl
                    </button>

                    <!-- Paylaş Butonu -->
                    <button
                        class="px-5 py-2 text-sm font-medium text-gray-600 border border-gray-300 hover:bg-gray-100 rounded-md transition">
                        Grubu Paylaş
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <!-- Grup Üst Bilgileri -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-6">

                <!-- Grup Avatarı -->
                <a href="#"
                   class="w-20 h-20 rounded-full overflow-hidden bg-gray-100 block shrink-0 hover:opacity-90 transition">
                    <img src="{{ asset('post.jpeg') }}" alt="Grup Avatarı"
                         class="w-full h-full object-cover">
                </a>

                <!-- Grup Bilgileri -->
                <div class="flex-1">
                    <a href="#"
                       class="text-xl font-semibold text-gray-900 hover:text-purple-600 transition block mb-1">
                        Haikyuu! Voleybol Aşıkları
                    </a>
                    <p class="text-sm text-gray-600 mb-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea earum ex hic laudantium sunt? Illo.
                    </p>
                    <p class="text-xs text-gray-500">
                        Grubu kuran kişi:
                        <span class="font-semibold text-gray-700">firatakbas</span>
                    </p>
                </div>
            </div>

            <!-- Sayaçlar ve Butonlar -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pt-4 gap-4">
                <!-- Takipçi Sayısı -->
                <div class="text-sm text-gray-500">
                    <strong class="text-gray-900 font-semibold">1.2K</strong> takipçi
                </div>

                <!-- Aksiyon Butonları -->
                <div class="flex gap-3 flex-wrap">
                    <!-- Katıl Butonu -->
                    <button
                        class="px-6 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-md transition">
                        Katıl
                    </button>

                    <!-- Paylaş Butonu -->
                    <button
                        class="px-5 py-2 text-sm font-medium text-gray-600 border border-gray-300 hover:bg-gray-100 rounded-md transition">
                        Grubu Paylaş
                    </button>
                </div>
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
