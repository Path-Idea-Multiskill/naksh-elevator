@extends('layouts.admin')

@section('title', 'Add Service')
@section('page-title', 'Add Service')

@section(
    'page-description',
    'Create a new Naksh Elevator service'
)


@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/services.css') }}"
>
@endpush


@section('content')

<div class="naksh-services-page service-form-page">

    <div class="service-form-page-header">

        <div>

            <span class="services-eyebrow">
                SERVICE MANAGEMENT
            </span>

            <h2>Add New Service</h2>

            <p>
                Add service details, features,
                image and publishing information.
            </p>

        </div>


        <a
            href="{{ route('admin.services.index') }}"
            class="service-back-btn"
        >
            ← Back to Services
        </a>

    </div>


    <form
        action="{{ route('admin.services.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="service-admin-form"
    >

        @csrf


        <div class="service-form-grid">

            @include(
                'admin.services.partials.form'
            )

        </div>


        <div class="service-form-submit">

            <a
                href="{{ route('admin.services.index') }}"
                class="service-cancel-btn"
            >
                Cancel
            </a>


            <button
                type="submit"
                class="service-save-btn"
            >
                Save Service
            </button>

        </div>

    </form>

</div>

@endsection


@push('scripts')
<script
    src="{{ asset('assets/admin/js/services.js') }}"
></script>
@endpush