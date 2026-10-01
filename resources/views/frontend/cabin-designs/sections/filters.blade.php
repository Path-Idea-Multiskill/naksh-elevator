@if ($categories->count())

<section class="cabin-filter-section">

    <div class="cabin-design-container">

        <div class="cabin-filter">

            <button
                type="button"
                class="cabin-filter__button active"
                data-filter="all"
            >
                All Designs
            </button>

            @foreach ($categories as $category)

                <button
                    type="button"
                    class="cabin-filter__button"
                    data-filter="{{ $category }}"
                >
                    {{
                        ucwords(
                            str_replace(
                                '-',
                                ' ',
                                $category
                            )
                        )
                    }}
                </button>

            @endforeach

        </div>

    </div>

</section>

@endif