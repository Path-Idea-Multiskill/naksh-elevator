document.addEventListener('DOMContentLoaded', () => {

    const intro =
        document.getElementById('nakshSiteIntro');

    if (!intro) {
        return;
    }

    document.body.classList.add(
        'naksh-intro-active'
    );


    /*
     * STEP 1
     * White logo loader
     */
    window.setTimeout(() => {

        intro.classList.add(
            'is-loading-complete'
        );

    }, 1100);


    /*
     * STEP 2
     * Elevator visible
     * then doors open
     */
    window.setTimeout(() => {

        intro.classList.add(
            'is-door-opening'
        );

    }, 1850);


    /*
     * STEP 3
     * Remove complete intro
     */
    window.setTimeout(() => {

        intro.classList.add(
            'is-finished'
        );

        document.body.classList.remove(
            'naksh-intro-active'
        );

    }, 3550);


    /*
     * Remove element from DOM
     */
    window.setTimeout(() => {

        intro.remove();

    }, 4000);

});