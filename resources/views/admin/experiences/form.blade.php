@extends('layouts.admin')
@section('title', isset($experience) ? 'Editar Experiencia' : 'Nueva Experiencia')
@section('header', isset($experience) ? 'Editar Experiencia' : 'Nueva Experiencia')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl">
    <form method="POST" action="{{ isset($experience) ? route('admin.experiences.update', $experience) : route('admin.experiences.store') }}">
        @csrf
        @if(isset($experience)) @method('PUT') @endif

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Cargo / Puesto *</label>
                <input type="text" name="job_title" value="{{ old('job_title', $experience->job_title ?? '') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Empresa *</label>
                <input type="text" name="company" value="{{ old('company', $experience->company ?? '') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ubicación</label>
                <input type="text" name="location" value="{{ old('location', $experience->location ?? '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Inicio *</label>
                    <input type="date" name="start_date" value="{{ old('start_date', isset($experience) && $experience->start_date ? $experience->start_date->format('Y-m-d') : '') }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Fin</label>
                    <input type="date" name="end_date" value="{{ old('end_date', isset($experience) && $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm" id="endDateInput">
                </div>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="current" id="currentCheck" value="1" class="w-4 h-4 text-secondary rounded"
                    {{ old('current', $experience->current ?? false) ? 'checked' : '' }} onchange="document.getElementById('endDateInput').disabled = this.checked">
                <label for="currentCheck" class="ml-2 text-sm text-gray-700">Trabajo actual (sin fecha de fin)</label>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción / Actividades *</label>
                <textarea name="description" rows="5" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">{{ old('description', $experience->description ?? '') }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Orden de aparición (menor = primero)</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $experience->sort_order ?? 0) }}" min="0"
                    class="w-32 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="bg-primary hover:bg-blue-900 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                <i class="fas fa-save mr-2"></i>Guardar
            </button>
            <a href="{{ route('admin.experiences.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-2.5 rounded-lg transition">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
