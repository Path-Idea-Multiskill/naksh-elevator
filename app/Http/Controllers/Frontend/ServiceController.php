<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view(
            'frontend.services.index',
            compact('services')
        );
    }


    public function show(string $slug)
    {
        $service = Service::query()
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $relatedServices = Service::query()
            ->where('status', true)
            ->where('id', '!=', $service->id)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->take(3)
            ->get();

        return view(
            'frontend.services.show',
            compact(
                'service',
                'relatedServices'
            )
        );
    }
}