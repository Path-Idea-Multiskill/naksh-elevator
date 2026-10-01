<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteRequest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'location',
        'building_type',
        'elevator_type_id',
        'floors',
        'capacity',
        'project_stage',
        'message',
        'status',
        'admin_notes',
        'read_at',
    ];


    protected function casts(): array
    {
        return [
            'floors' => 'integer',
            'read_at' => 'datetime',
        ];
    }


    public function elevatorType(): BelongsTo
    {
        return $this->belongsTo(
            ElevatorType::class
        );
    }
}