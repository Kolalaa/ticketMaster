<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entrada extends Model
{
    protected $table = 'entradas';

    protected $fillable = [
        'user_id',
        'concert_id',
        'preu_pagat',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($entrada) {
            $entrada->codi_entrada = 'SONA-' . strtoupper(substr(md5(uniqid()), 0, 8));
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function concert(): BelongsTo
    {
        return $this->belongsTo(Concert::class);
    }
}
