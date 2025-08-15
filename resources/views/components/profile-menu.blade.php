<nav class="bg-gray-800 p-4 rounded-lg mb-6">
    <ul class="flex flex-wrap gap-4">
        <li>
            <a href="{{ route('account.setting.edit') }}"
               class="px-4 py-2 rounded-md text-gray-200 hover:bg-gray-700 {{ request()->routeIs('profile.details') ? 'bg-gray-700' : '' }}">
                Kişisel Detaylar
            </a>
        </li>
        <li>
            <a href="{{ route('account.password.edit') }}"
               class="px-4 py-2 rounded-md text-gray-200 hover:bg-gray-700 {{ request()->routeIs('profile.security') ? 'bg-gray-700' : '' }}">
                Güvenlik
            </a>
        </li>
        <li>
            <a href="{{ route('account.profile.image.edit') }}"
               class="px-4 py-2 rounded-md text-gray-200 hover:bg-gray-700 {{ request()->routeIs('profile.image') ? 'bg-gray-700' : '' }}">
                Resim Yükleme
            </a>
        </li>
        <li>
            <a href="{{ route('account.social.media.edit') }}"
               class="px-4 py-2 rounded-md text-gray-200 hover:bg-gray-700 {{ request()->routeIs('profile.social') ? 'bg-gray-700' : '' }}">
                Sosyal Medya
            </a>
        </li>
    </ul>
</nav>
