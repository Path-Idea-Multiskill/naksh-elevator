@extends('layouts.admin')


@section('title', 'Add Elevator')

@section('page-title', 'Add Elevator')

@section(
    'page-description',
    'Create a new elevator solution for Naksh Elevator'
)


@section('content')

<div class="form-page">

    <div class="page-action-bar">

        <div>

            <h2>Add New Elevator</h2>

            <p>
                Enter elevator information, features,
                image and publishing details.
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
            'admin.elevator-types.store'
        ) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf


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
                Save Elevator
            </button>

        </div>

    </form>

</div>

@endsection