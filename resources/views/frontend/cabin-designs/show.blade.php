@extends('layouts.frontend')

@section(
    'title',
    ($cabinDesign->meta_title ?? $cabinDesign->title) . ' | Naksh Elevator'
)

@section(
    'meta_description',
    $cabinDesign->meta_description
        ?? $cabinDesign->short_description
)



@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/frontend/css/cabin-designs/index.css') }}"
>
<link
    rel="stylesheet"
    href="{{ asset('assets/frontend/css/cabin-designs/show.css') }}"
>
@endpush

@section('content')

    @include(
        'frontend.cabin-designs.sections.detail-hero'
    )

    @include(
        'frontend.cabin-designs.sections.detail-overview'
    )

    @include(
        'frontend.cabin-designs.sections.detail-gallery'
    )

    @include(
        'frontend.cabin-designs.sections.related-designs'
    )

    @include('frontend.components.cta')

@endsection

@push('scripts')
<script
    src="{{ asset('assets/frontend/js/cabin-designs/show.js') }}"
    defer
></script>
@endpush