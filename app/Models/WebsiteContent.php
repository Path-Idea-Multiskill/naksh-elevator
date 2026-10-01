<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteContent extends Model
{
    protected $fillable = [
        'page',
        'section',
        'content_key',
        'content_value',
        'content_type',
        'sort_order',
    ];


    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }


    public static function value(
        string $page,
        string $section,
        string $key,
        ?string $default = null
    ): ?string {

        return static::where('page', $page)
            ->where('section', $section)
            ->where('content_key', $key)
            ->value('content_value')
            ?? $default;
    }
}