@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-black">
    <div class="flex flex-col lg:flex-row items-center lg:space-x-8">
        <div class="hidden lg:block">
            <img src="image/login.png" alt="Preview Instagram" style="height: 500px; width: auto;">
        </div>
        <div class="bg-black text-white rounded-lg shadow-lg w-full max-w-sm px-10 py-8">
            <!-- Logo -->
            <h2 class="text-3xl font-bold text-center mb-4" style="font-family: 'Alex Brush', cursive;">
                InstaApp
            </h2>
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="w-full bg-gray-800 text-gray-300 rounded-md border border-gray-700 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Kata Sandi"
                        class="w-full bg-gray-800 text-gray-300 rounded-md border border-gray-700 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md py-2">
                    Masuk
                </button>
            </form>
            <div class="flex items-center justify-between my-4">
                <span class="block w-full border-t border-gray-600"></span>
                <span class="px-2 text-gray-300">ATAU</span>
                <span class="block w-full border-t border-gray-600"></span>
            </div>
            <div class="text-center mb-4">
                <a href="#" class="flex items-center justify-center space-x-2 text-blue-500 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24h11.495V14.709H9.691v-3.622h3.129V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.31h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.323-.593 1.323-1.324V1.325C24 .593 23.407 0 22.675 0z"/>
                    </svg>
                    <span>Masuk dengan Facebook</span>
                </a>
            </div>
            <div class="text-center mb-4">
                <a href="#" class="text-gray-400 hover:underline">Lupa kata sandi?</a>
            </div>
            <div class="text-center">
                <p class="text-gray-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Buat akun</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
