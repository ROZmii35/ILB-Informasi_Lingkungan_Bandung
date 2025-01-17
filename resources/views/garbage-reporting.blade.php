@extends('layouts.app')

@section('title', 'Pelaporan Sampah')

@section('content')
<div class="container mx-auto mt-8 p-4">
    <section class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Form Pelaporan Sampah</h2>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="lokasi" class="block text-gray-700 font-medium mb-2">Lokasi Sampah</label>
                <input type="text" 
                    id="lokasi" 
                    name="lokasi" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" 
                    placeholder="Masukkan alamat atau lokasi sampah"
                    value="{{ old('lokasi') }}"
                    required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi Masalah</label>
                <textarea id="deskripsi" 
                        name="deskripsi" 
                        rows="4" 
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" 
                        placeholder="Jelaskan detail masalah sampah yang Anda temukan"
                        required>{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-6">
                <label for="gambar" class="block text-gray-700 font-medium mb-2">Unggah Foto</label>
                <input type="file" 
                    id="gambar" 
                    name="gambar" 
                    accept="image/*"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                <p class="text-sm text-gray-500 mt-1">Format yang didukung: JPG, PNG, GIF (Maks. 2MB)</p>
            </div>

            <button type="submit" 
                    class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-300 font-medium">
                Kirim Laporan
            </button>
        </form>
    </section>
</div>
@endsection