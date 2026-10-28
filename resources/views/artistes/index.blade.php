
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llista d'artistes - SonaFest</title>
</head>
<body>
<h1>Artistes de SonaFest</h1>

@if (session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('artistes.create') }}">Nou artista</a>

<table border="1" cellpadding="10">
    <thead>
    <tr>
        <th>Nom</th>
        <th>País</th>
        <th>Gèneres</th>
        <th>Actiu</th>
        <th>Accions</th>
    </tr>
    </thead>

    <tbody>
    @forelse ($artistes as $artista)
        <tr>
            <td>{{ $artista->nom }}</td>
            <td>{{ $artista->pais }}</td>
            <td>
                @if ($artista->actiu)
                    <span style="color: green;">Actiu</span>
                @else
                    <span style="color: gray;">Inactiu</span>
                @endif
                    {{ $artista->generes->pluck('nom')->implode(', ') }}
            </td>
            <td>
                <a href="{{ route('artistes.show', $artista) }}">
                    Veure
                </a>

                |

                <a href="{{ route('artistes.edit', $artista) }}">
                    Editar
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">No hi ha artistes registrats.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
