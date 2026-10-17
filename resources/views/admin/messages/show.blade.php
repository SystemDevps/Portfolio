@extends('layouts.admin')
@section('title', 'Mensaje de ' . $message->name)
@section('header', 'Detalle de Mensaje')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-3xl">
    <div class="flex justify-between items-start mb-4 pb-4 border-b">
        <div>
            <h3 class="font-bold text-lg text-gray-800">{{ $message->subject ?? 'Sin asunto' }}</h3>
            <p class="text-sm text-gray-500 mt-1">
                <i class="fas fa-user mr-1"></i>{{ $message->name }}
                <span class="mx-2">·</span>
                <a href="mailto:{{ $message->email }}" class="text-secondary hover:underline"><i class="fas fa-envelope mr-1"></i>{{ $message->email }}</a>
            </p>
        </div>
        <span class="text-xs text-gray-400">{{ $message->created_at->format('d/m/Y H:i') }}</span>
    </div>

    <div class="prose max-w-none text-gray-700 leading-relaxed whitespace-pre-line mb-6">
        {{ $message->message }}
    </div>

    <div class="flex gap-3 pt-4 border-t">
        <a href="mailto:{{ $message->email }}" class="bg-secondary hover:bg-sky-600 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
            <i class="fas fa-reply mr-1"></i>Responder por correo
        </a>
        <form method="POST" action="{{ route('admin.messages.toggle-read', $message) }}" class="inline">
            @csrf @method('PATCH')
            <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-semibold px-4 py-2 rounded-lg transition">
                <i class="fas fa-envelope-open mr-1"></i>Marcar como {{ $message->read ? 'no leído' : 'leído' }}
            </button>
        </form>
        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" class="inline" onsubmit="return confirm('¿Eliminar este mensaje?')">
            @csrf @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
                <i class="fas fa-trash mr-1"></i>Eliminar
            </button>
        </form>
        <a href="{{ route('admin.messages.index') }}" class="ml-auto text-gray-500 hover:text-gray-700 text-sm self-center">← Volver</a>
    </div>
</div>
@endsection
