<x-app>
    <x-slot:title>Edit Product</x-slot:title>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ $product->code }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ $product->category }}" required>
        </div>

        <div class="mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-warning text-white me-1">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</x-app>