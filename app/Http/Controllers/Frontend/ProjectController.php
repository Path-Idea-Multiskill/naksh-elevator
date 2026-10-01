<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()
            ->with('elevatorType')
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderByDesc('completion_date')
            ->orderByDesc('id')
            ->get();

        return view(
            'frontend.projects.index',
            compact('projects')
        );
    }


    public function show(string $slug)
    {
        $project = Project::query()
            ->with('elevatorType')
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();


        $relatedProjects = Project::query()
            ->with('elevatorType')
            ->where('status', true)
            ->where('id', '!=', $project->id)
            ->orderBy('sort_order')
            ->orderByDesc('completion_date')
            ->orderByDesc('id')
            ->take(3)
            ->get();


        return view(
            'frontend.projects.show',
            compact(
                'project',
                'relatedProjects'
            )
        );
    }
}