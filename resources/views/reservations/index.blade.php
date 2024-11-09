@extends('layouts.app')

@section('content')
    <!-- Encabezado de la Página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Mis Reservaciones</h1>
        <a href="{{ route('reservations.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Nueva Reservación
        </a>
    </div>

    <!-- Contenido Principal -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($reservations->isEmpty())
        <div class="alert alert-info">
            No tienes reservaciones.
        </div>
    @else
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sala</th>
                            <th>Fecha y Hora</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->room->name }}</td>
                                <td>{{ $reservation->start_time->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if($reservation->status == 'Pendiente')
                                        <span class="badge badge-warning">{{ $reservation->status }}</span>
                                    @elseif($reservation->status == 'Aceptada')
                                        <span class="badge badge-success">{{ $reservation->status }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ $reservation->status }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
