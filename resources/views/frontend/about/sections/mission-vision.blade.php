<section class="about-purpose" id="aboutPurpose">

    <div class="site-container">

        <div class="about-purpose__heading">

            <div class="about-purpose__eyebrow">
                <span></span>
                OUR PURPOSE
                <span></span>
            </div>

            <h2>
                Mission & Vision
            </h2>

            <p>
                Building reliable vertical mobility solutions
                through safety, quality and professional service.
            </p>

        </div>


        <div class="about-purpose__grid">

            {{-- MISSION --}}
            <article class="about-purpose__card">

                <div class="about-purpose__number">
                    01
                </div>

                <div class="about-purpose__icon">
                    M
                </div>

                <span class="about-purpose__label">
                    OUR MISSION
                </span>

                <h3>
                    Safe & Reliable
                    Elevator Solutions
                </h3>

                <p>
                    {{
                        data_get(
                            $aboutContent,
                            'mission.description',
                            'To provide safe, reliable and quality elevator solutions with professional service and long-term customer support.'
                        )
                    }}
                </p>

            </article>


            {{-- VISION --}}
            <article class="about-purpose__card">

                <div class="about-purpose__number">
                    02
                </div>

                <div class="about-purpose__icon">
                    V
                </div>

                <span class="about-purpose__label">
                    OUR VISION
                </span>

                <h3>
                    Better Vertical
                    Mobility for Tomorrow
                </h3>

                <p>
                    {{
                        data_get(
                            $aboutContent,
                            'vision.description',
                            'To become a trusted elevator solutions company recognized for safety, quality, innovation and dependable service.'
                        )
                    }}
                </p>

            </article>

        </div>

    </div>

</section>