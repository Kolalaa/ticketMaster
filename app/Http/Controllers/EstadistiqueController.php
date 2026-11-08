<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Concert;
use App\Models\Escenari;
use App\Models\Genere;
use Illuminate\Support\Facades\DB;

class EstadistiqueController extends Controller
{
    public function index()
    {
        //  5 concerts + entradas vendidas
        $topConcerts = Concert::with('artista')
            ->withCount('entrades')
            ->orderByDesc('entrades_count')
            ->take(5)
            ->get();

        // 5 artistas con + conciertos
        $topArtistes = Artista::withCount('concerts')
            ->orderByDesc('concerts_count')
            ->take(5)
            ->get();

        // recaudación total por escenario
        $recaptacio = Escenari::withSum('entrades', 'preu_pagat')
            ->orderByDesc('entrades_sum_preu_pagat')
            ->get();

        // generos mas populares (entradas de sus artistas)
        $generesPopulars = Genere::query()
            ->leftJoin('artista_genere', 'generes.id', '=', 'artista_genere.genere_id')
            ->leftJoin('concerts', 'concerts.artista_id', '=', 'artista_genere.artista_id')
            ->leftJoin('entradas', 'entradas.concert_id', '=', 'concerts.id')
            ->select('generes.id', 'generes.nom', DB::raw('COUNT(entradas.id) as total_entrades'))
            ->groupBy('generes.id', 'generes.nom')
            ->orderByDesc('total_entrades')
            ->get();

        // ocupacion media por escenario
        $ocupacio = Escenari::withCount(['concerts', 'entrades'])->get();

        return view('estadistiques', compact(
            'topConcerts', 'topArtistes', 'recaptacio', 'generesPopulars', 'ocupacio'
        ));
    }
}