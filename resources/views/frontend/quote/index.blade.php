@extends('layouts.frontend')


@section(
    'title',
    'Get Free Elevator Quote | Naksh Elevator'
)


@section(
    'meta_description',
    'Request a free elevator quote from Naksh Elevator for residential, commercial and other elevator projects.'
)


@push('styles')

<link
    rel="stylesheet"
    href="{{ asset(
        'assets/frontend/css/quote/page.css'
    ) }}"
>

<link
    rel="stylesheet"
    href="{{ asset(
        'assets/frontend/css/quote/form.css'
    ) }}"
>

@endpush


@section('content')

    @include(
        'frontend.quote.sections.hero'
    )

    @include(
        'frontend.quote.sections.benefits'
    )

    @include(
        'frontend.quote.sections.form'
    )

@endsection


@push('scripts')

<script
    src="{{ asset(
        'assets/frontend/js/quote/form.js'
    ) }}"
    defer
></script>

@endpush