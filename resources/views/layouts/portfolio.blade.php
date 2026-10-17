<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portafolio Profesional')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e3a8a',
                        secondary: '#0ea5e9',
                        accent: '#f59e0b',
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        .gradient-bg { background: linear-gradient(135deg, #1e3a8a 0%, #0ea5e9 100%); }
        .skill-bar { transition: width 1.5s ease-in-out; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .fade-in { animation: fadeIn 0.8s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navegación -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md shadow-sm">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="#inicio" class="text-xl font-bold text-primary">
                <i class="fas fa-code mr-2 text-secondary"></i>Portafolio
            </a>
            <button id="menuBtn" class="md:hidden text-gray-700 text-2xl">
                <i class="fas fa-bars"></i>
            </button>
            <ul id="navMenu" class="hidden md:flex space-x-6 text-sm font-medium">
                <li><a href="#inicio" class="hover:text-secondary transition">Inicio</a></li>
                <li><a href="#perfil" class="hover:text-secondary transition">Perfil</a></li>
                <li><a href="#experiencia" class="hover:text-secondary transition">Experiencia</a></li>
                <li><a href="#educacion" class="hover:text-secondary transition">Educación</a></li>
                <li><a href="#habilidades" class="hover:text-secondary transition">Habilidades</a></li>
                <li><a href="#proyectos" class="hover:text-secondary transition">Proyectos</a></li>
                <li><a href="#contacto" class="hover:text-secondary transition">Contacto</a></li>
            </ul>
        </div>
        <ul id="mobileMenu" class="hidden md:hidden bg-white border-t px-4 py-3 space-y-2 text-sm">
            <li><a href="#inicio" class="block py-1 hover:text-secondary">Inicio</a></li>
            <li><a href="#perfil" class="block py-1 hover:text-secondary">Perfil</a></li>
            <li><a href="#experiencia" class="block py-1 hover:text-secondary">Experiencia</a></li>
            <li><a href="#educacion" class="block py-1 hover:text-secondary">Educación</a></li>
            <li><a href="#habilidades" class="block py-1 hover:text-secondary">Habilidades</a></li>
            <li><a href="#proyectos" class="block py-1 hover:text-secondary">Proyectos</a></li>
            <li><a href="#contacto" class="block py-1 hover:text-secondary">Contacto</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-8 mt-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p class="mb-3">
                @if($profile ?? null)
                    &copy; {{ date('Y') }} {{ $profile->full_name }}. Todos los derechos reservados.
                @else
                    &copy; {{ date('Y') }} Portafolio Profesional.
                @endif
            </p>
            <div class="flex justify-center space-x-5 text-xl">
                @if(($profile ?? null) && $profile->github_url)
                    <a href="{{ $profile->github_url }}" target="_blank" class="hover:text-white transition"><i class="fab fa-github"></i></a>
                @endif
                @if(($profile ?? null) && $profile->linkedin_url)
                    <a href="{{ $profile->linkedin_url }}" target="_blank" class="hover:text-white transition"><i class="fab fa-linkedin"></i></a>
                @endif
                @if(($profile ?? null) && $profile->email)
                    <a href="mailto:{{ $profile->email }}" class="hover:text-white transition"><i class="fas fa-envelope"></i></a>
                @endif
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('menuBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => document.getElementById('mobileMenu').classList.add('hidden'));
        });
    </script>
</body>
</html>
