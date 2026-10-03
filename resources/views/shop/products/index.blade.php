<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Produk FreshMart
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Temukan kebutuhan sehari-hari dan bahan segar pilihan.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Semua Produk
                </h1>

                <p class="text-gray-500 mt-1">
                    Produk yang tersedia di FreshMart
                </p>
            </div>

            {{-- Product Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                @forelse ($products as $product)

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">

                        {{-- Image --}}
                        <div class="h-44 bg-green-50 flex items-center justify-center">

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

                        {{-- Content --}}
                        <div class="p-5">

                            <span class="inline-block text-xs font-medium bg-green-100 text-green-700 px-2.5 py-1 rounded-full">
                                {{ $product->category->name }}
                            </span>

                            <h3 class="font-semibold text-gray-800 mt-3">
                                {{ $product->name }}
                            </h3>

                            <p class="text-green-700 font-bold text-lg mt-3">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>

                            <p class="text-sm text-gray-500 mt-1">
                                Stok: {{ $product->stock }} {{ $product->unit }}
                            </p>

                            <a
                                href="{{ route('shop.products.show', $product) }}"
                                class="inline-block mt-4 text-sm font-semibold text-green-700 hover:text-green-800"
                            >
                                Lihat Detail →
                            </a>

                            @can('update', $product)
                                <a
                                    href="{{ route('products.edit', $product) }}"
                                    class="inline-block mt-4 text-sm font-medium text-green-700 hover:text-green-800"
                                >
                                    Edit Produk
                                </a>
                            @endcan

                        </div>

                    </div>

                @empty

                    <div class="col-span-full bg-white rounded-2xl p-8 text-center text-gray-500">
                        Belum ada produk tersedia.
                    </div>

                @endforelse

            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $products->links() }}
            </div>

        </div>
    </div>

</x-app-layout>