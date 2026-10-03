<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pesanan Berhasil
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Terima kasih sudah berbelanja di FreshMart.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Success --}}
            @if (session('success'))
                <div class="mb-6 rounded-xl bg-green-100 border border-green-200 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Order Success Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">

                <div class="text-6xl mb-4">
                    ✅
                </div>

                <h1 class="text-2xl font-bold text-gray-800">
                    Pesanan berhasil dibuat!
                </h1>

                <p class="text-gray-500 mt-2">
                    Pesanan kamu sudah tercatat di sistem FreshMart.
                </p>

                {{-- Order Number --}}
                <div class="mt-6 p-4 bg-green-50 rounded-xl">
                    <p class="text-sm text-gray-500">
                        Nomor Pesanan
                    </p>

                    <p class="text-lg font-bold text-green-700 mt-1">
                        {{ $order->order_number }}
                    </p>
                </div>

                {{-- Order Status --}}
                <div class="mt-5">
                    <p class="text-sm text-gray-500">
                        Status Pesanan
                    </p>

                    <span class="inline-block mt-2 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                {{-- Order Items --}}
                <div class="mt-8 text-left">

                    <h3 class="font-bold text-gray-800 mb-4">
                        Detail Pesanan
                    </h3>

                    <div class="space-y-3">

                        @foreach ($order->orderItems as $item)

                            <div class="flex justify-between items-center border-b border-gray-100 pb-3">

                                <div>
                                    <p class="font-medium text-gray-800">
                                        {{ $item->product->name }}
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        {{ $item->quantity }} ×
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </p>
                                </div>

                                <p class="font-semibold text-gray-800">
                                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                </p>

                            </div>

                        @endforeach

                    </div>

                </div>

                {{-- Total --}}
                <div class="border-t border-gray-200 mt-6 pt-5 flex justify-between items-center">

                    <span class="font-semibold text-gray-800">
                        Total Pembayaran
                    </span>

                    <span class="text-xl font-bold text-green-700">
                        Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                    </span>

                </div>

                {{-- Payment --}}
                @if ($order->payment)
                    <div class="mt-5 p-4 bg-gray-50 rounded-xl text-left">

                        <p class="text-sm text-gray-500">
                            Metode Pembayaran
                        </p>

                        <p class="font-semibold text-gray-800 mt-1">
                            {{ strtoupper(str_replace('_', ' ', $order->payment->method)) }}
                        </p>

                        <p class="text-sm text-gray-500 mt-2">
                            Status Pembayaran:
                            <span class="font-medium text-yellow-600">
                                {{ ucfirst($order->payment->status) }}
                            </span>
                        </p>

                    </div>
                @endif

                {{-- Actions --}}
                <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">

                    <a
                        href="{{ route('shop.products.index') }}"
                        class="bg-green-700 text-white py-3 px-6 rounded-xl font-semibold hover:bg-green-800 transition"
                    >
                        Lanjut Belanja
                    </a>

                    <a
                        href="{{ route('dashboard') }}"
                        class="border border-gray-300 text-gray-700 py-3 px-6 rounded-xl font-semibold hover:bg-gray-50 transition"
                    >
                        Ke Dashboard
                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>