<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pesanan Saya
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Lihat riwayat pesanan kamu di FreshMart.
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

            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Riwayat Pesanan
                </h1>

                <p class="text-gray-500 mt-1">
                    Semua pesanan yang pernah kamu buat.
                </p>
            </div>

            @forelse ($orders as $order)

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-4">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                        <div>
                            <p class="text-sm text-gray-500">
                                Nomor Pesanan
                            </p>

                            <h3 class="font-bold text-gray-800 mt-1">
                                {{ $order->order_number }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-2">
                                {{ $order->ordered_at->format('d M Y, H:i') }}
                            </p>
                        </div>

                        <div class="text-left md:text-right">

                            <p class="text-sm text-gray-500">
                                Total
                            </p>

                            <p class="text-lg font-bold text-green-700 mt-1">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </p>

                            <span class="inline-block mt-2 px-3 py-1 rounded-full text-xs font-semibold
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

                    <div class="mt-5 pt-5 border-t border-gray-100 flex items-center justify-between">

                        <p class="text-sm text-gray-500">
                            {{ $order->orderItems->count() }} jenis produk
                        </p>

                        <a
                            href="{{ route('orders.show', $order) }}"
                            class="text-sm font-semibold text-green-700 hover:text-green-800"
                        >
                            Lihat Detail →
                        </a>

                    </div>

                </div>

            @empty

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">

                    <div class="text-5xl mb-4">
                        🛒
                    </div>

                    <h3 class="text-lg font-bold text-gray-800">
                        Belum ada pesanan
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Kamu belum pernah membuat pesanan di FreshMart.
                    </p>

                    <a
                        href="{{ route('shop.products.index') }}"
                        class="inline-block mt-5 bg-green-700 text-white px-5 py-3 rounded-xl font-semibold hover:bg-green-800 transition"
                    >
                        Mulai Belanja
                    </a>

                </div>

            @endforelse

            <div class="mt-6">
                {{ $orders->links() }}
            </div>

        </div>
    </div>

</x-app-layout>