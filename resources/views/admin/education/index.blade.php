@extends('layouts.admin')
@section('title', 'Educación')
@section('header', 'Educación y Certificaciones')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <p class="text-sm text-gray-500">Total: {{ $education->count() }} registros</p>
    <a href="{{ route('admin.education.create') }}" class="bg-secondary hover:bg-sky-600 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
        <i class="fas fa-plus mr-1"></i>Nuevo Registro
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 text-left">
                <tr>
                    <th class="py-3 px-4">Título / Carrera</th>
                    <th class="py-3 px-4">Institución</th>
                    <th class="py-3 px-4">Periodo</th>
                    <th class="py-3 px-4">Calificación</th>
                    <th class="py-3 px-4 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($education as $edu)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-3 px-4 font-medium">{{ $edu->degree }}</td>
                    <td class="py-3 px-4 text-gray-600">{{ $edu->institution }}</td>
                    <td class="py-3 px-4 text-gray-500">
                        {{ $edu->start_date->format('m/Y') }} —
                        @if($edu->current) <span class="text-green-600 font-medium">En curso</span> @else {{ $edu->end_date?->format('m/Y') }} @endif
                    </td>
                    <td class="py-3 px-4 text-accent font-medium">{{ $edu->grade ?? '—' }}</td>
                    <td class="py-3 px-4 text-right whitespace-nowrap">
                        <a href="{{ route('admin.education.edit', $edu) }}" class="text-secondary hover:underline mr-3"><i class="fas fa-edit"></i> Editar</a>
                        <form method="POST" action="{{ route('admin.education.destroy', $edu) }}" class="inline" onsubmit="return confirm('¿Eliminar este registro?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="py-8 text-center text-gray-400">No hay registros de educación.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
