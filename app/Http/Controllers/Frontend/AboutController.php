<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\WebsiteContent;

class AboutController extends Controller
{
    public function index()
    {
        $aboutContent =
            WebsiteContent::where(
                'page',
                'about'
            )
            ->orderBy('sort_order')
            ->get()
            ->groupBy('section')
            ->map(
                fn ($items) =>
                    $items->pluck(
                        'content_value',
                        'content_key'
                    )
            );

        return view(
            'frontend.about',
            compact('aboutContent')
        );
    }
}