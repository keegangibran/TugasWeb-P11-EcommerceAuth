<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    FreshMart
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Produk segar dan kebutuhan sehari-hari
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome --}}
            <div class="bg-gradient-to-r from-green-700 to-green-600 rounded-2xl p-6 sm:p-8 mb-8 text-white shadow-sm">
                <p class="text-sm opacity-90 mb-1">
                    Selamat datang,
                </p>

                <h1 class="text-2xl sm:text-3xl font-bold">
                    {{ auth()->user()->name }} 👋
                </h1>

                <p class="mt-2 text-sm sm:text-base opacity-90">
                    Temukan bahan segar dan kebutuhan sehari-hari di FreshMart.
                </p>
            </div>

            {{-- Products --}}
            <div class="mb-5">
                <h2 class="text-xl font-semibold text-gray-800">
                    Produk Tersedia
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Pilihan produk FreshMart untuk kamu
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                @forelse ($products as $product)

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition">

                        {{-- Product image --}}
                        <div class="h-40 bg-green-50 flex items-center justify-center">
                            @if ($product->image)
                                <img
                                    src="{{ $product->image }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover"
                                >
                            @else
                                <span class="text-5xl">🛒</span>
                            @endif
                        </div>

                        <div class="p-5">

                            <span class="inline-block text-xs font-medium bg-green-100 text-green-700 px-2.5 py-1 rounded-full">
                                {{ $product->category->name }}
                            </span>

                            <h3 class="font-semibold text-gray-800 mt-3 line-clamp-2">
                                {{ $product->name }}
                            </h3>

                            <p class="text-green-700 font-bold text-lg mt-3">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>

                            <p class="text-sm text-gray-500 mt-1">
                                Stok: {{ $product->stock }} {{ $product->unit }}
                            </p>

                            <div class="mt-4 flex items-center gap-4">

                                <a
                                    href="{{ route('shop.products.show', $product) }}"
                                    class="text-sm font-semibold text-green-700 hover:text-green-800"
                                >
                                    Lihat Detail →
                                </a>

                                @can('update', $product)
                                    <a
                                        href="{{ route('products.edit', $product) }}"
                                        class="text-sm font-semibold text-gray-600 hover:text-gray-800"
                                    >
                                        Edit Produk
                                    </a>
                                @endcan

                            </div>

                        </div>
                    </div>

                @empty

                    <div class="col-span-full bg-white rounded-xl p-8 text-center text-gray-500">
                        Belum ada produk tersedia.
                    </div>

                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>