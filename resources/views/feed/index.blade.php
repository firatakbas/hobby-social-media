@extends('layout.main.app')

@section('title','Akış')

@section('content')

    {{-- Hikaye Şeridi --}}
    <div class="bg-gray-800 rounded-lg shadow-md p-3 mb-4">
        <div class="flex items-center space-x-3 overflow-x-auto hide-scrollbar">
            {{-- Yeni Hikaye Ekle Butonu --}}
            <a href="#" class="flex-shrink-0 w-14 h-14 rounded-full bg-gray-700 flex items-center justify-center text-blue-400 hover:bg-gray-600 transition-colors duration-200">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            </a>
            @foreach(range(1, 8) as $i)
                <a href="#" class="flex-shrink-0 relative">
                    <img src="https://i.pravatar.cc/60?img={{ $i * 3 }}" alt="Hikaye {{ $i }}" class="w-14 h-14 rounded-full object-cover border-2 border-blue-500">
                    <span class="absolute bottom-0 left-0 right-0 text-center text-xs bg-black bg-opacity-50 text-white rounded-b-full py-0.5">Kullanıcı {{ $i }}</span>
                </a>
            @endforeach
        </div>
    </div>

    {{-- Gönderi Oluşturma Alanı --}}
    <div class="bg-gray-800 rounded-lg shadow-md p-3 mb-4">
        <div class="flex items-center space-x-3 mb-3">
            <img src="https://i.pravatar.cc/36?img=60" alt="Profil Resmi" class="w-9 h-9 rounded-full border border-gray-600">
            <form action="{{ route('post.store.user') }}" method="post" class="flex flex-grow space-x-2 items-center">
                @csrf
                <input type="text" name="content" placeholder="Ne düşünüyorsun?" class="flex-grow p-2.5 rounded-full bg-gray-700 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="px-3 py-1.5 rounded-full bg-blue-600 hover:bg-blue-700 text-white font-medium transition-colors duration-200 text-sm">
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Gönderi Ekle
                </button>
            </form>
        </div>
    </div>

    {{-- Gönderi Kartları --}}
    @foreach($posts as $post)
        <article class="bg-gray-800 rounded-lg shadow-md mb-4 overflow-hidden">
            <header class="flex items-center justify-between p-3 pb-0">
                <div class="flex items-center space-x-3">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->display_name) }}&background=random" alt="Profil Resmi" class="w-9 h-9 rounded-full border-2 border-blue-500">
                    <div>
                        <p class="font-semibold text-gray-100 text-sm">{{ $post->user->display_name }}
                            @if($post->postable_type === 'App\\Models\\Group')
                                <span class="text-gray-400 text-xs"> için gönderi <a href="#" class="text-blue-400 hover:underline">{{ $post->postable->name }}</a></span>
                            @endif
                        </p>
                        <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <button class="p-1.5 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </header>

            <div class="p-3">
                <p class="text-gray-200 mb-3 text-sm">{{ $post->content }}</p>
                {{-- @if($i % 2 == 0)
                    <div class="relative rounded-lg overflow-hidden mb-3 border border-gray-700">
                        <img src="https://source.unsplash.com/random/700x500/?nature,{{ $i }}" alt="Gönderi Resmi {{ $i }}" class="w-full h-auto max-h-80 object-cover">
                    </div>
                @endif --}}
                <div class="flex items-center space-x-3 text-xs text-gray-400">
                    <button class="flex items-center space-x-1 hover:text-blue-400 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        <span>{{ 10 + $loop->index }} Beğeni</span>
                    </button>
                    <button class="flex items-center space-x-1 hover:text-blue-400 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>

                        <span>{{ 5 + $loop->index }} Yorum</span>
                    </button>
                    <button class="flex items-center space-x-1 hover:text-blue-400 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                        </svg>
                        <span>Paylaş</span>
                    </button>
                </div>
            </div>
        </article>
    @endforeach

@endsection
