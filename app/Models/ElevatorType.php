<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElevatorType extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'features',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'status' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}