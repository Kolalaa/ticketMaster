@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Les meves entrades</h1>

            @if (session('success'))
                <div class="mb-4 p-4 rounded bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($entrades->isEmpty())
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-600">
                    Encara no has comprat cap entrada.
                </div>
            @else
                <div class="bg-white shadow-sm sm:rounded-lg overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Concert</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Artista</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Preu pagat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Codi d'entrada</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach ($entrades as $entrada)
                            <tr>
                                <td class="px-6 py-4">
                                    <a href="{{ route('concerts.show', $entrada->concert) }}"
                                       class="text-indigo-600 hover:underline">
                                        {{ $entrada->concert->nom }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">{{ $entrada->concert->artista->nom }}</td>
                                <td class="px-6 py-4">{{ $entrada->concert->data_hora->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4">{{ number_format($entrada->preu_pagat, 2, ',', '.') }} €</td>
                                <td class="px-6 py-4 font-mono">{{ $entrada->codi_entrada }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection