<section class="project-detail-hero">

    <div class="site-container">

        <div class="project-detail-hero__grid">


            {{-- LEFT CONTENT --}}
            <div class="project-detail-hero__content">

                <div class="project-detail-hero__eyebrow">

                    <span></span>

                    COMPLETED PROJECT

                </div>


                <h1>
                    {{ $project->title }}
                </h1>


                @if($project->short_description)

                    <p>
                        {{ $project->short_description }}
                    </p>

                @endif


                {{-- PROJECT QUICK META --}}
                <div class="project-detail-hero__meta">

                    @if($project->location)

                        <div>

                            <small>
                                LOCATION
                            </small>

                            <strong>
                                {{ $project->location }}
                            </strong>

                        </div>

                    @endif


                    @if($project->project_category)

                        <div>

                            <small>
                                CATEGORY
                            </small>

                            <strong>
                                {{ $project->project_category }}
                            </strong>

                        </div>

                    @endif


                    @if($project->completion_date)

                                    <div>

                                        <small>
                                            COMPLETED
                                        </small>

                                        <strong>
                                            {{
                        $project
                            ->completion_date
                            ->format('M Y')
                                                }}
                                        </strong>

                                    </div>

                    @endif

                </div>


                {{-- BREADCRUMB --}}
                <nav class="project-detail-hero__breadcrumb" aria-label="Breadcrumb">

                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <span>→</span>

                    <a href="{{ route('projects.index') }}">
                        Projects
                    </a>

                    <span>→</span>

                    <span>
                        {{ $project->title }}
                    </span>

                </nav>

            </div>


            {{-- RIGHT --}}
            <!-- <div class="project-detail-hero__visual">

                <div class="project-detail-hero__box">

                    <span class="project-detail-hero__number">
                        PROJECT
                    </span>

                    <div class="project-detail-hero__icon">
                        ↗
                    </div>


                    <div class="project-detail-hero__box-content">

                        <small>
                            NAKSH ELEVATOR
                        </small>

                        <strong>
                            Quality Installation.
                            Reliable Performance.
                        </strong>

                        <p>
                            Planning • Installation •
                            Testing • Commissioning
                        </p>

                    </div>

                </div>

            </div> -->

            <div class="project-detail-hero__visual">

                <div class="project-detail-hero__image-wrap">

                    @if($project->cover_image)

                        <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}"
                            class="project-detail-hero__image">

                    @else

                        <div class="project-detail-hero__image-placeholder">

                            <span>↗</span>

                            <strong>
                                {{ $project->title }}
                            </strong>

                        </div>

                    @endif


                    <div class="project-detail-hero__image-overlay"></div>


                    <div class="project-detail-hero__image-info">

                        <span class="project-detail-hero__image-icon">
                            ↗
                        </span>

                        <div>

                            <small>
                                NAKSH ELEVATOR PROJECT
                            </small>

                            <strong>
                                Quality Installation
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>