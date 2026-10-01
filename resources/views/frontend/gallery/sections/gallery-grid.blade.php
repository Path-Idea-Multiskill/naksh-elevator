<section class="gallery-showcase">

    <div class="site-container">


        @if($galleries->isNotEmpty())

            <div
                class="gallery-showcase__grid"
                id="galleryGrid"
            >

                @foreach($galleries as $gallery)

                    @php

                        $categorySlug =
                            \Illuminate\Support\Str::slug(
                                $gallery->category
                            );

                        $imageUrl =
                            asset(
                                'storage/' .
                                $gallery->image
                            );

                    @endphp


                    <article
                        class="gallery-card"
                        data-gallery-item
                        data-category="{{ $categorySlug }}"
                    >

                        <button
                            type="button"
                            class="gallery-card__image-button"
                            data-gallery-open
                            data-image="{{ $imageUrl }}"
                            data-title="{{ $gallery->title }}"
                            data-category="{{ $gallery->category }}"
                            data-alt="{{
                                $gallery->alt_text
                                    ?: $gallery->title
                            }}"
                            aria-label="View {{ $gallery->title }}"
                        >

                            <img
                                src="{{ $imageUrl }}"
                                alt="{{
                                    $gallery->alt_text
                                        ?: $gallery->title
                                }}"
                                class="gallery-card__image"
                                loading="lazy"
                            >


                            <div
                                class="gallery-card__overlay"
                            ></div>


                            <span
                                class="gallery-card__category"
                            >
                                {{ $gallery->category }}
                            </span>


                            <span
                                class="gallery-card__zoom"
                            >
                                +
                            </span>

                        </button>


                        <div class="gallery-card__body">

                            <div
                                class="gallery-card__number"
                            >
                                {{
                                    str_pad(
                                        $loop->iteration,
                                        2,
                                        '0',
                                        STR_PAD_LEFT
                                    )
                                }}
                            </div>


                            <div class="gallery-card__content">

                                <h2>
                                    {{ $gallery->title }}
                                </h2>


                                @if(
                                    $gallery->project
                                    && $gallery->project->status
                                )

                                    <a
                                        href="{{ route(
                                            'projects.show',
                                            $gallery->project->slug
                                        ) }}"
                                        class="
                                            gallery-card__project
                                        "
                                    >
                                        View Related Project
                                        <span>→</span>
                                    </a>

                                @else

                                    <span
                                        class="
                                            gallery-card__project
                                            gallery-card__project--plain
                                        "
                                    >
                                        Naksh Elevator
                                    </span>

                                @endif

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>


            {{-- FILTER EMPTY --}}
            <div
                class="gallery-showcase__filter-empty"
                id="galleryFilterEmpty"
                hidden
            >

                <span>◫</span>

                <h3>
                    No Images Found
                </h3>

                <p>
                    No gallery images are available
                    in this category.
                </p>

            </div>


        @else

            <div class="gallery-showcase__empty">

                <span>◫</span>

                <h3>
                    Gallery Coming Soon
                </h3>

                <p>
                    Our latest elevator project
                    images are currently being updated.
                </p>

            </div>

        @endif

    </div>

</section>