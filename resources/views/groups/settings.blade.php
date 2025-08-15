@extends('layout.main.app')

@section('title', 'Grup Ayarları - ' . $group)

@section('content')

    <h1 class="text-2xl font-bold text-gray-100 mb-6">Grup Ayarları: {{ $group }}</h1>

    <div class="bg-gray-800 rounded-lg shadow-md p-6">
        <form class="space-y-6">
            <!-- Grup Adı -->
            <div>
                <label for="group_name" class="block text-sm font-medium text-gray-300 mb-2">Grup Adı</label>
                <input type="text" id="group_name" name="group_name" value="{{ $group }}" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Grup Açıklaması -->
            <div>
                <label for="group_description" class="block text-sm font-medium text-gray-300 mb-2">Grup Açıklaması</label>
                <textarea id="group_description" name="group_description" rows="4" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">Bu, {{ $group }} grubu için bir açıklama. Ortak ilgi alanlarını paylaşan üyelerle burada etkileşim kurabilirsiniz.</textarea>
            </div>

            <!-- Gizlilik Ayarı -->
            <div>
                <label for="privacy" class="block text-sm font-medium text-gray-300 mb-2">Gizlilik</label>
                <select id="privacy" name="privacy" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="public">Herkese Açık</option>
                    <option value="private">Özel</option>
                    <option value="secret">Gizli</option>
                </select>
            </div>

            <!-- Üye Kabul Etme -->
            <div>
                <label for="member_approval" class="block text-sm font-medium text-gray-300 mb-2">Üye Kabul Etme</label>
                <select id="member_approval" name="member_approval" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="auto">Otomatik</option>
                    <option value="manual">Manuel Onay</option>
                </select>
            </div>

            <!-- Butonlar -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('groups.show', $group) }}" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-md hover:bg-gray-700 transition-colors duration-200">İptal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">Kaydet</button>
            </div>
        </form>
    </div>

@endsection
