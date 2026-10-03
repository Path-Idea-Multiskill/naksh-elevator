<section class="home-elevators" id="homeElevatorTypes">
    <div class="site-container">

        {{-- SECTION HEADER --}}
        <div class="home-elevators__header">

            <div class="home-elevators__heading">

                <div class="home-elevators__eyebrow">
                    <span></span>
                    OUR ELEVATOR SOLUTIONS
                </div>

                <h2>
                    Elevators Designed for
                    Every Building
                </h2>

            </div>

            <p class="home-elevators__intro">
                Discover safe, reliable and modern
                elevator solutions designed for
                residential, commercial and
                industrial requirements.
            </p>

        </div>


        {{-- ELEVATOR CARDS --}}
        @if($elevatorTypes->isNotEmpty())

            <div class="home-elevators__grid">

                @foreach($elevatorTypes as $elevator)

                        <article class="home-elevators__card">

                            {{-- IMAGE --}}
                            <!-- <div class="home-elevators__image">

                                            @if($elevator->image)

                                                        <img src="{{ asset(
                                                    'storage/' .
                                                    $elevator->image
                                                ) }}" alt="{{ $elevator->name }}" loading="lazy">

                                            @else

                                                <div class="home-elevators__placeholder">
                                                    <span>↕</span>
                                                    <small>
                                                        Naksh Elevator
                                                    </small>
                                                </div>

                                            @endif


                                            <span class="home-elevators__number">
                                                {{
                                                          str_pad(
                                                              $loop->iteration,
                                                              2,
                                                              '0',
                                                              STR_PAD_LEFT
                                                          )
                                                }}
                                            </span>

                                        </div> -->

                            <a href="{{ route(
                        'elevator-types.show',
                        $elevator->slug
                    ) }}" class="home-elevators__image-link" aria-label="View {{ $elevator->name }}">

                                <div class="home-elevators__image">

                                    @if($elevator->image)

                                                    <img src="{{ asset(
                                            'storage/' .
                                            $elevator->image
                                        ) }}" alt="{{ $elevator->name }}" loading="lazy">

                                        {{-- NAKSH ELEVATOR WATERMARK --}}
                                       <div class="home-elevators__watermark">
                                          <img
                                              src="{{ asset('images/logo/naksh-logo.png') }}"
                                              alt=""
                                              aria-hidden="true"
                                          >
                                       </div>

                                    @else

                                        <div class="home-elevators__placeholder">

                                            <span>↕</span>

                                            <small>
                                                Naksh Elevator
                                            </small>

                                        </div>

                                    @endif


                                    <span class="home-elevators__number">
                                        {{
                        str_pad(
                            $loop->iteration,
                            2,
                            '0',
                            STR_PAD_LEFT
                        )
                        }}
                                    </span>

                                </div>

                            </a>


                            {{-- CONTENT --}}
                            <div class="home-elevators__content">

                                <!-- <h3>
                                    {{ $elevator->name }}
                                </h3> -->

                                <h3>
    <a
        href="{{ route(
            'elevator-types.show',
            $elevator->slug
        ) }}"
    >
        {{ $elevator->name }}
    </a>
</h3>


                                @if($elevator->short_description)

                                        <p>
                                            {{
                                    \Illuminate\Support\Str::limit(
                                        $elevator->short_description,
                                        115
                                    )
                                                                            }}
                                        </p>

                                @elseif($elevator->description)

                                        <p>
                                            {{
                                    \Illuminate\Support\Str::limit(
                                        strip_tags(
                                            $elevator->description
                                        ),
                                        115
                                    )
                                                                            }}
                                        </p>

                                @endif


                                <!-- <a
                                                        href="#"
                                                        class="home-elevators__link"
                                                    >
                                                        Explore Solution

                                                        <span>
                                                            →
                                                        </span>
                                                    </a> -->

                                <a href="{{ route(
                        'elevator-types.show',
                        $elevator->slug
                    ) }}" class="home-elevators__link">
                                    Explore Solution

                                    <span>
                                        →
                                    </span>
                                </a>

                            </div>

                        </article>

                @endforeach

            </div>

        @else

            <div class="home-elevators__empty">

                <span>↕</span>

                <h3>
                    Elevator solutions coming soon.
                </h3>

                <p>
                    Please check back for our
                    latest elevator solutions.
                </p>

            </div>

        @endif


        {{-- VIEW ALL --}}
        @if($elevatorTypes->isNotEmpty())

            <div class="home-elevators__footer">

                <a
    href="{{ route('elevator-types.index') }}"
    class="home-elevators__view-all"
>
    View All Elevators

    <span>→</span>
</a>

            </div>

        @endif

    </div>
</section>