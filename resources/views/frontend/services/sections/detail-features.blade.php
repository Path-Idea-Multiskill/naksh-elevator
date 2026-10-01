@php

    $features = $service->features ?? [];

    if (is_string($features)) {

        $decoded = json_decode(
            $features,
            true
        );

        if (
            json_last_error() === JSON_ERROR_NONE
            && is_array($decoded)
        ) {

            $features = $decoded;

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

<section class="service-features">

    <div class="site-container">

        <div class="service-features__heading">

            <div class="service-features__eyebrow">
                <span></span>
                SERVICE FEATURES
            </div>

            <h2>
                What You Get with Our
                {{ $service->title }}
            </h2>

            <p>
                Professional solutions focused on
                safety, reliability and long-term
                elevator performance.
            </p>

        </div>


        <div class="service-features__grid">

            @foreach($features as $feature)

                <article class="service-feature-card">

                    <span class="service-feature-card__number">
                        {{
                            str_pad(
                                $loop->iteration,
                                2,
                                '0',
                                STR_PAD_LEFT
                            )
                        }}
                    </span>

                    <div class="service-feature-card__icon">
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