@if($relatedServices->isNotEmpty())

<section class="related-services">

    <div class="site-container">

        <div class="related-services__heading">

            <div>

                <div class="related-services__eyebrow">
                    <span></span>
                    EXPLORE MORE
                </div>

                <h2>
                    Other Elevator Services
                </h2>

            </div>


            <a
                href="{{ route('services.index') }}"
                class="related-services__all"
            >
                View All Services
                <span>→</span>
            </a>

        </div>


        <div class="related-services__grid">

            @foreach(
                $relatedServices as $relatedService
            )

                <article class="related-service-card">

                    <a
                        href="{{ route(
                            'services.show',
                            $relatedService->slug
                        ) }}"
                        class="related-service-card__image"
                    >

                        @if($relatedService->image)

                            <img
                                src="{{ asset(
                                    'storage/' .
                                    $relatedService->image
                                ) }}"
                                alt="{{ $relatedService->title }}"
                                loading="lazy"
                            >

                        @else

                            <div
                                class="
                                    related-service-card__placeholder
                                "
                            >
                                ⚙
                            </div>

                        @endif

                    </a>


                    <div class="related-service-card__body">

                        <span>
                            ELEVATOR SERVICE
                        </span>

                        <h3>

                            <a
                                href="{{ route(
                                    'services.show',
                                    $relatedService->slug
                                ) }}"
                            >
                                {{ $relatedService->title }}
                            </a>

                        </h3>


                        @if(
                            $relatedService->short_description
                        )

                            <p>
                                {{
                                    \Illuminate\Support\Str::limit(
                                        $relatedService
                                            ->short_description,
                                        100
                                    )
                                }}
                            </p>

                        @endif


                        <a
                            href="{{ route(
                                'services.show',
                                $relatedService->slug
                            ) }}"
                            class="related-service-card__link"
                        >
                            Explore Service
                            <span>→</span>
                        </a>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>

@endif