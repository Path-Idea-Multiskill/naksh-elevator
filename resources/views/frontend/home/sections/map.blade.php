<section class="home-map" id="homeMap">

    <div class="site-container">

        <div class="home-map__header">

            <div>
                <div class="home-map__eyebrow">
                    <span></span>
                    FIND US
                </div>

                <h2>
                    Visit Naksh Elevator
                </h2>
            </div>

            <p>
                Find our location on the map or
                open directions to reach us easily.
            </p>

        </div>


        <div class="home-map__wrapper">

            {{-- LEFT INFO --}}
            <div class="home-map__info">

                <div class="home-map__icon">
                    ⌖
                </div>

                <span class="home-map__label">
                    OUR LOCATION
                </span>

                <h3>
                    Naksh Elevator
                </h3>


                @if($settings?->address)

                    <p>
                        {{ $settings->address }}

                        @if($settings?->city)
                            <br>
                            {{ $settings->city }}
                        @endif

                        @if($settings?->state)
                            , {{ $settings->state }}
                        @endif

                        @if($settings?->pincode)
                            - {{ $settings->pincode }}
                        @endif
                    </p>

                @else

                    <p>
                        Visit our location for elevator
                        solutions, consultation and
                        professional support.
                    </p>

                @endif


                @if($settings?->primary_phone)

                    <a
                        href="tel:{{ preg_replace(
                            '/[^0-9+]/',
                            '',
                            $settings->primary_phone
                        ) }}"
                        class="home-map__contact"
                    >
                        <span>☎</span>

                        {{ $settings->primary_phone }}
                    </a>

                @endif


                <a
                    href="https://www.google.com/maps/dir/?api=1&destination=21.2235556,81.5969722"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="home-map__direction"
                >
                    Get Directions
                    <span>→</span>
                </a>

            </div>


            {{-- MAP --}}
            <div class="home-map__map">

                <iframe
                    src="https://maps.google.com/maps?q=21.2235556,81.5969722&z=16&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Naksh Elevator Location"
                ></iframe>

            </div>

        </div>

    </div>

</section>