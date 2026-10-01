@extends('layouts.admin')


@section('title', 'Edit Elevator')

@section('page-title', 'Edit Elevator')

@section(
    'page-description',
    'Update elevator information and settings'
)


@section('content')

<div class="form-page">

    <div class="page-action-bar">

        <div>

            <h2>
                Edit {{ $elevatorType->name }}
            </h2>

            <p>
                Update elevator details, features
                and publishing settings.
            </p>

        </div>


        <a
            href="{{ route(
                'admin.elevator-types.index'
            ) }}"
            class="back-btn"
        >
            ← Back to Elevators
        </a>

    </div>


    <form
        action="{{ route(
            'admin.elevator-types.update',
            $elevatorType
        ) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        <div class="elevator-form-grid">

            @include(
                'admin.elevator-types.partials.form'
            )

        </div>


        <div class="form-submit-bar">

            <a
                href="{{ route(
                    'admin.elevator-types.index'
                ) }}"
                class="cancel-btn"
            >
                Cancel
            </a>


            <button
                type="submit"
                class="save-btn"
            >
                Update Elevator
            </button>

        </div>

    </form>

</div>

@endsection