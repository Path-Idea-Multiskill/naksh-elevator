@extends('layouts.admin')

@section('title', $elevatorType->name)

@section('page-title', 'Elevator Details')

@section(
    'page-description',
    'View complete elevator information'
)

@section('content')

<div class="details-page">

    {{-- TOP ACTION BAR --}}
    <div class="page-action-bar">

        <div>
            <h2>{{ $elevatorType->name }}</h2>

            <p>
                Complete information and publishing details.
            </p>
        </div>

        <div class="details-top-actions">

            <a
                href="{{ route('admin.elevator-types.index') }}"
                class="back-btn"
            >
                ← Back
            </a>

            <a
                href="{{ route(
                    'admin.elevator-types.edit',
                    $elevatorType
                ) }}"
                class="primary-btn"
            >
                Edit Elevator
            </a>

        </div>

    </div>


    <div class="details-grid">

        {{-- LEFT SIDE --}}
        <div class="details-main">

            {{-- IMAGE --}}
            <div class="details-card">

                <div class="details-image">

                    @if($elevatorType->image)

                        <img
                            src="{{ asset(
                                'storage/' .
                                $elevatorType->image
                            ) }}"
                            alt="{{ $elevatorType->name }}"
                        >

                    @else

                        <div class="details-no-image">
                            No Elevator Image
                        </div>

                    @endif

                </div>

            </div>


            {{-- BASIC INFORMATION --}}
            <div class="details-card">

                <div class="details-card-header">

                    <h3>
                        Basic Information
                    </h3>

                </div>

                <div class="details-card-body">

                    <div class="details-field">

                        <span>Elevator Name</span>

                        <strong>
                            {{ $elevatorType->name }}
                        </strong>

                    </div>


                    <div class="details-field">

                        <span>Slug</span>

                        <strong>
                            {{ $elevatorType->slug }}
                        </strong>

                    </div>


                    <div class="details-description">

                        <span>
                            Short Description
                        </span>

                        <p>
                            {{ $elevatorType->short_description
                                ?: 'No short description added.' }}
                        </p>

                    </div>


                    <div class="details-description">

                        <span>
                            Full Description
                        </span>

                        <p>
                            {{ $elevatorType->description
                                ?: 'No description added.' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- FEATURES --}}
            <div class="details-card">

                <div class="details-card-header">

                    <h3>
                        Elevator Features
                    </h3>

                </div>

                <div class="details-card-body">

                    @if(
                        !empty($elevatorType->features)
                    )

                        <div class="details-features">

                            @foreach(
                                $elevatorType->features
                                as $feature
                            )

                                <div class="details-feature">

                                    <span class="feature-check">
                                        ✓
                                    </span>

                                    <span>
                                        {{ $feature }}
                                    </span>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <p class="empty-text">
                            No features added.
                        </p>

                    @endif

                </div>

            </div>

        </div>


        {{-- RIGHT SIDE --}}
        <aside class="details-sidebar">

            {{-- PUBLISH --}}
            <div class="details-card">

                <div class="details-card-header">

                    <h3>
                        Publishing
                    </h3>

                </div>

                <div class="details-card-body">

                    <div class="detail-meta-row">

                        <span>Status</span>

                        @if($elevatorType->status)

                            <span class="status-badge active">
                                Active
                            </span>

                        @else

                            <span class="status-badge inactive">
                                Inactive
                            </span>

                        @endif

                    </div>


                    <div class="detail-meta-row">

                        <span>Display Order</span>

                        <strong>
                            {{ $elevatorType->sort_order }}
                        </strong>

                    </div>


                    <div class="detail-meta-row">

                        <span>Created</span>

                        <strong>
                            {{ $elevatorType->created_at
                                ->format('d M Y') }}
                        </strong>

                    </div>


                    <div class="detail-meta-row">

                        <span>Last Updated</span>

                        <strong>
                            {{ $elevatorType->updated_at
                                ->format('d M Y') }}
                        </strong>

                    </div>

                </div>

            </div>


            {{-- SEO --}}
            <div class="details-card">

                <div class="details-card-header">

                    <h3>
                        SEO Information
                    </h3>

                </div>

                <div class="details-card-body">

                    <div class="details-description">

                        <span>Meta Title</span>

                        <p>
                            {{ $elevatorType->meta_title
                                ?: 'Not added' }}
                        </p>

                    </div>


                    <div class="details-description">

                        <span>
                            Meta Description
                        </span>

                        <p>
                            {{ $elevatorType->meta_description
                                ?: 'Not added' }}
                        </p>

                    </div>

                </div>

            </div>

        </aside>

    </div>

</div>

@endsection