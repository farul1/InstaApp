@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8 flex space-x-4">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="space-y-6 w-full md:w-3/4 lg:w-2/4">
        @forelse($posts as $post)
            <div class="bg-white rounded-lg shadow-md">
                <!-- Header Post -->
                <div class="flex items-center p-4">
                    <img src="{{ asset('image/profile.png') }}" alt="Profile" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-semibold text-sm">{{ $post->user->name }}</p>
                        <p class="text-gray-500 text-xs">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                <!-- Gambar Post -->
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="w-full">

                <!-- Aksi (Like, Comment, Share, Save) -->
                <div class="p-4">
                    <div class="flex items-center space-x-4">
                        <!-- Tombol Like -->
                        <form method="POST" action="{{ route('likes.store', $post->id) }}" id="like-form-{{ $post->id }}">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-red-500">
                                <i class="far fa-heart text-xl"></i>
                            </button>
                        </form>
                        <button class="text-gray-700 hover:text-blue-500 comment-toggle" data-post-id="{{ $post->id }}">
                            <i class="far fa-comment text-xl"></i>
                        </button>
                        <button class="text-gray-700 hover:text-green-500">
                            <i class="far fa-paper-plane text-xl"></i>
                        </button>
                        <div class="flex-grow"></div>
                        <button class="text-gray-700 hover:text-gray-900">
                            <i class="far fa-bookmark text-xl"></i>
                        </button>
                    </div>

                    <!-- Jumlah Like -->
                    <p class="text-sm font-semibold mt-2">{{ $post->likes->count() }} suka</p>

                    <!-- Caption -->
                    <p class="text-sm mt-2">
                        <span class="font-semibold">{{ $post->user->name }}</span>
                        {{ \Illuminate\Support\Str::limit($post->caption, 100, '...') }}
                        <a href="#" class="text-blue-500">selengkapnya</a>
                    </p>
                </div>


                <div class="p-4 border-t border-gray-200 comments-section hidden" id="comments-{{ $post->id }}">
                    @foreach ($post->comments as $comment)
                    <div class="flex items-start mb-3">
                        <div class="flex-grow">
                            <p class="text-sm font-semibold">
                                {{ $comment->user->name ?? 'Unknown User' }}
                                <span class="text-gray-500 text-xs">• {{ $comment->created_at->diffForHumans() }}</span>
                            </p>
                            <p class="text-sm text-gray-700">
                                {{ $comment->comment ?? 'Komentar tidak tersedia' }}
                            </p>
                        </div>
                    </div>
                    @endforeach

                    <!-- Form Tambah Komentar -->
                    <form method="POST" action="{{ route('comments.store', $post->id) }}" class="mt-3">
                        @csrf
                        <div class="flex items-center">
                            <textarea name="comment" rows="1" class="w-full border-none focus:ring-0 text-sm" placeholder="Tambahkan komentar..."></textarea>
                            <button type="submit" class="text-blue-500 font-semibold ml-3">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500">Belum ada postingan</div>
        @endforelse
    </div>

    <!-- Profile Sidebar -->
    <div class="hidden lg:block w-1/4 bg-white rounded-lg shadow-md py-4 px-4 h-fit sticky top-4">
        <div class="font-semibold mb-4 text-gray-700">Profil</div>
        <div class="flex items-center mb-6">
            @if(Auth::check())
            <a href="{{ route('profile.show', Auth::id()) }}" class="flex items-center">
                <img src="{{ asset('image/profile.png') }}" alt="Profile" class="w-11 h-11 rounded-full mr-3">
                <div>
                    <div class="font-semibold text-gray-700">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500">Lihat profil</div>
                </div>
            </a>
            @else
                <div class="text-sm text-gray-500">Login untuk melihat profil</div>
            @endif
        </div>

        <!-- Suggestions Section -->
        <div class="font-semibold mb-4 text-gray-700">Disarankan untuk Anda</div>
        <ul class="space-y-4">
            @foreach(['Akun 1', 'Akun 2', 'Akun 3', 'Akun 4', 'Akun 5'] as $akun)
                <li class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="{{ asset('image/profile.png') }}" alt="Profile" class="w-8 h-8 rounded-full mr-3">
                        <div>
                            <div class="text-sm font-semibold text-gray-700">{{ $akun }}</div>
                            <div class="text-xs text-gray-500">Diikuti oleh 2 lainnya</div>
                        </div>
                    </div>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Ikuti</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
