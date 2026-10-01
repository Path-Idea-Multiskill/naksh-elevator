@extends('layouts.admin')

@section('title', 'Gallery Management')
@section('page-title', 'Gallery Management')
@section(
    'page-description',
    'Manage Naksh Elevator gallery images'
)

@push('styles')
    <link
        rel="stylesheet"
        href="{{ asset('assets/admin/css/gallery.css') }}"
    >
@endpush


@section('content')

<div class="naksh-gallery-page">

    {{-- PAGE HEADER --}}
    <div class="gallery-page-header">

        <div>
            <span class="gallery-eyebrow">
                MEDIA MANAGEMENT
            </span>

            <h2>Gallery Management</h2>

            <p>
                Manage elevator installations, project photos
                and website gallery images.
            </p>
        </div>

        <a
            href="{{ route('admin.gallery.create') }}"
            class="gallery-add-btn"
        >
            <span>+</span>
            Add Gallery Image
        </a>

    </div>


    {{-- STATS --}}
    <div class="gallery-stats">

        <div class="gallery-stat-card">
            <span>Total Images</span>

            <strong>
                {{ $galleries->total() }}
            </strong>
        </div>

        <div class="gallery-stat-card active">
            <span>Showing</span>

            <strong>
                {{ $galleries->count() }}
            </strong>
        </div>

        <div class="gallery-stat-card info">
            <span>Current Page</span>

            <strong>
                {{ $galleries->currentPage() }}
            </strong>
        </div>

    </div>


    @if($galleries->count())

        {{-- DESKTOP / TABLET TABLE --}}
        <div class="gallery-table-wrapper">

            <table class="gallery-table">

                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Details</th>
                        <th>Category</th>
                        <th>Related Project</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($galleries as $gallery)

                        <tr>

                            <td>
                                <div class="gallery-thumb">
                                    <img
                                        src="{{ asset(
                                            'storage/' .
                                            $gallery->image
                                        ) }}"
                                        alt="{{ $gallery->alt_text ?: $gallery->title }}"
                                    >
                                </div>
                            </td>


                            <td>
                                <div class="gallery-title-cell">

                                    <strong>
                                        {{ $gallery->title }}
                                    </strong>

                                    @if($gallery->alt_text)
                                        <small>
                                            {{ $gallery->alt_text }}
                                        </small>
                                    @endif

                                </div>
                            </td>


                            <td>
                                <span class="gallery-category">
                                    {{ $gallery->category }}
                                </span>
                            </td>


                            <td>
                                <span class="gallery-project-name">
                                    {{ $gallery->project?->title ?? '—' }}
                                </span>
                            </td>


                            <td>
                                {{ $gallery->sort_order }}
                            </td>


                            <td>

                                <form
                                    action="{{ route(
                                        'admin.gallery.toggle-status',
                                        $gallery
                                    ) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="gallery-status-btn {{
                                            $gallery->status
                                                ? 'is-active'
                                                : 'is-inactive'
                                        }}"
                                    >
                                        {{ $gallery->status
                                            ? 'Active'
                                            : 'Inactive'
                                        }}
                                    </button>

                                </form>

                            </td>


                            <td>

                                <div class="gallery-actions">

                                    <a
                                        href="{{ route(
                                            'admin.gallery.show',
                                            $gallery
                                        ) }}"
                                        class="gallery-action view"
                                        title="View"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route(
                                            'admin.gallery.edit',
                                            $gallery
                                        ) }}"
                                        class="gallery-action edit"
                                        title="Edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route(
                                            'admin.gallery.destroy',
                                            $gallery
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirm(
                                            'Delete this gallery image permanently?'
                                        );"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="gallery-action delete"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        {{-- MOBILE CARDS --}}
        <div class="gallery-mobile-list">

            @foreach($galleries as $gallery)

                <article class="gallery-mobile-card">

                    <div class="gallery-mobile-image">

                        <img
                            src="{{ asset(
                                'storage/' .
                                $gallery->image
                            ) }}"
                            alt="{{ $gallery->alt_text ?: $gallery->title }}"
                        >

                        <span
                            class="gallery-mobile-status {{
                                $gallery->status
                                    ? 'active'
                                    : 'inactive'
                            }}"
                        >
                            {{ $gallery->status
                                ? 'Active'
                                : 'Inactive'
                            }}
                        </span>

                    </div>


                    <div class="gallery-mobile-content">

                        <span class="gallery-category">
                            {{ $gallery->category }}
                        </span>

                        <h3>
                            {{ $gallery->title }}
                        </h3>

                        <div class="gallery-mobile-meta">

                            <div>
                                <span>Project</span>

                                <strong>
                                    {{ $gallery->project?->title ?? 'Not linked' }}
                                </strong>
                            </div>

                            <div>
                                <span>Display Order</span>

                                <strong>
                                    {{ $gallery->sort_order }}
                                </strong>
                            </div>

                        </div>


                        <div class="gallery-mobile-actions">

                            <a
                                href="{{ route(
                                    'admin.gallery.show',
                                    $gallery
                                ) }}"
                            >
                                View
                            </a>

                            <a
                                href="{{ route(
                                    'admin.gallery.edit',
                                    $gallery
                                ) }}"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route(
                                    'admin.gallery.destroy',
                                    $gallery
                                ) }}"
                                method="POST"
                                onsubmit="return confirm(
                                    'Delete this gallery image permanently?'
                                );"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>


        {{-- PAGINATION --}}
        @if($galleries->hasPages())

            <div class="gallery-pagination">
                {{ $galleries->links() }}
            </div>

        @endif

    @else

        {{-- EMPTY STATE --}}
        <div class="gallery-empty">

            <div class="gallery-empty-icon">
                ▧
            </div>

            <h3>No Gallery Images Yet</h3>

            <p>
                Add your first elevator or project image
                to the website gallery.
            </p>

            <a
                href="{{ route('admin.gallery.create') }}"
                class="gallery-add-btn"
            >
                + Add First Image
            </a>

        </div>

    @endif

</div>

@endsection