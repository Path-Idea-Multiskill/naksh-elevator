document.addEventListener(
    'DOMContentLoaded',
    function () {

        const section =
            document.querySelector(
                '#homeProjects'
            );

        if (!section) {
            return;
        }


        const cards =
            section.querySelectorAll(
                '.home-project-card'
            );


        if (!cards.length) {
            return;
        }


        const observer =
            new IntersectionObserver(
                function (entries, observer) {

                    entries.forEach(
                        function (entry) {

                            if (
                                !entry.isIntersecting
                            ) {
                                return;
                            }


                            const card =
                                entry.target;

                            const index =
                                Array.from(cards)
                                    .indexOf(card);


                            setTimeout(
                                function () {

                                    card.classList.add(
                                        'is-visible'
                                    );

                                },
                                Math.min(
                                    index * 110,
                                    330
                                )
                            );


                            observer.unobserve(
                                card
                            );

                        }
                    );

                },
                {
                    threshold: 0.12
                }
            );


        cards.forEach(
            function (card) {

                observer.observe(
                    card
                );

            }
        );

    }
);