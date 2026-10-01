@extends('layouts.admin')

@section('title', 'Services')
@section('page-title', 'Services')
@section(
    'page-description',
    'Manage elevator services offered by Naksh Elevator'
)

@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/services.css') }}"
>
@endpush

@section('content')

<div class="naksh-services-page">

    {{-- PAGE HEADER --}}
    <div class="services-page-header">

        <div class="services-heading">

            <span class="services-eyebrow">
                SERVICE MANAGEMENT
            </span>

            <h2>Our Services</h2>

            <p>
                Manage installation, maintenance,
                modernization and other elevator services.
            </p>

        </div>

        <a
            href="{{ route('admin.services.create') }}"
            class="services-add-btn"
        >
            <span class="services-add-icon">+</span>
            <span>Add Service</span>
        </a>

    </div>


    {{-- SUMMARY --}}
    <div class="services-summary">

        <div class="service-summary-card">

            <span class="summary-label">
                Total Services
            </span>

            <strong>
                {{ $services->total() }}
            </strong>

        </div>


        <div class="service-summary-card">

            <span class="summary-label">
                Current Page
            </span>

            <strong>
                {{ $services->currentPage() }}
            </strong>

        </div>


        <div class="service-summary-card">

            <span class="summary-label">
                Showing
            </span>

            <strong>
                {{ $services->count() }}
            </strong>

        </div>

    </div>


    {{-- DESKTOP / LAPTOP TABLE --}}
    <div class="services-table-card">

        <div class="services-table-wrap">

            <table class="services-table">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Updated</th>
                        <th class="services-action-heading">
                            Actions
                        </th>
                    </tr>

                </thead>

                <tbody>

                @forelse($services as $service)

                    <tr>

                        <td class="service-number">

                            {{ $services->firstItem()
                                + $loop->index }}

                        </td>


                        <td>

                            <div class="service-main-info">

                                <div class="service-thumbnail">

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


                                <div class="service-info-text">

                                    <strong>
                                        {{ $service->title }}
                                    </strong>

                                    <span>
                                        {{ \Illuminate\Support\Str::limit(
                                            $service->short_description
                                                ?: 'No description added.',
                                            65
                                        ) }}
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>

                            <span class="service-order">
                                {{ $service->sort_order }}
                            </span>

                        </td>


                        <td>

                            <form
                                method="POST"
                                action="{{ route(
                                    'admin.services.toggle-status',
                                    $service
                                ) }}"
                                class="service-status-form"
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

                        </td>


                        <td class="service-date">

                            {{ $service->updated_at
                                ->format('d M Y') }}

                        </td>


                        <td>

                            <div class="service-actions">

                                <a
                                    href="{{ route(
                                        'admin.services.show',
                                        $service
                                    ) }}"
                                    class="service-action-btn
                                           service-view-btn"
                                >
                                    View
                                </a>


                                <a
                                    href="{{ route(
                                        'admin.services.edit',
                                        $service
                                    ) }}"
                                    class="service-action-btn
                                           service-edit-btn"
                                >
                                    Edit
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
                                        class="service-action-btn
                                               service-delete-btn"
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
                            colspan="6"
                            class="services-empty-table"
                        >

                            <div class="services-empty-state">

                                <div class="services-empty-icon">
                                    S
                                </div>

                                <h3>
                                    No Services Added
                                </h3>

                                <p>
                                    Start by adding your first
                                    Naksh Elevator service.
                                </p>

                                <a
                                    href="{{ route(
                                        'admin.services.create'
                                    ) }}"
                                    class="services-add-btn"
                                >
                                    + Add First Service
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        {{-- MOBILE CARDS --}}
        <div class="services-mobile-list">

            @forelse($services as $service)

                <article class="service-mobile-card">

                    <div class="service-mobile-top">

                        <div class="service-thumbnail">

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


                        <div class="service-mobile-heading">

                            <h3>
                                {{ $service->title }}
                            </h3>

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

                    </div>


                    <p class="service-mobile-description">

                        {{ \Illuminate\Support\Str::limit(
                            $service->short_description
                                ?: 'No description added.',
                            110
                        ) }}

                    </p>


                    <div class="service-mobile-meta">

                        <div>
                            <span>Display Order</span>

                            <strong>
                                {{ $service->sort_order }}
                            </strong>
                        </div>

                        <div>
                            <span>Updated</span>

                            <strong>
                                {{ $service->updated_at
                                    ->format('d M Y') }}
                            </strong>
                        </div>

                    </div>


                    <div class="service-mobile-actions">

                        <a
                            href="{{ route(
                                'admin.services.show',
                                $service
                            ) }}"
                            class="service-action-btn
                                   service-view-btn"
                        >
                            View
                        </a>


                        <a
                            href="{{ route(
                                'admin.services.edit',
                                $service
                            ) }}"
                            class="service-action-btn
                                   service-edit-btn"
                        >
                            Edit
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
                                class="service-action-btn
                                       service-delete-btn"
                            >
                                Delete
                            </button>

                        </form>

                    </div>

                </article>

            @empty

                <div class="services-mobile-empty">

                    <h3>No Services Added</h3>

                    <p>
                        Add your first elevator service.
                    </p>

                    <a
                        href="{{ route(
                            'admin.services.create'
                        ) }}"
                        class="services-add-btn"
                    >
                        + Add Service
                    </a>

                </div>

            @endforelse

        </div>

    </div>


    {{-- PAGINATION --}}
    @if($services->hasPages())

        <div class="services-pagination">

            {{ $services->links() }}

        </div>

    @endif

</div>

@endsection