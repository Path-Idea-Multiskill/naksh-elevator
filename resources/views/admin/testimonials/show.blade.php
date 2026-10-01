@extends('layouts.admin')

@section('title', 'Testimonial Details')
@section('page-title', 'Testimonial Details')


@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/testimonials.css') }}"
>
@endpush


@section('content')

<div class="testimonial-page">

    <div class="testimonial-page-header">

        <div class="testimonial-heading">

            <span class="testimonial-eyebrow">
                TESTIMONIAL MANAGEMENT
            </span>

            <h2>
                Testimonial Details
            </h2>

            <p>
                View customer feedback and publishing
                information.
            </p>

        </div>


        <a
            href="{{ route('admin.testimonials.index') }}"
            class="testimonial-back-btn"
        >
            ← Back to Testimonials
        </a>

    </div>


    <div class="testimonial-show-layout">

        {{-- CUSTOMER CARD --}}
        <section class="testimonial-show-customer">

            <div class="testimonial-show-avatar">

                @if($testimonial->customer_image)

                    <img
                        src="{{ asset(
                            'storage/' .
                            $testimonial->customer_image
                        ) }}"
                        alt="{{ $testimonial->customer_name }}"
                    >

                @else

                    <span>
                        {{ strtoupper(
                            substr(
                                $testimonial->customer_name,
                                0,
                                1
                            )
                        ) }}
                    </span>

                @endif

            </div>


            <h3>
                {{ $testimonial->customer_name }}
            </h3>


            <p>
                {{ $testimonial->designation ?: 'Customer' }}
            </p>


            @if($testimonial->location)

                <small>
                    {{ $testimonial->location }}
                </small>

            @endif


            <div class="testimonial-show-stars">

                @for($i = 1; $i <= 5; $i++)

                    <span class="{{
                        $i <= $testimonial->rating
                            ? 'active'
                            : ''
                    }}">
                        ★
                    </span>

                @endfor

            </div>


            <span
                class="testimonial-show-status {{
                    $testimonial->status
                        ? 'active'
                        : 'inactive'
                }}"
            >
                {{ $testimonial->status
                    ? 'Active'
                    : 'Inactive'
                }}
            </span>

        </section>


        {{-- REVIEW --}}
        <section class="testimonial-show-review">

            <span class="testimonial-show-label">
                CUSTOMER REVIEW
            </span>

            <blockquote>
                “{{ $testimonial->review }}”
            </blockquote>


            <div class="testimonial-show-meta">

                <div>
                    <span>Rating</span>

                    <strong>
                        {{ $testimonial->rating }} / 5
                    </strong>
                </div>


                <div>
                    <span>Display Order</span>

                    <strong>
                        {{ $testimonial->sort_order }}
                    </strong>
                </div>


                <div>
                    <span>Created</span>

                    <strong>
                        {{ $testimonial->created_at
                            ->format('d M Y') }}
                    </strong>
                </div>

            </div>


            <div class="testimonial-show-actions">

                <a
                    href="{{ route(
                        'admin.testimonials.edit',
                        $testimonial
                    ) }}"
                    class="testimonial-save-btn"
                >
                    Edit Testimonial
                </a>

            </div>

        </section>

    </div>

</div>

@endsection