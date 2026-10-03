<section class="et-overview">

    <div class="site-container">

        <div class="et-overview__grid">


            {{-- IMAGE --}}
            <div class="et-overview__visual">

                <div class="et-overview__image-wrap">

                    @if($elevatorType->image)

                                    <img src="{{
                        asset(
                            'storage/' .
                            $elevatorType->image
                        )
                                            }}" alt="{{ $elevatorType->name }}" class="et-overview__image">

                                    <div class="et-image-watermark et-image-watermark--overview">
                                        <img src="{{ asset('images/logo/naksh-logo.png') }}" alt="" aria-hidden="true">
                                    </div>

                    @else

                        <div class="et-overview__placeholder">

                            <span>↕</span>

                            <strong>
                                {{ $elevatorType->name }}
                            </strong>

                            <small>
                                Naksh Elevator
                            </small>

                        </div>

                    @endif

                </div>


                <div class="et-overview__badge">

                    <span>✓</span>

                    <div>
                        <strong>
                            Professional Solution
                        </strong>

                        <small>
                            Safety • Quality • Reliability
                        </small>
                    </div>

                </div>

            </div>


            {{-- CONTENT --}}
            <div class="et-overview__content">

                <div class="et-overview__eyebrow">
                    <span></span>
                    ABOUT THIS ELEVATOR
                </div>


                <h2>
                    {{
    $elevatorType->name
                    }}
                    Solutions
                </h2>


                <div class="et-overview__description">

                    @if($elevatorType->description)

                                        {!! nl2br(
                            e($elevatorType->description)
                        ) !!}

                    @elseif($elevatorType->short_description)

                                    <p>
                                        {{
                        $elevatorType
                            ->short_description
                                            }}
                                    </p>

                    @else

                        <p>
                            Professional elevator solutions
                            designed for safe, reliable and
                            efficient vertical transportation.
                        </p>

                    @endif

                </div>


                <div class="et-overview__points">

                    <div>
                        <span>✓</span>
                        <strong>
                            Safety Focused
                        </strong>
                    </div>

                    <div>
                        <span>✓</span>
                        <strong>
                            Quality Components
                        </strong>
                    </div>

                    <div>
                        <span>✓</span>
                        <strong>
                            Professional Installation
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