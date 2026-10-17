@extends('layouts.admin')
@section('title', 'Habilidades')
@section('header', 'Habilidades Técnicas')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <p class="text-sm text-gray-500">Total: {{ $skills->count() }} habilidades</p>
    <a href="{{ route('admin.skills.create') }}" class="bg-secondary hover:bg-sky-600 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
        <i class="fas fa-plus mr-1"></i>Nueva Habilidad
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 text-left">
                <tr>
                    <th class="py-3 px-4">Habilidad</th>
                    <th class="py-3 px-4">Categoría</th>
                    <th class="py-3 px-4">Nivel</th>
                    <th class="py-3 px-4 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $skill)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-3 px-4 font-medium">{{ $skill->name }}</td>
                    <td class="py-3 px-4"><span class="bg-primary/10 text-primary text-xs px-2 py-1 rounded">{{ $skill->category }}</span></td>
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-2">
                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-secondary h-2 rounded-full" style="width: {{ $skill->level }}%"></div>
                            </div>
                            <span class="text-gray-500 text-xs">{{ $skill->level }}%</span>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-right whitespace-nowrap">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-secondary hover:underline mr-3"><i class="fas fa-edit"></i> Editar</a>
                        <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" class="inline" onsubmit="return confirm('¿Eliminar esta habilidad?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="py-8 text-center text-gray-400">No hay habilidades registradas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
