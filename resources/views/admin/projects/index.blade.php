@extends('layouts.admin')

@section('title', 'Projects')
@section('page-title', 'Projects')
@section('page-description', 'Manage Naksh Elevator completed and ongoing projects')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/admin/css/projects.css') }}">
@endpush

@section('content')

<div class="naksh-projects-page">

    {{-- PAGE HEADER --}}
    <div class="projects-page-header">

        <div class="projects-heading">
            <span class="projects-eyebrow">
                PROJECT MANAGEMENT
            </span>

            <h2>Our Projects</h2>

            <p>
                Manage completed and ongoing elevator projects,
                project details, locations and images.
            </p>
        </div>

        <a
            href="{{ route('admin.projects.create') }}"
            class="projects-add-btn"
        >
            <span>+</span>
            Add Project
        </a>

    </div>


    {{-- SUMMARY --}}
    <div class="projects-summary">

        <div class="project-summary-card">
            <span>Total Projects</span>

            <strong>
                {{ $projects->total() }}
            </strong>
        </div>

        <div class="project-summary-card">
            <span>Showing</span>

            <strong>
                {{ $projects->count() }}
            </strong>
        </div>

        <div class="project-summary-card">
            <span>Current Page</span>

            <strong>
                {{ $projects->currentPage() }}
            </strong>
        </div>

    </div>


    {{-- DESKTOP / TABLET LIST --}}
    <div class="projects-table-card">

        <div class="projects-table-wrapper">

            <table class="projects-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project</th>
                        <th>Location</th>
                        <th>Elevator Type</th>
                        <th>Completion</th>
                        <th>Status</th>
                        <th class="project-actions-heading">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody>

                @forelse($projects as $project)

                    <tr>

                        <td class="project-number">
                            {{ $projects->firstItem() + $loop->index }}
                        </td>


                        {{-- PROJECT --}}
                        <td>

                            <div class="project-main-info">

                                <div class="project-thumbnail">

                                    @if($project->cover_image)

                                        <img
                                            src="{{ asset(
                                                'storage/' .
                                                $project->cover_image
                                            ) }}"
                                            alt="{{ $project->title }}"
                                        >

                                    @else

                                        <span>P</span>

                                    @endif

                                </div>


                                <div class="project-info">

                                    <strong>
                                        {{ $project->title }}
                                    </strong>

                                    <span>
                                        {{ \Illuminate\Support\Str::limit(
                                            $project->short_description
                                                ?: 'No description added.',
                                            55
                                        ) }}
                                    </span>

                                </div>

                            </div>

                        </td>


                        {{-- LOCATION --}}
                        <td>

                            <div class="project-location">

                                <strong>
                                    {{ $project->location ?: '—' }}
                                </strong>

                                @if($project->client_name)
                                    <span>
                                        {{ $project->client_name }}
                                    </span>
                                @endif

                            </div>

                        </td>


                        {{-- ELEVATOR TYPE --}}
                        <td>

                            @if($project->elevatorType)

                                <span class="project-type-badge">
                                    {{ $project->elevatorType->name }}
                                </span>

                            @else

                                <span class="project-empty-value">
                                    —
                                </span>

                            @endif

                        </td>


                        {{-- DATE --}}
                        <td class="project-date">

                            {{ $project->completion_date
                                ? $project->completion_date->format('d M Y')
                                : '—' }}

                        </td>


                        {{-- STATUS --}}
                        <td>

                            <form
                                method="POST"
                                action="{{ route(
                                    'admin.projects.toggle-status',
                                    $project
                                ) }}"
                                class="project-status-form"
                            >
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="project-status
                                    {{ $project->status
                                        ? 'project-status-active'
                                        : 'project-status-inactive' }}"
                                    title="Click to change status"
                                >
                                    <span></span>

                                    {{ $project->status
                                        ? 'Active'
                                        : 'Inactive' }}
                                </button>

                            </form>

                        </td>


                        {{-- ACTIONS --}}
                        <td>

                            <div class="project-actions">

                                <a
                                    href="{{ route(
                                        'admin.projects.show',
                                        $project
                                    ) }}"
                                    class="project-action-btn
                                           project-view-btn"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route(
                                        'admin.projects.edit',
                                        $project
                                    ) }}"
                                    class="project-action-btn
                                           project-edit-btn"
                                >
                                    Edit
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route(
                                        'admin.projects.destroy',
                                        $project
                                    ) }}"
                                    onsubmit="
                                        return confirm(
                                            'Are you sure you want to delete this project?'
                                        );
                                    "
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="project-action-btn
                                               project-delete-btn"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="projects-empty-table"
                        >

                            <div class="projects-empty-state">

                                <div class="projects-empty-icon">
                                    P
                                </div>

                                <h3>No Projects Added</h3>

                                <p>
                                    Start by adding your first
                                    Naksh Elevator project.
                                </p>

                                <a
                                    href="{{ route(
                                        'admin.projects.create'
                                    ) }}"
                                    class="projects-add-btn"
                                >
                                    + Add First Project
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        {{-- MOBILE CARDS --}}
        <div class="projects-mobile-list">

            @forelse($projects as $project)

                <article class="project-mobile-card">

                    {{-- COVER --}}
                    <div class="project-mobile-image">

                        @if($project->cover_image)

                            <img
                                src="{{ asset(
                                    'storage/' .
                                    $project->cover_image
                                ) }}"
                                alt="{{ $project->title }}"
                            >

                        @else

                            <div class="project-mobile-placeholder">
                                P
                            </div>

                        @endif


                        <form
                            method="POST"
                            action="{{ route(
                                'admin.projects.toggle-status',
                                $project
                            ) }}"
                            class="project-mobile-status"
                        >
                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="project-status
                                {{ $project->status
                                    ? 'project-status-active'
                                    : 'project-status-inactive' }}"
                            >
                                <span></span>

                                {{ $project->status
                                    ? 'Active'
                                    : 'Inactive' }}
                            </button>

                        </form>

                    </div>


                    {{-- CONTENT --}}
                    <div class="project-mobile-content">

                        <h3>
                            {{ $project->title }}
                        </h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit(
                                $project->short_description
                                    ?: 'No description added.',
                                100
                            ) }}
                        </p>


                        <div class="project-mobile-meta">

                            <div>
                                <span>Location</span>

                                <strong>
                                    {{ $project->location ?: '—' }}
                                </strong>
                            </div>


                            <div>
                                <span>Elevator Type</span>

                                <strong>
                                    {{ $project->elevatorType?->name
                                        ?: '—' }}
                                </strong>
                            </div>


                            <div>
                                <span>Completion</span>

                                <strong>
                                    {{ $project->completion_date
                                        ? $project->completion_date
                                            ->format('d M Y')
                                        : '—' }}
                                </strong>
                            </div>


                            <div>
                                <span>Order</span>

                                <strong>
                                    {{ $project->sort_order }}
                                </strong>
                            </div>

                        </div>


                        <div class="project-mobile-actions">

                            <a
                                href="{{ route(
                                    'admin.projects.show',
                                    $project
                                ) }}"
                                class="project-action-btn
                                       project-view-btn"
                            >
                                View
                            </a>

                            <a
                                href="{{ route(
                                    'admin.projects.edit',
                                    $project
                                ) }}"
                                class="project-action-btn
                                       project-edit-btn"
                            >
                                Edit
                            </a>

                            <form
                                method="POST"
                                action="{{ route(
                                    'admin.projects.destroy',
                                    $project
                                ) }}"
                                onsubmit="
                                    return confirm(
                                        'Are you sure you want to delete this project?'
                                    );
                                "
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="project-action-btn
                                           project-delete-btn"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </article>

            @empty

                <div class="projects-mobile-empty">

                    <h3>No Projects Added</h3>

                    <p>
                        Add your first Naksh Elevator project.
                    </p>

                    <a
                        href="{{ route(
                            'admin.projects.create'
                        ) }}"
                        class="projects-add-btn"
                    >
                        + Add Project
                    </a>

                </div>

            @endforelse

        </div>

    </div>


    {{-- PAGINATION --}}
    @if($projects->hasPages())

        <div class="projects-pagination">
            {{ $projects->links() }}
        </div>

    @endif

</div>

@endsection