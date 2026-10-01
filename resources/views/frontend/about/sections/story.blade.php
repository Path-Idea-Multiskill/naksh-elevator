<section class="about-story" id="aboutStory">

    <div class="site-container">

        <div class="about-story__grid">

            {{-- LEFT VISUAL --}}
            <div class="about-story__visual">

                <div class="about-story__image-wrap">

                    <img
                        src="{{ asset(
                            'images/about/about-story.png'
                        ) }}"
                        alt="About Naksh Elevator"
                        class="about-story__image"
                        loading="lazy"
                    >

                </div>


                <div class="about-story__experience">

                    <strong>NAKSH</strong>

                    <span>
                        Professional Elevator
                        Solutions
                    </span>

                </div>

            </div>


            {{-- RIGHT CONTENT --}}
            <div class="about-story__content">

                <div class="about-story__eyebrow">
                    <span></span>
                    ABOUT NAKSH ELEVATOR
                </div>


                <h2>
                    {{
                        data_get(
                            $aboutContent,
                            'about.title',
                            'Professional Elevator Solutions Built Around Safety & Reliability'
                        )
                    }}
                </h2>


                <div class="about-story__description">

                    <p>
                        {{
                            data_get(
                                $aboutContent,
                                'about.description',
                                'Naksh Elevator provides professional elevator solutions for residential, commercial and industrial buildings with a strong focus on safety, quality and reliable performance.'
                            )
                        }}
                    </p>

                </div>


                <div class="about-story__features">

                    <div class="about-story__feature">
                        <span>✓</span>

                        <div>
                            <strong>
                                Safety Focused
                            </strong>

                            <small>
                                Reliable solutions designed
                                with safety in mind.
                            </small>
                        </div>
                    </div>


                    <div class="about-story__feature">
                        <span>✓</span>

                        <div>
                            <strong>
                                Quality Solutions
                            </strong>

                            <small>
                                Quality components and
                                professional workmanship.
                            </small>
                        </div>
                    </div>


                    <div class="about-story__feature">
                        <span>✓</span>

                        <div>
                            <strong>
                                Expert Support
                            </strong>

                            <small>
                                Professional assistance
                                throughout the project.
                            </small>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>