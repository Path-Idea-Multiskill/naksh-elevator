<section class="home-services" id="homeServices">
    <div class="site-container">

        <div class="home-services__header">

            <div>
                <div class="home-services__eyebrow">
                    <span></span>
                    OUR SERVICES
                </div>

                <h2>
                    Complete Elevator Services
                    From Installation to Support
                </h2>
            </div>

            <p>
                Professional elevator services focused
                on safety, performance and reliable
                long-term operation.
            </p>

        </div>


        @if($services->isNotEmpty())

            <div class="home-services__grid">

                @foreach($services as $service)

                    <article class="home-service-card">

                        <div class="home-service-card__image">

                            @if($service->image)

                                        <img src="{{ asset(
                                    'storage/' . $service->image
                                ) }}" alt="{{ $service->title }}" loading="lazy">

                            @else

                                <div class="home-service-card__placeholder">
                                    <span>⚙</span>

                                    <small>
                                        Naksh Elevator
                                    </small>
                                </div>

                            @endif


                            <div class="home-service-card__number">

                                {{
                    str_pad(
                        $loop->iteration,
                        2,
                        '0',
                        STR_PAD_LEFT
                    )
                                                                                        }}

                            </div>

                        </div>


                        <div class="home-service-card__body">

                            <h3>
                                {{ $service->title }}
                            </h3>


                            @if($service->short_description)

                                    <p>
                                        {{
                                \Illuminate\Support\Str::limit(
                                    $service->short_description,
                                    125
                                )
                                                                                                                                    }}
                                    </p>

                            @endif


                            @if(
                                    is_array($service->features) &&
                                    count($service->features)
                                )

                                <ul class="home-service-card__features">

                                    @foreach(
                                            array_slice(
                                                $service->features,
                                                0,
                                                3
                                            )
                                            as $feature
                                        )

                                        <li>
                                            <span>✓</span>

                                            {{ $feature }}
                                        </li>

                                    @endforeach

                                </ul>

                            @endif


                            <!-- <a
                                                                                        href="#"
                                                                                        class="home-service-card__link"
                                                                                    >
                                                                                        Learn More
                                                                                        <span>→</span>
                                                                                    </a> -->

                            <!-- <a href="{{ route(
                                'services.show',
                                $service->slug
                            ) }}">
                                            Learn More
                                            <span>→</span>
                                        </a> -->

                            <a href="{{ route('services.show', $service->slug) }}" class="home-service-card__link">
                                Learn More
                                <span>→</span>
                            </a>

                        </div>

                    </article>

                @endforeach

            </div>


            <div class="home-services__footer">

                <!-- <a href="#" class="home-services__all">
                                View All Services
                                <span>→</span>
                            </a> -->

                <!-- <a href="{{ route('services.index') }}">
                    View All Services
                    <span>→</span>
                </a> -->

                <a
    href="{{ route('services.index') }}"
    class="home-services__all"
>
    View All Services
    <span>→</span>
</a>

            </div>

        @else

            <div class="home-services__empty">

                <span>⚙</span>

                <h3>
                    Services coming soon
                </h3>

                <p>
                    Our elevator services will
                    be available here shortly.
                </p>

            </div>

        @endif

    </div>
</section>