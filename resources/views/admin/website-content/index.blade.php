@extends('layouts.admin')

@section('title', 'Website Content')
@section('page-title', 'Website Content')

@push('styles')
<link
    rel="stylesheet"
    href="{{ asset(
        'assets/admin/css/website-content.css'
    ) }}"
>
@endpush


@section('content')

<div class="website-content-page">

    <div class="website-content-header">

        <span class="website-content-eyebrow">
            WEBSITE MANAGEMENT
        </span>

        <h2>
            Website Content
        </h2>

        <p>
            Manage headings, descriptions and
            call-to-action content displayed across
            the Naksh Elevator website.
        </p>

    </div>


    <div class="website-page-grid">

        @foreach($pages as $key => $page)

            <article class="website-page-card">

                <div class="website-page-icon">

                    @if($key === 'home')
                       ⌂
                    @elseif($key === 'about')
                       ◎
                    @else
                       ✉
                    @endif

                </div>


                <div class="website-page-content">

                    <span>
                        {{ strtoupper($key) }}
                    </span>

                    <h3>
                        {{ $page['title'] }}
                    </h3>

                    <p>
                        {{ $page['description'] }}
                    </p>

                </div>


                <a
                    href="{{ route(
                        'admin.website-content.edit',
                        $key
                    ) }}"
                    class="website-page-edit"
                >
                    Manage Content
                    <span>→</span>
                </a>

            </article>

        @endforeach

    </div>


    <div class="website-content-note">

        <div class="website-content-note-icon">
            i
        </div>

        <div>

            <strong>
                Global website information
            </strong>

            <p>
                Logo, phone number, email, address,
                social links and other global details
                will be managed separately from
                Website Settings.
            </p>

        </div>

    </div>

</div>

@endsection