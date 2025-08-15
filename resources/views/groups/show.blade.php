@extends('layout.main.app')

@section('title', 'Grup Detayı - ' . $group)

@section('content')

    {{-- Grup Bilgileri --}}
    <div class="bg-gray-800 rounded-lg shadow-md p-6 mb-6 flex flex-col items-center md:flex-row md:items-start md:space-x-6">
        <img src="https://source.unsplash.com/random/150x150/?group-profile,{{ $group % 10 }}" alt="Grup Profil Resmi" class="w-32 h-32 rounded-full object-cover border-4 border-blue-500 mb-4 md:mb-0">
        <div class="text-center md:text-left flex-grow">
            <h1 class="text-3xl font-bold text-gray-100 mb-1">{{ $group }} Grubu</h1>
            <p class="text-gray-400 text-sm mb-4">500 Üye • Kuran: Grup Admini</p>
            <p class="text-gray-300 text-base mb-4">Bu, {{ $group }} grubu için bir açıklama. Ortak ilgi alanlarını paylaşan üyelerle burada etkileşim kurabilirsiniz.</p>
            <div class="flex justify-center md:justify-start space-x-4">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">Gruba Katıl</button>
                <a href="{{ route('groups.settings', $group) }}" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-md hover:bg-gray-700 transition-colors duration-200 text-sm font-medium">Ayarlar</a>
            </div>
        </div>
    </div>

    {{-- Grup Navigasyon Sekmeleri --}}
    <div class="bg-gray-800 rounded-lg shadow-md p-2 mb-6 flex justify-around md:justify-start space-x-2">
        <a href="#" class="px-4 py-2 rounded-md text-blue-400 font-medium bg-gray-700">Gönderiler</a>
        <a href="#" class="px-4 py-2 rounded-md text-gray-300 hover:bg-gray-700">Üyeler</a>
        <a href="#" class="px-4 py-2 rounded-md text-gray-300 hover:bg-gray-700">Medya</a>
    </div>

    {{-- Son Grup Gönderileri (Örnek) --}}
    <h2 class="text-xl font-bold text-gray-100 mb-4">Son Gönderiler</h2>
    <div class="space-y-6">
        @foreach(range(1, 2) as $i)
            <article class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                <header class="flex items-center justify-between p-4 pb-0">
                    <div class="flex items-center space-x-3">
                        <img src="https://i.pravatar.cc/40?img={{ $group + $i }}" alt="Yazar Resmi" class="w-10 h-10 rounded-full border-2 border-blue-500">
                        <div>
                            <p class="font-semibold text-gray-100 text-sm">Yazar Adı {{ $i }}</p>
                            <p class="text-xs text-gray-400">{{ $i }} saat önce</p>
                        </div>
                    </div>
                    <button class="p-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h12M6 8h12M6 12h12M6 16h12M6 20h12"></path></svg>
                    </button>
                </header>

                <div class="p-4">
                    <p class="text-gray-200 mb-4 text-sm">Bu, gruptaki bir gönderidir. {{ $i * 10 }}</p>
                    @if($i % 2 != 0)
                        <div class="relative rounded-lg overflow-hidden mb-4 border border-gray-700">
                            <img src="https://source.unsplash.com/random/800x600/?group-post,{{ $i }}" alt="Grup Gönderi Resmi {{ $i }}" class="w-full h-auto max-h-96 object-cover">
                        </div>
                    @endif
                    <div class="flex items-center space-x-4 text-sm text-gray-400 mt-4">
                        <button class="flex items-center space-x-1 hover:text-blue-400 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21H6a2 2 0 01-2-2V7a2 2 0 012-2h2.5M14 10V5a2 2 0 00-2-2h-2a2 2 0 00-2 2v2M8 10h.01"></path></svg>
                            <span>{{ 5 + $i }} Beğeni</span>
                        </button>
                        <button class="flex items-center space-x-1 hover:text-blue-400 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.913 9.913 0 01-3.097-.325M4 12c0-4.418 4.03-8 9-8s9 3.582 9 8M12 13.5V18a2 2 0 002 2h4.75m-4.75-2a2 2 0 01-2-2v-4.5M12 21c4.418 0 8-4.03 8-9S16.418 3 12 3 4 7.03 4 12c0 4.418 4.03 8 9 8"></path></svg>
                            <span>{{ 2 + $i }} Yorum</span>
                        </button>
                        <button class="flex items-center space-x-1 hover:text-blue-400 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.865 13.904 9 14.507 9 15a2.997 2.997 0 01-2.997 2.997H6a2 2 0 01-2-2V7a2 2 0 012-2h2.997A2.997 2.997 0 0115 12a2.997 2.997 0 01-2.997 2.997H12M18 19V7a2 2 0 00-2-2h-3.997A2.997 2.997 0 0112 12M18 19v-6"></path></svg>
                            <span>Paylaş</span>
                        </button>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

@endsection
