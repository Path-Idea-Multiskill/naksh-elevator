<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ElevatorType;

class ElevatorTypeController extends Controller
{
    public function index()
    {
        $elevatorTypes = ElevatorType::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'frontend.elevator-types.index',
            compact('elevatorTypes')
        );
    }


    public function show(string $slug)
    {
        $elevatorType = ElevatorType::query()
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $relatedElevatorTypes = ElevatorType::query()
            ->where('status', true)
            ->where('id', '!=', $elevatorType->id)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->take(3)
            ->get();

        return view(
            'frontend.elevator-types.show',
            compact(
                'elevatorType',
                'relatedElevatorTypes'
            )
        );
    }
}