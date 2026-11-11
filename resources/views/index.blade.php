<x-app-layout>
    <x-slot:title>Product</x-slot:title>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th style="width: 50px;">#</th>
                    <th>name</th>
                    <th>code</th>
                    <th>price</th>
                    <th>stock</th>
                    <th>category</th>
                    <th style="width: 150px;">action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td class="fw-bold">{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->category }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning text-white btn-sm px-3">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-3">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>