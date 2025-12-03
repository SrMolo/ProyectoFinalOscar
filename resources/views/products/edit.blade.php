@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
  <h2 class="text-3xl font-bold text-gray-800 mb-6">Editar Producto</h2>

  <form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label class="block text-gray-700 font-semibold mb-2">Nombre</label>
      <input type="text"
        name="name"
        value="{{ old('name', $product->name) }}"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
      @error('name')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 font-semibold mb-2">Descripción</label>
      <textarea name="description"
        rows="4"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
      @error('description')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 font-semibold mb-2">Precio</label>
      <input type="number"
        name="price"
        step="0.01"
        value="{{ old('price', $product->price) }}"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror">
      @error('price')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label class="block text-gray-700 font-semibold mb-2">Stock</label>
      <input type="number"
        name="stock"
        value="{{ old('stock', $product->stock) }}"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('stock') border-red-500 @enderror">
      @error('stock')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex gap-4">
      <button type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
        Actualizar
      </button>
      <a href="{{ route('products.index') }}"
        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition">
        Cancelar
      </a>
    </div>
  </form>
</div>
@endsection