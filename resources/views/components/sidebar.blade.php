<div class="hidden md:block w-1/4 bg-white rounded-lg shadow-md py-4 px-4 flex flex-col h-screen sticky top-0">
    <div>
        <div class="text-2xl font-semibold mb-8" style="font-family: 'Alex Brush', cursive; color: #262626;">
            InstaApp
        </div>
        <ul class="space-y-3">
            @php
                $menusTop = [
                    ['icon' => 'fas fa-home', 'label' => 'Beranda', 'route' => route('home')],
                    ['icon' => 'fas fa-search', 'label' => 'Cari', 'route' => '#'],
                    ['icon' => 'far fa-compass', 'label' => 'Jelajahi', 'route' => '#'],
                    ['icon' => 'fas fa-play-circle', 'label' => 'Reels', 'route' => '#'],
                    ['icon' => 'far fa-paper-plane', 'label' => 'Pesan', 'route' => '#'],
                    ['icon' => 'far fa-heart', 'label' => 'Notifikasi', 'route' => '#'],
                ];
            @endphp

            <!-- Render all menu items dynamically -->
            @foreach($menusTop as $menu)
                <li class="my-0">
                    <a href="{{ $menu['route'] }}" class="flex items-center space-x-3 text-gray-700 hover:text-gray-900 py-2">
                        <i class="{{ $menu['icon'] }} text-lg w-6"></i>
                        <span class="text-lg font-semibold">{{ $menu['label'] }}</span>
                    </a>
                </li>
            @endforeach

            <!-- Add "Buat Postingan" button right below "Notifikasi" -->
            <li class="my-0">
                <button onclick="openModal()" class="flex items-center space-x-3 text-gray-700 hover:text-gray-900 py-2">
                    <i class="fas fa-plus-square text-lg w-6"></i>
                    <span class="text-lg font-semibold">Buat Postingan</span>
                </button>
            </li>

            <!-- Add "Profil" menu after "Buat Postingan" -->
            <li class="my-0">
                <a href="{{ route('profile.show', Auth::id()) }}" class="flex items-center space-x-3 text-gray-700 hover:text-gray-900 py-2">
                    <i class="fas fa-user-circle text-lg w-6"></i>
                    <span class="text-lg font-semibold">Profil</span>
                </a>
            </li>
        </ul>
    </div>
    <ul class="space-y-3 mt-48">
        <li class="my-0">
            <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-gray-900 py-2">
                <i class="far fa-circle text-lg w-6"></i>
                <span class="text-lg font-semibold">Meta AI</span>
            </a>
        </li>
        <li class="my-0">
            <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-gray-900 py-2">
                <i class="fas fa-sliders-h text-lg w-6"></i>
                <span class="text-lg font-semibold">AI Studio</span>
            </a>
        </li>
        <li class="my-0">
            <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-gray-900 py-2">
                <i class="fas fa-link text-lg w-6"></i>
                <span class="text-lg font-semibold">Threads</span>
            </a>
        </li>
        <ul class="space-y-3 mt-48">
            <li class="my-0 relative">
                <!-- Dropdown Toggle Button -->
                <button id="toggle-menu" class="flex items-center space-x-3 text-gray-700 hover:text-gray-900 py-2 focus:outline-none">
                    <i class="fas fa-bars text-lg w-6"></i>
                    <span class="text-lg font-semibold">Lainnya</span>
                </button>
                <!-- Dropdown Menu -->
                <div id="dropdown-menu" class="hidden absolute left-0 top-full mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-10">
                    @if(Auth::check())
                        <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2">
                            @csrf
                            <button type="submit" class="w-full text-left text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                            </button>
                        </form>
                    @endif
                </div>
            </li>
        </ul>
    </ul>
</div>

