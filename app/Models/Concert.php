<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Concert extends Model
{
    protected $fillable = [
        'artista_id',
        'nom',
        'data_hora',
        'durada_minuts',
        'tipus',
    ];

    protected function casts(): array
    {
        return [
            'data_hora' => 'datetime',
            'durada_minuts' => 'integer',
        ];
    }

    public function artista(): BelongsTo
    {
        return $this->belongsTo(Artista::class);
    }

    public function escenari()
    {
        return $this->belongsTo(Escenari::class);
    }

    public function entrades(): HasMany
    {
        return $this->hasMany(Entrada::class);
    }
}
