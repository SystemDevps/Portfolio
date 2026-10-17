@extends('layouts.admin')
@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
    <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-secondary">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Experiencias</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['experiences'] }}</p>
            </div>
            <i class="fas fa-briefcase text-3xl text-secondary/30"></i>
        </div>
        <a href="{{ route('admin.experiences.index') }}" class="text-xs text-secondary hover:underline mt-2 inline-block">Gestionar →</a>
    </div>
    <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Educación</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['education'] }}</p>
            </div>
            <i class="fas fa-graduation-cap text-3xl text-green-500/30"></i>
        </div>
        <a href="{{ route('admin.education.index') }}" class="text-xs text-secondary hover:underline mt-2 inline-block">Gestionar →</a>
    </div>
    <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-accent">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Habilidades</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['skills'] }}</p>
            </div>
            <i class="fas fa-code text-3xl text-accent/30"></i>
        </div>
        <a href="{{ route('admin.skills.index') }}" class="text-xs text-secondary hover:underline mt-2 inline-block">Gestionar →</a>
    </div>
    <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Proyectos</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['projects'] }}</p>
            </div>
            <i class="fas fa-laptop-code text-3xl text-purple-500/30"></i>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="text-xs text-secondary hover:underline mt-2 inline-block">Gestionar →</a>
    </div>
    <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-red-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Mensajes</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['messages'] }}</p>
            </div>
            <i class="fas fa-envelope text-3xl text-red-500/30"></i>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="text-xs text-secondary hover:underline mt-2 inline-block">Ver mensajes →</a>
    </div>
    <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-primary">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">No leídos</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['unread_messages'] }}</p>
            </div>
            <i class="fas fa-envelope-open text-3xl text-primary/30"></i>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm p-6">
    <h3 class="font-bold text-lg mb-4 text-gray-800"><i class="fas fa-clock mr-2 text-secondary"></i>Mensajes recientes</h3>
    @if($recentMessages->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b text-gray-500 text-left">
                        <th class="py-2 px-3">Remitente</th>
                        <th class="py-2 px-3">Asunto</th>
                        <th class="py-2 px-3">Fecha</th>
                        <th class="py-2 px-3">Estado</th>
                        <th class="py-2 px-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentMessages as $msg)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-3 font-medium">{{ $msg->name }}</td>
                        <td class="py-3 px-3 text-gray-600">{{ Str::limit($msg->subject ?? $msg->message, 40) }}</td>
                        <td class="py-3 px-3 text-gray-500">{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                        <td class="py-3 px-3">
                            @if($msg->read)
                                <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">Leído</span>
                            @else
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded">Nuevo</span>
                            @endif
                        </td>
                        <td class="py-3 px-3">
                            <a href="{{ route('admin.messages.show', $msg) }}" class="text-secondary hover:underline text-xs">Ver →</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-400 text-sm text-center py-6">No hay mensajes aún.</p>
    @endif
</div>
@endsection
