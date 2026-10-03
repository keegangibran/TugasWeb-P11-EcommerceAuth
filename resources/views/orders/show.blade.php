<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Pesanan
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Informasi lengkap pesanan kamu.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Back -->
            <a
                href="{{ route('orders.index') }}"
                class="inline-flex items-center text-sm font-semibold text-green-700 hover:text-green-800 mb-6"
            >
                ← Kembali ke Pesanan Saya
            </a>

            <!-- Order Header -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-5">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div>
                        <p class="text-sm text-gray-500">
                            Nomor Pesanan
                        </p>

                        <h1 class="text-xl font-bold text-gray-800 mt-1">
                            {{ $order->order_number }}
                        </h1>

                        <p class="text-sm text-gray-500 mt-2">
                            {{ $order->ordered_at->format('d M Y, H:i') }}
                        </p>
                    </div>

                    <div>

                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold
                            @if ($order->status === 'pending')
                                bg-yellow-100 text-yellow-700
                            @elseif ($order->status === 'completed')
                                bg-green-100 text-green-700
                            @elseif ($order->status === 'cancelled')
                                bg-red-100 text-red-700
                            @else
                                bg-gray-100 text-gray-700
                            @endif
                        ">
                            {{ ucfirst($order->status) }}
                        </span>

                    </div>

                </div>

            </div>

            <!-- Products -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-5">

                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800">
                        Produk
                    </h2>
                </div>

                <div class="divide-y divide-gray-100">

                    @foreach ($order->orderItems as $item)

                        <div class="p-6 flex flex-col sm:flex-row sm:items-center gap-4">

                            <!-- Product Image -->
                            <div class="w-20 h-20 rounded-xl bg-green-50 flex items-center justify-center overflow-hidden shrink-0">

                                @if ($item->product?->image)

                                    <img
                                        src="{{ $item->product->image }}"
                                        alt="{{ $item->product->name }}"
                                        class="w-full h-full object-cover"
                                    >

                                @else

                                    <span class="text-3xl">
                                        🛒
                                    </span>

                                @endif

                            </div>

                            <!-- Product Info -->
                            <div class="flex-1">

                                <h3 class="font-semibold text-gray-800">
                                    {{ $item->product?->name ?? 'Produk tidak tersedia' }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $item->quantity }} {{ $item->product?->unit ?? '' }}
                                    ×
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </p>

                            </div>

                            <!-- Subtotal -->
                            <div class="text-left sm:text-right">

                                <p class="text-sm text-gray-500">
                                    Subtotal
                                </p>

                                <p class="font-bold text-gray-800 mt-1">
                                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

            <!-- Summary -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- Payment -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                    <h2 class="text-lg font-bold text-gray-800">
                        Pembayaran
                    </h2>

                    @if ($order->payment)

                        <div class="mt-4 space-y-3">

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">
                                    Metode
                                </span>

                                <span class="font-medium text-gray-800">
                                    {{ strtoupper($order->payment->method) }}
                                </span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">
                                    Status
                                </span>

                                <span class="font-medium text-gray-800">
                                    {{ ucfirst($order->payment->status) }}
                                </span>
                            </div>

                        </div>

                    @else

                        <p class="text-sm text-gray-500 mt-4">
                            Informasi pembayaran belum tersedia.
                        </p>

                    @endif

                </div>

                <!-- Total -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                    <h2 class="text-lg font-bold text-gray-800">
                        Ringkasan Pesanan
                    </h2>

                    <div class="mt-4 pt-4 border-t border-gray-100">

                        <div class="flex justify-between items-center">

                            <span class="text-gray-500">
                                Total
                            </span>

                            <span class="text-xl font-bold text-green-700">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>