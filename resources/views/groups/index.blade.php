@extends('layout.main.app')

@section('title','Gruplar')

@section('content')

    <h1 class="text-2xl font-bold text-gray-100 mb-6">Gruplar</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach(range(1, 6) as $i)
            <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                <img src="https://source.unsplash.com/random/400x200/?group,{{ $i }}" alt="Grup Resmi" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-100 mb-1">Grup Adı {{ $i }}</h2>
                    <p class="text-gray-400 text-sm mb-1">{{ 50 + $i * 10 }} Üye</p>
                    <p class="text-gray-500 text-xs mb-3">Kuran: Kullanıcı {{ $i }}</p>
                    <p class="text-gray-300 text-sm line-clamp-3 mb-4">Bu grup, ortak ilgi alanlarına sahip kişileri bir araya getirmek için oluşturulmuştur.</p>
                    <div class="flex justify-end">
                        <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">Görüntüle</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
