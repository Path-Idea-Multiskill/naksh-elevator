@extends('layouts.admin')

@section('title', 'Testimonials')
@section('page-title', 'Testimonials')

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
                CUSTOMER REVIEWS
            </span>

            <h2>
                Testimonials
            </h2>

            <p>
                Manage customer reviews and feedback
                displayed across the Naksh Elevator website.
            </p>

        </div>


        <a
            href="{{ route('admin.testimonials.create') }}"
            class="testimonial-primary-btn"
        >
            <span>+</span>
            Add Testimonial
        </a>

    </div>


    {{-- STATS --}}

    <div class="testimonial-stats">

        <div class="testimonial-stat">

            <div>
                <span>Total Testimonials</span>

                <strong>
                    {{ $totalTestimonials }}
                </strong>
            </div>

        </div>


        <div class="testimonial-stat active">

            <div>
                <span>Active</span>

                <strong>
                    {{ $activeTestimonials }}
                </strong>
            </div>

        </div>


        <div class="testimonial-stat inactive">

            <div>
                <span>Inactive</span>

                <strong>
                    {{ $inactiveTestimonials }}
                </strong>
            </div>

        </div>

    </div>


    @if($testimonials->count())


        {{-- DESKTOP TABLE --}}

        <div class="testimonial-table-wrapper">

            <table class="testimonial-table">

                <thead>

                    <tr>
                        <th>Customer</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                </thead>


                <tbody>

                @foreach($testimonials as $testimonial)

                    <tr>

                        <td>

                            <div class="testimonial-customer">

                                <div class="testimonial-avatar">

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


                                <div>

                                    <strong>
                                        {{ $testimonial->customer_name }}
                                    </strong>

                                    <small>
                                        {{ $testimonial->designation ?: 'Customer' }}

                                        @if($testimonial->location)
                                            · {{ $testimonial->location }}
                                        @endif
                                    </small>

                                </div>

                            </div>

                        </td>


                        <td>

                            <div class="testimonial-stars">

                                @for($i = 1; $i <= 5; $i++)

                                    <span class="{{
                                        $i <= $testimonial->rating
                                            ? 'filled'
                                            : ''
                                    }}">
                                        ★
                                    </span>

                                @endfor

                            </div>

                        </td>


                        <td>

                            <p class="testimonial-review-preview">
                                {{ \Illuminate\Support\Str::limit(
                                    $testimonial->review,
                                    90
                                ) }}
                            </p>

                        </td>


                        <td>
                            {{ $testimonial->sort_order }}
                        </td>


                        <td>

                            <form
                                method="POST"
                                action="{{ route(
                                    'admin.testimonials.toggle-status',
                                    $testimonial
                                ) }}"
                            >

                                @csrf
                                @method('PATCH')


                                <button
                                    type="submit"
                                    class="testimonial-status {{
                                        $testimonial->status
                                            ? 'active'
                                            : 'inactive'
                                    }}"
                                >
                                    {{ $testimonial->status
                                        ? 'Active'
                                        : 'Inactive'
                                    }}
                                </button>

                            </form>

                        </td>


                        <td>

                            <div class="testimonial-actions">

                                <a
                                    href="{{ route(
                                        'admin.testimonials.show',
                                        $testimonial
                                    ) }}"
                                >
                                    View
                                </a>


                                <a
                                    href="{{ route(
                                        'admin.testimonials.edit',
                                        $testimonial
                                    ) }}"
                                    class="edit"
                                >
                                    Edit
                                </a>


                                <form
                                    method="POST"
                                    action="{{ route(
                                        'admin.testimonials.destroy',
                                        $testimonial
                                    ) }}"
                                    onsubmit="
                                        return confirm(
                                            'Delete this testimonial permanently?'
                                        );
                                    "
                                >

                                    @csrf
                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="delete"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>


        {{-- MOBILE CARDS --}}

        <div class="testimonial-mobile-list">

            @foreach($testimonials as $testimonial)

                <article class="testimonial-mobile-card">

                    <div class="testimonial-mobile-top">

                        <div class="testimonial-customer">

                            <div class="testimonial-avatar">

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


                            <div>

                                <strong>
                                    {{ $testimonial->customer_name }}
                                </strong>

                                <small>
                                    {{ $testimonial->designation ?: 'Customer' }}
                                </small>

                            </div>

                        </div>


                        <span
                            class="testimonial-mobile-status {{
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

                    </div>


                    <div class="testimonial-stars">

                        @for($i = 1; $i <= 5; $i++)

                            <span class="{{
                                $i <= $testimonial->rating
                                    ? 'filled'
                                    : ''
                            }}">
                                ★
                            </span>

                        @endfor

                    </div>


                    <p class="testimonial-mobile-review">
                        {{ $testimonial->review }}
                    </p>


                    @if($testimonial->location)

                        <div class="testimonial-location">
                            {{ $testimonial->location }}
                        </div>

                    @endif


                    <div class="testimonial-mobile-actions">

                        <a
                            href="{{ route(
                                'admin.testimonials.show',
                                $testimonial
                            ) }}"
                        >
                            View
                        </a>


                        <a
                            href="{{ route(
                                'admin.testimonials.edit',
                                $testimonial
                            ) }}"
                        >
                            Edit
                        </a>


                        <form
                            method="POST"
                            action="{{ route(
                                'admin.testimonials.destroy',
                                $testimonial
                            ) }}"
                            onsubmit="
                                return confirm(
                                    'Delete this testimonial permanently?'
                                );
                            "
                        >

                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Delete
                            </button>

                        </form>

                    </div>

                </article>

            @endforeach

        </div>


        @if($testimonials->hasPages())

            <div class="testimonial-pagination">
                {{ $testimonials->links() }}
            </div>

        @endif


    @else


        <div class="testimonial-empty">

            <div class="testimonial-empty-icon">
                ★
            </div>

            <h3>
                No Testimonials Yet
            </h3>

            <p>
                Add your first customer review
                to display it on the website.
            </p>

            <a
                href="{{ route('admin.testimonials.create') }}"
                class="testimonial-primary-btn"
            >
                + Add First Testimonial
            </a>

        </div>


    @endif

</div>

@endsection