@extends('layout.app')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6 space-y-4">
        <h2 class="text-lg font-semibold text-gray-800">Grup Oluştur</h2>

        <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Grup Adı -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Grup Adı</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Örn: Laravel Türkiye">
                @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Grup Açıklaması -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Açıklama</label>
                <textarea id="description" name="description" rows="3"
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Grubunuzu kısaca tanıtın...">{{ old('description') }}</textarea>
                @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="group_categories" class="block text-sm font-medium text-gray-700">Grubun Kategorisi</label>
                <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                    <option>Seç</option>
                    <option>Anime</option>
                    <option>Manga</option>
                    <option>Dizi</option>
                    <option>Film</option>
                    <option>K-Drama</option>
                    <option>Webtoon</option>
                </select>
            </div>

            <!-- Grup Görseli -->
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">Grup Görseli</label>
                <input type="file" id="file" name="file"
                       accept=".webp"
                       class="mt-1 block w-full text-sm text-gray-600
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:bg-blue-600 file:text-white
                      hover:file:bg-blue-700 transition">
                <p class="text-xs text-gray-500 mt-2">
                    <strong>Yalnızca .webp</strong> uzantılı dosya yükleyin. Maksimum boyut: <strong>8MB</strong>.
                </p>
                @error('file')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bilgi Notu -->
            <div class="bg-yellow-100 text-yellow-800 text-sm rounded-md px-4 py-3">
                <p class="mb-1 font-medium">📝 Görsel Hazırlama Bilgilendirmesi:</p>
                <ul class="list-disc list-inside space-y-1">
                    <li>Görselinizi önce <a href="https://cloudconvert.com/" target="_blank" class="underline text-blue-700">CloudConvert</a> ile <strong>.webp</strong> formatına dönüştürün.</li>
                    <li>Daha sonra <a href="https://tinypng.com/" target="_blank" class="underline text-blue-700">TinyPNG</a> kullanarak dosya boyutunu 8MB altına düşürün.</li>
                    <li>Yalnızca optimize edilmiş <strong>.webp</strong> formatındaki görselleri yükleyebilirsiniz.</li>
                </ul>
            </div>

            <!-- Gönder Butonu -->
            <div>
                <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                    Grup Oluştur
                </button>
            </div>
        </form>
    </div>


    <section class="bg-white border border-gray-200 p-6 rounded-xl shadow-sm">
        <div>
            <h2 class="text-base font-semibold text-gray-800">
                Grup oluşturabilmek için giriş yapmalısınız
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Topluluğa katılmak ve içerik paylaşmak için hesabınıza giriş yapın.
            </p>

            <a href=""
               class="inline-block mt-4 bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-blue-700 transition">
                Giriş Yap
            </a>
        </div>
    </section>

@endsection
