@extends('layouts.frontend')


@section(
    'title',
    'Contact Naksh Elevator | Elevator Solutions'
)


@section(
    'meta_description',
    'Contact Naksh Elevator for elevator installation, maintenance, modernization and professional elevator solutions.'
)


@push('styles')

<link
    rel="stylesheet"
    href="{{ asset(
        'assets/frontend/css/contact/page.css'
    ) }}"
>

<link
    rel="stylesheet"
    href="{{ asset(
        'assets/frontend/css/contact/form.css'
    ) }}"
>

@endpush


@section('content')


    @include(
        'frontend.contact.sections.hero'
    )


    @include(
        'frontend.contact.sections.contact-info'
    )


    @include(
        'frontend.contact.sections.enquiry-form'
    )


@endsection


@push('scripts')

<script
    src="{{ asset(
        'assets/frontend/js/contact/form.js'
    ) }}"
    defer
></script>

@endpush