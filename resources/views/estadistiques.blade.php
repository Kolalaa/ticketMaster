@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Estadístiques</h1>

        <h3 class="mt-4">1. Top 5 concerts amb més entrades venudes</h3>
        <table class="table table-striped">
            <thead><tr><th>Concert</th><th>Artista</th><th>Total</th></tr></thead>
            <tbody>
            @foreach ($topConcerts as $c)
                <tr>
                    <td>{{ $c->nom }}</td>
                    <td>{{ $c->artista->nom }}</td>
                    <td>{{ $c->entrades_count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h3 class="mt-4">2. Top 5 artistes amb més concerts</h3>
        <table class="table table-striped">
            <thead><tr><th>Artista</th><th>Concerts</th></tr></thead>
            <tbody>
            @foreach ($topArtistes as $a)
                <tr><td>{{ $a->nom }}</td><td>{{ $a->concerts_count }}</td></tr>
            @endforeach
            </tbody>
        </table>

        <h3 class="mt-4">3. Recaptació total per escenari</h3>
        <table class="table table-striped">
            <thead><tr><th>Escenari</th><th>Recaptació</th></tr></thead>
            <tbody>
            @foreach ($recaptacio as $e)
                <tr>
                    <td>{{ $e->nom }}</td>
                    <td>{{ number_format($e->entrades_sum_preu_pagat ?? 0, 2) }} €</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h3 class="mt-4">4. Gèneres més populars</h3>
        <table class="table table-striped">
            <thead><tr><th>Gènere</th><th>Entrades</th></tr></thead>
            <tbody>
            @foreach ($generesPopulars as $g)
                <tr><td>{{ $g->nom }}</td><td>{{ $g->total_entrades }}</td></tr>
            @endforeach
            </tbody>
        </table>

        <h3 class="mt-4">5. Ocupació mitjana per escenari</h3>
        <table class="table table-striped">
            <thead><tr><th>Escenari</th><th>Entrades</th><th>Concerts</th><th>Aforament</th><th>Ocupació</th></tr></thead>
            <tbody>
            @foreach ($ocupacio as $e)
                <tr>
                    <td>{{ $e->nom }}</td>
                    <td>{{ $e->entrades_count }}</td>
                    <td>{{ $e->concerts_count }}</td>
                    <td>{{ $e->aforament_maxim }}</td>
                    <td>{{ $e->ocupacio }} %</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection