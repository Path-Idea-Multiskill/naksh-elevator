<article class="services-card">

    {{-- IMAGE --}}
    <a
        href="{{ route(
            'services.show',
            $service->slug
        ) }}"
        class="services-card__visual"
        aria-label="View {{ $service->title }}"
    >

        @if($service->image)

            <img
                src="{{ asset(
                    'storage/' .
                    $service->image
                ) }}"
                alt="{{ $service->title }}"
                loading="lazy"
                class="services-card__image"
            >

        @else

            <div class="services-card__placeholder">

                <span>⚙</span>

                <small>
                    Naksh Elevator
                </small>

            </div>

        @endif


        <div class="services-card__overlay"></div>


        <span class="services-card__number">
            {{
                str_pad(
                    $loop->iteration,
                    2,
                    '0',
                    STR_PAD_LEFT
                )
            }}
        </span>

    </a>


    {{-- CONTENT --}}
    <div class="services-card__body">

        <span class="services-card__label">
            ELEVATOR SERVICE
        </span>


        <h2>

            <a
                href="{{ route(
                    'services.show',
                    $service->slug
                ) }}"
            >
                {{ $service->title }}
            </a>

        </h2>


        @if($service->short_description)

            <p>
                {{
                    \Illuminate\Support\Str::limit(
                        $service->short_description,
                        125
                    )
                }}
            </p>

        @elseif($service->description)

            <p>
                {{
                    \Illuminate\Support\Str::limit(
                        strip_tags(
                            $service->description
                        ),
                        125
                    )
                }}
            </p>

        @endif


        <a
            href="{{ route(
                'services.show',
                $service->slug
            ) }}"
            class="services-card__link"
        >
            Explore Service

            <span>→</span>
        </a>

    </div>

</article>