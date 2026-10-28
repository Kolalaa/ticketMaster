
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detall de l'artista - SonaFest</title>
</head>
<body>
<h1>Detall de l'artista</h1>

<p>
    <strong>Nom:</strong>
    {{ $artista->nom }}
</p>

<p>
    <strong>País:</strong>
    {{ $artista->pais }}
</p>

<p>
    <strong>Biografia:</strong>
    {{ $artista->bio ?? 'Sense biografia' }}
</p>

<p>
    <strong>Imatge URL:</strong>
    @if ($artista->imatge_url)
        <a href="{{ $artista->imatge_url }}" target="_blank">
            Veure imatge
        </a>
    @else
        Sense imatge
    @endif
</p>

<p>
    <strong>Estat:</strong>
    @if ($artista->actiu)
        <span style="color: green;">Actiu</span>
    @else
        <span style="color: gray;">Inactiu</span>
    @endif
</p>

<p>
    <strong>Gèneres:</strong>

    @forelse ($artista->generes as $genere)
        <span>{{ $genere->nom }}</span>
        @if (!$loop->last), @endif
    @empty
        Sense gèneres assignats
    @endforelse
</p>


<p>
    <strong>Creat:</strong>
    {{ $artista->created_at }}
</p>

<p>
    <strong>Última actualització:</strong>
    {{ $artista->updated_at }}
</p>

<a href="{{ route('artistes.index') }}">Tornar a la llista</a>

|

<a href="{{ route('artistes.edit', $artista) }}">Editar artista</a>

<form action="{{ route('artistes.destroy', ['artista' => $artista->id]) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este artista?')">
    @csrf
    @method('DELETE')

    <button type="submit">Eliminar artista</button>
</form>


<hr>

<h2>Concerts programats</h2>

@if ($artista->concerts->isEmpty())
    <p>Encara no té concerts programats.</p>
@else
    <ul>
        @foreach ($artista->concerts->sortBy('data_hora') as $concert)
            <li>
                <a href="{{ route('concerts.show', $concert) }}">
                    {{ $concert->nom }}
                </a>
                — {{ $concert->data_hora->format('d/m/Y H:i') }}
                ({{ $concert->tipus }})
            </li>
        @endforeach
    </ul>
@endif

</body>
</html>
