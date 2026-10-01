<section
    class="home-testimonials"
    id="homeTestimonials"
>
    <div class="site-container">

        {{-- HEADER --}}
        <div class="home-testimonials__header">

            <div>

                <div class="home-testimonials__eyebrow">
                    <span></span>
                    CLIENT TESTIMONIALS
                </div>

                <h2>
                    What Our Clients
                    Say About Us
                </h2>

            </div>


            @if($testimonials->count() > 1)

                <div class="home-testimonials__controls">

                    <button
                        type="button"
                        class="home-testimonials__control"
                        id="testimonialPrev"
                        aria-label="Previous testimonial"
                    >
                        ←
                    </button>

                    <button
                        type="button"
                        class="home-testimonials__control"
                        id="testimonialNext"
                        aria-label="Next testimonial"
                    >
                        →
                    </button>

                </div>

            @endif

        </div>


        @if($testimonials->isNotEmpty())

            <div
                class="home-testimonials__viewport"
                id="testimonialViewport"
            >

                <div
                    class="home-testimonials__track"
                    id="testimonialTrack"
                >

                    @foreach($testimonials as $testimonial)

                        <article class="home-testimonial-card">

                            {{-- TOP --}}
                            <div class="home-testimonial-card__top">

                                <span
                                    class="home-testimonial-card__quote"
                                    aria-hidden="true"
                                >
                                    “
                                </span>


                                <div
                                    class="home-testimonial-card__rating"
                                    aria-label="{{ $testimonial->rating }} out of 5 stars"
                                >

                                    @for($star = 1; $star <= 5; $star++)

                                        <span
                                            class="{{
                                                $star <= $testimonial->rating
                                                    ? 'is-active'
                                                    : ''
                                            }}"
                                        >
                                            ★
                                        </span>

                                    @endfor

                                </div>

                            </div>


                            {{-- REVIEW --}}
                            <p class="home-testimonial-card__message">
                                {{ $testimonial->review }}
                            </p>


                            {{-- CUSTOMER --}}
                            <div class="home-testimonial-card__client">

                                <div class="home-testimonial-card__avatar">

                                    @if($testimonial->customer_image)

                                        <img
                                            src="{{ asset(
                                                'storage/' .
                                                $testimonial->customer_image
                                            ) }}"
                                            alt="{{ $testimonial->customer_name }}"
                                            loading="lazy"
                                        >

                                    @else

                                        <span>
                                            {{
                                                strtoupper(
                                                    substr(
                                                        $testimonial->customer_name,
                                                        0,
                                                        1
                                                    )
                                                )
                                            }}
                                        </span>

                                    @endif

                                </div>


                                <div
                                    class="home-testimonial-card__client-info"
                                >

                                    <strong>
                                        {{ $testimonial->customer_name }}
                                    </strong>


                                    <span>

                                        {{
                                            $testimonial->designation
                                            ?: 'Customer'
                                        }}

                                        @if($testimonial->location)

                                            <small>
                                                · {{ $testimonial->location }}
                                            </small>

                                        @endif

                                    </span>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>


            @if($testimonials->count() > 1)

                <div
                    class="home-testimonials__dots"
                    id="testimonialDots"
                ></div>

            @endif

        @else

            <div class="home-testimonials__empty">

                <span>“</span>

                <h3>
                    Client testimonials coming soon.
                </h3>

                <p>
                    Customer experiences will
                    be displayed here.
                </p>

            </div>

        @endif

    </div>
</section>