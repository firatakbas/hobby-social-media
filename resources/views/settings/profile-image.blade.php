@extends('layout.main.app')

@section('title', 'Hesap Ayarları')

@section('content')

    <h1 class="text-2xl font-bold text-gray-100 mb-6">Hesap Ayarları</h1>

    <x-profile-menu />

    <div class="space-y-6">
        <!-- Profil Bilgileri -->
        <div class="space-y-6">
            <div class="bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Profil Resmi Yükleme</h2>

                <img
                    src="{{ auth()->user()->profile?->profile_image ? asset('storage/' . auth()->user()->profile->profile_image) : asset('default_profile_image.webp') }}"
                    alt="Profil fotoğrafınız"
                    class="w-32 h-32 rounded-full object-cover mb-4"
                />


                <form class="space-y-4" method="POST" action="{{ route('account.profile.image.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="profile_image" class="block text-sm font-medium text-gray-300 mb-2">Profil Resminiz</label>
                        <input type="file" id="profile_image" name="profile_image" accept="image/*" class="w-full text-gray-100">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Yükle</button>
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
