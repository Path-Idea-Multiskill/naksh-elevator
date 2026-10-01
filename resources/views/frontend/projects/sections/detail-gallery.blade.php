@if(
    is_array($project->gallery_images)
    && count($project->gallery_images)
)

<section class="project-gallery">

    <div class="site-container">


        <div class="project-gallery__heading">

            <div>

                <div class="project-gallery__eyebrow">

                    <span></span>

                    PROJECT GALLERY

                </div>


                <h2>
                    Explore Project Images
                </h2>

            </div>


            <p>
                A closer look at the elevator
                installation and completed project.
            </p>

        </div>


        <div class="project-gallery__grid">

            @foreach(
                $project->gallery_images as $image
            )

                @if(filled($image))

                    <figure
                        class="
                            project-gallery__item
                            {{
                                $loop->first
                                    ? 'project-gallery__item--large'
                                    : ''
                            }}
                        "
                    >

                        <img
                            src="{{ asset(
                                'storage/' . $image
                            ) }}"
                            alt="{{
                                $project->title
                            }} - Project Image {{
                                $loop->iteration
                            }}"
                            loading="lazy"
                        >


                        <figcaption>

                            <span>
                                {{
                                    str_pad(
                                        $loop->iteration,
                                        2,
                                        '0',
                                        STR_PAD_LEFT
                                    )
                                }}
                            </span>

                            <small>
                                Project View
                            </small>

                        </figcaption>

                    </figure>

                @endif

            @endforeach

        </div>

    </div>

</section>

@endif