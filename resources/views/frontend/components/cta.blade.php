<section class="site-cta">

    <div class="site-container">

        <div class="site-cta__box">

            <div class="site-cta__content">

                <div class="site-cta__eyebrow">
                    <span></span>
                    GET STARTED TODAY
                </div>

                <h2>
                    Need the Right Elevator
                    Solution for Your Building?
                </h2>

                <p>
                    Talk to our team about your residential,
                    commercial or industrial elevator
                    requirements and get the right solution
                    for your project.
                </p>


                <div class="site-cta__actions">

                    <a href="{{ route('quote.index') }}" class="
                            site-cta__button
                            site-cta__button--primary
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
                                                site-cta__button
                                                site-cta__button--secondary
                                            ">
                                        Call Now
                                    </a>

                    @endif

                </div>

            </div>


            <!-- <div class="site-cta__side">

                <div class="site-cta__icon">
                    ↕
                </div>

                <strong>
                    Safe. Reliable.
                    Professional.
                </strong>

                <span>
                    Naksh Elevator
                </span>

            </div> -->

            <div class="site-cta__visual">

                <div class="site-cta__image-wrap">

                    <img src="{{ asset('images/about/cta-elevator.png') }}" alt="Naksh Elevator Solutions"
                        class="site-cta__image" loading="lazy">

                    <div class="site-cta__image-overlay"></div>

                    <div class="site-cta__image-content">

                        <span>
                            NAKSH ELEVATOR
                        </span>

                        <strong>
                            Safe. Reliable.<br>
                            Professional.
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>