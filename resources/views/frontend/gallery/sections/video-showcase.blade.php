<section class="gallery-videos">

    <div class="site-container">

        {{-- SECTION HEADING --}}
        <div class="gallery-videos__heading">

            <div class="gallery-videos__eyebrow">
                <span></span>
                ELEVATORS IN MOTION
            </div>

            <div class="gallery-videos__heading-row">

                <div>
                    <h2>
                        Experience Our Elevators
                        <span>in Action.</span>
                    </h2>

                    <p>
                        Explore real elevator movement,
                        premium door operation and modern
                        lift experiences by Naksh Elevator.
                    </p>
                </div>

                <div class="gallery-videos__hint">
                    <span>03</span>
                    Video Experiences
                </div>

            </div>

        </div>


        {{-- VIDEOS --}}
        <div class="gallery-videos__viewport">

            <div class="gallery-videos__track">

                {{-- VIDEO 01 --}}
                <article class="gallery-video-card">

                    <div class="gallery-video-card__media">

                        <video
                            class="gallery-video-card__video"
                            controls
                            muted
                            playsinline
                            preload="metadata"
                        >
                            <source
                                src="{{ asset(
                                    'videos/lift-explore.mp4'
                                ) }}"
                                type="video/mp4"
                            >
                        </video>

                        <span class="gallery-video-card__number">
                            01
                        </span>

                        <span class="gallery-video-card__tag">
                            ELEVATOR EXPERIENCE
                        </span>

                    </div>

                    <div class="gallery-video-card__body">

                        <div>
                            <span class="gallery-video-card__label">
                                NAKSH ELEVATOR
                            </span>

                            <h3>
                                Explore Modern Elevator
                            </h3>
                        </div>

                        <span class="gallery-video-card__arrow">
                            ↗
                        </span>

                    </div>

                </article>


                {{-- VIDEO 02 --}}
                <article class="gallery-video-card">

                    <div class="gallery-video-card__media">

                        <video
                            class="gallery-video-card__video"
                            controls
                            muted
                            playsinline
                            preload="metadata"
                        >
                            <source
                                src="{{ asset(
                                    'videos/lift.mp4'
                                ) }}"
                                type="video/mp4"
                            >
                        </video>

                        <span class="gallery-video-card__number">
                            02
                        </span>

                        <span class="gallery-video-card__tag">
                            PREMIUM LIFT
                        </span>

                    </div>

                    <div class="gallery-video-card__body">

                        <div>
                            <span class="gallery-video-card__label">
                                SMOOTH • SAFE • RELIABLE
                            </span>

                            <h3>
                                Premium Elevator Movement
                            </h3>
                        </div>

                        <span class="gallery-video-card__arrow">
                            ↗
                        </span>

                    </div>

                </article>


                {{-- VIDEO 03 --}}
                <article class="gallery-video-card">

                    <div class="gallery-video-card__media">

                        <video
                            class="gallery-video-card__video"
                            controls
                            muted
                            playsinline
                            preload="metadata"
                        >
                            <source
                                src="{{ asset(
                                    'videos/open-lift-door.mp4'
                                ) }}"
                                type="video/mp4"
                            >
                        </video>

                        <span class="gallery-video-card__number">
                            03
                        </span>

                        <span class="gallery-video-card__tag">
                            DOOR SYSTEM
                        </span>

                    </div>

                    <div class="gallery-video-card__body">

                        <div>
                            <span class="gallery-video-card__label">
                                AUTOMATIC OPERATION
                            </span>

                            <h3>
                                Smooth Elevator Door Opening
                            </h3>
                        </div>

                        <span class="gallery-video-card__arrow">
                            ↗
                        </span>

                    </div>

                </article>

            </div>

        </div>


        {{-- MOBILE SWIPE MESSAGE --}}
        <div class="gallery-videos__mobile-hint">
            <span>←</span>
            Swipe to explore
            <span>→</span>
        </div>

    </div>

</section>