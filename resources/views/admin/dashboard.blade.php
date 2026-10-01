@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section(
    'page-description',
    'Overview of Naksh Elevator website management'
)


@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/dashboard.css') }}"
>
@endpush


@section('content')

<div class="naksh-dashboard">

    {{-- =========================================
         WELCOME SECTION
    ========================================== --}}
    <section class="dashboard-welcome">

        <div class="dashboard-welcome-content">

            <span class="dashboard-eyebrow">
                NAKSH ELEVATOR ADMIN
            </span>

            <h2>
                Welcome,
                {{ auth()->user()->name }}
            </h2>

            <p>
                Manage elevators, services and website
                content from one central dashboard.
            </p>

        </div>


        <div class="dashboard-quick-buttons">

            <a
                href="{{ route(
                    'admin.elevator-types.create'
                ) }}"
                class="dashboard-btn dashboard-btn-outline"
            >
                + Add Elevator
            </a>

            <a
                href="{{ route(
                    'admin.services.create'
                ) }}"
                class="dashboard-btn dashboard-btn-primary"
            >
                + Add Service
            </a>

        </div>

    </section>


    {{-- =========================================
         MAIN STATISTICS
    ========================================== --}}
    <section class="dashboard-stat-grid">

        {{-- TOTAL ELEVATORS --}}
        <a
            href="{{ route(
                'admin.elevator-types.index'
            ) }}"
            class="dashboard-stat-card"
        >

            <div class="dashboard-stat-icon">
                ↕
            </div>

            <div class="dashboard-stat-content">

                <span>
                    Total Elevators
                </span>

                <strong>
                    {{ $totalElevators }}
                </strong>

                <small>
                    Manage elevator types
                </small>

            </div>

        </a>


        {{-- TOTAL SERVICES --}}
        <a
            href="{{ route(
                'admin.services.index'
            ) }}"
            class="dashboard-stat-card"
        >

            <div class="dashboard-stat-icon">
                ⚙
            </div>

            <div class="dashboard-stat-content">

                <span>
                    Total Services
                </span>

                <strong>
                    {{ $totalServices }}
                </strong>

                <small>
                    Manage elevator services
                </small>

            </div>

        </a>


        {{-- ACTIVE SERVICES --}}
        <div class="dashboard-stat-card">

            <div
                class="dashboard-stat-icon
                       dashboard-icon-success"
            >
                ✓
            </div>

            <div class="dashboard-stat-content">

                <span>
                    Active Services
                </span>

                <strong>
                    {{ $activeServices }}
                </strong>

                <small>
                    Currently published
                </small>

            </div>

        </div>


        {{-- INACTIVE SERVICES --}}
        <div class="dashboard-stat-card">

            <div
                class="dashboard-stat-icon
                       dashboard-icon-muted"
            >
                ○
            </div>

            <div class="dashboard-stat-content">

                <span>
                    Inactive Services
                </span>

                <strong>
                    {{ $inactiveServices }}
                </strong>

                <small>
                    Currently hidden
                </small>

            </div>

        </div>

    </section>


    {{-- =========================================
         ELEVATOR STATUS SUMMARY
    ========================================== --}}
    <section class="dashboard-mini-grid">

        <div class="dashboard-mini-card">

            <div>

                <span>
                    Active Elevators
                </span>

                <strong>
                    {{ $activeElevators }}
                </strong>

            </div>

            <span class="dashboard-mini-status active">
                Active
            </span>

        </div>


        <div class="dashboard-mini-card">

            <div>

                <span>
                    Inactive Elevators
                </span>

                <strong>
                    {{ $inactiveElevators }}
                </strong>

            </div>

            <span class="dashboard-mini-status inactive">
                Inactive
            </span>

        </div>

    </section>


    {{-- =========================================
         RECENT CONTENT
    ========================================== --}}
    <div class="dashboard-content-grid">


        {{-- RECENT SERVICES --}}
        <section class="dashboard-panel">

            <div class="dashboard-panel-header">

                <div>

                    <span class="dashboard-panel-eyebrow">
                        SERVICES
                    </span>

                    <h3>
                        Recent Services
                    </h3>

                    <p>
                        Recently added or updated services.
                    </p>

                </div>


                <a
                    href="{{ route(
                        'admin.services.index'
                    ) }}"
                >
                    View All
                </a>

            </div>


            <div class="dashboard-list">

                @forelse(
                    $recentServices as $service
                )

                    <div class="dashboard-list-item">

                        <div class="dashboard-list-main">

                            <div class="dashboard-list-image">

                                @if($service->image)

                                    <img
                                        src="{{ asset(
                                            'storage/' .
                                            $service->image
                                        ) }}"
                                        alt="{{ $service->title }}"
                                    >

                                @else

                                    <span>S</span>

                                @endif

                            </div>


                            <div class="dashboard-list-info">

                                <strong>
                                    {{ $service->title }}
                                </strong>

                                <span>
                                    Updated
                                    {{ $service->updated_at
                                        ->diffForHumans() }}
                                </span>

                            </div>

                        </div>


                        <div class="dashboard-list-action">

                            @if($service->status)

                                <span
                                    class="dashboard-status active"
                                >
                                    Active
                                </span>

                            @else

                                <span
                                    class="dashboard-status inactive"
                                >
                                    Inactive
                                </span>

                            @endif


                            <a
                                href="{{ route(
                                    'admin.services.edit',
                                    $service
                                ) }}"
                            >
                                Edit
                            </a>

                        </div>

                    </div>

                @empty

                    <div class="dashboard-empty">

                        <strong>
                            No services available
                        </strong>

                        <p>
                            Add your first elevator service.
                        </p>

                        <a
                            href="{{ route(
                                'admin.services.create'
                            ) }}"
                        >
                            + Add Service
                        </a>

                    </div>

                @endforelse

            </div>

        </section>


        {{-- RECENT ELEVATORS --}}
        <section class="dashboard-panel">

            <div class="dashboard-panel-header">

                <div>

                    <span class="dashboard-panel-eyebrow">
                        ELEVATORS
                    </span>

                    <h3>
                        Recent Elevators
                    </h3>

                    <p>
                        Recently added elevator types.
                    </p>

                </div>


                <a
                    href="{{ route(
                        'admin.elevator-types.index'
                    ) }}"
                >
                    View All
                </a>

            </div>


            <div class="dashboard-list">

                @forelse(
                    $recentElevators as $elevator
                )

                    <div class="dashboard-list-item">

                        <div class="dashboard-list-main">

                            <div class="dashboard-list-image">

                                @if($elevator->image)

                                    <img
                                        src="{{ asset(
                                            'storage/' .
                                            $elevator->image
                                        ) }}"
                                        alt="{{ $elevator->name }}"
                                    >

                                @else

                                    <span>↕</span>

                                @endif

                            </div>


                            <div class="dashboard-list-info">

                                <strong>
                                    {{ $elevator->name }}
                                </strong>

                                <span>
                                    Updated
                                    {{ $elevator->updated_at
                                        ->diffForHumans() }}
                                </span>

                            </div>

                        </div>


                        <div class="dashboard-list-action">

                            @if($elevator->status)

                                <span
                                    class="dashboard-status active"
                                >
                                    Active
                                </span>

                            @else

                                <span
                                    class="dashboard-status inactive"
                                >
                                    Inactive
                                </span>

                            @endif


                            <a
                                href="{{ route(
                                    'admin.elevator-types.edit',
                                    $elevator
                                ) }}"
                            >
                                Edit
                            </a>

                        </div>

                    </div>

                @empty

                    <div class="dashboard-empty">

                        <strong>
                            No elevators available
                        </strong>

                        <p>
                            Add your first elevator type.
                        </p>

                    </div>

                @endforelse

            </div>

        </section>

    </div>

</div>

@endsection