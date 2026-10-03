<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Checkout
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Periksa kembali pesananmu sebelum membuat pesanan.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Error Message --}}
            @if (session('error'))
                <div class="mb-6 rounded-xl bg-red-100 border border-red-200 px-4 py-3 text-red-800">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Order Items --}}
                <div class="lg:col-span-2 space-y-4">

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                        <h3 class="text-lg font-bold text-gray-800 mb-5">
                            Pesanan Kamu
                        </h3>

                        <div class="space-y-5">

                            @foreach ($cart as $id => $item)

                                <div class="flex items-center gap-4 pb-5 border-b border-gray-100 last:border-0 last:pb-0">

                                    {{-- Image --}}
                                    <div class="w-20 h-20 bg-green-50 rounded-xl flex items-center justify-center overflow-hidden shrink-0">

                                        @if (!empty($item['image']))
                                            <img
                                                src="{{ $item['image'] }}"
                                                alt="{{ $item['name'] }}"
                                                class="w-full h-full object-cover"
                                            >
                                        @else
                                            <span class="text-3xl">🛒</span>
                                        @endif

                                    </div>

                                    {{-- Product --}}
                                    <div class="flex-1">

                                        <h4 class="font-semibold text-gray-800">
                                            {{ $item['name'] }}
                                        </h4>

                                        <p class="text-sm text-gray-500 mt-1">
                                            {{ $item['quantity'] }} {{ $item['unit'] }}
                                            ×
                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                        </p>

                                    </div>

                                    {{-- Subtotal --}}
                                    <div class="text-right">

                                        <p class="font-semibold text-gray-800">
                                            Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                        </p>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

                {{-- Order Summary --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 h-fit">

                    <h3 class="text-lg font-bold text-gray-800">
                        Ringkasan Pesanan
                    </h3>

                    <div class="flex justify-between mt-5 text-gray-600">
                        <span>Total Produk</span>
                        <span>{{ count($cart) }}</span>
                    </div>

                    <div class="border-t border-gray-100 my-4"></div>

                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-800">
                            Total Pembayaran
                        </span>

                        <span class="text-xl font-bold text-green-700">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>

                    {{-- Create Order --}}
                    <form
                        action="{{ route('checkout.store') }}"
                        method="POST"
                        class="mt-6"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="w-full bg-green-700 text-white py-3 px-5 rounded-xl font-semibold hover:bg-green-800 transition"
                        >
                            Buat Pesanan
                        </button>
                    </form>

                    <a
                        href="{{ route('cart.index') }}"
                        class="block text-center mt-4 text-sm font-medium text-green-700 hover:text-green-800"
                    >
                        ← Kembali ke Keranjang
                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>