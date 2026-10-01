<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'location',
        'elevator_type_id',
        'project_category',
        'completion_date',
        'cover_image',
        'gallery_images',
        'short_description',
        'description',
        'highlights',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];


    protected function casts(): array
    {
        return [
            'gallery_images' => 'array',
            'highlights' => 'array',
            'status' => 'boolean',
            'sort_order' => 'integer',
            'completion_date' => 'date',
        ];
    }


    public function elevatorType(): BelongsTo
    {
        return $this->belongsTo(
            ElevatorType::class
        );
    }
}