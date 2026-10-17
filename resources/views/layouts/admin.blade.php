<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Admin') - Portafolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            theme: { extend: { colors: { primary: '#1e3a8a', secondary: '#0ea5e9', accent: '#f59e0b' } } }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-gray-900 text-gray-300 flex-shrink-0 fixed h-full z-40 -translate-x-full md:translate-x-0 transition-transform">
        <div class="p-5 border-b border-gray-700">
            <h1 class="text-xl font-bold text-white"><i class="fas fa-cogs mr-2 text-secondary"></i>Panel Admin</h1>
            <p class="text-xs text-gray-400 mt-1">Gestión de Portafolio</p>
        </div>
        <nav class="p-3 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-tachometer-alt w-5"></i>Dashboard
            </a>
            <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.profile.*') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-user w-5"></i>Perfil
            </a>
            <a href="{{ route('admin.password.edit') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.password.*') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-key w-5"></i>Cambiar Contraseña
            </a>
            <a href="{{ route('admin.experiences.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.experiences.*') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-briefcase w-5"></i>Experiencias
            </a>
            <a href="{{ route('admin.education.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.education.*') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-graduation-cap w-5"></i>Educación
            </a>
            <a href="{{ route('admin.skills.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.skills.*') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-code w-5"></i>Habilidades
            </a>
            <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.projects.*') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-laptop-code w-5"></i>Proyectos
            </a>
            <a href="{{ route('admin.messages.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.messages.*') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-envelope w-5"></i>Mensajes
                @php $unread = \App\Models\Message::where('read', false)->count(); @endphp
                @if($unread > 0)
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">{{ $unread }}</span>
                @endif
            </a>
            <div class="border-t border-gray-700 my-3"></div>
            <a href="{{ route('portfolio.index') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 hover:text-white transition">
                <i class="fas fa-external-link-alt w-5"></i>Ver Portafolio
            </a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-red-600 hover:text-white transition text-left">
                    <i class="fas fa-sign-out-alt w-5"></i>Cerrar Sesión
                </button>
            </form>
        </nav>
    </aside>

    <!-- Overlay móvil -->
    <div id="overlay" class="fixed inset-0 bg-black/50 z-30 hidden md:hidden"></div>

    <!-- Contenido principal -->
    <div class="flex-1 md:ml-64 flex flex-col min-w-0">
        <!-- Topbar -->
        <header class="bg-white shadow-sm px-4 py-3 flex items-center justify-between sticky top-0 z-20">
            <button id="menuToggle" class="md:hidden text-2xl text-gray-700"><i class="fas fa-bars"></i></button>
            <h2 class="text-lg font-semibold text-gray-700 hidden md:block">@yield('header', 'Dashboard')</h2>
            <div class="flex items-center gap-3 ml-auto">
                <span class="text-sm text-gray-600"><i class="fas fa-user-circle mr-1"></i>{{ auth()->user()->name ?? 'Admin' }}</span>
            </div>
        </header>

        <main class="flex-1 p-4 md:p-6">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-5 text-sm">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-5 text-sm">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="bg-white border-t px-6 py-3 text-xs text-gray-500 text-center">
            Sistema de Portafolio Profesional &copy; {{ date('Y') }} — Laravel 13
        </footer>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    document.getElementById('menuToggle').addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    });
    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });
</script>
@stack('scripts')
</body>
</html>
