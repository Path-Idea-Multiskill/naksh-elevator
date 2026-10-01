<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ElevatorType;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WebsiteContent;

class HomeController extends Controller
{
    public function index()
    {
        $homeContent =
            WebsiteContent::where(
                'page',
                'home'
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


        $elevatorTypes =
            ElevatorType::where(
                'status',
                true
            )
            ->latest()
            ->take(6)
            ->get();


        $services =
            Service::where(
                'status',
                true
            )
            ->latest()
            ->take(6)
            ->get();


        $projects =
            Project::where(
                'status',
                true
            )
            ->latest()
            ->take(6)
            ->get();


        $testimonials =
            Testimonial::where(
                'status',
                true
            )
            ->orderBy('sort_order')
            ->take(6)
            ->get();


        return view(
            'frontend.home',
            compact(
                'homeContent',
                'elevatorTypes',
                'services',
                'projects',
                'testimonials'
            )
        );
    }
}