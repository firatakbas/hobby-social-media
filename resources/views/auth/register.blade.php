@extends('layout.app')

@section('content')

    @if(session('error'))
        <div class="mb-4 flex items-start gap-3 rounded-xl border border-red-300 bg-red-50 p-4 text-sm text-red-800 shadow-sm dark:border-red-700 dark:bg-red-900 dark:text-red-100">
            {{-- Uyarı ikonu --}}
            <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-500 dark:text-red-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v2m0 4h.01M12 3.75c-4.556 0-8.25 3.694-8.25 8.25S7.444 20.25 12 20.25 20.25 16.556 20.25 12 16.556 3.75 12 3.75z" />
            </svg>

            {{-- Mesaj içeriği --}}
            <div class="flex-1">
                <p class="font-semibold">Bir şeyler ters gitti</p>
                <p class="mt-1 leading-5">{{ session('error') }}</p>
            </div>
        </div>
    @endif



    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <h1 class="text-center font-bold text-xl">Kayıt ol</h1>

        <form class="space-y-4" action="{{ route('register.store') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Ad -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ad</label>
                    <input type="text" name="first_name" class="w-full border rounded-md px-3 py-2 text-sm" value="{{ old('first_name') }}">
                    @error('first_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Soyad -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Soyad</label>
                    <input type="text" name="last_name" class="w-full border rounded-md px-3 py-2 text-sm" value="{{ old('last_name') }}">
                    @error('last_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Kullanıcı Adı -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Kullanıcı Adı</label>
                <input type="text" name="username" class="w-full border rounded-md px-3 py-2 text-sm" value="{{ old('username') }}">
                @error('username')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
                {{--<p class="text-gray-500 mt-1 text-sm font-medium">Kullanıcı adınız yalnızca küçük harfli İngilizce karakterler içermelidir. (Türkçe harf ve büyük harf kullanmayın)</p>--}}
            </div>

            <!-- E-posta -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">E-posta</label>
                <input type="email" name="email" class="w-full border rounded-md px-3 py-2 text-sm" value="{{ old('email') }}">
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Şifre -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Şifre</label>
                <input type="password" name="password" class="w-full border rounded-md px-3 py-2 text-sm">
                @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2">Giriş Yap</button>
            </div>
        </form>

    </div>

@endsection
