<article class="et-card">

    <a
        href="{{ route(
            'elevator-types.show',
            $type->slug
        ) }}"
        class="et-card__image-link"
        aria-label="View {{ $type->name }}"
    >

        <div class="et-card__image-wrap">

            @if($type->image)

                <img
                    src="{{ asset(
                        'storage/' . $type->image
                    ) }}"
                    alt="{{ $type->name }}"
                    class="et-card__image"
                    loading="lazy"
                >

            @else

                <div class="et-card__placeholder">

                    <span>↕</span>

                    <small>
                        Naksh Elevator
                    </small>

                </div>

            @endif


            <div class="et-card__image-overlay"></div>


            <span class="et-card__number">
                {{
                    str_pad(
                        $loop->iteration,
                        2,
                        '0',
                        STR_PAD_LEFT
                    )
                }}
            </span>

        </div>

    </a>


    <div class="et-card__body">

        <div class="et-card__label">
            ELEVATOR SOLUTION
        </div>

        <h2>
            <a
                href="{{ route(
                    'elevator-types.show',
                    $type->slug
                ) }}"
            >
                {{ $type->name }}
            </a>
        </h2>


        @if($type->short_description)

            <p>
                {{ $type->short_description }}
            </p>

        @endif


        <a
            href="{{ route(
                'elevator-types.show',
                $type->slug
            ) }}"
            class="et-card__link"
        >
            Explore Elevator

            <span>→</span>
        </a>

    </div>

</article>