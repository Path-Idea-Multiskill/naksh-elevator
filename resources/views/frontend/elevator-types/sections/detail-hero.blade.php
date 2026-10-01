<section class="et-detail-hero">

    <div class="site-container">

        <div class="et-detail-hero__inner">

            <div class="et-detail-hero__content">

                <div class="et-detail-hero__eyebrow">
                    <span></span>
                    ELEVATOR SOLUTION
                </div>

                <h1>
                    {{ $elevatorType->name }}
                </h1>


                @if($elevatorType->short_description)

                    <p>
                        {{ $elevatorType->short_description }}
                    </p>

                @endif


                <nav class="et-detail-hero__breadcrumb" aria-label="Breadcrumb">

                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <span>→</span>

                    <a href="{{
    route('elevator-types.index')
                        }}">
                        Elevator Types
                    </a>

                    <span>→</span>

                    <span>
                        {{ $elevatorType->name }}
                    </span>

                </nav>

            </div>


            <!-- <div class="et-detail-hero__badge">

                <span>NAKSH ELEVATOR</span>

                <strong>
                    Safe & Reliable
                    Vertical Mobility
                </strong>

                <small>
                    Professional Elevator Solutions
                </small>

            </div> -->

            {{-- RIGHT IMAGE --}}
            <div class="et-detail-hero__visual">

                @if($elevatorType->image)

                                <div class="et-detail-hero__photo">

                                    <img src="{{ asset(
                        'storage/' . $elevatorType->image
                    ) }}" alt="{{ $elevatorType->name }}">

                                    <div class="et-detail-hero__photo-shade"></div>

                                    <div class="et-detail-hero__photo-info">

                                        <span>
                                            NAKSH ELEVATOR
                                        </span>

                                        <strong>
                                            {{ $elevatorType->name }}
                                        </strong>

                                        <small>
                                            Safe • Reliable • Professional
                                        </small>

                                    </div>

                                </div>

                @else

                    <div class="et-detail-hero__photo et-detail-hero__photo--empty">

                        <div class="et-detail-hero__empty-icon">
                            ↕
                        </div>

                        <strong>
                            {{ $elevatorType->name }}
                        </strong>

                        <small>
                            Naksh Elevator
                        </small>

                    </div>

                @endif

            </div>

        </div>

    </div>

</section>