<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<h1 class="text-3xl font-bold underline">
    Hello world!
</h1>


<form action="{{ route('user.store') }}" method="post">
    @csrf

    <div>
        <input type="text" placeholder="Ad" name="first_name" value="{{ old('first_name') }}">

        @error('first_name')
        {{ $message }}
        @enderror
    </div>

    <div>
        <input type="text" placeholder="soyad" name="last_name" value="{{ old('last_name') }}">

        @error('last_name')
        {{ $message }}
        @enderror
    </div>

    <div>
        <input type="text" placeholder="kullanıcı adı" name="username" value="{{ old('username') }}">

        @error('username')
        {{ $message }}
        @enderror

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded">
                {{ session('error') }}
            </div>
        @endif

    </div>

    <div>
        <input type="text" placeholder="email" name="email" value="{{ old('email') }}">

        @error('email')
        {{ $message }}
        @enderror
    </div>

    <div>
        <input type="text" placeholder="şifre" name="password">

        @error('password')
        {{ $message }}
        @enderror
    </div>
    <button type="submit">Gönder</button>

</form>

<hr>


<div class="max-w-4xl mx-auto mt-8 space-y-4">
    @foreach($users as $user)
        <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
            <p class="text-lg font-semibold text-gray-800">
                Adı Soyadı:
                <span class="text-gray-600">{{ $user->display_name }}</span>
            </p>
            <p class="text-sm text-gray-700 mt-1">
                Kullanıcı adı:
                <span class="font-mono text-blue-600">{{ $user->username }}</span>
            </p>
            <form action="{{ route('user.destroy', $user) }}" method="post">
                @csrf
                <button type="submit">Sil</button>
            </form>
        </div>
    @endforeach
</div>


</body>
</html>
