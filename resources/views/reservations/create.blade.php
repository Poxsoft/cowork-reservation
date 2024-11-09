@extends('layouts.app')

@section('content')
    <!-- Encabezado de la Página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Hacer una Reservación</h1>
    </div>

    <!-- Contenido Principal -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> Por favor corrige los siguientes errores:<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="room_id">Sala de Coworking</label>
                    <select class="form-control" id="room_id" name="room_id">
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_time">Fecha y Hora</label>
                    <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
                </div>
                <button type="submit" class="btn btn-primary">Reservar</button>
                <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
