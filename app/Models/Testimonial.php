<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'customer_name',
        'designation',
        'location',
        'customer_image',
        'rating',
        'review',
        'status',
        'sort_order',
    ];


    protected function casts(): array
    {
        return [
            'rating' => 'integer',
            'status' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}