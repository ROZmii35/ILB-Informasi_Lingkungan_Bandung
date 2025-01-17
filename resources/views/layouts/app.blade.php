<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Informasi Lingkungan Bandung</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="{{ route('homepage') }}" class="flex items-center">
                        <span class="text-green-600 font-bold text-xl">ILB</span>
                    </a>
                </div>

                <div class="flex items-center">
                    <a href="{{ route('homepage') }}" class="text-gray-700 hover:text-green-600 px-3 py-2">Beranda</a>
                    <a href="{{ route('tourist-environment') }}" class="text-gray-700 hover:text-green-600 px-3 py-2">Wisata Lingkungan</a>
                    <a href="{{ route('garbage-reporting') }}" class="text-gray-700 hover:text-green-600 px-3 py-2">Pelaporan Sampah</a>
                    
                    @auth
                        <div class="ml-3 relative">
                            <button class="text-gray-700 hover:text-green-600 px-3 py-2">
                                {{ Auth::user()->name }}
                            </button>
                            <form action="{{ route('auth.logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-800 px-3 py-2">Logout</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600 px-3 py-2">Login</a>
                        <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 ml-2">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main>
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 mt-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 mt-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-12">
        <div class="max-w-7xl mx-auto py-6 px-4 text-center text-gray-600">
            <p>&copy; 2024 Informasi Lingkungan Bandung. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html> 