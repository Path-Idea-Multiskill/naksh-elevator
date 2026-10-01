<section class="home-projects" id="homeProjects">
    <div class="site-container">

        {{-- HEADER --}}
        <div class="home-projects__header">

            <div>

                <div class="home-projects__eyebrow">
                    <span></span>
                    OUR PROJECTS
                </div>

                <h2>
                    Featured Elevator
                    Projects
                </h2>

            </div>


            <p>
                Explore some of our elevator
                installations delivered for
                residential, commercial and
                other building requirements.
            </p>

        </div>


        @if($projects->isNotEmpty())

            <div class="home-projects__grid">

                @foreach($projects as $project)

                        <article class="home-project-card">

                            {{-- IMAGE --}}
                            <div class="home-project-card__image">

                                @if($project->cover_image)

                                            <img src="{{ asset(
                                        'storage/' .
                                        $project->cover_image
                                    ) }}" alt="{{ $project->title }}" loading="lazy">

                                @else

                                    <div class="home-project-card__placeholder">
                                        <span>↕</span>

                                        <small>
                                            Naksh Elevator
                                        </small>
                                    </div>

                                @endif


                                @if($project->project_category)

                                        <span class="home-project-card__category">
                                            {{
                                    $project->project_category
                                                                                                                                        }}
                                        </span>

                                @endif

                            </div>


                            {{-- CONTENT --}}
                            <div class="home-project-card__body">

                                @if($project->location)

                                    <div class="home-project-card__location">
                                        <span>●</span>

                                        {{ $project->location }}
                                    </div>

                                @endif


                                <h3>
                                    {{ $project->title }}
                                </h3>


                                @if($project->short_description)

                                        <p>
                                            {{
                                    \Illuminate\Support\Str::limit(
                                        $project->short_description,
                                        115
                                    )
                                                                                                                                        }}
                                        </p>

                                @endif


                                <div class="home-project-card__footer">

                                    <!-- <a
                                                                                                href="#"
                                                                                                class="home-project-card__link"
                                                                                            >
                                                                                                View Project

                                                                                                <span>→</span>
                                                                                            </a> -->

                                    <a href="{{ route(
                        'projects.show',
                        $project->slug
                    ) }}" class="home-project-card__link">
                                        View Project
                                        <span>→</span>
                                    </a>


                                    @if($project->completion_date)

                                                <small>
                                                    {{
                                        \Carbon\Carbon::parse(
                                            $project->completion_date
                                        )->format('M Y')
                                                                                                                                                                }}
                                                </small>

                                    @endif

                                </div>

                            </div>

                        </article>

                @endforeach

            </div>


            <div class="home-projects__bottom">

                <!-- <a href="#" class="home-projects__view-all">
                                View All Projects
                                <span>→</span>
                            </a> -->

                <a href="{{ route('projects.index') }}" class="home-projects__view-all">
                    View All Projects
                    <span>→</span>
                </a>

            </div>

        @else

            <div class="home-projects__empty">

                <span>↕</span>

                <h3>
                    Projects coming soon.
                </h3>

                <p>
                    Our latest elevator projects
                    will be displayed here.
                </p>

            </div>

        @endif

    </div>
</section>