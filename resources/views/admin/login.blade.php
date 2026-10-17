<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Panel Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = { theme: { extend: { colors: { primary: '#1e3a8a', secondary: '#0ea5e9', accent: '#f59e0b' } } } }
    </script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-primary to-secondary p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-lock text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Panel Administrativo</h1>
            <p class="text-gray-500 text-sm mt-1">Ingresa tus credenciales para continuar</p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded mb-5 text-sm">
                @foreach($errors->all() as $error)
                    <p><i class="fas fa-exclamation-circle mr-1"></i>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                <div class="relative">
                    <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <div class="relative">
                    <i class="fas fa-key absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="password" name="password" required
                        class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none">
                </div>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-secondary rounded">
                <label for="remember" class="ml-2 text-sm text-gray-600">Recordarme</label>
            </div>
            <button type="submit" class="w-full bg-primary hover:bg-blue-900 text-white font-semibold py-2.5 rounded-lg transition shadow-lg">
                <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-gray-400 bg-gray-50 p-3 rounded-lg">
            <p class="font-semibold text-gray-500 mb-1">Credenciales por defecto:</p>
            <p>Email: <span class="font-mono">admin@portfolio.com</span></p>
            <p>Contraseña: <span class="font-mono">admin123</span></p>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('portfolio.index') }}" class="text-sm text-secondary hover:underline">
                <i class="fas fa-arrow-left mr-1"></i>Volver al portafolio
            </a>
        </div>
    </div>
</body>
</html>
