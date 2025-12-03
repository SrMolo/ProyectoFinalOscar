@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
<div class="bg-white rounded-2xl shadow-2xl p-8 card-hover">
  <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
    <div>
      <h2 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
        Productos
      </h2>
      <p class="text-gray-500 mt-2">Administra tu inventario de manera eficiente</p>
    </div>
    <a href="{{ route('products.create') }}"
      class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white px-8 py-3 rounded-xl transition transform hover:scale-105 shadow-lg flex items-center space-x-2 font-semibold">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
      </svg>
      <span>Nuevo Producto</span>
    </a>
  </div>

  @if($products->count() > 0)
  <!-- Vista de tarjetas en pantallas grandes -->
  <div class="hidden md:block overflow-x-auto">
    <table class="w-full">
      <thead>
        <tr class="bg-gradient-to-r from-purple-100 to-pink-100 text-gray-700">
          <th class="px-6 py-4 text-left rounded-tl-xl font-bold">ID</th>
          <th class="px-6 py-4 text-left font-bold">Nombre</th>
          <th class="px-6 py-4 text-left font-bold">Descripción</th>
          <th class="px-6 py-4 text-left font-bold">Precio</th>
          <th class="px-6 py-4 text-left font-bold">Stock</th>
          <th class="px-6 py-4 text-center rounded-tr-xl font-bold">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr class="border-b border-gray-100 hover:bg-purple-50 transition">
          <td class="px-6 py-4">
            <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm font-semibold">
              #{{ $product->id }}
            </span>
          </td>
          <td class="px-6 py-4 font-semibold text-gray-800">{{ $product->name }}</td>
          <td class="px-6 py-4 text-gray-600 text-sm">
            {{ Str::limit($product->description, 40) ?? 'Sin descripción' }}
          </td>
          <td class="px-6 py-4">
            <span class="text-green-600 font-bold text-lg">
              ${{ number_format($product->price, 2) }}
            </span>
          </td>
          <td class="px-6 py-4">
            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">
              {{ $product->stock }} unid.
            </span>
          </td>
          <td class="px-6 py-4">
            <div class="flex justify-center gap-2">
              <a href="{{ route('products.show', $product) }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition transform hover:scale-105 shadow">
                Ver
              </a>
              <a href="{{ route('products.edit', $product) }}"
                class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg text-sm transition transform hover:scale-105 shadow">
                Editar
              </a>
              <form action="{{ route('products.destroy', $product) }}"
                method="POST"
                onsubmit="return confirm('¿Estás seguro?')"
                class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm transition transform hover:scale-105 shadow">
                  Eliminar
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Vista de tarjetas en móvil -->
  <div class="md:hidden space-y-4">
    @foreach($products as $product)
    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 shadow-lg">
      <div class="flex justify-between items-start mb-4">
        <h3 class="text-xl font-bold text-gray-800">{{ $product->name }}</h3>
        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs font-semibold">
          #{{ $product->id }}
        </span>
      </div>
      <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 60) ?? 'Sin descripción' }}</p>
      <div class="flex justify-between items-center mb-4">
        <span class="text-green-600 font-bold text-2xl">${{ number_format($product->price, 2) }}</span>
        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">
          Stock: {{ $product->stock }}
        </span>
      </div>
      <div class="flex gap-2">
        <a href="{{ route('products.show', $product) }}" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg text-center transition">
          Ver
        </a>
        <a href="{{ route('products.edit', $product) }}" class="flex-1 bg-amber-500 hover:bg-amber-600 text-white py-2 rounded-lg text-center transition">
          Editar
        </a>
        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('¿Estás seguro?')" class="flex-1">
          @csrf
          @method('DELETE')
          <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg transition">
            Eliminar
          </button>
        </form>
      </div>
    </div>
    @endforeach
  </div>

  <div class="mt-8">
    {{ $products->links() }}
  </div>
  @else
  <div class="text-center py-16">
    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
    </svg>
    <p class="text-gray-500 text-xl">No hay productos registrados</p>
    <p class="text-gray-400 mt-2">Comienza agregando tu primer producto</p>
  </div>
  @endif
</div>
@endsection