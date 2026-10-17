@extends('layouts.admin')
@section('title', 'Proyectos')
@section('header', 'Proyectos')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <p class="text-sm text-gray-500">Total: {{ $projects->count() }} proyectos</p>
    <a href="{{ route('admin.projects.create') }}" class="bg-secondary hover:bg-sky-600 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
        <i class="fas fa-plus mr-1"></i>Nuevo Proyecto
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 text-left">
                <tr>
                    <th class="py-3 px-4">Título</th>
                    <th class="py-3 px-4">Tecnologías</th>
                    <th class="py-3 px-4">Destacado</th>
                    <th class="py-3 px-4 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $proj)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-3 px-4 font-medium">{{ $proj->title }}</td>
                    <td class="py-3 px-4 text-gray-600 text-xs">{{ Str::limit($proj->technologies, 50) }}</td>
                    <td class="py-3 px-4">
                        @if($proj->featured)
                            <span class="bg-accent/20 text-accent text-xs px-2 py-1 rounded font-semibold">★ Destacado</span>
                        @else
                            <span class="text-gray-400 text-xs">—</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-right whitespace-nowrap">
                        <a href="{{ route('admin.projects.edit', $proj) }}" class="text-secondary hover:underline mr-3"><i class="fas fa-edit"></i> Editar</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $proj) }}" class="inline" onsubmit="return confirm('¿Eliminar este proyecto?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="py-8 text-center text-gray-400">No hay proyectos registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
