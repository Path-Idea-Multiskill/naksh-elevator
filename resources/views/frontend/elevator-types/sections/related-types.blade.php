@if($relatedElevatorTypes->isNotEmpty())

    <section class="et-related">

        <div class="site-container">


            <div class="et-related__heading">

                <div>

                    <div class="et-related__eyebrow">
                        <span></span>
                        EXPLORE MORE
                    </div>

                    <h2>
                        Other Elevator
                        Solutions
                    </h2>

                </div>


                <a href="{{
            route('elevator-types.index')
                    }}" class="et-related__all">
                    View All
                    <span>→</span>
                </a>

            </div>


            <div class="et-related__grid">

                @foreach(
                        $relatedElevatorTypes as $relatedType
                    )

                    <article class="et-related-card">


                        <a href="{{
                    route(
                        'elevator-types.show',
                        $relatedType->slug
                    )
                                }}" class="et-related-card__visual">

                            @if($relatedType->image)

                                    <img src="{{
                                asset(
                                    'storage/' .
                                    $relatedType->image
                                )
                                                }}" alt="{{
                                $relatedType->name
                                                }}" loading="lazy">

                                    <div class="et-image-watermark et-image-watermark--related">
                                        <img src="{{ asset('images/logo/naksh-logo.png') }}" alt="" aria-hidden="true">
                                    </div>

                            @else

                                <div class="
                                                et-related-card__placeholder
                                            ">
                                    <span>↕</span>
                                </div>

                            @endif

                        </a>


                        <div class="et-related-card__body">

                            <span>
                                ELEVATOR SOLUTION
                            </span>

                            <h3>

                                <a href="{{
                    route(
                        'elevator-types.show',
                        $relatedType->slug
                    )
                                        }}">
                                    {{
                    $relatedType->name
                                        }}
                                </a>

                            </h3>


                            @if(
                                        $relatedType
                                            ->short_description
                                    )

                                    <p>
                                        {{
                                $relatedType
                                    ->short_description
                                                }}
                                    </p>

                            @endif


                            <a href="{{
                    route(
                        'elevator-types.show',
                        $relatedType->slug
                    )
                                    }}" class="
                                        et-related-card__link
                                    ">
                                Explore
                                <span>→</span>
                            </a>

                        </div>

                    </article>

                @endforeach

            </div>

        </div>

    </section>

@endif