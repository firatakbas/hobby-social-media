@extends('layout.main.app')

@section('title', $user->username . ' - Arkadaşlar')

@section('content')

    <h1 class="text-2xl font-bold text-gray-100 mb-6">{{ $user->name }}'nin Arkadaşları</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach(range(1, 8) as $i)
            <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden text-center p-4">
                <img src="https://i.pravatar.cc/96?img={{ $user->id + $i }}" alt="Arkadaş Resmi" class="w-24 h-24 rounded-full object-cover border-2 border-blue-500 mx-auto mb-3">
                <h2 class="text-lg font-semibold text-gray-100 mb-1">Arkadaş Adı {{ $i }}</h2>
                <p class="text-gray-400 text-sm mb-4">@arkadas{{ $i }}</p>
                <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">Profili Görüntüle</a>
            </div>
        @endforeach
    </div>

@endsection
