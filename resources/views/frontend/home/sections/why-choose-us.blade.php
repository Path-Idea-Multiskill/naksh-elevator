<section class="home-why" id="homeWhyChooseUs">
    <div class="site-container">

        <div class="home-why__grid">

            {{-- LEFT CONTENT --}}
            <div class="home-why__content">

                <div class="home-why__eyebrow">
                    <span></span>
                    WHY CHOOSE US
                </div>

                <h2 class="home-why__title">
                    {{
    data_get(
        $homeContent,
        'why_choose_us.title',
        'Why Choose Naksh Elevator?'
    )
                    }}
                </h2>

                <p class="home-why__description">
                    {{
    data_get(
        $homeContent,
        'why_choose_us.description',
        'We combine professional expertise, quality components and dependable support to deliver safe and reliable elevator solutions.'
    )
                    }}
                </p>


                <div class="home-why__features">

                    <div class="home-why__feature">

                        <div class="home-why__icon">
                            01
                        </div>

                        <div>
                            <h3>Safety First</h3>

                            <p>
                                Safety-focused solutions
                                with careful installation,
                                testing and support.
                            </p>
                        </div>

                    </div>


                    <div class="home-why__feature">

                        <div class="home-why__icon">
                            02
                        </div>

                        <div>
                            <h3>Quality Components</h3>

                            <p>
                                Reliable components selected
                                for performance, durability
                                and long-term operation.
                            </p>
                        </div>

                    </div>


                    <div class="home-why__feature">

                        <div class="home-why__icon">
                            03
                        </div>

                        <div>
                            <h3>
                                Professional Installation
                            </h3>

                            <p>
                                Proper planning, installation,
                                testing and commissioning for
                                every project.
                            </p>
                        </div>

                    </div>


                    <div class="home-why__feature">

                        <div class="home-why__icon">
                            04
                        </div>

                        <div>
                            <h3>Reliable Support</h3>

                            <p>
                                Dependable service and
                                maintenance support whenever
                                your elevator needs attention.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT VISUAL --}}
            <div class="home-why__visual">

                <!-- <div class="home-why__visual-main">

                    <span class="home-why__visual-label">
                        NAKSH ELEVATOR
                    </span>

                    <h3>
                        Safety, Quality &
                        Reliable Performance
                    </h3>

                    <p>
                        Professional elevator solutions
                        for residential, commercial and
                        industrial buildings.
                    </p>

                </div> -->

                <div class="home-why__visual-main">

                    <img src="{{ asset('images/home/why-choose-elevator.png') }}"
                        alt="Naksh Elevator premium elevator solution" class="home-why__visual-image" loading="lazy">

                    <div class="home-why__visual-overlay"></div>

                    <div class="home-why__visual-content">

                        <span class="home-why__visual-label">
                            NAKSH ELEVATOR
                        </span>

                        <h3>
                            Safety, Quality &
                            Reliable Performance
                        </h3>

                        <p>
                            Professional elevator solutions
                            for residential, commercial and
                            industrial buildings.
                        </p>

                    </div>

                </div>


                <div class="home-why__accent"></div>


                <div class="home-why__badge">

                    <span>✓</span>

                    <div>
                        <strong>
                            Trusted Solutions
                        </strong>

                        <small>
                            Professional service
                            & support
                        </small>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>