<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FreshMart — Bahan Segar & Kebutuhan Harian</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F1F3E0] text-[#3F4F3F]">

    {{-- Navigation --}}
    <nav class="bg-white border-b border-[#D2DCB6]">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="/" class="text-2xl font-bold text-[#778873]">
                FreshMart
            </a>

            <div class="flex items-center gap-3">

                @auth
                    <a
                        href="{{ route('dashboard') }}"
                        class="px-4 py-2 text-[#778873] font-medium hover:text-[#556653]"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="px-4 py-2 text-[#778873] font-medium hover:text-[#556653]"
                    >
                        Login
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="px-5 py-2.5 bg-[#778873] text-white rounded-xl font-medium hover:bg-[#657562] transition"
                    >
                        Register
                    </a>
                @endauth

            </div>
        </div>
    </nav>


    {{-- Hero --}}
    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <div>

                <span class="inline-block px-4 py-2 bg-[#D2DCB6] text-[#556653] rounded-full text-sm font-semibold mb-5">
                    Belanja lebih segar 🥬
                </span>

                <h1 class="text-5xl md:text-6xl font-bold leading-tight text-[#3F4F3F]">
                    Bahan segar untuk
                    <span class="text-[#778873]">
                        kebutuhan sehari-hari.
                    </span>
                </h1>

                <p class="mt-6 text-lg text-gray-600 max-w-xl leading-relaxed">
                    Temukan sayuran, buah-buahan, daging, seafood,
                    sembako, dan kebutuhan harian lainnya dalam satu tempat.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">

                    @auth
                        <a
                            href="{{ route('shop.products.index') }}"
                            class="px-6 py-3 bg-[#778873] text-white rounded-xl font-semibold hover:bg-[#657562] transition"
                        >
                            Lihat Produk
                        </a>

                        <a
                            href="{{ route('dashboard') }}"
                            class="px-6 py-3 bg-white text-[#778873] border border-[#A1BC98] rounded-xl font-semibold hover:bg-[#F1F3E0] transition"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('register') }}"
                            class="px-6 py-3 bg-[#778873] text-white rounded-xl font-semibold hover:bg-[#657562] transition"
                        >
                            Mulai Belanja
                        </a>

                        <a
                            href="{{ route('login') }}"
                            class="px-6 py-3 bg-white text-[#778873] border border-[#A1BC98] rounded-xl font-semibold hover:bg-[#F1F3E0] transition"
                        >
                            Login
                        </a>
                    @endauth

                </div>

            </div>


            {{-- Illustration --}}
            <div class="relative">

                <div class="bg-[#D2DCB6] rounded-[2rem] p-10 min-h-[400px] flex items-center justify-center">

                    <div class="text-center">

                        <div class="text-8xl mb-6">
                            🥬
                        </div>

                        <div class="text-6xl">
                            🍎 🥕 🥛
                        </div>

                        <p class="mt-6 text-[#556653] font-semibold text-lg">
                            Segar • Praktis • Terpercaya
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- Categories --}}
    <section class="bg-white py-16">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-10">

                <h2 class="text-3xl font-bold text-[#3F4F3F]">
                    Kategori FreshMart
                </h2>

                <p class="mt-2 text-gray-500">
                    Berbagai kebutuhan tersedia untukmu
                </p>

            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">

                @foreach ([
                    ['🥬', 'Sayuran'],
                    ['🍎', 'Buah-buahan'],
                    ['🥩', 'Daging'],
                    ['🐟', 'Ikan & Seafood'],
                    ['🥚', 'Telur'],
                    ['🍚', 'Sembako'],
                    ['🥛', 'Susu & Produk Olahan'],
                    ['🌶️', 'Bumbu & Rempah'],
                ] as $category)

                    <div class="bg-[#F1F3E0] rounded-2xl p-5 text-center hover:-translate-y-1 transition">

                        <div class="text-4xl mb-3">
                            {{ $category[0] }}
                        </div>

                        <p class="text-sm font-semibold text-[#556653]">
                            {{ $category[1] }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    {{-- Footer --}}
    <footer class="bg-[#778873] text-white py-8">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <p class="font-semibold text-lg">
                FreshMart
            </p>

            <p class="text-sm text-[#D2DCB6] mt-2">
                Bahan segar dan kebutuhan sehari-hari dalam satu tempat.
            </p>

            <p class="text-xs text-[#D2DCB6] mt-5">
                © {{ date('Y') }} FreshMart. All rights reserved.
            </p>

        </div>

    </footer>

</body>
</html>