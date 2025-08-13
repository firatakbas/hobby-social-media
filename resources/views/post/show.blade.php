@extends('layout.app')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <!-- Üst: Kullanıcı Bilgisi -->
        <div class="flex items-center justify-between p-4">
            <div class="flex gap-3">
                <img src="{{ $post->postable->user->profile_image ?? asset('default_profile_image.webp') }}" alt="Profil Fotoğrafı"
                     class="w-10 h-10 rounded-full object-cover">
                <div>
                    <p class="text-sm font-semibold text-gray-800">{{ $post->postable->username }}</p>
                    <span class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @if($post->user_id == auth()->user()->id)
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
            {{ $post->content }}
        </div>

        <!-- Görsel -->
        {{--<img src="{{ asset('post.jpeg') }}" alt="Post image" class="w-full h-auto object-cover">--}}

        <!-- Etkileşim Sayıları -->
        <div class="flex justify-between items-center text-xs text-gray-500 px-4 py-4 border-t">
            <div class="space-x-4">
                <span>24 Beğeni</span>
                <span>2 Yorum</span>
            </div>
            <div>
                <a href="">Beğen</a>
            </div>
        </div>
    </div>

    <form action="{{ route('post.store.user') }}" method="post">
        @csrf
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
            <!-- Üst kısım: Profil resmi + input -->
            <div class="flex items-center gap-3 mb-3">
                <img src="{{ asset('user.jpg') }}" alt="Profil" class="w-10 h-10 rounded-full object-cover">
                <input
                    type="text"
                    placeholder="Yorum Yap"
                    class="flex-1 bg-gray-100 text-sm rounded-full px-4 py-2 focus:outline-none"
                    name="content"
                >
            </div>

            <hr class="my-2">

            <!-- Alt kısım: Aksiyonlar -->
            <div class="flex items-center justify-between flex-wrap gap-3">
                <button
                    class="bg-gray-200 text-gray-500 text-sm px-4 py-1.5 rounded-md"
                >
                    Paylaş
                </button>
            </div>
        </div>
    </form>

    <div class="bg-white border border-gray-200 rounded-lg px-4 py-3 mb-2 shadow-sm">
        <div class="flex items-start gap-3">
            <!-- Profil Fotoğrafı -->
            <img src="{{ asset('default_profile_image.webp') }}"
                 alt="Profil Fotoğrafı"
                 class="w-8 h-8 rounded-full object-cover">

            <div class="flex-1">
                <!-- Kullanıcı adı ve tarih -->
                <div class="flex justify-between items-center mb-1">
                    <p class="text-sm font-medium text-gray-800">
                        firatakbas
                    </p>
                    <span class="text-xs text-gray-400 whitespace-nowrap">
                        bugün
                    </span>
                </div>

                <!-- Yorum içeriği -->
                <p class="text-sm text-gray-700 leading-snug">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere incidunt nobis optio provident quos ratione repellendus. Alias amet deleniti excepturi, ipsam iste nobis officia pariatur perspiciatis repudiandae tempore, ut vitae.
                </p>
            </div>

            <!-- Silme butonu (isteğe bağlı) -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                        class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" x-transition
                     class="absolute right-0 mt-1 w-24 bg-white border border-gray-200 rounded shadow-md z-50">
                    <form method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full px-3 py-1.5 text-left text-sm text-red-600 hover:bg-gray-100">
                            Sil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
