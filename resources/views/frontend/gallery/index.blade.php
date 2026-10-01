@extends('layouts.frontend')


@section(
    'title',
    'Elevator Gallery | Naksh Elevator'
)


@section(
    'meta_description',
    'Explore elevator installations, completed projects and professional elevator work by Naksh Elevator.'
)


@push('styles')

<link
    rel="stylesheet"
    href="{{ asset(
        'assets/frontend/css/gallery/index.css'
    ) }}"
>

<link
    rel="stylesheet"
    href="{{ asset(
        'assets/frontend/css/components/cta.css'
    ) }}"
>

@endpush


@section('content')


    {{-- HERO --}}
    @include(
        'frontend.gallery.sections.hero'
    )


    {{-- CATEGORY FILTER --}}
    @include(
        'frontend.gallery.sections.filters'
    )


    {{-- GALLERY GRID --}}
    @include(
        'frontend.gallery.sections.gallery-grid'
    )


    {{-- CTA --}}
    @include(
        'frontend.components.cta'
    )


    {{-- LIGHTBOX --}}
    @include(
        'frontend.gallery.sections.lightbox'
    )


@endsection


@push('scripts')

<script
    src="{{ asset(
        'assets/frontend/js/gallery/index.js'
    ) }}"
    defer
></script>

@endpush