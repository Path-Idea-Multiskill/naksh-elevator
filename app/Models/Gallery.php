<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'project_id',
        'image',
        'alt_text',
        'sort_order',
        'status',
    ];


    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'sort_order' => 'integer',
        ];
    }


    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}