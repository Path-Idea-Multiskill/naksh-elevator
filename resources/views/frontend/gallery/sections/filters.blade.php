@if($galleries->isNotEmpty())

<section class="gallery-filter">

    <div class="site-container">

        <div class="gallery-filter__inner">

            <div class="gallery-filter__heading">

                <div class="gallery-filter__eyebrow">
                    <span></span>
                    BROWSE GALLERY
                </div>

                <h2>
                    Explore by Category
                </h2>

            </div>


            <div
                class="gallery-filter__buttons"
                role="group"
                aria-label="Gallery categories"
            >

                <button
                    type="button"
                    class="gallery-filter__button active"
                    data-gallery-filter="all"
                >
                    All
                </button>


                @foreach($categories as $category)

                    <button
                        type="button"
                        class="gallery-filter__button"
                        data-gallery-filter="{{
                            \Illuminate\Support\Str::slug(
                                $category
                            )
                        }}"
                    >
                        {{ $category }}
                    </button>

                @endforeach

            </div>

        </div>

    </div>

</section>

@endif