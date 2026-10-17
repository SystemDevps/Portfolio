@extends('layouts.admin')
@section('title', isset($skill) ? 'Editar Habilidad' : 'Nueva Habilidad')
@section('header', isset($skill) ? 'Editar Habilidad' : 'Nueva Habilidad')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-xl">
    <form method="POST" action="{{ isset($skill) ? route('admin.skills.update', $skill) : route('admin.skills.store') }}">
        @csrf
        @if(isset($skill)) @method('PUT') @endif

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre de la habilidad *</label>
                <input type="text" name="name" value="{{ old('name', $skill->name ?? '') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Categoría *</label>
                <select name="category" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
                    @php $cats = ['Backend','Frontend','Base de Datos','Herramientas','Sistemas Operativos','Otros']; @endphp
                    @foreach($cats as $cat)
                        <option value="{{ $cat }}" {{ old('category', $skill->category ?? '') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-400 mt-1">O escribe una categoría personalizada:</p>
                <input type="text" name="category_custom" placeholder="Categoría personalizada (opcional)"
                    class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm"
                    onchange="if(this.value) this.form.category.value = this.value">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nivel: <span id="levelValue">{{ old('level', $skill->level ?? 75) }}%</span></label>
                <input type="range" name="level" min="0" max="100" value="{{ old('level', $skill->level ?? 75) }}"
                    class="w-full" oninput="document.getElementById('levelValue').textContent = this.value + '%'">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Orden de aparición</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order ?? 0) }}" min="0"
                    class="w-32 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="bg-primary hover:bg-blue-900 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                <i class="fas fa-save mr-2"></i>Guardar
            </button>
            <a href="{{ route('admin.skills.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-2.5 rounded-lg transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
