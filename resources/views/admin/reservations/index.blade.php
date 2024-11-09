@extends('layouts.app')

@section('content')
    <!-- Encabezado de la Página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Reservaciones</h1>
    </div>

    <!-- Contenido Principal -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filtro por Sala -->
    <form method="GET" class="mb-4">
        <div class="form-row align-items-end">
            <div class="col-md-4">
                <label for="room_id">Filtrar por Sala</label>
                <select name="room_id" id="room_id" class="form-control" onchange="this.form.submit()">
                    <option value="">Todas las Salas</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ request('room_id') == $room->id ? 'selected' : '' }}>
                            {{ $room->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    @if($reservations->isEmpty())
        <div class="alert alert-info">
            No hay reservaciones.
        </div>
    @else
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sala</th>
                            <th>Cliente</th>
                            <th>Fecha y Hora</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->room->name }}</td>
                                <td>{{ $reservation->user->name }}</td>
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
                                <td>
                                    <form action="{{ route('reservations.updateStatus', $reservation->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                <option value="Pendiente" {{ $reservation->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                <option value="Aceptada" {{ $reservation->status == 'Aceptada' ? 'selected' : '' }}>Aceptada</option>
                                                <option value="Rechazada" {{ $reservation->status == 'Rechazada' ? 'selected' : '' }}>Rechazada</option>
                                            </select>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
