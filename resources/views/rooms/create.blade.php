@extends('layouts.app')

@section('content')
    <!-- Encabezado de la Página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Nueva Sala</h1>
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

            <form action="{{ route('rooms.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre de la Sala</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción (Opcional)</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Descripción de la sala"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
