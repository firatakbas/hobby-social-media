@extends('layout.app')

@section('content')

    <form action="{{ route('post.store.user') }}" method="post">
        @csrf
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
            <!-- Üst kısım: Profil resmi + input -->
            <div class="flex items-center gap-3 mb-3">
                <img src="{{ asset('user.jpg') }}" alt="Profil" class="w-10 h-10 rounded-full object-cover">
                <input
                    type="text"
                    placeholder="Aklınızdan ne geçiyor?"
                    class="flex-1 bg-gray-100 text-sm rounded-full px-4 py-2 focus:outline-none"
                    name="content"
                >
            </div>
            <div>
                @error('content')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
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
    </form>

    @foreach($posts as $post)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <!-- Üst: Kullanıcı Bilgisi -->
            <div class="flex items-center justify-between p-4">
                <div class="flex gap-3">
                    <img src="{{ auth()->user()->profile->profile_image ?? asset('default_profile_image.webp') }}" alt="Profil Fotoğrafı"
                         class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-semibold text-gray-800">{{ $post->postable->username }}</p>
                        <span class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @if(auth()->check() && $post->user_id == auth()->user()->id)
                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <button @click="open = !open" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </button>

                        <!-- Açılır menü -->
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-transition
                            class="absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-md shadow-lg z-50"
                        >
                            <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    Sil
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>

            <!-- İçerik Metni -->
            <div class="px-4 pt-1 pb-2 text-sm text-gray-800 leading-relaxed">
                <a href="{{ route('post.show', $post) }}">
                    {{ $post->content }}
                </a>
            </div>

            <!-- Görsel -->
            {{--<img src="{{ asset('post.jpeg') }}" alt="Post image" class="w-full h-auto object-cover">--}}

            <!-- Etkileşim Sayıları -->
            <div class="flex justify-end items-center text-xs text-gray-500 px-4 py-4 gap-4 border-t">
                <span>24 Beğeni</span>
                <span>2 Yorum</span>
            </div>
        </div>
    @endforeach

    {{ $posts->links('pagination::simple-tailwind') }}
@endsection
