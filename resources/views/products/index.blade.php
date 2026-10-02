<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produk FreshMart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-semibold mb-4">
                        Daftar Produk
                    </h3>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left p-3">Nama</th>
                                    <th class="text-left p-3">Kategori</th>
                                    <th class="text-left p-3">Harga</th>
                                    <th class="text-left p-3">Stok</th>
                                    <th class="text-left p-3">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="border-b">
                                        <td class="p-3">
                                            {{ $product->name }}
                                        </td>

                                        <td class="p-3">
                                            {{ $product->category->name }}
                                        </td>

                                        <td class="p-3">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>

                                        <td class="p-3">
                                            {{ $product->stock }} {{ $product->unit }}
                                        </td>

                                        <td class="p-3 space-x-2">

                                            @can('update', $product)
                                                <a
                                                    href="{{ route('products.edit', $product) }}"
                                                    class="text-blue-600 hover:underline"
                                                >
                                                    Edit
                                                </a>
                                            @endcan

                                            @can('delete', $product)
                                                <form
                                                    action="{{ route('products.destroy', $product) }}"
                                                    method="POST"
                                                    class="inline"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                                        class="text-red-600 hover:underline"
                                                    >
                                                        Hapus
                                                    </button>
                                                </form>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>