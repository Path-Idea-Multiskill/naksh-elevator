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

                    <li>
                        <a href="{{ route('elevator-types.show', $type->slug) }}">
                            {{ $type->name }}
                        </a>
                    </li>

                @endforeach

            </div>


            {{-- CONTACT --}}
            <div class="site-footer-column">

                <h3>
                    Contact Us
                </h3>


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


            <div class="site-footer-social">

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

            </div>

        </div>

    </div>

</footer>