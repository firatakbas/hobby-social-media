@extends('layout.main.app')

@section('title', 'Hesap Ayarları')

@section('content')

    <h1 class="text-2xl font-bold text-gray-100 mb-6">Hesap Ayarları</h1>

    <x-profile-menu />

    <div class="space-y-6">
        <!-- Profil Bilgileri -->
        <div class="space-y-6">
            <div class="bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Sosyal Medya Bilgileri</h2>
                <form action="{{ route('account.social.media.update') }}" class="space-y-4" method="post">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="instagram" class="block text-sm font-medium text-gray-300 mb-2">Instagram</label>
                        <input value="{{ auth()->user()->profile?->instagram }}" type="text" id="instagram" name="instagram" placeholder="https://twitter.com/kullanici" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                    </div>
                    <div>
                        <label for="twitter" class="block text-sm font-medium text-gray-300 mb-2">Twitter</label>
                        <input value="{{ auth()->user()->profile?->twitter }}" type="text" id="twitter" name="twitter" placeholder="https://instagram.com/kullanici" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                    </div>
                    <div>
                        <label for="facebook" class="block text-sm font-medium text-gray-300 mb-2">Facebook</label>
                        <input value="{{ auth()->user()->profile?->facebook }}" type="text" id="facebook" name="facebook" placeholder="https://instagram.com/kullanici" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                    </div>
                    <div>
                        <label for="snapchat" class="block text-sm font-medium text-gray-300 mb-2">Snapchat</label>
                        <input value="{{ auth()->user()->profile?->snapchat }}" type="text" id="snapchat" name="snapchat" placeholder="https://instagram.com/kullanici" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                    </div>
                    <div>
                        <label for="biography" class="block text-sm font-medium text-gray-300 mb-2">Biyokrafi</label>
                        <textarea class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">{{ auth()->user()->profile?->biography }}</textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Kaydet</button>
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
