<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'service',
        'message',
        'status',
        'admin_notes',
        'read_at',
    ];


    protected function casts(): array
    {
        return [
            'read_at' => 'datetime',
        ];
    }
}