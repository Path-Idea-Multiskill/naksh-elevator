document.addEventListener('DOMContentLoaded', () => {

    const intro =
        document.getElementById('nakshSiteIntro');

    if (!intro) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW INTRO ONLY ONCE PER BROWSER SESSION
    |--------------------------------------------------------------------------
    */

    const introAlreadyPlayed =
        sessionStorage.getItem(
            'nakshElevatorIntroPlayed'
        );


    /*
    |--------------------------------------------------------------------------
    | ALREADY PLAYED
    |--------------------------------------------------------------------------
    |
    | Home -> About -> Projects -> Contact etc.
    | Intro dobara show nahi hoga.
    |
    */

    if (introAlreadyPlayed === 'yes') {

        intro.remove();

        document.body.classList.remove(
            'naksh-intro-active',
            'naksh-door-revealing'
        );

        document.body.classList.add(
            'naksh-intro-complete'
        );

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | MARK INTRO AS PLAYED
    |--------------------------------------------------------------------------
    */

    sessionStorage.setItem(
        'nakshElevatorIntroPlayed',
        'yes'
    );


    document.body.classList.add(
        'naksh-intro-active'
    );


    /*
    |--------------------------------------------------------------------------
    | STEP 1
    | WHITE SCREEN + LOGO BUFFER
    |--------------------------------------------------------------------------
    |
    | 0ms -> 1100ms
    |
    */


    /*
    |--------------------------------------------------------------------------
    | STEP 2
    | LOGO DISAPPEARS
    |--------------------------------------------------------------------------
    |
    | Background ab bhi WHITE hi rahega.
    |
    */

    window.setTimeout(() => {

        intro.classList.add(
            'is-loading-complete'
        );

    }, 1100);


    /*
    |--------------------------------------------------------------------------
    | STEP 3
    | SMALL PURE WHITE SCREEN HOLD
    |--------------------------------------------------------------------------
    |
    | Logo completely disappear hone ke baad
    | approximately 300ms pure white screen.
    |
    */


    /*
    |--------------------------------------------------------------------------
    | STEP 4
    | BLUE SCREEN TOP -> BOTTOM
    |--------------------------------------------------------------------------
    */

    window.setTimeout(() => {

        intro.classList.add(
            'is-blue-entering'
        );

    }, 1450);


    /*
    |--------------------------------------------------------------------------
    | STEP 5
    | BLUE SCREEN FULLY COVERS VIEWPORT
    |--------------------------------------------------------------------------
    |
    | Blue transition = approx 1 second.
    |
    */

    window.setTimeout(() => {

        intro.classList.add(
            'is-blue-ready'
        );

    }, 2500);


    /*
    |--------------------------------------------------------------------------
    | STEP 6
    | SMALL FULL-BLUE HOLD
    |--------------------------------------------------------------------------
    |
    | Blue complete hone ke baad thoda cinematic pause.
    |
    */


    /*
    |--------------------------------------------------------------------------
    | STEP 7
    | BLUE SCREEN OPENS FROM CENTER
    |--------------------------------------------------------------------------
    */

    // window.setTimeout(() => {

    //     document.body.classList.add(
    //         'naksh-door-revealing'
    //     );

    //     intro.classList.add(
    //         'is-door-opening'
    //     );

    // }, 2750);

    window.setTimeout(() => {

        /*
         * White background remove hoga.
         * Blue doors open honge.
         * Website .58 opacity se visible hogi.
         */

        document.body.classList.add(
            'naksh-door-revealing'
        );

        intro.classList.add(
            'is-door-opening'
        );

    }, 2750);



    /*
    |--------------------------------------------------------------------------
    | WEBSITE GRADUALLY BECOMES CLEAR
    |--------------------------------------------------------------------------
    */

    window.setTimeout(() => {

        document.body.classList.add(
            'naksh-website-revealing'
        );

    }, 2900);


    /*
    |--------------------------------------------------------------------------
    | STEP 8
    | WEBSITE FULLY VISIBLE
    |--------------------------------------------------------------------------
    */

    window.setTimeout(() => {

        document.body.classList.remove(
            'naksh-intro-active',
            'naksh-door-revealing',
            'naksh-website-revealing'
        );

        document.body.classList.add(
            'naksh-intro-complete'
        );

        intro.classList.add(
            'is-finished'
        );

    }, 4000);


    /*
    |--------------------------------------------------------------------------
    | STEP 9
    | REMOVE INTRO FROM DOM
    |--------------------------------------------------------------------------
    */

    window.setTimeout(() => {

        intro.remove();

    }, 4350);

});