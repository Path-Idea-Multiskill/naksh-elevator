@extends('layouts.admin')

@section('title', $service->title)
@section('page-title', 'Service Details')

@section(
    'page-description',
    'View complete service information'
)

@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/services.css') }}"
>
@endpush


@section('content')

<div class="naksh-services-page service-details-page">

    {{-- HEADER --}}
    <div class="service-details-header">

        <div>

            <span class="services-eyebrow">
                SERVICE MANAGEMENT
            </span>

            <h2>{{ $service->title }}</h2>

            <p>
                View complete service information,
                features and publishing settings.
            </p>

        </div>


        <div class="service-details-header-actions">

            <a
                href="{{ route('admin.services.index') }}"
                class="service-back-btn"
            >
                ← Back
            </a>

            <a
                href="{{ route(
                    'admin.services.edit',
                    $service
                ) }}"
                class="service-details-edit-btn"
            >
                Edit Service
            </a>

        </div>

    </div>


    <div class="service-details-grid">

        {{-- ==============================
             LEFT CONTENT
        =============================== --}}
        <div class="service-details-main">


            {{-- IMAGE --}}
            <section class="service-details-card">

                <div class="service-details-image">

                    @if($service->image)

                        <img
                            src="{{ asset(
                                'storage/' . $service->image
                            ) }}"
                            alt="{{ $service->title }}"
                        >

                    @else

                        <div class="service-details-no-image">

                            <div>S</div>

                            <strong>
                                No Service Image
                            </strong>

                        </div>

                    @endif

                </div>

            </section>


            {{-- BASIC INFORMATION --}}
            <section class="service-details-card">

                <div class="service-details-card-header">

                    <div>

                        <span class="service-form-label">
                            SERVICE DETAILS
                        </span>

                        <h3>
                            Basic Information
                        </h3>

                    </div>

                </div>


                <div class="service-details-card-body">

                    <div class="service-detail-row">

                        <span>
                            Service Title
                        </span>

                        <strong>
                            {{ $service->title }}
                        </strong>

                    </div>


                    <div class="service-detail-row">

                        <span>
                            URL Slug
                        </span>

                        <strong class="service-slug">
                            {{ $service->slug }}
                        </strong>

                    </div>


                    <div class="service-detail-block">

                        <span>
                            Short Description
                        </span>

                        <p>
                            {{ $service->short_description
                                ?: 'No short description added.' }}
                        </p>

                    </div>


                    <div class="service-detail-block">

                        <span>
                            Full Description
                        </span>

                        <p>
                            {{ $service->description
                                ?: 'No full description added.' }}
                        </p>

                    </div>

                </div>

            </section>


            {{-- FEATURES --}}
            <section class="service-details-card">

                <div class="service-details-card-header">

                    <div>

                        <span class="service-form-label">
                            KEY BENEFITS
                        </span>

                        <h3>
                            Service Features
                        </h3>

                    </div>

                </div>


                <div class="service-details-card-body">

                    @if(
                        !empty($service->features) &&
                        count($service->features)
                    )

                        <div class="service-details-features">

                            @foreach(
                                $service->features as $feature
                            )

                                <div class="service-detail-feature">

                                    <span
                                        class="service-feature-check"
                                    >
                                        ✓
                                    </span>

                                    <span>
                                        {{ $feature }}
                                    </span>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="service-details-empty">
                            No service features added.
                        </div>

                    @endif

                </div>

            </section>

        </div>


        {{-- ==============================
             RIGHT SIDEBAR
        =============================== --}}
        <aside class="service-details-sidebar">


            {{-- PUBLISHING --}}
            <section class="service-details-card">

                <div class="service-details-card-header">

                    <div>

                        <span class="service-form-label">
                            PUBLISH
                        </span>

                        <h3>
                            Publishing
                        </h3>

                    </div>

                </div>


                <div class="service-details-card-body">

                    <div class="service-details-meta">

                        <span>Status</span>


                        <form
                            method="POST"
                            action="{{ route(
                                'admin.services.toggle-status',
                                $service
                            ) }}"
                        >

                            @csrf
                            @method('PATCH')


                            <button
                                type="submit"
                                class="service-status
                                {{ $service->status
                                    ? 'service-status-active'
                                    : 'service-status-inactive' }}"
                                title="Click to change status"
                            >

                                <span
                                    class="service-status-dot"
                                ></span>

                                {{ $service->status
                                    ? 'Active'
                                    : 'Inactive' }}

                            </button>

                        </form>

                    </div>


                    <div class="service-details-meta">

                        <span>
                            Display Order
                        </span>

                        <strong>
                            {{ $service->sort_order }}
                        </strong>

                    </div>


                    <div class="service-details-meta">

                        <span>
                            Created
                        </span>

                        <strong>
                            {{ $service->created_at
                                ->format('d M Y') }}
                        </strong>

                    </div>


                    <div class="service-details-meta">

                        <span>
                            Last Updated
                        </span>

                        <strong>
                            {{ $service->updated_at
                                ->format('d M Y') }}
                        </strong>

                    </div>

                </div>

            </section>


            {{-- SEO --}}
            <section class="service-details-card">

                <div class="service-details-card-header">

                    <div>

                        <span class="service-form-label">
                            SEARCH ENGINE
                        </span>

                        <h3>
                            SEO Information
                        </h3>

                    </div>

                </div>


                <div class="service-details-card-body">

                    <div class="service-detail-block first-block">

                        <span>
                            Meta Title
                        </span>

                        <p>
                            {{ $service->meta_title
                                ?: 'Not added' }}
                        </p>

                    </div>


                    <div class="service-detail-block">

                        <span>
                            Meta Description
                        </span>

                        <p>
                            {{ $service->meta_description
                                ?: 'Not added' }}
                        </p>

                    </div>

                </div>

            </section>


            {{-- QUICK ACTION --}}
            <section
                class="service-details-card
                       service-quick-actions"
            >

                <div class="service-details-card-header">

                    <div>

                        <span class="service-form-label">
                            ACTIONS
                        </span>

                        <h3>
                            Quick Actions
                        </h3>

                    </div>

                </div>


                <div class="service-details-card-body">

                    <a
                        href="{{ route(
                            'admin.services.edit',
                            $service
                        ) }}"
                        class="service-quick-edit"
                    >
                        Edit Service
                    </a>


                    <form
                        method="POST"
                        action="{{ route(
                            'admin.services.destroy',
                            $service
                        ) }}"
                        onsubmit="
                            return confirm(
                                'Are you sure you want to delete this service?'
                            );
                        "
                    >

                        @csrf
                        @method('DELETE')


                        <button
                            type="submit"
                            class="service-quick-delete"
                        >
                            Delete Service
                        </button>

                    </form>

                </div>

            </section>

        </aside>

    </div>

</div>

@endsection