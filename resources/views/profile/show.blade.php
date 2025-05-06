@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8 flex space-x-4">
    @include('components.sidebar')

    <div class="w-full md:w-3/4 bg-white text-black py-4">
        <div class="flex flex-col items-center mb-6">
            <div class="relative">
                <img src="{{ asset('image/profile.png') }}" alt="Profile Picture" class="rounded-full border border-gray-300" width="150" height="150">
            </div>

            <div class="mt-4 text-center">
                <div class="flex items-center justify-center space-x-4">
                    <h2 class="text-2xl font-semibold">{{ $user->username }}</h2>
                    <button class="btn btn-outline-dark btn-sm">Edit Profil</button>
                    <button class="btn btn-outline-dark btn-sm">Lihat Arsip</button>
                    <i class="fas fa-cog text-black"></i>
                </div>
                <div class="flex space-x-8 mt-3">
                    <span><strong>{{ $posts->count() }}</strong> kiriman</span>
                    <span><strong>363</strong> pengikut</span>
                    <span><strong>109</strong> diikuti</span>
                </div>
                <div class="mt-3 font-medium">{{ $user->name }}</div>
            </div>
        </div>

        <div class="flex justify-center space-x-4 mb-6">
            <div class="text-center">
                <div class="rounded-full bg-gray-300 w-20 h-20 mx-auto"></div>
                <p class="text-gray-500 text-sm mt-2">.</p>
            </div>
            <div class="text-center">
                <div class="rounded-full bg-gray-300 w-20 h-20 mx-auto flex items-center justify-center">
                    <i class="fas fa-plus text-black"></i>
                </div>
                <p class="text-gray-500 text-sm mt-2">Baru</p>
            </div>
        </div>

        <div class="border-t border-gray-200">
            <ul class="flex justify-center space-x-8 text-gray-500 text-sm mt-6">
                <li class="cursor-pointer border-t-2 border-black text-black px-4 py-2">Postingan</li>
                <li class="cursor-pointer px-4 py-2">Tersimpan</li>
                <li class="cursor-pointer px-4 py-2">Ditandai</li>
            </ul>
        </div>

        <div class="mt-6">
            <div class="grid grid-cols-3 gap-2">
                @forelse ($posts as $post)
                    <div class="w-full aspect-w-1 aspect-h-1 overflow-hidden rounded">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->caption }}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 text-gray-500">
                        <i class="fas fa-camera text-6xl mb-4"></i>
                        <p class="text-xl">Belum ada postingan</p>
                        <p class="text-sm">Saat Anda membagikan foto, ini akan muncul di profil Anda.</p>
                        <button onclick="openModal()" class="flex items-center space-x-3 text-blue-500 mt-4 justify-center">
                            <i class="fas fa-plus-square text-lg w-6"></i>
                            <span>Bagikan foto pertama Anda</span>
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
