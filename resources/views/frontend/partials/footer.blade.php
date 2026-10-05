<footer class="site-footer">

    <div class="site-container">

        <div class="site-footer-grid">

            {{-- COMPANY --}}
            <div class="site-footer-company">

                <a href="{{ route('home') }}" class="site-footer-logo">

                    <!-- <img src="{{
    $settings?->logo
    ? asset(
        'storage/' .
        $settings->logo
    )
    : asset(
        'images/logo/naksh-logo.png'
    )
                        }}" alt="{{
    $settings?->company_name
    ?: 'Naksh Elevator'
                        }}"> -->

                    <a href="{{ route('home') }}" class="site-footer-logo">

                        <img src="{{ asset('images/footer/footer_img.png') }}" alt="Naksh Elevator">

                    </a>
                </a>


                @if($settings?->footer_description)

                    <p>
                        {{ $settings->footer_description }}
                    </p>

                @endif

            </div>


            {{-- QUICK LINKS --}}
            <div class="site-footer-column">

                <h3>
                    Quick Links
                </h3>

                <a href="{{ route('home') }}">
                    Home
                </a>

                <a href="{{ route('about') }}">
                    About Us
                </a>

                <!-- <a href="{{ route('services.index') }}">
                    Services
                </a> -->

                <a href="{{ route('projects.index') }}">
                    Projects
                </a>

                <a href="{{ route('contact.index') }}">
                    Contact
                </a>

            </div>


            {{-- SOLUTIONS --}}
            <div class="site-footer-column">

                <h3>
                    Elevator Solutions
                </h3>

                <!-- @foreach(
                        $footerElevatorTypes
                        as $footerElevator
                    )

                    <a href="#">
                        {{ $footerElevator->name }}
                    </a>

                @endforeach -->

                @foreach($footerElevatorTypes as $type)

                    <!-- <li> -->
                    <a href="{{ route('elevator-types.show', $type->slug) }}">
                        {{ $type->name }}
                    </a>
                    <!-- </li> -->

                @endforeach

            </div>


            {{-- CONTACT --}}
            <div class="site-footer-column">

                <h3>
                    Contact Us
                </h3>


                <!-- @if($settings?->primary_phone)

                            <a href="tel:{{
                    preg_replace(
                        '/[^0-9+]/',
                        '',
                        $settings->primary_phone
                    )
                                                                        }}">
                                {{ $settings->primary_phone }}
                            </a>

                @endif -->

                @if($settings?->primary_phone || $settings?->secondary_phone)

                    <div class="footer-phone-numbers">

                        @if($settings?->primary_phone)

                                    <a href="tel:{{
                            preg_replace(
                                '/[^0-9+]/',
                                '',
                                $settings->primary_phone
                            )
                                            }}">
                                        {{ $settings->primary_phone }}
                                    </a>

                        @endif

                        @if($settings?->primary_phone && $settings?->secondary_phone)
                            <span>,</span>
                        @endif

                        @if($settings?->secondary_phone)

                                    <a href="tel:{{
                            preg_replace(
                                '/[^0-9+]/',
                                '',
                                $settings->secondary_phone
                            )
                                            }}">
                                        {{ $settings->secondary_phone }}
                                    </a>

                        @endif

                    </div>

                @endif


                @if($settings?->email)

                    <a href="mailto:{{ $settings->email }}">
                        {{ $settings->email }}
                    </a>

                @endif


                @if($settings?->address)

                    <p>
                        {{ $settings->address }}

                        @if($settings->city)
                            <br>
                            {{ $settings->city }}
                        @endif

                        @if($settings->state)
                            ,
                            {{ $settings->state }}
                        @endif

                        @if($settings->pincode)
                            -
                            {{ $settings->pincode }}
                        @endif
                    </p>

                @endif

            </div>

        </div>


        <div class="site-footer-bottom">

            <p>
                &copy;
                {{ date('Y') }}
                {{ $settings?->company_name ?: 'Naksh Elevator' }}.
                All rights reserved.
            </p>


            <!-- <div class="site-footer-social">

                @if($settings?->facebook_url)
                    <a href="{{ $settings->facebook_url }}" target="_blank" rel="noopener noreferrer">
                        Facebook
                    </a>
                @endif


                @if($settings?->instagram_url)
                    <a href="{{ $settings->instagram_url }}" target="_blank" rel="noopener noreferrer">
                        Instagram
                    </a>
                @endif


                @if($settings?->linkedin_url)
                    <a href="{{ $settings->linkedin_url }}" target="_blank" rel="noopener noreferrer">
                        LinkedIn
                    </a>
                @endif


                @if($settings?->youtube_url)
                    <a href="{{ $settings->youtube_url }}" target="_blank" rel="noopener noreferrer">
                        YouTube
                    </a>
                @endif

            </div> -->

            <div class="site-footer-social">

                @if($settings?->facebook_url)
                    <a href="{{ $settings->facebook_url }}" target="_blank" rel="noopener noreferrer"
                        class="site-footer-social__link" aria-label="Facebook">
                        <span class="site-footer-social__icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M13.5 22v-8h2.8l.4-3.2h-3.2V8.7c0-.9.3-1.6 1.7-1.6H17V4.2c-.3 0-1.4-.2-2.6-.2-2.6 0-4.4 1.6-4.4 4.5v2.3H7V14h3v8h3.5z" />
                            </svg>
                        </span>

                        <span>Facebook</span>
                    </a>
                @endif


                @if($settings?->instagram_url)
                    <a href="{{ $settings->instagram_url }}" target="_blank" rel="noopener noreferrer"
                        class="site-footer-social__link" aria-label="Instagram">
                        <span class="site-footer-social__icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7zm5 3a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm5.5-3.2a1.2 1.2 0 1 1 0 2.4 1.2 1.2 0 0 1 0-2.4z" />
                            </svg>
                        </span>

                        <span>Instagram</span>
                    </a>
                @endif


                @if($settings?->linkedin_url)
                    <a href="{{ $settings->linkedin_url }}" target="_blank" rel="noopener noreferrer"
                        class="site-footer-social__link" aria-label="LinkedIn">
                        <span class="site-footer-social__icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M6.5 8.5H3.3V19h3.2V8.5zM4.9 3A1.9 1.9 0 1 0 5 6.8 1.9 1.9 0 0 0 4.9 3zM19 13c0-3.2-1.7-4.7-4-4.7-1.8 0-2.7 1-3.1 1.7V8.5H8.7V19h3.2v-5.2c0-1.4.3-2.8 2.1-2.8 1.8 0 1.8 1.7 1.8 2.9V19H19v-6z" />
                            </svg>
                        </span>

                        <span>LinkedIn</span>
                    </a>
                @endif


                @if($settings?->youtube_url)
                    <a href="{{ $settings->youtube_url }}" target="_blank" rel="noopener noreferrer"
                        class="site-footer-social__link" aria-label="YouTube">
                        <span class="site-footer-social__icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M21.6 7.2a2.8 2.8 0 0 0-2-2C17.8 4.7 12 4.7 12 4.7s-5.8 0-7.6.5a2.8 2.8 0 0 0-2 2A29 29 0 0 0 2 12a29 29 0 0 0 .4 4.8 2.8 2.8 0 0 0 2 2c1.8.5 7.6.5 7.6.5s5.8 0 7.6-.5a2.8 2.8 0 0 0 2-2A29 29 0 0 0 22 12a29 29 0 0 0-.4-4.8zM10 15.2V8.8l5.5 3.2-5.5 3.2z" />
                            </svg>
                        </span>

                        <span>YouTube</span>
                    </a>
                @endif

            </div>

        </div>

    </div>

</footer>