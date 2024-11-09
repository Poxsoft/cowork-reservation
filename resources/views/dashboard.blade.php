@extends('layouts.app')

@section('content')
    <!-- Encabezado del Dashboard -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Dashboard de Coworking</h1>
    </div>

    <!-- Botones según el rol del usuario -->
    <div class="mb-4">
        @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('rooms.index') }}" class="btn btn-primary me-2">
                <i class="fas fa-door-open"></i> Salas
            </a>
            <a href="{{ route('admin.reservations.index') }}" class="btn btn-primary">
                <i class="fas fa-calendar-alt"></i> Reservaciones
            </a>
        @elseif(auth()->user()->hasRole('cliente'))
            <a href="{{ route('reservations.index') }}" class="btn btn-primary">
                <i class="fas fa-calendar-alt"></i> Mis Reservaciones
            </a>
        @endif
    </div>

    <!-- Contenido Principal según el rol del usuario -->
    
@endsection
