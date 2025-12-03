@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Detalle del Producto</h2>
    <a href="{{ route('products.index') }}"
      class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition">
      Volver
    </a>
  </div>

  <div class="space-y-4">
    <div class="border-b pb-3">
      <label class="text-gray-600 font-semibold block mb-1">ID</label>
      <p class="text-gray-800 text-lg">{{ $product->id }}</p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 font-semibold block mb-1">Nombre</label>
      <p class="text-gray-800 text-lg">{{ $product->name }}</p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 font-semibold block mb-1">Descripción</label>
      <p class="text-gray-800">{{ $product->description ?? 'Sin descripción' }}</p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 font-semibold block mb-1">Precio</label>
      <p class="text-gray-800 text-lg font-bold text-green-600">
        ${{ number_format($product->price, 2) }}
      </p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 font-semibold block mb-1">Stock</label>
      <p class="text-gray-800 text-lg">{{ $product->stock }} unidades</p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 font-semibold block mb-1">Fecha de Creación</label>
      <p class="text-gray-800">{{ $product->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="pb-3">
      <label class="text-gray-600 font-semibold block mb-1">Última Actualización</label>
      <p class="text-gray-800">{{ $product->updated_at->format('d/m/Y H:i') }}</p>
    </div>
  </div>

  <div class="flex gap-4 mt-6">
    <a href="{{ route('products.edit', $product) }}"
      class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg transition">
      Editar
    </a>
    <form action="{{ route('products.destroy', $product) }}"
      method="POST"
      onsubmit="return confirm('¿Estás seguro de eliminar este producto?')"
      class="inline">
      @csrf
      @method('DELETE')
      <button type="submit"
        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition">
        Eliminar
      </button>
    </form>
  </div>
</div>
@endsection