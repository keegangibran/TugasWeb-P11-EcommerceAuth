<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Keranjang Belanja
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Produk yang kamu pilih di FreshMart.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-6 rounded-xl bg-green-100 border border-green-200 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="mb-6 rounded-xl bg-red-100 border border-red-200 px-4 py-3 text-red-800">
                    {{ session('error') }}
                </div>
            @endif

            @if (count($cart) > 0)

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    {{-- Cart Items --}}
                    <div class="lg:col-span-2 space-y-4">

                        @foreach ($cart as $id => $item)

                            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">

                                <div class="flex items-center gap-4">

                                    {{-- Image --}}
                                    <div class="w-24 h-24 bg-green-50 rounded-xl flex items-center justify-center overflow-hidden shrink-0">

                                        @if (!empty($item['image']))
                                            <img
                                                src="{{ $item['image'] }}"
                                                alt="{{ $item['name'] }}"
                                                class="w-full h-full object-cover"
                                            >
                                        @else
                                            <span class="text-4xl">🛒</span>
                                        @endif

                                    </div>

                                    {{-- Product Info --}}
                                    <div class="flex-1">

                                        <h3 class="font-semibold text-gray-800">
                                            {{ $item['name'] }}
                                        </h3>

                                        <p class="text-green-700 font-bold mt-1">
                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                        </p>

                                        <form
                                            action="{{ route('cart.update', $id) }}"
                                            method="POST"
                                            class="mt-3"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <div class="flex items-center gap-3">

                                                <span class="text-sm font-medium text-gray-600">
                                                    Jumlah:
                                                </span>

                                                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">

                                                    <button
                                                        type="button"
                                                        onclick="this.nextElementSibling.stepDown()"
                                                        class="w-9 h-9 flex items-center justify-center text-lg font-semibold text-gray-600 bg-gray-50 hover:bg-gray-100 transition"
                                                    >
                                                        −
                                                    </button>

                                                    <input
                                                        id="quantity-{{ $id }}"
                                                        type="number"
                                                        name="quantity"
                                                        value="{{ $item['quantity'] }}"
                                                        min="1"
                                                        class="w-12 h-9 text-center border-0 focus:ring-0 text-sm font-semibold text-gray-800"
                                                    >

                                                    <button
                                                        type="button"
                                                        onclick="this.previousElementSibling.stepUp()"
                                                        class="w-9 h-9 flex items-center justify-center text-lg font-semibold text-gray-600 bg-gray-50 hover:bg-gray-100 transition"
                                                    >
                                                        +
                                                    </button>

                                                </div>

                                                <span class="text-sm text-gray-500">
                                                    {{ $item['unit'] }}
                                                </span>

                                                <button
                                                    type="submit"
                                                    class="text-sm font-semibold text-green-700 hover:text-green-800"
                                                >
                                                    Perbarui
                                                </button>

                                            </div>
                                        </form>

                                        <p class="text-sm text-gray-600 mt-2">
                                            Subtotal:
                                            <span class="font-semibold">
                                                Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                            </span>
                                        </p>

                                        <form
                                            action="{{ route('cart.remove', $id) }}"
                                            method="POST"
                                            class="mt-3"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini dari keranjang?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="text-sm font-medium text-red-600 hover:text-red-700"
                                            >
                                                Hapus
                                            </button>
                                        </form>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                    {{-- Summary --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 h-fit">

                        <h3 class="text-lg font-bold text-gray-800">
                            Ringkasan Belanja
                        </h3>

                        <div class="flex justify-between mt-5 text-gray-600">
                            <span>Total Produk</span>
                            <span>{{ count($cart) }}</span>
                        </div>

                        <div class="border-t border-gray-100 my-4"></div>

                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-gray-800">
                                Total
                            </span>

                            <span class="text-xl font-bold text-green-700">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>

                        <a
                            href="{{ route('checkout.index') }}"
                            class="block w-full mt-6 bg-green-700 text-white text-center py-3 px-5 rounded-xl font-semibold hover:bg-green-800 transition"
                        >
                            Lanjut ke Checkout
                        </a>

                        <a
                            href="{{ route('shop.products.index') }}"
                            class="block text-center mt-4 text-sm font-medium text-green-700 hover:text-green-800"
                        >
                            ← Lanjut Belanja
                        </a>

                    </div>

                </div>

            @else

                {{-- Empty Cart --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">

                    <div class="text-6xl mb-4">
                        🛒
                    </div>

                    <h3 class="text-xl font-bold text-gray-800">
                        Keranjang masih kosong
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Yuk, pilih produk FreshMart yang kamu butuhkan.
                    </p>

                    <a
                        href="{{ route('shop.products.index') }}"
                        class="inline-block mt-6 bg-green-700 text-white py-3 px-6 rounded-xl font-semibold hover:bg-green-800 transition"
                    >
                        Mulai Belanja
                    </a>

                </div>

            @endif

        </div>
    </div>

</x-app-layout>