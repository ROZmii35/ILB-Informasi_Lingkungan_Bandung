<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Lingkungan Bandung</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-green-600 text-white p-8">
        <div class="container mx-auto">
            <a href="{{ route('homepage') }}" class="text-white hover:text-green-100 mb-4 inline-block">
                <i data-lucide="arrow-left" class="w-6 h-6 inline-block"></i> Kembali
            </a>
            <h1 class="text-4xl font-bold text-center">Wisata Lingkungan di Bandung</h1>
        </div>
    </header>

    <main class="container mx-auto mt-8 p-4">
        <section class="mb-12">
            <h2 class="text-3xl font-semibold mb-8 text-center text-green-800">Destinasi Wisata Ramah Lingkungan</h2>
            
            <!-- Search & Filter -->
            <div class="mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="relative w-full md:w-96">
                    <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input type="text" 
                           id="searchInput"
                           placeholder="Cari destinasi wisata..." 
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div class="flex flex-wrap gap-2" id="tagFilters">
                    <button class="px-4 py-1 rounded-full bg-green-100 text-green-800 hover:bg-green-200 tag-filter" data-tag="eco-friendly">
                        Eco-Friendly
                    </button>
                    <button class="px-4 py-1 rounded-full bg-green-100 text-green-800 hover:bg-green-200 tag-filter" data-tag="nature">
                        Nature
                    </button>
                    <button class="px-4 py-1 rounded-full bg-green-100 text-green-800 hover:bg-green-200 tag-filter" data-tag="outdoor">
                        Outdoor
                    </button>
                </div>
            </div>

            <!-- Destinations Grid -->
            <div class="grid gap-8 md:grid-cols-2" id="destinationsGrid">
                <!-- Taman Hutan Raya -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden destination-card" data-tags="eco-friendly,nature,outdoor">
                    <img src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/100/2023/12/06/tamanhutanraya-2980236695.jpg" 
                        alt="Taman Hutan Raya" 
                        class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 text-green-800">Taman Hutan Raya Ir. H. Djuanda</h3>
                        <p class="text-gray-600 mb-4">
                            Taman hutan yang luas dengan berbagai jenis flora dan fauna. Tempat yang cocok untuk kegiatan outdoor 
                            dan edukasi lingkungan. Memiliki jalur tracking dan gua-gua peninggalan sejarah.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#eco-friendly</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#nature</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#outdoor</span>
                        </div>
                        <a href="https://www.google.com/maps?q=Tahura+Djuanda+Bandung" 
                            target="_blank"
                            class="inline-flex items-center text-green-600 hover:text-green-800">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                            Lihat di Maps
                        </a>
                    </div>
                </div>

                <!-- Kebun Raya Cibodas -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden destination-card" data-tags="sustainable,tourism,nature">
                    <img src="https://media.suara.com/pictures/970x544/2022/03/09/74222-kebun-raya-cibodas-taveloka.jpg" 
                        alt="Kebun Raya Cibodas" 
                        class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 text-green-800">Kebun Raya Cibodas</h3>
                        <p class="text-gray-600 mb-4">
                            Kebun raya yang terletak di kaki Gunung Gede dengan koleksi tanaman yang beragam. Udara sejuk dan 
                            pemandangan indah, cocok untuk wisata keluarga dan penelitian botani.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#sustainable</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#tourism</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#nature</span>
                        </div>
                        <a href="https://www.google.com/maps?q=Kebun+Raya+Cibodas" 
                           target="_blank"
                           class="inline-flex items-center text-green-600 hover:text-green-800">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                            Lihat di Maps
                        </a>
                    </div>
                </div>

                <!-- Kawah Putih -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden destination-card" data-tags="natural-wonder,photography,tourism">
                    <img src="https://dirgantaracarrental.com/wp-content/uploads/2017/01/Paket-Wisata-Kawah-Putih-Ciwidey1.jpg" 
                         alt="Kawah Putih Ciwidey" 
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 text-green-800">Kawah Putih Ciwidey</h3>
                        <p class="text-gray-600 mb-4">
                            Danau kawah vulkanik dengan air berwarna putih kehijauan. Pemandangan eksotis dan udara sejuk 
                            menjadikannya destinasi populer untuk fotografi dan relaksasi.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#natural-wonder</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#photography</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#tourism</span>
                        </div>
                        <a href="https://www.google.com/maps?q=Kawah+Putih+Ciwidey" 
                           target="_blank"
                           class="inline-flex items-center text-green-600 hover:text-green-800">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                            Lihat di Maps
                        </a>
                    </div>
                </div>

                <!-- Dago Pakar -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden destination-card" data-tags="scenic-view,outdoor,eco-friendly">
                    <img src="https://sr28jambinews.com/wp-content/uploads/2022/09/dago-pakar-bandung2.jpg" 
                         alt="Dago Pakar" 
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 text-green-800">Dago Pakar</h3>
                        <p class="text-gray-600 mb-4">
                            Area perbukitan dengan pemandangan kota Bandung yang menakjubkan. Terdapat berbagai tempat wisata 
                            seperti Taman Hutan Raya, area perkemahan, dan restoran dengan view indah.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#scenic-view</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#outdoor</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#eco-friendly</span>
                        </div>
                        <a href="https://www.google.com/maps?q=Dago+Pakar+Bandung" 
                           target="_blank"
                           class="inline-flex items-center text-green-600 hover:text-green-800">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                            Lihat di Maps
                        </a>
                    </div>
                </div>

                <!-- Tangkuban Perahu -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden destination-card" data-tags="volcano,nature,tourism">
                    <img src="https://asset.kompas.com/crops/ZWav3zD0Uwrmc_-MZX9IGWY6Z4I=/68x0:1931x1242/750x500/data/photo/2021/04/07/606ccdec4dc98.png" 
                         alt="Tangkuban Perahu" 
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 text-green-800">Gunung Tangkuban Perahu</h3>
                        <p class="text-gray-600 mb-4">
                            Gunung berapi aktif dengan pemandangan kawah yang menakjubkan. Pengunjung dapat menikmati 
                            pemandangan kawah dari dekat dan mempelajari aktivitas vulkanik.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#volcano</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#nature</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#tourism</span>
                        </div>
                        <a href="https://www.google.com/maps?q=Gunung+Tangkuban+Perahu" 
                           target="_blank"
                           class="inline-flex items-center text-green-600 hover:text-green-800">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                            Lihat di Maps
                        </a>
                    </div>
                </div>

                <!-- Situ Patenggang -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden destination-card" data-tags="lake,nature,peaceful">
                    <img src="https://img.okezone.com/content/2023/02/16/408/2766122/situ-patenggang-lokasi-fasilitas-dan-harga-tiket-masuk-MHTGT5EN2K.jpg" 
                         alt="Situ Patenggang" 
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 text-green-800">Situ Patenggang</h3>
                        <p class="text-gray-600 mb-4">
                            Danau alami yang dikelilingi perkebunan teh hijau. Pengunjung dapat menikmati ketenangan alam, 
                            bersampan, atau sekadar menikmati pemandangan sambil bersantai.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#lake</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#nature</span>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">#peaceful</span>
                        </div>
                        <a href="https://www.google.com/maps?q=Situ+Patenggang" 
                           target="_blank"
                           class="inline-flex items-center text-green-600 hover:text-green-800">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                            Lihat di Maps
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Search and Filter functionality
        const searchInput = document.getElementById('searchInput');
        const destinationCards = document.querySelectorAll('.destination-card');
        const tagFilters = document.querySelectorAll('.tag-filter');
        let activeFilters = new Set();

        function filterDestinations() {
            const searchTerm = searchInput.value.toLowerCase();
            
            destinationCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                const tags = card.dataset.tags.split(',');
                
                const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
                const matchesTags = activeFilters.size === 0 || 
                                  tags.some(tag => activeFilters.has(tag));
                
                card.style.display = matchesSearch && matchesTags ? 'block' : 'none';
            });
        }

        searchInput.addEventListener('input', filterDestinations);

        tagFilters.forEach(button => {
            button.addEventListener('click', () => {
                const tag = button.dataset.tag;
                button.classList.toggle('bg-green-500');
                button.classList.toggle('text-white');
                
                if (activeFilters.has(tag)) {
                    activeFilters.delete(tag);
                } else {
                    activeFilters.add(tag);
                }
                
                filterDestinations();
            });
        });
    </script>
</body>
</html>