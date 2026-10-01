<section class="contact-form-section">

    <div class="site-container">

        <div class="contact-form-section__grid">


            {{-- LEFT --}}
            <div class="contact-form-section__content">

                <div class="contact-form-section__eyebrow">
                    <span></span>
                    SEND AN ENQUIRY
                </div>

                <h2>
                    Tell Us About Your
                    Elevator Requirement
                </h2>

                <p>
                    Share your requirement with us.
                    Our team will review your enquiry
                    and get in touch with you.
                </p>


                <div class="contact-form-section__steps">

                    <div class="contact-form-step">

                        <span>01</span>

                        <div>
                            <strong>
                                Submit Your Requirement
                            </strong>

                            <small>
                                Fill in the enquiry form
                                with your requirement.
                            </small>
                        </div>

                    </div>


                    <div class="contact-form-step">

                        <span>02</span>

                        <div>
                            <strong>
                                Requirement Review
                            </strong>

                            <small>
                                Our team reviews your
                                elevator requirement.
                            </small>
                        </div>

                    </div>


                    <div class="contact-form-step">

                        <span>03</span>

                        <div>
                            <strong>
                                Our Team Contacts You
                            </strong>

                            <small>
                                We connect with you for
                                further discussion.
                            </small>
                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT FORM --}}
            <div class="contact-form-card">


                @if(session('success'))

                    <div
                        class="contact-form-alert contact-form-alert--success"
                        role="alert"
                    >
                        <strong>
                            Enquiry Submitted
                        </strong>

                        <span>
                            {{ session('success') }}
                        </span>
                    </div>

                @endif


                @if($errors->any())

                    <div
                        class="contact-form-alert contact-form-alert--error"
                        role="alert"
                    >
                        <strong>
                            Please check the form.
                        </strong>

                        <span>
                            Some information needs
                            your attention.
                        </span>
                    </div>

                @endif


                <form
                    action="{{ route('contact.store') }}"
                    method="POST"
                    id="contactEnquiryForm"
                    novalidate
                >

                    @csrf


                    <div class="contact-form-grid">


                        {{-- NAME --}}
                        <div class="contact-field">

                            <label for="contactName">
                                Full Name
                                <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="contactName"
                                value="{{ old('name') }}"
                                maxlength="100"
                                autocomplete="name"
                                placeholder="Enter your full name"
                                required
                            >

                            <small
                                class="contact-field__error"
                                data-error-for="name"
                            >
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </small>

                        </div>


                        {{-- PHONE --}}
                        <div class="contact-field">

                            <label for="contactPhone">
                                Phone Number
                                <span>*</span>
                            </label>

                            <input
                                type="tel"
                                name="phone"
                                id="contactPhone"
                                value="{{ old('phone') }}"
                                maxlength="20"
                                autocomplete="tel"
                                inputmode="tel"
                                placeholder="Enter phone number"
                                required
                            >

                            <small
                                class="contact-field__error"
                                data-error-for="phone"
                            >
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </small>

                        </div>


                        {{-- EMAIL --}}
                        <div class="contact-field">

                            <label for="contactEmail">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="contactEmail"
                                value="{{ old('email') }}"
                                maxlength="255"
                                autocomplete="email"
                                placeholder="Enter email address"
                            >

                            <small
                                class="contact-field__error"
                                data-error-for="email"
                            >
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </small>

                        </div>


                        {{-- SERVICE --}}
                        <div class="contact-field">

                            <label for="contactService">
                                Service
                            </label>

                            <select
                                name="service"
                                id="contactService"
                            >

                                <option value="">
                                    Select a service
                                </option>

                                @foreach($services as $service)

                                    <option
                                        value="{{ $service->title }}"
                                        @selected(
                                            old('service')
                                            === $service->title
                                        )
                                    >
                                        {{ $service->title }}
                                    </option>

                                @endforeach

                            </select>

                            <small
                                class="contact-field__error"
                                data-error-for="service"
                            >
                                @error('service')
                                    {{ $message }}
                                @enderror
                            </small>

                        </div>


                        {{-- SUBJECT --}}
                        <div
                            class="
                                contact-field
                                contact-field--full
                            "
                        >

                            <label for="contactSubject">
                                Subject
                                <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="subject"
                                id="contactSubject"
                                value="{{ old('subject') }}"
                                maxlength="255"
                                placeholder="What can we help you with?"
                                required
                            >

                            <small
                                class="contact-field__error"
                                data-error-for="subject"
                            >
                                @error('subject')
                                    {{ $message }}
                                @enderror
                            </small>

                        </div>


                        {{-- MESSAGE --}}
                        <div
                            class="
                                contact-field
                                contact-field--full
                            "
                        >

                            <label for="contactMessage">
                                Your Requirement
                                <span>*</span>
                            </label>

                            <textarea
                                name="message"
                                id="contactMessage"
                                rows="6"
                                maxlength="2000"
                                placeholder="Tell us about your elevator requirement..."
                                required
                            >{{ old('message') }}</textarea>

                            <div class="contact-field__footer">

                                <small
                                    class="contact-field__error"
                                    data-error-for="message"
                                >
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </small>

                                <small
                                    class="contact-field__count"
                                    id="contactMessageCount"
                                >
                                    0 / 2000
                                </small>

                            </div>

                        </div>


                    </div>


                    <button
                        type="submit"
                        class="contact-form-submit"
                    >
                        <span>
                            Submit Enquiry
                        </span>

                        <strong>→</strong>
                    </button>


                    <p class="contact-form-note">
                        By submitting this form, you
                        agree to be contacted regarding
                        your enquiry.
                    </p>


                </form>

            </div>

        </div>

    </div>

</section>