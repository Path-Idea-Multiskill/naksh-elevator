<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabinDesign extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'cover_image',
        'gallery_images',
        'material_finish',
        'short_description',
        'description',
        'featured',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'gallery_images' => 'array',
            'featured' => 'boolean',
            'status' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}