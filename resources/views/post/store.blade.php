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
@endsection
