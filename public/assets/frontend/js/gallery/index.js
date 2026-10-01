document.addEventListener(
    "DOMContentLoaded",
    function () {

        /* =========================================
           CATEGORY FILTER
        ========================================= */

        const filterButtons =
            document.querySelectorAll(
                "[data-gallery-filter]"
            );

        const galleryItems =
            document.querySelectorAll(
                "[data-gallery-item]"
            );

        const filterEmpty =
            document.getElementById(
                "galleryFilterEmpty"
            );


        filterButtons.forEach(
            function (button) {

                button.addEventListener(
                    "click",
                    function () {

                        const filter =
                            button.dataset
                                .galleryFilter;


                        filterButtons.forEach(
                            function (item) {

                                item.classList.remove(
                                    "active"
                                );

                            }
                        );


                        button.classList.add(
                            "active"
                        );


                        let visibleCount = 0;


                        galleryItems.forEach(
                            function (item) {

                                const category =
                                    item.dataset
                                        .category;


                                const shouldShow =
                                    filter === "all" ||
                                    category === filter;


                                item.hidden =
                                    !shouldShow;


                                if (shouldShow) {
                                    visibleCount++;
                                }

                            }
                        );


                        if (filterEmpty) {

                            filterEmpty.hidden =
                                visibleCount !== 0;

                        }

                    }
                );

            }
        );


        /* =========================================
           LIGHTBOX
        ========================================= */

        const lightbox =
            document.getElementById(
                "galleryLightbox"
            );

        const lightboxImage =
            document.getElementById(
                "galleryLightboxImage"
            );

        const lightboxTitle =
            document.getElementById(
                "galleryLightboxTitle"
            );

        const lightboxCategory =
            document.getElementById(
                "galleryLightboxCategory"
            );

        const openButtons =
            document.querySelectorAll(
                "[data-gallery-open]"
            );

        const closeButtons =
            document.querySelectorAll(
                "[data-gallery-close]"
            );


        if (!lightbox) {
            return;
        }


        function openLightbox(button) {

            const image =
                button.dataset.image || "";

            const title =
                button.dataset.title || "";

            const category =
                button.dataset.category || "";

            const alt =
                button.dataset.alt ||
                title ||
                "Gallery image";


            if (lightboxImage) {

                lightboxImage.src = image;

                lightboxImage.alt = alt;

            }


            if (lightboxTitle) {

                lightboxTitle.textContent =
                    title;

            }


            if (lightboxCategory) {

                lightboxCategory.textContent =
                    category;

            }


            lightbox.classList.add(
                "is-open"
            );

            lightbox.setAttribute(
                "aria-hidden",
                "false"
            );

            document.body.classList.add(
                "gallery-lightbox-open"
            );

        }


        function closeLightbox() {

            lightbox.classList.remove(
                "is-open"
            );

            lightbox.setAttribute(
                "aria-hidden",
                "true"
            );

            document.body.classList.remove(
                "gallery-lightbox-open"
            );


            if (lightboxImage) {

                lightboxImage.src = "";

            }

        }


        openButtons.forEach(
            function (button) {

                button.addEventListener(
                    "click",
                    function () {

                        openLightbox(button);

                    }
                );

            }
        );


        closeButtons.forEach(
            function (button) {

                button.addEventListener(
                    "click",
                    closeLightbox
                );

            }
        );


        document.addEventListener(
            "keydown",
            function (event) {

                if (
                    event.key === "Escape" &&
                    lightbox.classList.contains(
                        "is-open"
                    )
                ) {

                    closeLightbox();

                }

            }
        );

    }
);