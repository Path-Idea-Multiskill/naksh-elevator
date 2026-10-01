@php

    $features = $elevatorType->features ?? [];

    if (is_string($features)) {

        $decodedFeatures =
            json_decode($features, true);

        if (
            json_last_error() === JSON_ERROR_NONE
            && is_array($decodedFeatures)
        ) {
            $features = $decodedFeatures;
        } else {
            $features = preg_split(
                '/\r\n|\r|\n/',
                $features
            );
        }
    }

    if (!is_array($features)) {
        $features = [];
    }

    $features = array_values(
        array_filter($features)
    );

@endphp


@if(count($features))

<section class="et-features">

    <div class="site-container">


        <div class="et-features__heading">

            <div class="et-features__eyebrow">
                <span></span>
                KEY FEATURES
            </div>

            <h2>
                Designed for Safety,
                Comfort & Performance
            </h2>

            <p>
                Key features available with our
                {{ $elevatorType->name }}
                solutions.
            </p>

        </div>


        <div class="et-features__grid">

            @foreach($features as $feature)

                <article class="et-feature-card">

                    <div class="et-feature-card__number">
                        {{
                            str_pad(
                                $loop->iteration,
                                2,
                                '0',
                                STR_PAD_LEFT
                            )
                        }}
                    </div>

                    <div class="et-feature-card__icon">
                        ✓
                    </div>

                    <h3>
                        {{ $feature }}
                    </h3>

                </article>

            @endforeach

        </div>

    </div>

</section>

@endif