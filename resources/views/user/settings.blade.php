@extends('layout.app')


@section('content')

    @if(session('success'))
        <div class="bg-blue-100 border border-blue-300 text-blue-700 p-4 rounded-md">
            <div class="flex items-start gap-3">
                <div class="pt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-sm">Güncelleme</p>
                    <p class="text-sm font-medium leading-relaxed mt-1">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif


    <form action="{{ route('user.update', auth()->user()) }}" class="space-y-4" method="post">
        @csrf
        @method('PUT')
        <!-- PROFİL FOTOĞRAFI & GENEL BİLGİLER YAN YANA -->
        <section class="bg-white rounded-xl shadow-sm overflow-hidden p-6">
            <!-- Profil Fotoğrafı -->
            <div class="mb-5">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Profil Fotoğrafı</h2>
                <div class="flex items-center gap-4">
                    <img src="{{ auth()->user()->profile->profile_image ?? asset('default_profile_image.webp') }}" alt="Profil Fotoğrafı"
                         class="w-24 h-24 rounded-full object-cover border">
                    <div>
                        <input type="file" name="profile_image"
                               class="block text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition" />
                        <p class="text-xs text-gray-500 mt-1">JPEG veya PNG, en fazla 2MB.</p>
                    </div>
                </div>
            </div>

            <!-- Genel Bilgiler -->
            <div class="flex-1">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Genel Bilgiler</h2>
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Adı</label>
                        <input type="text" class="w-full border rounded-md px-3 py-2 text-sm" value="{{ auth()->user()->first_name }}" disabled>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Soyadı</label>
                        <input type="text" class="w-full border rounded-md px-3 py-2 text-sm" value="{{ auth()->user()->last_name }}" disabled>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kullanıcı Adı</label>
                    <input type="text" class="w-full border rounded-md px-3 py-2 text-sm" value="{{ auth()->user()->username }}" name="username">
                    @error('username')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Biyokrafi</label>
                    <textarea class="w-full border rounded-md px-3 py-2 text-sm" name="biography">{{ auth()->user()->profile->biography }}</textarea>
                    @error('biography')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </section>

        <!-- GÜVENLİK -->
        <section class="bg-white rounded-xl shadow-sm overflow-hidden p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Güvenlik</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">E-posta</label>
                    <input type="email" class="w-full border rounded-md px-3 py-2 text-sm" value="{{ auth()->user()->email }}" name="email">
                    @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Yeni Şifre</label>
                    <input type="password" class="w-full border rounded-md px-3 py-2 text-sm" name="password">
                    @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Şifreyi doğrula</label>
                    <input type="password" class="w-full border rounded-md px-3 py-2 text-sm" name="password_confirmation">
                    @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </section>

        <!-- SOSYAL MEDYA -->
        <section class="bg-white rounded-xl shadow-sm overflow-hidden p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Sosyal Medya</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="instagram">Instagram</label>
                    <div class="flex items-center border rounded-md divide-x divide-gray-300 overflow-hidden">
                        <a href="https://www.instagram.com/{{ auth()->user()->profile->instagram }}" target="_blank">
                            <span class="px-3 text-sm text-gray-600 h-full flex items-center bg-gray-50">https://www.instagram.com/</span>
                        </a>
                        <input type="text" class="w-full px-3 py-2 text-sm" value="{{ auth()->user()->profile->instagram }}" id="instagram" name="instagram">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="twitter">X(Twitter)</label>
                    <div class="flex items-center border rounded-md divide-x divide-gray-300 overflow-hidden">
                        <span class="px-3 text-sm text-gray-600 h-full flex items-center bg-gray-50">https://x.com/</span>
                        <input type="url" class="w-full px-3 py-2 text-sm" value="{{ auth()->user()->profile->twitter }}" id="twitter" name="twitter">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="facebook">Facebook</label>
                    <div class="flex items-center border rounded-md divide-x divide-gray-300 overflow-hidden">
                        <span class="px-3 text-sm text-gray-600 h-full flex items-center bg-gray-50">https://x.com/</span>
                        <input type="url" class="w-full px-3 py-2 text-sm" value="{{ auth()->user()->profile->facebook }}" id="facebook" name="facebook">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="snapchat">Snapchat</label>
                    <div class="flex items-center border rounded-md divide-x divide-gray-300 overflow-hidden">
                        <span class="px-3 text-sm text-gray-600 h-full flex items-center bg-gray-50">https://x.com/</span>
                        <input type="url" class="w-full px-3 py-2 text-sm" value="{{ auth()->user()->profile->snapchat }}" id="snapchat" name="snapchat">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="snapchat">Kişisel site</label>
                    <div class="flex items-center border rounded-md divide-x divide-gray-300 overflow-hidden">
                        <span class="px-3 text-sm text-gray-600 h-full flex items-center bg-gray-50">https://</span>
                        <input type="url" class="w-full px-3 py-2 text-sm" value="{{ auth()->user()->profile->website_url }}" id="website_url" name="website_url">
                    </div>
                </div>
            </div>
        </section>

        <!-- Kaydet Butonu -->
        <div class="pt-4">
            <button type="submit"
                    class="inline-flex items-center px-6 py-2 bg-purple-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                Değişiklikleri Kaydet
            </button>
        </div>
    </form>


    <section class="bg-white rounded-xl shadow-sm overflow-hidden p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">
            Instagram hesabını dondurma veya silme
        </h2>

        <div class="space-y-4">
            <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-md">
                <div class="flex items-start gap-3">
                    <div class="pt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 stroke-current text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-sm">Hesabı Sil</p>
                        <p class="text-sm font-medium leading-relaxed mt-1">
                            Hesabını kalıcı olarak silersen, Connect’teki tüm verilerin tamamen silinir. Bu işlem geri alınamaz. Eğer sadece ara vermek istiyorsan hesabını dondurabilirsin.
                        </p>
                        <a href="#" class="mt-3 inline-block text-sm font-semibold text-red-700 hover:underline">
                            Hesabımı kalıcı olarak sil
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-blue-100 border border-blue-300 text-blue-700 p-4 rounded-md">
                <div class="flex items-start gap-3">
                    <div class="pt-1">
                        <!-- Dondurma ikonu -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor"
                             class="h-6 w-6 stroke-current text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728
                      12.728A9 9 0 0 1 5.636 5.636m12.728
                      12.728L5.636 5.636" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-sm">Hesabı Dondur</p>
                        <p class="text-sm font-medium leading-relaxed mt-1">
                            Connect hesabını dondurursan, profilin ve tüm içeriklerin gizlenir. İstediğin zaman tekrar giriş yaparak hesabını geri açabilirsin.
                        </p>

                        <a href="https://www.instagram.com/accounts/remove/request/temporary/"
                           target="_blank"
                           class="mt-3 inline-block text-sm font-semibold text-blue-700 hover:underline">
                            Hesabımı Geçici Olarak Dondur
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection
