<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-semibold mb-6">
                        Edit: {{ $product->name }}
                    </h3>

                    @if ($errors->any())
                        <div class="mb-6 rounded-lg bg-red-100 p-4 text-red-700">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        action="{{ route('products.update', $product) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label
                                for="name"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Nama Produk
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $product->name) }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label
                                for="price"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Harga
                            </label>

                            <input
                                type="number"
                                id="price"
                                name="price"
                                value="{{ old('price', $product->price) }}"
                                min="0"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="mb-6">
                            <label
                                for="stock"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Stok
                            </label>

                            <input
                                type="number"
                                id="stock"
                                name="stock"
                                value="{{ old('stock', $product->stock) }}"
                                min="0"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="flex gap-3">
                            <button
                                type="submit"
                                style="background-color: #3F72AF; color: white;"
                                class="px-5 py-3 rounded-md font-medium hover:opacity-90"
                            >
                                Simpan Perubahan
                            </button>

                            <a
                                href="{{ route('shop.products.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300"
                            >
                                Batal
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>