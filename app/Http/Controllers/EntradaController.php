<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Concert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EntradaController extends Controller
{
    public function mevesentrades(): View
    {
        $entrades = Auth::user()->entrades()->with('concert')->latest()->get();

        return view('entrades.meves', compact('entrades'));
    }
    public function create(Concert $concert): View
    {
        return view('entrades.create', compact('concert'));
    }
    public function store(Request $request, Concert $concert): RedirectResponse
    {
        $request->validate([
            'preu_pagat' => ['required', 'numeric', 'min:0'],
        ]);

        Auth::user()->entrades()->create([
            'concert_id' => $concert->id,
            'preu_pagat' => $request->preu_pagat,
        ]);

        return redirect()
            ->route('entrades.meves')
            ->with('success', 'Entrada comprada correctament!');
    }
    public function assistents(Concert $concert): View
    {
        $entrades = $concert->entrades()->with('user')->get();

        return view('entrades.assistents', compact('concert', 'entrades'));
    }
}
