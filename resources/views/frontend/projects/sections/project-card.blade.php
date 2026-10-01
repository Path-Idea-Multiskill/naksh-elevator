<article class="projects-card">

    {{-- IMAGE --}}
    <a
        href="{{ route(
            'projects.show',
            $project->slug
        ) }}"
        class="projects-card__visual"
        aria-label="View {{ $project->title }}"
    >

        @if($project->cover_image)

            <img
                src="{{ asset(
                    'storage/' .
                    $project->cover_image
                ) }}"
                alt="{{ $project->title }}"
                class="projects-card__image"
                loading="lazy"
            >

        @else

            <div class="projects-card__placeholder">

                <span>↗</span>

                <small>
                    Naksh Elevator Project
                </small>

            </div>

        @endif


        <div class="projects-card__overlay"></div>


        @if($project->project_category)

            <span class="projects-card__category">
                {{ $project->project_category }}
            </span>

        @endif

    </a>


    {{-- CONTENT --}}
    <div class="projects-card__body">

        <div class="projects-card__meta">

            @if($project->location)

                <span>
                    {{ $project->location }}
                </span>

            @endif


            @if($project->completion_date)

                <span>
                    {{
                        \Illuminate\Support\Carbon::parse(
                            $project->completion_date
                        )->format('M Y')
                    }}
                </span>

            @endif

        </div>


        <h2>

            <a
                href="{{ route(
                    'projects.show',
                    $project->slug
                ) }}"
            >
                {{ $project->title }}
            </a>

        </h2>


        @if($project->short_description)

            <p>
                {{
                    \Illuminate\Support\Str::limit(
                        $project->short_description,
                        130
                    )
                }}
            </p>

        @endif


        <a
            href="{{ route(
                'projects.show',
                $project->slug
            ) }}"
            class="projects-card__link"
        >
            View Project

            <span>→</span>
        </a>

    </div>

</article>