@extends('layout.main.app')

@section('title', 'Hesap Ayarları')

@section('content')

    <h1 class="text-2xl font-bold text-gray-100 mb-6">Hesap Ayarları</h1>

    <x-profile-menu />


    <div class="space-y-6">
        <!-- Profil Bilgileri -->
        <div class="space-y-6">
            <div class="bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Şifre Sıfırlama</h2>
                <form class="space-y-4">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">Mevcut Şifre</label>
                        <input type="password" id="current_password" name="current_password" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                    </div>
                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-300 mb-2">Yeni Şifre</label>
                        <input type="password" id="new_password" name="new_password" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                    </div>
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-300 mb-2">Yeni Şifre (Tekrar)</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Şifreyi Güncelle</button>
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
