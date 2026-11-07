<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'genre_id',
        'price',
        'year',
        'is_available',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'is_available' => 'boolean',
            'year' => 'integer',
        ];
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}