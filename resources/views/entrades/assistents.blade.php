@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-800">{{ $concert->nom }}</h1>
            <p class="text-gray-600 mb-4">Escenari: {{ $concert->escenari->nom }}</p>

            <p class="mb-6 text-lg font-medium text-gray-800">
                {{ $entrades->count() }} / {{ $concert->escenari->aforament_maxim }} entrades venudes
            </p>

            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom d'usuari</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data de compra</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Codi d'entrada</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @forelse ($entrades as $entrada)
                        <tr>
                            <td class="px-6 py-4">{{ $entrada->user->name }}</td>
                            <td class="px-6 py-4">{{ $entrada->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4 font-mono">{{ $entrada->codi_entrada }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-gray-500">Encara no hi ha assistents.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection