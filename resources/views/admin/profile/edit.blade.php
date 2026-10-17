@extends('layouts.admin')
@section('title', 'Editar Perfil')
@section('header', 'Perfil Profesional')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-4xl">
    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h3 class="font-bold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-camera mr-2 text-secondary"></i>Foto de Perfil</h3>
        <div class="flex items-center gap-6 mb-6 flex-wrap">
            <div class="relative">
                <img id="photoPreview"
                    src="{{ $profile->photo_path ? asset($profile->photo_path) : '' }}"
                    class="w-32 h-32 rounded-full object-cover border-4 border-secondary/30 shadow-md {{ $profile->photo_path ? '' : 'hidden' }}"
                    alt="Foto de perfil">
                <div id="photoPlaceholder" class="w-32 h-32 rounded-full bg-gray-100 border-4 border-dashed border-gray-300 flex items-center justify-center {{ $profile->photo_path ? 'hidden' : '' }}">
                    <i class="fas fa-user text-4xl text-gray-400"></i>
                </div>
            </div>
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-2">Subir / Cambiar foto</label>
                <input type="file" name="photo" id="photoInput" accept="image/jpeg,image/png,image/gif,image/webp"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-secondary file:text-white hover:file:bg-sky-600 cursor-pointer">
                <p class="text-xs text-gray-400 mt-2">Formatos: JPG, PNG, GIF, WEBP — Máximo 2MB</p>
                @if($profile->photo_path)
                <label class="flex items-center gap-2 mt-3 text-sm text-red-500 cursor-pointer">
                    <input type="checkbox" name="remove_photo" value="1" class="w-4 h-4 rounded">
                    <i class="fas fa-trash"></i> Eliminar foto actual
                </label>
                @endif
            </div>
        </div>

        <h3 class="font-bold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-user mr-2 text-secondary"></i>Información General</h3>
        <div class="grid md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo *</label>
                <input type="text" name="full_name" value="{{ old('full_name', $profile->full_name) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Título / Profesión *</label>
                <input type="text" name="title" value="{{ old('title', $profile->title) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Biografía / Perfil Profesional *</label>
                <textarea name="bio" rows="4" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">{{ old('bio', $profile->bio) }}</textarea>
            </div>
        </div>

        <h3 class="font-bold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-address-card mr-2 text-secondary"></i>Contacto</h3>
        <div class="grid md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                <input type="email" name="email" value="{{ old('email', $profile->email) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono Celular *</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono Alternativo</label>
                <input type="text" name="phone_alt" value="{{ old('phone_alt', $profile->phone_alt) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Idiomas (separados por coma)</label>
                <input type="text" name="languages" value="{{ old('languages', $profile->languages) }}" placeholder="Español,Inglés"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                <input type="text" name="address" value="{{ old('address', $profile->address) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad / Localidad</label>
                <input type="text" name="city" value="{{ old('city', $profile->city) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                <input type="text" name="state" value="{{ old('state', $profile->state) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">País</label>
                <input type="text" name="country" value="{{ old('country', $profile->country) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Código Postal</label>
                <input type="text" name="postal_code" value="{{ old('postal_code', $profile->postal_code) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label>
                <input type="date" name="birth_date" value="{{ old('birth_date', $profile->birth_date?->format('Y-m-d')) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nacionalidad</label>
                <input type="text" name="nationality" value="{{ old('nationality', $profile->nationality) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estado Civil</label>
                <input type="text" name="marital_status" value="{{ old('marital_status', $profile->marital_status) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
        </div>

        <h3 class="font-bold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-link mr-2 text-secondary"></i>Enlaces</h3>
        <div class="grid md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $profile->github_url) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn URL</label>
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sitio Web URL</label>
                <input type="url" name="website_url" value="{{ old('website_url', $profile->website_url) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
        </div>

        <button type="submit" class="bg-primary hover:bg-blue-900 text-white font-semibold px-6 py-2.5 rounded-lg transition">
            <i class="fas fa-save mr-2"></i>Guardar Perfil
        </button>
    </form>
</div>

<script>
    document.getElementById('photoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                const preview = document.getElementById('photoPreview');
                const placeholder = document.getElementById('photoPlaceholder');
                preview.src = ev.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
