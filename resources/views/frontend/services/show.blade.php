@extends('layouts.frontend')

@section(
    'title',
    $service->meta_title
        ?: $service->title . ' | Naksh Elevator'
)

@section(
    'meta_description',
    $service->meta_description
        ?: $service->short_description
)

@push('styles')

<link
    rel="stylesheet"
    href="{{ asset(
        'assets/frontend/css/services/show.css'
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
        'frontend.services.sections.detail-hero'
    )

    {{-- OVERVIEW --}}
    @include(
        'frontend.services.sections.detail-overview'
    )

    {{-- FEATURES --}}
    @include(
        'frontend.services.sections.detail-features'
    )

    {{-- PROCESS --}}
    @include(
        'frontend.services.sections.service-process'
    )

    {{-- RELATED --}}
    @include(
        'frontend.services.sections.related-services'
    )

    {{-- CTA --}}
    @include(
        'frontend.components.cta'
    )

@endsection