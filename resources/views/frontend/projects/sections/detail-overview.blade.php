<section class="project-overview">

    <div class="site-container">

        <div class="project-overview__grid">


            {{-- LEFT IMAGE --}}
            <div class="project-overview__visual">

                <div class="project-overview__image-wrap">

                    @if($project->cover_image)

                        <img
                            src="{{ asset(
                                'storage/' .
                                $project->cover_image
                            ) }}"
                            alt="{{ $project->title }}"
                            class="project-overview__image"
                        >

                    @else

                        <div
                            class="project-overview__placeholder"
                        >

                            <span>↗</span>

                            <strong>
                                {{ $project->title }}
                            </strong>

                            <small>
                                Naksh Elevator Project
                            </small>

                        </div>

                    @endif

                </div>


                <div class="project-overview__badge">

                    <span>✓</span>

                    <div>

                        <strong>
                            Project Completed
                        </strong>

                        <small>
                            Naksh Elevator
                        </small>

                    </div>

                </div>

            </div>


            {{-- RIGHT CONTENT --}}
            <div class="project-overview__content">

                <div class="project-overview__eyebrow">

                    <span></span>

                    PROJECT OVERVIEW

                </div>


                <h2>
                    About This Elevator Project
                </h2>


                @if($project->description)

                    <div class="project-overview__description">

                        {!! nl2br(
                            e($project->description)
                        ) !!}

                    </div>

                @elseif($project->short_description)

                    <div class="project-overview__description">

                        <p>
                            {{ $project->short_description }}
                        </p>

                    </div>

                @endif


                {{-- INFORMATION --}}
                <div class="project-overview__info">


                    @if($project->client_name)

                        <div class="project-info-item">

                            <span>
                                01
                            </span>

                            <div>

                                <small>
                                    CLIENT
                                </small>

                                <strong>
                                    {{ $project->client_name }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    @if($project->elevatorType)

                        <div class="project-info-item">

                            <span>
                                02
                            </span>

                            <div>

                                <small>
                                    ELEVATOR TYPE
                                </small>

                                <strong>
                                    {{
                                        $project
                                            ->elevatorType
                                            ->name
                                    }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    @if($project->project_category)

                        <div class="project-info-item">

                            <span>
                                03
                            </span>

                            <div>

                                <small>
                                    PROJECT CATEGORY
                                </small>

                                <strong>
                                    {{ $project->project_category }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    @if($project->completion_date)

                        <div class="project-info-item">

                            <span>
                                04
                            </span>

                            <div>

                                <small>
                                    COMPLETION DATE
                                </small>

                                <strong>
                                    {{
                                        $project
                                            ->completion_date
                                            ->format('d M Y')
                                    }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    @if($project->location)

                        <div
                            class="
                                project-info-item
                                project-info-item--wide
                            "
                        >

                            <span>
                                05
                            </span>

                            <div>

                                <small>
                                    PROJECT LOCATION
                                </small>

                                <strong>
                                    {{ $project->location }}
                                </strong>

                            </div>

                        </div>

                    @endif


                </div>

            </div>

        </div>

    </div>

</section>