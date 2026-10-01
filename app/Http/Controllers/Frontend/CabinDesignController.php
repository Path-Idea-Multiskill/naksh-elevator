<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CabinDesign;

class CabinDesignController extends Controller
{
    public function index()
    {
        $cabinDesigns = CabinDesign::query()
            ->where('status', true)
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        $categories = $cabinDesigns
            ->pluck('category')
            ->filter()
            ->unique()
            ->values();

        return view(
            'frontend.cabin-designs.index',
            compact('cabinDesigns', 'categories')
        );
    }

    public function show(string $slug)
    {
        $cabinDesign = CabinDesign::query()
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $relatedDesigns = CabinDesign::query()
            ->where('status', true)
            ->where('id', '!=', $cabinDesign->id)
            ->where('category', $cabinDesign->category)
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        return view(
            'frontend.cabin-designs.show',
            compact('cabinDesign', 'relatedDesigns')
        );
    }
}