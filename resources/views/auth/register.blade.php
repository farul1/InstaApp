@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="bg-black text-white rounded-lg shadow-lg w-full max-w-sm px-10 py-8">
        <h2 class="text-3xl font-bold text-center mb-4" style="font-family: 'Alex Brush', cursive;">
            InstaAPP
        </h2>
        <p class="text-center text-sm mb-6">
            Buat akun untuk melihat foto dan video dari teman Anda.
        </p>
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Nama Lengkap"
                    class="w-full bg-gray-800 text-gray-300 rounded-md border border-gray-700 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email"
                    class="w-full bg-gray-800 text-gray-300 rounded-md border border-gray-700 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Kata Sandi"
                    class="w-full bg-gray-800 text-gray-300 rounded-md border border-gray-700 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md py-2">
                Daftar
            </button>
        </form>
        <p class="text-xs text-center text-gray-500 mt-4">
            Dengan mendaftar, berarti Anda menyetujui
            <a href="#" class="text-blue-500 hover:underline">Ketentuan</a>,
            <a href="#" class="text-blue-500 hover:underline">Kebijakan Privasi</a>, dan
            <a href="#" class="text-blue-500 hover:underline">Kebijakan Cookie</a> kami.
        </p>
        <div class="border-t border-gray-700 mt-6 pt-4">
            <p class="text-center">
                Punya akun?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk</a>
            </p>
        </div>
    </div>
</div>
@endsection
