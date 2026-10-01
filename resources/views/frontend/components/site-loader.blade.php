<div
    class="naksh-site-intro"
    id="nakshSiteIntro"
    aria-hidden="true"
>
    {{-- Initial white logo loader --}}
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


    {{-- Elevator entrance --}}
    <div class="naksh-elevator-intro">

        <div class="naksh-elevator-intro__top">
            <span class="naksh-elevator-intro__floor">G</span>
            <span class="naksh-elevator-intro__arrow">▲</span>
        </div>

        <div class="naksh-elevator-intro__frame">

            <div
                class="
                    naksh-elevator-intro__door
                    naksh-elevator-intro__door--left
                "
            >
                <span class="naksh-elevator-intro__metal"></span>
            </div>

            <div
                class="
                    naksh-elevator-intro__door
                    naksh-elevator-intro__door--right
                "
            >
                <span class="naksh-elevator-intro__metal"></span>
            </div>

            <div class="naksh-elevator-intro__seam"></div>

        </div>

    </div>

</div>