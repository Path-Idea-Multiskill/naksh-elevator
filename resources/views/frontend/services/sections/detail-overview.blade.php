<section class="service-overview">

    <div class="site-container">

        <div class="service-overview__grid">

            {{-- IMAGE --}}
            <div class="service-overview__visual">

                <div class="service-overview__image-wrap">

                    @if($service->image)

                        <img
                            src="{{ asset(
                                'storage/' .
                                $service->image
                            ) }}"
                            alt="{{ $service->title }}"
                            class="service-overview__image"
                        >

                    @else

                        <div class="service-overview__placeholder">

                            <span>⚙</span>

                            <strong>
                                {{ $service->title }}
                            </strong>

                            <small>
                                Naksh Elevator
                            </small>

                        </div>

                    @endif

                </div>


                <div class="service-overview__badge">

                    <span>✓</span>

                    <div>

                        <strong>
                            Professional Service
                        </strong>

                        <small>
                            Safety • Quality • Reliability
                        </small>

                    </div>

                </div>

            </div>


            {{-- CONTENT --}}
            <div class="service-overview__content">

                <div class="service-overview__eyebrow">
                    <span></span>
                    ABOUT THIS SERVICE
                </div>

                <h2>
                    Complete {{ $service->title }}
                    Solutions
                </h2>


                <div class="service-overview__description">

                    @if($service->description)

                        {!! nl2br(
                            e($service->description)
                        ) !!}

                    @elseif($service->short_description)

                        <p>
                            {{ $service->short_description }}
                        </p>

                    @endif

                </div>


                <div class="service-overview__trust">

                    <div>
                        <span>✓</span>

                        <strong>
                            Expert Team
                        </strong>
                    </div>

                    <div>
                        <span>✓</span>

                        <strong>
                            Safety Focused
                        </strong>
                    </div>

                    <div>
                        <span>✓</span>

                        <strong>
                            Quality Work
                        </strong>
                    </div>

                    <div>
                        <span>✓</span>

                        <strong>
                            Reliable Support
                        </strong>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>