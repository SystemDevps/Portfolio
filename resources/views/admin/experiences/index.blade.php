@extends('layouts.admin')
@section('title', 'Experiencias')
@section('header', 'Experiencias Laborales')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <p class="text-sm text-gray-500">Total: {{ $experiences->count() }} registros</p>
    <a href="{{ route('admin.experiences.create') }}" class="bg-secondary hover:bg-sky-600 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
        <i class="fas fa-plus mr-1"></i>Nueva Experiencia
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 text-left">
                <tr>
                    <th class="py-3 px-4">Cargo</th>
                    <th class="py-3 px-4">Empresa</th>
                    <th class="py-3 px-4">Periodo</th>
                    <th class="py-3 px-4">Orden</th>
                    <th class="py-3 px-4 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $exp)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-3 px-4 font-medium">{{ $exp->job_title }}</td>
                    <td class="py-3 px-4 text-gray-600">{{ $exp->company }}</td>
                    <td class="py-3 px-4 text-gray-500">
                        {{ $exp->start_date->format('m/Y') }} —
                        @if($exp->current) <span class="text-green-600 font-medium">Actualidad</span> @else {{ $exp->end_date?->format('m/Y') }} @endif
                    </td>
                    <td class="py-3 px-4 text-gray-500">{{ $exp->sort_order }}</td>
                    <td class="py-3 px-4 text-right whitespace-nowrap">
                        <a href="{{ route('admin.experiences.edit', $exp) }}" class="text-secondary hover:underline mr-3"><i class="fas fa-edit"></i> Editar</a>
                        <form method="POST" action="{{ route('admin.experiences.destroy', $exp) }}" class="inline" onsubmit="return confirm('¿Eliminar esta experiencia?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="py-8 text-center text-gray-400">No hay experiencias registradas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
