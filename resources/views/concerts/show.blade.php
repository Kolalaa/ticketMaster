@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $concert->nom }}</h1>

        <div class="card mt-4">
            <div class="card-body">
                <p>
                    <strong>Artista:</strong>
                    <a href="{{ route('artistes.show', $concert->artista) }}">
                        {{ $concert->artista->nom }}
                    </a>
                </p>

                <p>
                    <strong>Data i hora:</strong>
                    {{ $concert->data_hora->format('d/m/Y H:i') }}
                </p>

                <p>
                    <strong>Durada:</strong>
                    {{ $concert->durada_minuts }} minuts
                </p>

                <p>
                    <strong>Tipus:</strong>
                    <span class="badge bg-primary">{{ $concert->tipus }}</span>
                </p>

                <hr>

                <h4>Informació de l'artista</h4>

                <p>
                    <strong>Nom:</strong>
                    {{ $concert->artista->nom }}
                </p>

                <p>
                    <strong>País:</strong>
                    {{ $concert->artista->pais }}
                </p>

                <p>
                    <strong>Biografia:</strong>
                    {{ $concert->artista->bio ?? 'Sense biografia disponible.' }}
                </p>
                <p> <strong>Escenari:</strong> {{ $concert->escenari->nom }}</p>
                <p> <strong>Aforament:</strong> {{ $concert->escenari->aforament_maxim }}</p>

                <p> <strong>Aforament:</strong> {{ $concert->escenari->aforament_maxim }}</p>

                <p>
                    <strong>Entrades venudes:</strong>
                    {{ $concert->entrades->count() }}
                </p>

                <a href="{{ route('entrades.create', $concert) }}" class="btn btn-success">
                    Comprar entrada
                </a>

                <br>

                <a href="{{ route('entrades.assistents', $concert) }}" class="btn btn-outline-primary">
                    Veure assistents
                </a>
            </div>
        </div>

        <a href="{{ route('concerts.index') }}" class="btn btn-secondary mt-3">
            Tornar als concerts
        </a>
    </div>
    <hr>
@endsection
