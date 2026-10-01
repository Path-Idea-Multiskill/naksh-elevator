<section class="home-about" id="homeAbout">

    <div class="site-container">

        <div class="home-about__grid">

            {{-- LEFT VISUAL --}}
            <div class="home-about__visual">

                <!-- <div class="home-about__image-wrap">

                    <div class="home-about__image-placeholder">

                        <span>NAKSH</span>

                        <strong>
                            Elevator Solutions
                        </strong>

                        <small>
                            Safety • Quality • Reliability
                        </small>

                    </div>

                </div> -->

                <div class="home-about__image-wrap">

                    <img src="{{ asset('images/home/about-elevator.png') }}"
                        alt="Naksh Elevator professional elevator installation and service" class="home-about__image"
                        loading="lazy">

                </div>


                <div class="home-about__accent"></div>


                <div class="home-about__experience">

                    <strong>
                        Professional
                    </strong>

                    <span>
                        Elevator Solutions
                    </span>

                </div>

            </div>


            {{-- RIGHT CONTENT --}}
            <div class="home-about__content">

                <div class="home-about__eyebrow">

                    <span></span>

                    ABOUT NAKSH ELEVATOR

                </div>


                <h2 class="home-about__title">

                    {{
    data_get(
        $homeContent,
        'about.title',
        'Reliable Elevator Solutions Built Around Safety & Performance'
    )
                    }}

                </h2>


                <p class="home-about__description">

                    {{
    data_get(
        $homeContent,
        'about.description',
        'Naksh Elevator provides professional elevator solutions for residential, commercial and industrial buildings with a strong focus on safety, quality and dependable service.'
    )
                    }}

                </p>


                <div class="home-about__features">

                    <div class="home-about__feature">

                        <span>✓</span>

                        <div>
                            <strong>
                                Quality Components
                            </strong>

                            <small>
                                Reliable components selected
                                for performance and durability.
                            </small>
                        </div>

                    </div>


                    <div class="home-about__feature">

                        <span>✓</span>

                        <div>
                            <strong>
                                Professional Installation
                            </strong>

                            <small>
                                Carefully planned installation
                                and commissioning.
                            </small>
                        </div>

                    </div>


                    <div class="home-about__feature">

                        <span>✓</span>

                        <div>
                            <strong>
                                Reliable Support
                            </strong>

                            <small>
                                Responsive maintenance and
                                service support.
                            </small>
                        </div>

                    </div>

                </div>


                <a href="{{ route('about') }}" class="home-about__button">
                    Know More

                    <span>→</span>
                </a>

            </div>

        </div>

    </div>

</section>