<article
    class="cabin-design-item"
    data-category="{{ $design->category }}"
>

    <a
        href="{{
            route(
                'cabin-designs.show',
                $design->slug
            )
        }}"
        class="cabin-design-item__image"
    >

        <img
            src="{{
                asset(
                    'storage/' .
                    $design->cover_image
                )
            }}"
            alt="{{ $design->title }}"
            loading="lazy"
        >

        <div class="cabin-design-item__overlay"></div>

        <span class="cabin-design-item__category">
            {{
                ucwords(
                    str_replace(
                        '-',
                        ' ',
                        $design->category
                    )
                )
            }}
        </span>

        @if ($design->featured)
            <span class="cabin-design-item__featured">
                Featured
            </span>
        @endif

        <span class="cabin-design-item__view">
            View Design
            <span>→</span>
        </span>

    </a>

    <div class="cabin-design-item__body">

        <div class="cabin-design-item__top">

            <h3>
                <a
                    href="{{
                        route(
                            'cabin-designs.show',
                            $design->slug
                        )
                    }}"
                >
                    {{ $design->title }}
                </a>
            </h3>

            <a
                href="{{
                    route(
                        'cabin-designs.show',
                        $design->slug
                    )
                }}"
                class="cabin-design-item__arrow"
                aria-label="View {{ $design->title }}"
            >
                ↗
            </a>

        </div>

        @if ($design->material_finish)
            <div class="cabin-design-item__material">
                <span></span>
                {{ $design->material_finish }}
            </div>
        @endif

        @if ($design->short_description)
            <p>
                {{
                    \Illuminate\Support\Str::limit(
                        $design->short_description,
                        105
                    )
                }}
            </p>
        @endif

    </div>

</article>