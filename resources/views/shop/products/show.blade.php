<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Produk
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Informasi lengkap produk FreshMart.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 rounded-xl bg-green-100 border border-green-200 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-xl bg-red-100 border border-red-200 px-4 py-3 text-red-800">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Back --}}
            <a
                href="{{ route('shop.products.index') }}"
                class="inline-flex items-center text-sm font-medium text-green-700 hover:text-green-800 mb-6"
            >
                ← Kembali ke Produk
            </a>

            {{-- Product Detail --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="grid grid-cols-1 md:grid-cols-2">

                    {{-- Image --}}
                    <div class="h-80 md:h-full min-h-[400px] bg-green-50 flex items-center justify-center">

                        @if ($product->image)
                            <img
                                src="{{ $product->image }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover"
                            >
                        @else
                            <span class="text-7xl">🛒</span>
                        @endif

                    </div>

                    {{-- Information --}}
                    <div class="p-6 md:p-10">

                        {{-- Category --}}
                        <span class="inline-block text-xs font-medium bg-green-100 text-green-700 px-3 py-1 rounded-full">
                            {{ $product->category->name }}
                        </span>

                        {{-- Name --}}
                        <h1 class="text-3xl font-bold text-gray-800 mt-4">
                            {{ $product->name }}
                        </h1>

                        {{-- Price --}}
                        <p class="text-2xl font-bold text-green-700 mt-5">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>

                        {{-- Description --}}
                        <div class="mt-6">
                            <h3 class="font-semibold text-gray-800">
                                Deskripsi
                            </h3>

                            <p class="text-gray-600 leading-relaxed mt-2">
                                {{ $product->description ?: 'Belum ada deskripsi untuk produk ini.' }}
                            </p>
                        </div>

                        {{-- Stock --}}
                        <div class="mt-6 p-4 bg-gray-50 rounded-xl">
                            <p class="text-sm text-gray-500">
                                Stok tersedia
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $product->stock }} {{ $product->unit }}
                            </p>
                        </div>

                        {{-- Add to Cart --}}
                        <form
                            action="{{ route('cart.add', $product) }}"
                            method="POST"
                            class="mt-6"
                        >
                            @csrf

                            <input
                                type="hidden"
                                name="quantity"
                                value="1"
                            >

                            <button
                                type="submit"
                                class="w-full bg-green-700 text-white py-3 px-5 rounded-xl font-semibold hover:bg-green-800 transition"
                            >
                                Tambah ke Keranjang
                            </button>
                        </form>

                        {{-- Edit --}}
                        @can('update', $product)
                            <a
                                href="{{ route('products.edit', $product) }}"
                                class="block text-center mt-3 text-sm font-medium text-green-700 hover:text-green-800"
                            >
                                Edit Produk
                            </a>
                        @endcan

                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- Reviews -->
    <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-gray-800">
                    Rating & Review
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Review dari pengguna yang telah membeli produk ini.
                </p>
            </div>

            <div class="text-right">
                <p class="text-2xl font-bold text-yellow-500">
                    {{ $product->reviews->avg('rating') ? number_format($product->reviews->avg('rating'), 1) : '—' }}
                    ★
                </p>

                <p class="text-xs text-gray-500">
                    {{ $product->reviews->count() }} review
                </p>
            </div>
        </div>


        <!-- Review Form -->
        @if ($hasPurchased && ! $hasReviewed)

            <div class="mt-6 pt-6 border-t border-gray-100">

                <h3 class="font-semibold text-gray-800">
                    Berikan Review
                </h3>

                <form
                    action="{{ route('reviews.store', $product) }}"
                    method="POST"
                    class="mt-4"
                >
                    @csrf

                    <div>
                        <label
                            for="rating"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Rating
                        </label>

                        <select
                            id="rating"
                            name="rating"
                            class="mt-1 block w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500"
                        >
                            <option value="">Pilih rating</option>
                            <option value="5">★★★★★ — Sangat Baik</option>
                            <option value="4">★★★★☆ — Baik</option>
                            <option value="3">★★★☆☆ — Cukup</option>
                            <option value="2">★★☆☆☆ — Kurang</option>
                            <option value="1">★☆☆☆☆ — Sangat Kurang</option>
                        </select>

                        @error('rating')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="mt-4">

                        <label
                            for="comment"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Komentar
                        </label>

                        <textarea
                            id="comment"
                            name="comment"
                            rows="4"
                            maxlength="1000"
                            class="mt-1 block w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500"
                            placeholder="Bagaimana pengalaman kamu dengan produk ini?"
                        >{{ old('comment') }}</textarea>

                        @error('comment')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <button
                        type="submit"
                        class="mt-4 bg-green-700 text-white px-5 py-3 rounded-xl font-semibold hover:bg-green-800 transition"
                    >
                        Kirim Review
                    </button>

                </form>

            </div>

        @elseif ($hasReviewed)

            <div class="mt-6 pt-6 border-t border-gray-100">
                <p class="text-sm text-green-700 font-medium">
                    ✓ Kamu sudah memberikan review untuk produk ini.
                </p>
            </div>

        @endif


        <!-- Review List -->
        <div class="mt-6 pt-6 border-t border-gray-100">

            @forelse ($product->reviews as $review)

                <div class="py-5 border-b border-gray-100 last:border-0">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="font-semibold text-gray-800">
                                {{ $review->user->name }}
                            </p>

                            <p class="text-yellow-500 text-sm mt-1">
                                {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                            </p>
                        </div>

                        <p class="text-xs text-gray-400">
                            {{ $review->created_at->format('d M Y') }}
                        </p>

                    </div>

                    <p class="text-sm text-gray-600 mt-3">
                        {{ $review->comment }}
                    </p>

                </div>

            @empty

                <div class="py-6 text-center text-gray-500">
                    Belum ada review untuk produk ini.
                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>