document.addEventListener('DOMContentLoaded', function () {

    const items = document.querySelectorAll(
        '.cabin-gallery-item'
    );

    const lightbox = document.getElementById(
        'cabinLightbox'
    );

    const image = document.getElementById(
        'cabinLightboxImage'
    );

    const closeButton = document.getElementById(
        'cabinLightboxClose'
    );

    if (!items.length || !lightbox || !image) {
        return;
    }

    function openLightbox(src) {
        image.src = src;

        lightbox.classList.add('is-open');

        lightbox.setAttribute(
            'aria-hidden',
            'false'
        );

        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('is-open');

        lightbox.setAttribute(
            'aria-hidden',
            'true'
        );

        document.body.style.overflow = '';

        image.src = '';
    }

    items.forEach(function (item) {

        item.addEventListener('click', function () {
            openLightbox(this.dataset.image);
        });

    });

    if (closeButton) {
        closeButton.addEventListener(
            'click',
            closeLightbox
        );
    }

    lightbox.addEventListener(
        'click',
        function (event) {
            if (event.target === lightbox) {
                closeLightbox();
            }
        }
    );

    document.addEventListener(
        'keydown',
        function (event) {
            if (
                event.key === 'Escape' &&
                lightbox.classList.contains('is-open')
            ) {
                closeLightbox();
            }
        }
    );

});