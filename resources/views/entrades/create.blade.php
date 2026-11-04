@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Comprar entrada</h1>

            <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                <dl class="space-y-3">
                    <div>
                        <dt class="text-sm text-gray-500">Concert</dt>
                        <dd class="font-medium text-gray-900">{{ $concert->nom }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Artista</dt>
                        <dd class="font-medium text-gray-900">{{ $concert->artista->nom }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Data</dt>
                        <dd class="font-medium text-gray-900">{{ $concert->data_hora->format('d/m/Y H:i') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Escenari</dt>
                        <dd class="font-medium text-gray-900">{{ $concert->escenari->nom }}</dd>
                    </div>
                </dl>
            </div>

            <form method="POST" action="{{ route('entrades.store', $concert) }}"
                  class="bg-white shadow-sm sm:rounded-lg p-6">
                @csrf

                <label for="preu_pagat" class="block text-sm font-medium text-gray-700">Preu (€)</label>
                <input type="number" step="0.01" min="0" id="preu_pagat" name="preu_pagat"
                       value="{{ old('preu_pagat') }}" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('preu_pagat')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <button type="submit"
                        class="mt-6 inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Comprar entrada
                </button>
            </form>
        </div>
    </div>
@endsection