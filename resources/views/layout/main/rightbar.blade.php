<section class="bg-gray-800 rounded-lg shadow-md p-3 space-y-4">
    {{-- People you may know --}}
    <div>
        <h3 class="text-md font-semibold text-gray-200 mb-3">Tanıdıklar</h3>
        <div class="space-y-3">
            @foreach ([
                ['img'=> 'https://i.pravatar.cc/40?img=15', 'name'=>'Aslı Yılmaz', 'meta'=>'125 Takipçi'],
                ['img'=> 'https://i.pravatar.cc/40?img=25', 'name'=>'Berk Can', 'meta'=>'320 Takipçi'],
                ['img'=> 'https://i.pravatar.cc/40?img=13', 'name'=>'Deniz Akın', 'meta'=>'125 Takipçi'],
            ] as $p)
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <img src="{{ $p['img'] }}" class="w-9 h-9 rounded-full border-2 border-blue-500" alt="">
                        <div>
                            <p class="text-sm font-medium text-gray-100">{{ $p['name'] }}</p>
                            <p class="text-xs text-gray-400">{{ $p['meta'] }}</p>
                        </div>
                    </div>
                    <button class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-600 hover:bg-blue-700 text-white transition-colors duration-200">Takip Et</button>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Sponsored Content --}}
    <div>
        <h3 class="text-md font-semibold text-gray-200 mb-3">Sponsorlu İçerik</h3>
        <div class="space-y-3">
            <a href="#" class="block bg-gray-700 rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-200">
                <img src="https://source.unsplash.com/random/400x200/?tech" alt="Sponsored Ad" class="w-full h-28 object-cover">
                <div class="p-3">
                    <p class="text-sm font-medium text-gray-100">Yeni Akıllı Saat! Sadece 99 TL.</p>
                    <p class="text-xs text-gray-400">sponsorlu</p>
                </div>
            </a>
            <a href="#" class="block bg-gray-700 rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-200">
                <img src="https://source.unsplash.com/random/400x200/?coffee" alt="Sponsored Ad" class="w-full h-28 object-cover">
                <div class="p-3">
                    <p class="text-sm font-medium text-gray-100">Sabah Kahveniz Bizden!</p>
                    <p class="text-xs text-gray-400">sponsorlu</p>
                </div>
            </a>
        </div>
    </div>
</section>
