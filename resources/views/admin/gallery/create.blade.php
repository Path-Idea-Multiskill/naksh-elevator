@extends('layouts.admin')

@section('title', 'Add Gallery Image')
@section('page-title', 'Add Gallery Image')
@section(
    'page-description',
    'Add a new image to the Naksh Elevator gallery'
)

@push('styles')
    <link
        rel="stylesheet"
        href="{{ asset('assets/admin/css/gallery.css') }}"
    >
@endpush


@section('content')

<div class="naksh-gallery-page gallery-form-page">

    <div class="gallery-page-header">

        <div>
            <span class="gallery-eyebrow">
                GALLERY MANAGEMENT
            </span>

            <h2>Add Gallery Image</h2>

            <p>
                Add elevator and project photography
                to your website gallery.
            </p>
        </div>

        <a
            href="{{ route('admin.gallery.index') }}"
            class="gallery-back-btn"
        >
            ← Back to Gallery
        </a>

    </div>


    <form
        id="galleryForm"
        action="{{ route('admin.gallery.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="gallery-admin-form"
        novalidate
    >

        @csrf


        <div
            class="gallery-validation-summary"
            id="galleryValidationSummary"
            hidden
        >
            <strong>Please correct the highlighted fields.</strong>

            <p id="galleryValidationMessage"></p>
        </div>


        <div class="gallery-form-grid">

            @include('admin.gallery.partials.form')

        </div>


        <div class="gallery-form-submit">

            <a
                href="{{ route('admin.gallery.index') }}"
                class="gallery-cancel-btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                id="gallerySaveBtn"
                class="gallery-save-btn"
            >
                Save Gallery Image
            </button>

        </div>

    </form>

</div>

@endsection


@push('scripts')
    <script
        src="{{ asset('assets/admin/js/gallery.js') }}"
    ></script>
@endpush