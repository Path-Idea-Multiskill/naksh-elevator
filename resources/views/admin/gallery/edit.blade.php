@extends('layouts.admin')

@section('title', 'Edit Gallery Image')
@section('page-title', 'Edit Gallery Image')
@section(
    'page-description',
    'Update Naksh Elevator gallery image'
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

            <h2>Edit Gallery Image</h2>

            <p>
                Update {{ $gallery->title }}.
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
        action="{{ route(
            'admin.gallery.update',
            $gallery
        ) }}"
        method="POST"
        enctype="multipart/form-data"
        class="gallery-admin-form"
        data-edit-mode="1"
        novalidate
    >

        @csrf
        @method('PUT')


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
                Update Gallery Image
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