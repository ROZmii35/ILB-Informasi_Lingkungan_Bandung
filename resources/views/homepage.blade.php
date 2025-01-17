<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandung Hijau & Lestari</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-green-50">
    <!-- Navbar -->
    <header class="bg-green-600 shadow-lg">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">Bandung Hijau & Lestari</h1>
            <nav>
                <ul class="flex space-x-6">
                    @auth
                        <li>
                            <form action="{{ route('auth.logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-white hover:text-green-100">Keluar</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="text-white hover:text-green-100">Masuk</a></li>
                        <li><a href="{{ route('register') }}" class="text-white hover:text-green-100">Daftar</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <section class="text-center py-12 md:py-20">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-green-800">Selamat Datang di Bandung Hijau</h1>
            <p class="text-xl text-green-700 mb-8">Bersama Mewujudkan Kota yang Bersih, Hijau, dan Berkelanjutan!</p>
            <div class="relative">
                <img src="https://dolandolen.com/wp-content/uploads/2019/08/20-Spot-Instagram-Terbaik-Bandung.jpg" 
                    alt="Pemandangan Alam Bandung" 
                    class="rounded-lg shadow-xl mx-auto w-full max-w-6xl h-[400px] object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-green-900/50 to-transparent rounded-lg"></div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="grid md:grid-cols-2 gap-12 py-12">
            <!-- Wisata Card -->
            <div class="bg-white rounded-lg shadow-lg p-8 transition-transform hover:scale-105 border-t-4 border-green-500">
                <i data-lucide="tree" class="w-12 h-12 text-green-600 mb-4"></i>
                <h2 class="text-2xl font-semibold mb-4 text-green-800">Wisata Ramah Lingkungan</h2>
                <p class="text-gray-600 mb-6">
                    Jelajahi keindahan alam Bandung yang masih asri. Dari kebun teh yang hijau membentang hingga 
                    taman-taman kota yang rindang. Nikmati wisata yang ramah lingkungan dan berkelanjutan.
                </p>
                <a href="{{ route('tourist-environment') }}" 
                    class="inline-flex items-center text-green-600 hover:text-green-800 font-semibold group">
                    Lihat Destinasi
                    <i data-lucide="arrow-right" class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Laporan Card -->
            <div class="bg-white rounded-lg shadow-lg p-8 transition-transform hover:scale-105 border-t-4 border-green-500">
                <i data-lucide="leaf" class="w-12 h-12 text-green-600 mb-4"></i>
                <h2 class="text-2xl font-semibold mb-4 text-green-800">Laporkan Masalah Lingkungan</h2>
                <p class="text-gray-600 mb-6">
                    Bantu kami menjaga kebersihan Bandung dengan melaporkan masalah sampah dan lingkungan. 
                    Partisipasi Anda sangat berarti untuk mewujudkan Bandung yang lebih bersih dan sehat.
                </p>
                @auth
                    <a href="{{ route('garbage-reporting') }}" 
                        class="inline-flex items-center text-green-600 hover:text-green-800 font-semibold group">
                        Buat Laporan
                        <i data-lucide="arrow-right" class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                @else
                    <a href="{{ route('login', ['redirect' => 'garbage-reporting']) }}" 
                        class="inline-flex items-center text-green-600 hover:text-green-800 font-semibold group">
                        Buat Laporan
                        <i data-lucide="arrow-right" class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                @endauth
            </div>
        </section>

        <!-- Mengapa Section -->
        <section class="text-center py-12 bg-green-100 rounded-xl my-12">
            <h2 class="text-3xl font-semibold mb-8 text-green-800">Mengapa Harus Menjaga Lingkungan?</h2>
            <div class="grid md:grid-cols-3 gap-8 px-4">
                <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-xl transition-shadow">
                    <i data-lucide="heart" class="w-8 h-8 text-green-600 mx-auto mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2 text-green-800">Kesehatan Bersama</h3>
                    <p class="text-gray-600">Lingkungan yang bersih menciptakan masyarakat yang sehat.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-xl transition-shadow">
                    <i data-lucide="sprout" class="w-8 h-8 text-green-600 mx-auto mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2 text-green-800">Kelestarian Alam</h3>
                    <p class="text-gray-600">Menjaga keseimbangan ekosistem untuk masa depan.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-xl transition-shadow">
                    <i data-lucide="users" class="w-8 h-8 text-green-600 mx-auto mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2 text-green-800">Gotong Royong</h3>
                    <p class="text-gray-600">Bersama-sama menciptakan lingkungan yang lebih baik.</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-green-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center space-x-6 mb-4">
                <i data-lucide="recycle" class="w-6 h-6"></i>
                <i data-lucide="flower" class="w-6 h-6"></i>
                <i data-lucide="tree" class="w-6 h-6"></i>
            </div>
            <p>&copy; 2023 Bandung Hijau & Lestari. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>