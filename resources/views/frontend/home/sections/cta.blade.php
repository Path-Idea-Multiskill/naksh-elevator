<section class="home-cta" id="homeCta">
    <div class="site-container">

        <div class="home-cta__box">

            {{-- DECORATION --}}
            <div class="home-cta__shape home-cta__shape--one" aria-hidden="true"></div>

            <div class="home-cta__shape home-cta__shape--two" aria-hidden="true"></div>


            {{-- CONTENT --}}
            <div class="home-cta__content">

                <div class="home-cta__eyebrow">
                    <span></span>
                    NEED AN ELEVATOR SOLUTION?
                </div>


                <h2>
                    Let's Find the Right
                    Elevator Solution for
                    Your Building
                </h2>


                <p>
                    From residential and commercial
                    elevators to installation,
                    maintenance and modernization,
                    our team is ready to help with
                    the right solution for your
                    requirement.
                </p>


                <div class="home-cta__actions">

                    <a href="{{ route('quote.index') }}" class="
                            home-cta__button
                            home-cta__button--primary
                        ">
                        Get Free Quote
                        <span>→</span>
                    </a>


                    @if($settings?->primary_phone)

                                    <a href="tel:{{
                        preg_replace(
                            '/[^0-9+]/',
                            '',
                            $settings->primary_phone
                        )
                                                            }}" class="
                                                                home-cta__button
                                                                home-cta__button--secondary
                                                            ">
                                        <span>☎</span>

                                        {{ $settings->primary_phone }}
                                    </a>

                    @endif

                </div>


                <div class="home-cta__trust">

                    <span>
                        <b>✓</b>
                        Expert Guidance
                    </span>

                    <span>
                        <b>✓</b>
                        Professional Service
                    </span>

                    <span>
                        <b>✓</b>
                        Reliable Support
                    </span>

                </div>

            </div>


            {{-- RIGHT SIDE --}}
            <!-- <div class="home-cta__visual">

                <div class="home-cta__visual-card">

                    <span class="home-cta__visual-icon">
                        ↕
                    </span>

                    <small>
                        NAKSH ELEVATOR
                    </small>

                    <strong>
                        Safe. Reliable.
                        Professional.
                    </strong>

                    <p>
                        Complete elevator solutions
                        for modern buildings.
                    </p>

                </div>

            </div> -->

            {{-- RIGHT SIDE --}}
            <div class="home-cta__visual">

                <div class="home-cta__visual-card">

                    <img src="{{ asset('images/home/cta-elevator.png') }}" alt="Naksh Elevator modern elevator solution"
                        class="home-cta__visual-image" loading="lazy">

                    <div class="home-cta__visual-overlay"></div>


                    <span class="home-cta__visual-icon">
                        ↕
                    </span>


                    <div class="home-cta__visual-content">

                        <small>
                            NAKSH ELEVATOR
                        </small>

                        <strong>
                            Safe. Reliable.
                            Professional.
                        </strong>

                        <p>
                            Complete elevator solutions
                            for modern buildings.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>