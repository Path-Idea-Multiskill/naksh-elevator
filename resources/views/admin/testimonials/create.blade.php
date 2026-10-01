@extends('layouts.admin')

@section('title', 'Add Testimonial')
@section('page-title', 'Add Testimonial')
@section(
    'page-description',
    'Add a customer review to Naksh Elevator'
)


@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/testimonials.css') }}"
>
@endpush


@section('content')

<div class="testimonial-page testimonial-form-page">

    {{-- HEADER --}}
    <div class="testimonial-page-header">

        <div class="testimonial-heading">

            <span class="testimonial-eyebrow">
                TESTIMONIAL MANAGEMENT
            </span>

            <h2>
                Add Testimonial
            </h2>

            <p>
                Add genuine customer feedback and ratings
                to display across the Naksh Elevator website.
            </p>

        </div>


        <a
            href="{{ route('admin.testimonials.index') }}"
            class="testimonial-back-btn"
        >
            ← Back to Testimonials
        </a>

    </div>


    {{-- FORM --}}
    <form
        id="testimonialForm"
        action="{{ route('admin.testimonials.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="testimonial-admin-form"
        novalidate
    >

        @csrf


        {{-- FRONTEND VALIDATION SUMMARY --}}
        <div
            class="testimonial-validation-summary"
            id="testimonialValidationSummary"
            hidden
        >
            <strong>
                Please correct the highlighted fields.
            </strong>

            <p id="testimonialValidationMessage"></p>
        </div>


        <div class="testimonial-form-grid">

            @include(
                'admin.testimonials.partials.form'
            )

        </div>


        {{-- ACTIONS --}}
        <div class="testimonial-form-actions">

            <a
                href="{{ route('admin.testimonials.index') }}"
                class="testimonial-cancel-btn"
            >
                Cancel
            </a>


            <button
                type="submit"
                id="testimonialSaveBtn"
                class="testimonial-save-btn"
            >
                Save Testimonial
            </button>

        </div>

    </form>

</div>

@endsection


@push('scripts')
<script
    src="{{ asset('assets/admin/js/testimonials.js') }}"
></script>
@endpush