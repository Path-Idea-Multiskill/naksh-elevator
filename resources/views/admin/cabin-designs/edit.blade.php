@extends('layouts.admin')

@section('title', 'Edit Cabin Design')

@section('content')

<div class="cabin-admin-page">

    <div class="cabin-page-header">

        <div>
            <span class="cabin-eyebrow">
                CABIN DESIGNS
            </span>

            <h1>Edit Cabin Design</h1>

            <p>
                Update design information, images
                and display settings.
            </p>
        </div>

        <a
            href="{{ route('admin.cabin-designs.index') }}"
            class="cabin-btn cabin-btn-outline"
        >
            ← Back to Designs
        </a>

    </div>

    @if ($errors->any())
        <div class="cabin-alert cabin-alert-error">
            Please correct the highlighted fields.
        </div>
    @endif

    <div class="cabin-form-card">

        <form
            action="{{
                route(
                    'admin.cabin-designs.update',
                    $cabinDesign
                )
            }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            @include(
                'admin.cabin-designs.partials.form'
            )

            <div class="cabin-form-actions">

                <a
                    href="{{ route('admin.cabin-designs.index') }}"
                    class="cabin-btn cabin-btn-outline"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="cabin-btn cabin-btn-primary"
                >
                    Update Cabin Design
                </button>

            </div>

        </form>

    </div>

</div>

@endsection