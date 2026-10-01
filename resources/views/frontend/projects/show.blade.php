@extends('layouts.frontend')


@section(
    'title',
    $project->meta_title
        ?: $project->title . ' | Naksh Elevator'
)


@section(
    'meta_description',
    $project->meta_description
        ?: $project->short_description
)


@push('styles')

<link
    rel="stylesheet"
    href="{{ asset(
        'assets/frontend/css/projects/show.css'
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


    {{-- PROJECT HERO --}}
    @include(
        'frontend.projects.sections.detail-hero'
    )


    {{-- PROJECT OVERVIEW --}}
    @include(
        'frontend.projects.sections.detail-overview'
    )


    {{-- PROJECT HIGHLIGHTS --}}
    @include(
        'frontend.projects.sections.detail-highlights'
    )


    {{-- PROJECT GALLERY --}}
    @include(
        'frontend.projects.sections.detail-gallery'
    )


    {{-- RELATED PROJECTS --}}
    @include(
        'frontend.projects.sections.related-projects'
    )


    {{-- CTA --}}
    @include(
        'frontend.components.cta'
    )


@endsection