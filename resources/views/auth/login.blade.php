@extends('layout.auth.app')

@section('content')
    <main class="w-full max-w-sm px-6">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="h-10 w-10 text-fuchsia-500">
                <path d="M12 20c3 0 5-4 8-4s5 4 8 4 5-4 8-4" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                <path d="M12 28c3 0 5 4 8 4s5-4 8-4 5 4 8 4" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity=".8" />
            </svg>
        </div>

        <!-- Başlık -->
        <h1 class="text-2xl font-semibold text-center mb-6">Hesabınıza giriş yapın</h1>

        <form action="{{ route('login.process') }}" method="post">
            @csrf
            <!-- Email + Password birleşik -->
            <div class="rounded-md shadow-sm space-y-4">
                <label for="username" class="sr-only">Kullanıcı adı</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Kullanıcı adı"
                    value="{{ old('username') }}"
                    class="block w-full rounded-md border border-white/10 bg-white/5 px-4 py-3 text-sm placeholder-white/50 focus:border-fuchsia-500 focus:ring-1 focus:ring-fuchsia-500 focus:outline-none"
                />
                @error('username') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                <label for="password" class="sr-only">Şifre</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Şifre"
                    autocomplete="current-password"
                    class="block w-full rounded-md border border-white/10 bg-white/5 px-4 py-3 text-sm placeholder-white/50 focus:border-fuchsia-500 focus:ring-1 focus:ring-fuchsia-500 focus:outline-none"
                />
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>


            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between mt-4">
                <label class="flex items-center text-sm">
                    <input type="checkbox" class="h-4 w-4 rounded border-white/20 bg-white/10 text-fuchsia-600 focus:ring-fuchsia-500" />
                    <span class="ml-2">Beni hatırla</span>
                </label>
                <a href="#" class="text-sm text-fuchsia-400 hover:text-fuchsia-300">Parolanızı mı unuttunuz?</a>
            </div>

            <!-- Buton -->
            <button
                type="submit"
                class="mt-6 w-full rounded-md bg-fuchsia-600 px-4 py-3 text-sm font-semibold text-white hover:bg-fuchsia-500 focus:outline-none focus:ring-2 focus:ring-fuchsia-400"
            >
                Giriş Yap
            </button>
        </form>

        <!-- Alt link -->
        <p class="mt-6 text-center text-sm text-white/70">
            Hesabınız yok mu?
            <a href="#" class="text-fuchsia-400 hover:text-fuchsia-300">Buradan ücretsiz kayıt olun</a>
        </p>
    </main>
@endsection
