<section class="contact-info">

    <div class="site-container">

        <div class="contact-info__heading">

            <div>

                <div class="contact-info__eyebrow">
                    <span></span>
                    GET IN TOUCH
                </div>

                <h2>
                    We're Here to Help
                </h2>

            </div>

            <p>
                Contact our team for elevator
                installation, maintenance,
                modernization or general enquiries.
            </p>

        </div>


        <div class="contact-info__grid">


            {{-- PHONE --}}
            <article class="contact-info-card">

                <div class="contact-info-card__icon">
                    ☎
                </div>

                <small>
                    CALL US
                </small>

                <h3>
                    Phone
                </h3>

                @if($settings?->primary_phone)

                    <a
                        href="tel:{{
                            preg_replace(
                                '/[^0-9+]/',
                                '',
                                $settings->primary_phone
                            )
                        }}"
                    >
                        {{ $settings->primary_phone }}
                    </a>

                @else

                    <span>
                        Contact number coming soon
                    </span>

                @endif

            </article>


            {{-- EMAIL --}}
            <article class="contact-info-card">

                <div class="contact-info-card__icon">
                    ✉
                </div>

                <small>
                    EMAIL US
                </small>

                <h3>
                    Email
                </h3>

                @if($settings?->email)

                    <a
                        href="mailto:{{ $settings->email }}"
                    >
                        {{ $settings->email }}
                    </a>

                @else

                    <span>
                        Email address coming soon
                    </span>

                @endif

            </article>


            {{-- LOCATION --}}
            <article class="contact-info-card">

                <div class="contact-info-card__icon">
                    ⌖
                </div>

                <small>
                    OUR LOCATION
                </small>

                <h3>
                    Address
                </h3>

                <span>
                    @if($settings?->address)
                        {{ $settings->address }},
                    @endif

                    @if($settings?->city)
                        {{ $settings->city }}
                    @endif

                    @if($settings?->state)
                        , {{ $settings->state }}
                    @endif

                    @if($settings?->pincode)
                        - {{ $settings->pincode }}
                    @endif
                </span>

            </article>


            {{-- BUSINESS HOURS --}}
            <article class="contact-info-card">

                <div class="contact-info-card__icon">
                    ◷
                </div>

                <small>
                    WORKING HOURS
                </small>

                <h3>
                    Business Hours
                </h3>

                <span>
                    {{
                        $settings?->business_hours
                        ?: 'Monday - Saturday'
                    }}
                </span>

            </article>


        </div>

    </div>

</section>