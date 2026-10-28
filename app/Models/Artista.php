<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artista extends Model
{
    protected $fillable = [
        'nom',
        'pais',
        'bio',
        'imatge_url',
        'actiu',
    ];

    protected $casts = [
        'actiu' => 'boolean',
    ];

    public function concerts(): HasMany
    {
        return $this->hasMany(Concert::class);
    }

    public function generes(): BelongsToMany
    {
        return $this->belongsToMany(Genere::class);
    }

}
