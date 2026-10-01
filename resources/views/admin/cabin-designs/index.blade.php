@extends('layouts.admin')

@section('title', 'Cabin Designs')

@section('content')

<div class="cabin-admin-page">

    <div class="cabin-page-header">

        <div>
            <span class="cabin-eyebrow">
                CABIN COLLECTION
            </span>

            <h1>Cabin Designs</h1>

            <p>
                Manage elevator cabin interiors, ceilings,
                designer sheets and premium finishes.
            </p>
        </div>

        <a
            href="{{ route('admin.cabin-designs.create') }}"
            class="cabin-btn cabin-btn-primary"
        >
            + Add Cabin Design
        </a>

    </div>

    @if (session('success'))
        <div class="cabin-alert cabin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($cabinDesigns->count())

        <div class="cabin-design-grid">

            @foreach ($cabinDesigns as $design)

                <article class="cabin-design-card">

                    <div class="cabin-design-image">

                        <img
                            src="{{
                                asset(
                                    'storage/' .
                                    $design->cover_image
                                )
                            }}"
                            alt="{{ $design->title }}"
                        >

                        <span
                            class="
                                cabin-status
                                {{
                                    $design->status
                                        ? 'is-active'
                                        : 'is-inactive'
                                }}
                            "
                        >
                            {{
                                $design->status
                                    ? 'Active'
                                    : 'Inactive'
                            }}
                        </span>

                        @if ($design->featured)
                            <span class="cabin-featured">
                                Featured
                            </span>
                        @endif

                    </div>

                    <div class="cabin-design-body">

                        <span class="cabin-category">
                            {{
                                ucwords(
                                    str_replace(
                                        '-',
                                        ' ',
                                        $design->category
                                    )
                                )
                            }}
                        </span>

                        <h3>
                            {{ $design->title }}
                        </h3>

                        @if ($design->material_finish)
                            <p class="cabin-material">
                                {{ $design->material_finish }}
                            </p>
                        @endif

                        <p class="cabin-description">
                            {{
                                \Illuminate\Support\Str::limit(
                                    $design->short_description,
                                    90
                                )
                            }}
                        </p>

                        <div class="cabin-card-footer">

                            <span>
                                Order:
                                {{ $design->sort_order }}
                            </span>

                            <div class="cabin-card-actions">

                                <a
                                    href="{{
                                        route(
                                            'admin.cabin-designs.edit',
                                            $design
                                        )
                                    }}"
                                    class="cabin-action-edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{
                                        route(
                                            'admin.cabin-designs.destroy',
                                            $design
                                        )
                                    }}"
                                    method="POST"
                                    onsubmit="
                                        return confirm(
                                            'Delete this cabin design?'
                                        )
                                    "
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="cabin-action-delete"
                                    >
                                        Delete
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

        <div class="cabin-pagination">
            {{ $cabinDesigns->links() }}
        </div>

    @else

        <div class="cabin-empty">

            <div class="cabin-empty-icon">
                <i class="fa-solid fa-elevator"></i>
            </div>

            <h3>No Cabin Designs Yet</h3>

            <p>
                Add your first elevator cabin design
                to start building the collection.
            </p>

            <a
                href="{{ route('admin.cabin-designs.create') }}"
                class="cabin-btn cabin-btn-primary"
            >
                + Add First Design
            </a>

        </div>

    @endif

</div>

@endsection