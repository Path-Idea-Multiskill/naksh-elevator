document.addEventListener('DOMContentLoaded', function () {

    const slider =
        document.querySelector('#nakshHeroSlider');

    if (!slider) {
        return;
    }


    const slides =
        Array.from(
            slider.querySelectorAll(
                '.naksh-hero-slide'
            )
        );

    const dots =
        Array.from(
            slider.querySelectorAll(
                '.naksh-hero-slider__dots button'
            )
        );

    const previousButton =
        slider.querySelector(
            '.naksh-hero-slider__arrow--prev'
        );

    const nextButton =
        slider.querySelector(
            '.naksh-hero-slider__arrow--next'
        );

    const currentNumber =
        slider.querySelector(
            '.naksh-hero-slider__current'
        );

    const progress =
        slider.querySelector(
            '.naksh-hero-slider__progress span'
        );


    if (!slides.length) {
        return;
    }


    let currentIndex = 0;

    let autoPlayTimer = null;

    const autoPlayDelay = 6000;


    function formatNumber(number) {

        return String(number).padStart(
            2,
            '0'
        );

    }


    function restartProgress() {

        if (!progress) {
            return;
        }

        progress.classList.remove(
            'is-running'
        );

        void progress.offsetWidth;

        progress.classList.add(
            'is-running'
        );

    }


    function showSlide(index) {

        if (index < 0) {
            index = slides.length - 1;
        }

        if (index >= slides.length) {
            index = 0;
        }


        slides.forEach(
            function (slide) {

                slide.classList.remove(
                    'is-active'
                );

            }
        );


        dots.forEach(
            function (dot) {

                dot.classList.remove(
                    'is-active'
                );

            }
        );


        currentIndex = index;


        slides[currentIndex]
            .classList
            .add('is-active');


        if (dots[currentIndex]) {

            dots[currentIndex]
                .classList
                .add('is-active');

        }


        if (currentNumber) {

            currentNumber.textContent =
                formatNumber(
                    currentIndex + 1
                );

        }


        restartProgress();

    }


    function nextSlide() {

        showSlide(
            currentIndex + 1
        );

    }


    function previousSlide() {

        showSlide(
            currentIndex - 1
        );

    }


    function stopAutoPlay() {

        if (autoPlayTimer) {

            clearInterval(
                autoPlayTimer
            );

            autoPlayTimer = null;

        }

    }


    function startAutoPlay() {

        stopAutoPlay();

        autoPlayTimer =
            setInterval(
                nextSlide,
                autoPlayDelay
            );

    }


    function resetAutoPlay() {

        startAutoPlay();

    }


    if (nextButton) {

        nextButton.addEventListener(
            'click',
            function () {

                nextSlide();

                resetAutoPlay();

            }
        );

    }


    if (previousButton) {

        previousButton.addEventListener(
            'click',
            function () {

                previousSlide();

                resetAutoPlay();

            }
        );

    }


    dots.forEach(
        function (dot, index) {

            dot.addEventListener(
                'click',
                function () {

                    showSlide(index);

                    resetAutoPlay();

                }
            );

        }
    );


    /*
    ---------------------------------------
    Pause when mouse is over slider
    ---------------------------------------
    */

    slider.addEventListener(
        'mouseenter',
        stopAutoPlay
    );


    slider.addEventListener(
        'mouseleave',
        startAutoPlay
    );


    /*
    ---------------------------------------
    Touch / swipe support
    ---------------------------------------
    */

    let touchStartX = 0;

    let touchEndX = 0;


    slider.addEventListener(
        'touchstart',
        function (event) {

            touchStartX =
                event.changedTouches[0]
                    .screenX;

        },
        {
            passive: true
        }
    );


    slider.addEventListener(
        'touchend',
        function (event) {

            touchEndX =
                event.changedTouches[0]
                    .screenX;


            const difference =
                touchStartX -
                touchEndX;


            if (
                Math.abs(difference) < 50
            ) {
                return;
            }


            if (difference > 0) {

                nextSlide();

            } else {

                previousSlide();

            }


            resetAutoPlay();

        },
        {
            passive: true
        }
    );


    /*
    ---------------------------------------
    Keyboard accessibility
    ---------------------------------------
    */

    slider.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key ===
                'ArrowRight'
            ) {

                nextSlide();

                resetAutoPlay();

            }


            if (
                event.key ===
                'ArrowLeft'
            ) {

                previousSlide();

                resetAutoPlay();

            }

        }
    );


    /*
    ---------------------------------------
    Stop animation in inactive browser tab
    ---------------------------------------
    */

    document.addEventListener(
        'visibilitychange',
        function () {

            if (document.hidden) {

                stopAutoPlay();

            } else {

                startAutoPlay();

            }

        }
    );


    showSlide(0);

    startAutoPlay();

});