document.addEventListener('DOMContentLoaded', function () {

    const buttons = document.querySelectorAll(
        '.cabin-filter__button'
    );

    const cards = document.querySelectorAll(
        '.cabin-design-item'
    );

    const noResults = document.getElementById(
        'cabinNoResults'
    );

    if (!buttons.length || !cards.length) {
        return;
    }

    buttons.forEach(function (button) {

        button.addEventListener('click', function () {

            const filter = this.dataset.filter;

            buttons.forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

            let visible = 0;

            cards.forEach(function (card) {

                const category =
                    card.dataset.category;

                const show =
                    filter === 'all' ||
                    category === filter;

                card.classList.toggle(
                    'is-hidden',
                    !show
                );

                if (show) {
                    visible++;
                }

            });

            if (noResults) {
                noResults.hidden = visible !== 0;
            }

        });

    });

});