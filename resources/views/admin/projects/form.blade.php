@extends('layouts.admin')
@section('title', isset($project) ? 'Editar Proyecto' : 'Nuevo Proyecto')
@section('header', isset($project) ? 'Editar Proyecto' : 'Nuevo Proyecto')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl">
    <form method="POST" action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}">
        @csrf
        @if(isset($project)) @method('PUT') @endif

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Título del Proyecto *</label>
                <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción *</label>
                <textarea name="description" rows="4" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">{{ old('description', $project->description ?? '') }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tecnologías (separadas por coma)</label>
                <input type="text" name="technologies" value="{{ old('technologies', $project->technologies ?? '') }}" placeholder="Laravel,MySQL,Vue.js"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">URL Demo</label>
                    <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url ?? '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">URL GitHub</label>
                    <input type="url" name="github_url" value="{{ old('github_url', $project->github_url ?? '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de finalización</label>
                <input type="date" name="completed_at" value="{{ old('completed_at', isset($project) && $project->completed_at ? $project->completed_at->format('Y-m-d') : '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="featured" id="featuredCheck" value="1" class="w-4 h-4 text-accent rounded"
                    {{ old('featured', $project->featured ?? false) ? 'checked' : '' }}>
                <label for="featuredCheck" class="ml-2 text-sm text-gray-700">Proyecto destacado (aparece primero)</label>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Orden de aparición</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? 0) }}" min="0"
                    class="w-32 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary outline-none text-sm">
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="bg-primary hover:bg-blue-900 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                <i class="fas fa-save mr-2"></i>Guardar
            </button>
            <a href="{{ route('admin.projects.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-2.5 rounded-lg transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
