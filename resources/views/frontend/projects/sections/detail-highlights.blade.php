@if(
    is_array($project->highlights)
    && count($project->highlights)
)

<section class="project-highlights">

    <div class="site-container">


        <div class="project-highlights__heading">

            <div class="project-highlights__eyebrow">

                <span></span>

                PROJECT HIGHLIGHTS

            </div>


            <h2>
                Key Features of This Project
            </h2>


            <p>
                Key elevator systems and features
                delivered as part of this project.
            </p>

        </div>


        <div class="project-highlights__grid">

            @foreach(
                $project->highlights as $highlight
            )

                @if(filled($highlight))

                    <article
                        class="project-highlight-card"
                    >

                        <span
                            class="
                                project-highlight-card__number
                            "
                        >
                            {{
                                str_pad(
                                    $loop->iteration,
                                    2,
                                    '0',
                                    STR_PAD_LEFT
                                )
                            }}
                        </span>


                        <div
                            class="
                                project-highlight-card__icon
                            "
                        >
                            ✓
                        </div>


                        <h3>
                            {{ $highlight }}
                        </h3>

                    </article>

                @endif

            @endforeach

        </div>

    </div>

</section>

@endif