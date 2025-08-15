@extends('layout.main.app')

@section('title', 'Hesap Ayarları')

@section('content')

    <h1 class="text-2xl font-bold text-gray-100 mb-6">Hesap Ayarları</h1>

    <x-profile-menu />

    <div class="space-y-6">
        <!-- Profil Bilgileri -->
        <div class="space-y-6">
            <div class="bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Kişisel Detaylar</h2>
                <form class="space-y-4" action="{{ route('account.setting.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-300 mb-2">Ad</label>
                            <input type="text" id="first_name" name="first_name" value="{{ auth()->user()->first_name }}" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-300 mb-2">Soyad</label>
                            <input type="text" id="last_name" name="last_name" value="{{ auth()->user()->last_name }}" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                        </div>
                    </div>
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-300 mb-2">Kullanıcı Adı</label>
                        <input type="text" id="username" name="username" value="{{ auth()->user()->username }}" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Hesap Silme -->
        <div class="bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-red-400 mb-4">Tehlikeli Bölge</h2>
            <p class="text-gray-300 text-sm mb-4">Hesabınızı silmek geri alınamaz. Tüm verileriniz kalıcı olarak silinecektir.</p>
            <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200">Hesabı Sil</button>
        </div>
    </div>

@endsection
