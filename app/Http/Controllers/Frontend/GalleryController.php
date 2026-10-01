<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::query()
            ->with([
                'project' => function ($query) {
                    $query->where('status', true);
                }
            ])
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        $categories = $galleries
            ->pluck('category')
            ->filter()
            ->unique()
            ->values();

        return view(
            'frontend.gallery.index',
            compact(
                'galleries',
                'categories'
            )
        );
    }
}