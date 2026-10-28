
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari d'artista - SonaFest</title>
</head>
<body>

@if (isset($artista->id))
    <h1>Editar artista</h1>
@else
    <h1>Nou artista</h1>
@endif

@if ($errors->any())
    <div style="color: red;">
        <p>Hi ha errors al formulari:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ isset($artista->id) ? route('artistes.update', $artista) : route('artistes.store') }}"
    method="POST"
>

    @csrf

    @if (isset($artista->id))
        @method('PUT')
    @endif

    <div>
        <label for="nom">Nom:</label>
        <input
            type="text"
            id="nom"
            name="nom"
            value="{{ old('nom', $artista->nom ?? '') }}"
            required
        >
        @error('nom')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label for="pais">País:</label>
        <input
            type="text"
            id="pais"
            name="pais"
            value="{{ old('pais', $artista->pais ?? '') }}"
            required
        >
        @error('pais')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label for="bio">Biografia:</label>
        <textarea
            id="bio"
            name="bio"
        >{{ old('bio', $artista->bio ?? '') }}</textarea>
        @error('bio')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label for="imatge_url">URL de la imatge:</label>
        <input
            type="url"
            id="imatge_url"
            name="imatge_url"
            value="{{ old('imatge_url', $artista->imatge_url ?? '') }}"
        >
        @error('imatge_url')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <input type="hidden" name="actiu" value="0">

        <label for="actiu">Actiu:</label>
        <input
            type="checkbox"
            id="actiu"
            name="actiu"
            value="1"
            @checked(old('actiu', $artista->actiu ?? true))
        >
        @error('actiu')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <strong>Gèneres:</strong>

        @foreach ($generes as $genere)
            <div>
                <input
                        type="checkbox"
                        id="genere_{{ $genere->id }}"
                        name="generes[]"
                        value="{{ $genere->id }}"
                        @checked(in_array(
                            $genere->id,
                            old('generes', isset($artista)
                                ? $artista->generes->pluck('id')->toArray()
                                : [])
                        ))
                >

                <label for="genere_{{ $genere->id }}">
                    {{ $genere->nom }}
                </label>
            </div>
        @endforeach

        @error('generes')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>


    <br>

    <button type="submit">Guardar artista</button>

</form>

<br>

<a href="{{ route('artistes.index') }}">Tornar a la llista</a>

</body>
</html>
