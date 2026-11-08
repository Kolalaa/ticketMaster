@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Comprar entrada</h1>

        <div class="card mt-4">
            <div class="card-body">
                <p><strong>Concert:</strong> {{ $concert->nom }}</p>
                <p><strong>Artista:</strong> {{ $concert->artista->nom }}</p>
                <p><strong>Data:</strong> {{ $concert->data_hora->format('d/m/Y H:i') }}</p>
                <p><strong>Escenari:</strong> {{ $concert->escenari->nom }}</p>
            </div>
        </div>

        {{-- Error del Bloc 5 (aforament) --}}
        @error('aforament')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

        <form method="POST" action="{{ route('entrades.store', $concert) }}" class="card card-body mt-3">
            @csrf

            <label for="preu_pagat" class="form-label">Preu (€)</label>
            <input type="number" step="0.01" min="0" id="preu_pagat" name="preu_pagat"
                   value="{{ old('preu_pagat') }}" required
                   class="form-control @error('preu_pagat') is-invalid @enderror">
            @error('preu_pagat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>
            <button type="submit" class="btn btn-success mt-3">Comprar entrada</button>
        </form>

        <a href="{{ route('concerts.show', $concert) }}" class="btn btn-secondary mt-3">
            Tornar al concert
        </a>
    </div>
@endsection