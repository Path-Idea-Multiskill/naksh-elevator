<section class="cabin-detail-overview">

    <div class="cabin-detail-container">

        <div class="cabin-detail-overview__grid">

            <div class="cabin-detail-overview__heading">

                <span class="cabin-detail-label">
                    DESIGN OVERVIEW
                </span>

                <h2>
                    Premium Design.
                    Refined Finish.
                </h2>

            </div>

            <div class="cabin-detail-overview__content">

                @if($cabinDesign->description)

                    <div class="cabin-detail-description">
                        {!! nl2br(e($cabinDesign->description)) !!}
                    </div>

                @elseif($cabinDesign->short_description)

                    <p>
                        {{ $cabinDesign->short_description }}
                    </p>

                @endif

                <div class="cabin-detail-specs">

                    <div class="cabin-detail-spec">

                        <span>Category</span>

                        <strong>
                            {{
                                ucwords(
                                    str_replace(
                                        '-',
                                        ' ',
                                        $cabinDesign->category
                                    )
                                )
                            }}
                        </strong>

                    </div>

                    @if($cabinDesign->material_finish)

                        <div class="cabin-detail-spec">

                            <span>Material / Finish</span>

                            <strong>
                                {{ $cabinDesign->material_finish }}
                            </strong>

                        </div>

                    @endif

                    <div class="cabin-detail-spec">

                        <span>Customization</span>

                        <strong>
                            Available
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>