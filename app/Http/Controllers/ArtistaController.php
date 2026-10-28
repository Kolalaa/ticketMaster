<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Genere;

class ArtistaController extends Controller
{
    /**
     * Mostrar todos los artistas ordenados por nombre.
     */
    public function index(): View
    {
        $artistes = Artista::with('generes')->orderBy('nom')->get();

        return view('artistes.index', compact('artistes'));
    }

    /**
     * Mostrar crear un artista.
     */
    public function create(): View
    {
        $generes = Genere::orderBy('nom')->get();

        return view('artistes.form', compact('generes'));
    }

    /**
     * Guardar artista nuevo.
     */

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'imatge_url' => 'nullable|url',
            'actiu' => 'sometimes|boolean',
            'generes' => 'nullable|array',
            'generes.*' => 'integer|exists:generes,id',
        ]);

        $validated['actiu'] = $request->boolean('actiu');

        $artista = Artista::create(
            collect($validated)->except('generes')->all()
        );

        $artista->generes()->sync($request->input('generes', []));

        return redirect()
            ->route('artistes.show', $artista)
            ->with('success', 'Artista creat correctament.');
    }


    /**
     * Mostrar artista.
     */
    public function show(Artista $artista): View
    {
        return view('artistes.show', compact('artista'));
    }

    /**
     * Mostrar editar artista.
     */
    public function edit(Artista $artista): View
    {
        $generes = Genere::orderBy('nom')->get();
        $artista->load('generes');

        return view('artistes.form', compact('artista', 'generes'));
    }

    /**
     * Actualitzar artista.
     */

    public function update(
        Request $request,
        Artista $artista
    ): RedirectResponse {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'imatge_url' => 'nullable|url',
            'actiu' => 'sometimes|boolean',
            'generes' => 'nullable|array',
            'generes.*' => 'integer|exists:generes,id',
        ]);

        $validated['actiu'] = $request->boolean('actiu');

        $artista->update(
            collect($validated)->except('generes')->all()
        );

        $artista->generes()->sync($request->input('generes', []));

        return redirect()
            ->route('artistes.show', $artista)
            ->with('success', 'Artista actualitzat correctament.');
    }


    /**
     * Eliminar artista.
     */
    public function destroy(Artista $artista): RedirectResponse
    {
        $artista->delete();

        return redirect()
            ->route('artistes.index')
            ->with('success', 'Artista eliminat correctament.');
    }
}
