@extends('layouts.admin')

@section('title', 'Gallery Details')
@section('page-title', 'Gallery Details')

@push('styles')
    <link
        rel="stylesheet"
        href="{{ asset('assets/admin/css/gallery.css') }}"
    >
@endpush


@section('content')

<div class="naksh-gallery-page">

    <div class="gallery-page-header">

        <div>
            <span class="gallery-eyebrow">
                GALLERY MANAGEMENT
            </span>

            <h2>{{ $gallery->title }}</h2>

            <p>
                View complete gallery image information.
            </p>
        </div>


        <a
            href="{{ route('admin.gallery.index') }}"
            class="gallery-back-btn"
        >
            ← Back to Gallery
        </a>

    </div>


    <div class="gallery-show-grid">

        <section class="gallery-show-image">

            <img
                src="{{ asset(
                    'storage/' . $gallery->image
                ) }}"
                alt="{{ $gallery->alt_text ?: $gallery->title }}"
            >

        </section>


        <section class="gallery-show-details">

            <div>
                <span>Title</span>
                <strong>
                    {{ $gallery->title }}
                </strong>
            </div>

            <div>
                <span>Category</span>
                <strong>
                    {{ $gallery->category }}
                </strong>
            </div>

            <div>
                <span>Related Project</span>
                <strong>
                    {{ $gallery->project?->title ?? 'Not linked' }}
                </strong>
            </div>

            <div>
                <span>Alt Text</span>
                <strong>
                    {{ $gallery->alt_text ?: 'Not provided' }}
                </strong>
            </div>

            <div>
                <span>Display Order</span>
                <strong>
                    {{ $gallery->sort_order }}
                </strong>
            </div>

            <div>
                <span>Status</span>

                <strong>
                    {{ $gallery->status
                        ? 'Active'
                        : 'Inactive'
                    }}
                </strong>
            </div>


            <a
                href="{{ route(
                    'admin.gallery.edit',
                    $gallery
                ) }}"
                class="gallery-save-btn"
            >
                Edit Gallery Image
            </a>

        </section>

    </div>

</div>

@endsection