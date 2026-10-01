@if($relatedProjects->isNotEmpty())

<section class="related-projects">

    <div class="site-container">


        <div class="related-projects__heading">

            <div>

                <div class="related-projects__eyebrow">

                    <span></span>

                    MORE PROJECTS

                </div>

                <h2>
                    Explore Other Projects
                </h2>

            </div>


            <a
                href="{{ route('projects.index') }}"
                class="related-projects__all"
            >

                View All Projects

                <span>→</span>

            </a>

        </div>


        <div class="related-projects__grid">

            @foreach(
                $relatedProjects as $relatedProject
            )

                <article class="related-project-card">


                    <a
                        href="{{ route(
                            'projects.show',
                            $relatedProject->slug
                        ) }}"
                        class="related-project-card__visual"
                    >

                        @if($relatedProject->cover_image)

                            <img
                                src="{{ asset(
                                    'storage/' .
                                    $relatedProject
                                        ->cover_image
                                ) }}"
                                alt="{{
                                    $relatedProject->title
                                }}"
                                loading="lazy"
                            >

                        @else

                            <div
                                class="
                                    related-project-card__placeholder
                                "
                            >
                                ↗
                            </div>

                        @endif


                        @if(
                            $relatedProject
                                ->project_category
                        )

                            <span
                                class="
                                    related-project-card__category
                                "
                            >
                                {{
                                    $relatedProject
                                        ->project_category
                                }}
                            </span>

                        @endif

                    </a>


                    <div class="related-project-card__body">

                        @if($relatedProject->location)

                            <small>
                                {{ $relatedProject->location }}
                            </small>

                        @endif


                        <h3>

                            <a
                                href="{{ route(
                                    'projects.show',
                                    $relatedProject->slug
                                ) }}"
                            >
                                {{ $relatedProject->title }}
                            </a>

                        </h3>


                        @if(
                            $relatedProject
                                ->short_description
                        )

                            <p>
                                {{
                                    \Illuminate\Support\Str::limit(
                                        $relatedProject
                                            ->short_description,
                                        100
                                    )
                                }}
                            </p>

                        @endif


                        <a
                            href="{{ route(
                                'projects.show',
                                $relatedProject->slug
                            ) }}"
                            class="
                                related-project-card__link
                            "
                        >

                            View Project

                            <span>→</span>

                        </a>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>

@endif