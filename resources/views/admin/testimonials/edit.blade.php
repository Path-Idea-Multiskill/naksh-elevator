@extends('layouts.admin')

@section('title', 'Edit Testimonial')
@section('page-title', 'Edit Testimonial')
@section(
    'page-description',
    'Update customer testimonial'
)


@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/testimonials.css') }}"
>
@endpush


@section('content')

<div class="testimonial-page testimonial-form-page">

    <div class="testimonial-page-header">

        <div class="testimonial-heading">

            <span class="testimonial-eyebrow">
                TESTIMONIAL MANAGEMENT
            </span>

            <h2>
                Edit Testimonial
            </h2>

            <p>
                Update testimonial from
                {{ $testimonial->customer_name }}.
            </p>

        </div>


        <a
            href="{{ route('admin.testimonials.index') }}"
            class="testimonial-back-btn"
        >
            ← Back to Testimonials
        </a>

    </div>


    <form
        id="testimonialForm"
        action="{{ route(
            'admin.testimonials.update',
            $testimonial
        ) }}"
        method="POST"
        enctype="multipart/form-data"
        class="testimonial-admin-form"
        data-edit-mode="1"
        novalidate
    >

        @csrf
        @method('PUT')


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
                Update Testimonial
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