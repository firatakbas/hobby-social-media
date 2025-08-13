@extends('layout.app')

@section('content')
    <div class="bg-[#FFFFFF] p-4 space-y-4 rounded-xl">
        <h1 class="text-center font-bold text-xl">Giriş Yap</h1>
        <form class="space-y-4" action="{{ route('login.process') }}" method="post">
            @csrf
            <!-- Diğer alanlar alt alta -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Kullanıcı Adı</label>
                <input type="text" name="username" class="w-full border rounded-md px-3 py-2 text-sm" value="{{ old('username') }}">
                @error('username')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
                {{--<p class="text-gray-500 mt-1 text-sm font-medium">Kullanıcı adınız yalnızca küçük harfli İngilizce karakterler içermelidir. (Türkçe harf ve büyük harf kullanmayın)</p>--}}
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Şifre</label>
                <input type="password" class="w-full border rounded-md px-3 py-2 text-sm" name="password">
                @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2">Giriş Yap</button>
            </div>
        </form>
    </div>

    @if (session('error'))
        <div class="bg-red-600 text-white rounded-md text-sm mt-2 p-4">
            {{ session('error') }}
        </div>
    @endif

@endsection
