<div
    class="naksh-site-intro"
    id="nakshSiteIntro"
    aria-hidden="true"
>
    {{-- STEP 1 : WHITE LOGO LOADER --}}
    <div class="naksh-site-intro__loader">

        <div class="naksh-site-intro__logo-wrap">

            <span class="naksh-site-intro__spinner"></span>

            <img
                src="{{
                    !empty($settings?->logo)
                        ? asset('storage/' . $settings->logo)
                        : asset('images/logo.png')
                }}"
                alt="Naksh Elevator"
                class="naksh-site-intro__logo"
            >

        </div>

        <div class="naksh-site-intro__loading-line">
            <span></span>
        </div>

        <p>Elevating Your Experience</p>

    </div>


    {{-- STEP 2 : BLUE ELEVATOR DOORS --}}
    <div class="naksh-blue-intro">

        <div
            class="
                naksh-blue-intro__door
                naksh-blue-intro__door--left
            "
        ></div>

        <div
            class="
                naksh-blue-intro__door
                naksh-blue-intro__door--right
            "
        ></div>

        <div class="naksh-blue-intro__seam"></div>

    </div>

</div>