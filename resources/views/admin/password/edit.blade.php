@extends('layouts.admin')

@section('title', 'Cambiar Contraseña')
@section('header', 'Cambiar Contraseña')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-xl">
    <form method="POST" action="{{ route('admin.password.update') }}">
        @csrf
        @method('PUT')

        <!-- Contraseña actual -->
        <div class="mb-5">
            <label for="current_password" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Contraseña actual <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input
                    type="password"
                    name="current_password"
                    id="current_password"
                    autocomplete="current-password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 pr-11 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary @error('current_password') border-red-500 @enderror"
                    value="{{ old('current_password') }}"
                >
                <button type="button" class="toggle-pwd absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600" data-target="current_password">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @error('current_password')
                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
            @enderror
        </div>

        <!-- Nueva contraseña -->
        <div class="mb-5">
            <label for="new_password" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Nueva contraseña <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input
                    type="password"
                    name="new_password"
                    id="new_password"
                    autocomplete="new-password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 pr-11 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary @error('new_password') border-red-500 @enderror"
                >
                <button type="button" class="toggle-pwd absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600" data-target="new_password">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @error('new_password')
                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
            @enderror
            <p class="text-gray-500 text-xs mt-1">Mínimo 8 caracteres. Debe ser diferente a la contraseña actual.</p>
        </div>

        <!-- Confirmar nueva contraseña -->
        <div class="mb-6">
            <label for="new_password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Confirmar nueva contraseña <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input
                    type="password"
                    name="new_password_confirmation"
                    id="new_password_confirmation"
                    autocomplete="new-password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 pr-11 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary"
                >
                <button type="button" class="toggle-pwd absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600" data-target="new_password_confirmation">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="bg-primary hover:bg-blue-900 text-white font-semibold px-6 py-2.5 rounded-lg transition flex items-center gap-2">
                <i class="fas fa-key"></i> Actualizar contraseña
            </button>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium">Cancelar</a>
        </div>
    </form>
</div>

<div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded mt-5 max-w-xl text-sm">
    <h3 class="font-semibold mb-1"><i class="fas fa-shield-alt mr-2"></i>Recomendaciones de seguridad</h3>
    <ul class="list-disc list-inside space-y-0.5 text-blue-600">
        <li>Usa al menos 8 caracteres combinando letras, números y símbolos.</li>
        <li>No reutilices contraseñas de otros sistemas.</li>
        <li>Tras cambiarla, la sesión se regenera automáticamente.</li>
    </ul>
</div>
@endsection

@push('scripts')
<script>
    // Mostrar/ocultar contraseña
    document.querySelectorAll('.toggle-pwd').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const input = document.getElementById(btn.dataset.target);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });
</script>
@endpush
