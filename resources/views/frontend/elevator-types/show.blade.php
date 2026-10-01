@extends('layouts.frontend')


@section(
    'title',
    $elevatorType->meta_title
        ?: $elevatorType->name . ' | Naksh Elevator'
)


@section(
    'meta_description',
    $elevatorType->meta_description
        ?: $elevatorType->short_description
)


@push('styles')

    <link
        rel="stylesheet"
        href="{{
            asset(
                'assets/frontend/css/elevator-types/show.css'
            )
        }}"
    >

    <link
        rel="stylesheet"
        href="{{
            asset(
                'assets/frontend/css/components/cta.css'
            )
        }}"
    >

@endpush


@section('content')


    {{-- DETAIL HERO --}}
    @include(
        'frontend.elevator-types.sections.detail-hero'
    )


    {{-- OVERVIEW --}}
    @include(
        'frontend.elevator-types.sections.detail-overview'
    )


    {{-- FEATURES --}}
    @include(
        'frontend.elevator-types.sections.detail-features'
    )


    {{-- RELATED TYPES --}}
    @include(
        'frontend.elevator-types.sections.related-types'
    )


    {{-- CTA --}}
    @include(
        'frontend.components.cta'
    )


@endsection