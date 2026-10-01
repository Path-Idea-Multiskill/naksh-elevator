document.addEventListener(
    "DOMContentLoaded",
    function () {

        const viewport =
            document.getElementById(
                "testimonialViewport"
            );

        const track =
            document.getElementById(
                "testimonialTrack"
            );

        const prevButton =
            document.getElementById(
                "testimonialPrev"
            );

        const nextButton =
            document.getElementById(
                "testimonialNext"
            );

        const dotsContainer =
            document.getElementById(
                "testimonialDots"
            );


        if (
            !viewport ||
            !track ||
            !prevButton ||
            !nextButton
        ) {
            return;
        }


        const cards =
            Array.from(
                track.querySelectorAll(
                    ".home-testimonial-card"
                )
            );


        if (!cards.length) {
            return;
        }


        let currentIndex = 0;


        function visibleCards() {

            if (
                window.innerWidth <= 650
            ) {
                return 1;
            }

            if (
                window.innerWidth <= 1000
            ) {
                return 2;
            }

            return 3;
        }


        function maximumIndex() {

            return Math.max(
                0,
                cards.length -
                visibleCards()
            );
        }


        function createDots() {

            if (!dotsContainer) {
                return;
            }

            dotsContainer.innerHTML = "";

            const total =
                maximumIndex() + 1;


            for (
                let index = 0;
                index < total;
                index++
            ) {

                const dot =
                    document.createElement(
                        "button"
                    );

                dot.type = "button";

                dot.className =
                    "home-testimonials__dot";

                dot.setAttribute(
                    "aria-label",
                    `Go to testimonial ${index + 1}`
                );


                dot.addEventListener(
                    "click",
                    function () {

                        currentIndex =
                            index;

                        updateSlider();

                    }
                );


                dotsContainer.appendChild(
                    dot
                );
            }
        }


        function updateSlider() {

            const maxIndex =
                maximumIndex();


            if (
                currentIndex >
                maxIndex
            ) {
                currentIndex =
                    maxIndex;
            }


            const firstCard =
                cards[0];

            const trackStyles =
                window.getComputedStyle(
                    track
                );

            const gap =
                parseFloat(
                    trackStyles.columnGap ||
                    trackStyles.gap ||
                    0
                );

            const cardWidth =
                firstCard.getBoundingClientRect()
                    .width;


            const offset =
                currentIndex *
                (cardWidth + gap);


            track.style.transform =
                `translateX(-${offset}px)`;


            prevButton.disabled =
                currentIndex === 0;

            nextButton.disabled =
                currentIndex >= maxIndex;


            if (dotsContainer) {

                const dots =
                    dotsContainer.querySelectorAll(
                        ".home-testimonials__dot"
                    );


                dots.forEach(
                    function (
                        dot,
                        index
                    ) {

                        dot.classList.toggle(
                            "is-active",
                            index ===
                            currentIndex
                        );

                    }
                );

            }

        }


        prevButton.addEventListener(
            "click",
            function () {

                if (
                    currentIndex > 0
                ) {
                    currentIndex--;
                    updateSlider();
                }

            }
        );


        nextButton.addEventListener(
            "click",
            function () {

                if (
                    currentIndex <
                    maximumIndex()
                ) {
                    currentIndex++;
                    updateSlider();
                }

            }
        );


        let resizeTimer;


        window.addEventListener(
            "resize",
            function () {

                clearTimeout(
                    resizeTimer
                );


                resizeTimer =
                    setTimeout(
                        function () {

                            currentIndex = 0;

                            createDots();
                            updateSlider();

                        },
                        150
                    );

            }
        );


        createDots();
        updateSlider();

    }
);