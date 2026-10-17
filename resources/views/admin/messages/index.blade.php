@extends('layouts.admin')
@section('title', 'Mensajes')
@section('header', 'Mensajes de Contacto')

@section('content')
<div class="mb-4">
    <p class="text-sm text-gray-500">Total: {{ $messages->count() }} mensajes</p>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 text-left">
                <tr>
                    <th class="py-3 px-4">Remitente</th>
                    <th class="py-3 px-4">Asunto / Mensaje</th>
                    <th class="py-3 px-4">Fecha</th>
                    <th class="py-3 px-4">Estado</th>
                    <th class="py-3 px-4 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                <tr class="border-t hover:bg-gray-50 {{ !$msg->read ? 'bg-blue-50/50' : '' }}">
                    <td class="py-3 px-4">
                        <div class="font-medium">{{ $msg->name }}</div>
                        <div class="text-xs text-gray-500">{{ $msg->email }}</div>
                    </td>
                    <td class="py-3 px-4 text-gray-600 max-w-xs truncate">{{ $msg->subject ?? Str::limit($msg->message, 60) }}</td>
                    <td class="py-3 px-4 text-gray-500 text-xs">{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                    <td class="py-3 px-4">
                        @if($msg->read)
                            <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">Leído</span>
                        @else
                            <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded font-semibold">No leído</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-right whitespace-nowrap">
                        <a href="{{ route('admin.messages.show', $msg) }}" class="text-secondary hover:underline mr-3"><i class="fas fa-eye"></i> Ver</a>
                        <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" class="inline" onsubmit="return confirm('¿Eliminar este mensaje?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="py-8 text-center text-gray-400">No hay mensajes recibidos.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
