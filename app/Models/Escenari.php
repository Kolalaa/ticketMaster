<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escenari extends Model
{
    //
    protected $fillable = [
        'nom',
        'aforament_maxim',
        'ubicacio',
        'cobert',
        'timestamp'
    ];

    protected $casts = [
        'cobert' => 'boolean',
    ];

    public function concerts(): HasMany
    {
        return $this->hasMany(Concert::class);
    }
    public function escenari(): BelongsTo
    {
        return $this->belongsTo(Escenari::class);
    }
    // Para estadistica 3
    public function entrades(): HasManyThrough
    {
        return $this->hasManyThrough(Entrada::class, Concert::class);
    }

    // Para estadística 5
    public function getOcupacioAttribute(): float
    {
        $capacitat = $this->aforament_maxim * $this->concerts_count;

        return $capacitat > 0
            ? round($this->entrades_count / $capacitat * 100, 2)
            : 0;
    }


}

