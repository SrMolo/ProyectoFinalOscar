<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'CRUD Laravel')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes slideDown {
      from {
        transform: translateY(-100%);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-slideDown {
      animation: slideDown 0.5s ease-out;
    }

    .animate-fadeIn {
      animation: fadeIn 0.6s ease-out;
    }

    .gradient-bg {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .card-hover {
      transition: all 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
  </style>
</head>

<body class="bg-gradient-to-br from-purple-50 via-pink-50 to-blue-50 min-h-screen">
  <!-- Navbar -->
  <nav class="gradient-bg shadow-2xl animate-slideDown">
    <div class="container mx-auto px-6 py-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
          </div>
          <h1 class="text-2xl font-bold text-white">Gestión de Productos</h1>
        </div>
        <a href="{{ route('products.index') }}" class="text-white hover:text-purple-200 transition font-semibold flex items-center space-x-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          <span>Inicio</span>
        </a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mx-auto mt-8 px-4 pb-12 animate-fadeIn">
    @if(session('success'))
    <div class="bg-gradient-to-r from-green-400 to-green-500 text-white px-6 py-4 rounded-xl shadow-lg mb-6 animate-fadeIn flex items-center space-x-3">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span class="font-semibold">{{ session('success') }}</span>
    </div>
    @endif

    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white mt-12 py-6">
    <div class="container mx-auto text-center">
      <p class="text-sm">© 2025 Sistema CRUD - Desarrollado con Laravel</p>
    </div>
  </footer>
</body>

</html>