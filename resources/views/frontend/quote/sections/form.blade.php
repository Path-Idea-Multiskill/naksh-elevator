<section class="quote-form-section">

    <div class="site-container">

        <div class="quote-form-section__grid">

            {{-- LEFT --}}
            <div class="quote-form-intro">

                <div class="quote-form-intro__eyebrow">
                    <span></span>
                    PROJECT REQUIREMENT
                </div>

                <h2>
                    Tell Us About
                    Your Project
                </h2>

                <p>
                    Complete the form with your project
                    information. This helps our team
                    understand your requirement before
                    contacting you.
                </p>


                <div class="quote-form-intro__points">

                    <div class="quote-form-point">
                        <span>✓</span>

                        <div>
                            <strong>
                                Free Requirement Review
                            </strong>

                            <small>
                                Share your basic project
                                details with our team.
                            </small>
                        </div>
                    </div>


                    <div class="quote-form-point">
                        <span>✓</span>

                        <div>
                            <strong>
                                Professional Consultation
                            </strong>

                            <small>
                                Discuss elevator options
                                suitable for your project.
                            </small>
                        </div>
                    </div>


                    <div class="quote-form-point">
                        <span>✓</span>

                        <div>
                            <strong>
                                Project-Specific Solution
                            </strong>

                            <small>
                                Requirements are reviewed
                                according to your building.
                            </small>
                        </div>
                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <div class="quote-form-card">


                @if(session('success'))

                    <div
                        class="
                            quote-form-alert
                            quote-form-alert--success
                        "
                        role="alert"
                    >
                        <strong>
                            Quote Request Submitted
                        </strong>

                        <span>
                            {{ session('success') }}
                        </span>
                    </div>

                @endif


                @if($errors->any())

                    <div
                        class="
                            quote-form-alert
                            quote-form-alert--error
                        "
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
                    action="{{ route('quote.store') }}"
                    method="POST"
                    id="quoteRequestForm"
                    novalidate
                >

                    @csrf


                    {{-- PERSONAL DETAILS --}}
                    <div class="quote-form-group">

                        <div class="quote-form-group__heading">

                            <span>01</span>

                            <div>
                                <strong>
                                    Contact Details
                                </strong>

                                <small>
                                    How can we reach you?
                                </small>
                            </div>

                        </div>


                        <div class="quote-form-grid">

                            {{-- NAME --}}
                            <div class="quote-field">

                                <label for="quoteName">
                                    Full Name
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="quoteName"
                                    value="{{ old('name') }}"
                                    maxlength="100"
                                    autocomplete="name"
                                    placeholder="Enter your full name"
                                    required
                                >

                                <small
                                    class="quote-field__error"
                                >
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </small>

                            </div>


                            {{-- PHONE --}}
                            <div class="quote-field">

                                <label for="quotePhone">
                                    Phone Number
                                    <span>*</span>
                                </label>

                                <input
                                    type="tel"
                                    name="phone"
                                    id="quotePhone"
                                    value="{{ old('phone') }}"
                                    maxlength="20"
                                    autocomplete="tel"
                                    inputmode="tel"
                                    placeholder="Enter phone number"
                                    required
                                >

                                <small
                                    class="quote-field__error"
                                >
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </small>

                            </div>


                            {{-- EMAIL --}}
                            <div class="quote-field">

                                <label for="quoteEmail">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    id="quoteEmail"
                                    value="{{ old('email') }}"
                                    maxlength="255"
                                    autocomplete="email"
                                    placeholder="Enter email address"
                                >

                                <small
                                    class="quote-field__error"
                                >
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </small>

                            </div>


                            {{-- LOCATION --}}
                            <div class="quote-field">

                                <label for="quoteLocation">
                                    Project Location
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    name="location"
                                    id="quoteLocation"
                                    value="{{ old('location') }}"
                                    maxlength="255"
                                    placeholder="City / Project location"
                                    required
                                >

                                <small
                                    class="quote-field__error"
                                >
                                    @error('location')
                                        {{ $message }}
                                    @enderror
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- PROJECT DETAILS --}}
                    <div class="quote-form-group">

                        <div class="quote-form-group__heading">

                            <span>02</span>

                            <div>
                                <strong>
                                    Project Details
                                </strong>

                                <small>
                                    Tell us about your building.
                                </small>
                            </div>

                        </div>


                        <div class="quote-form-grid">


                            {{-- BUILDING TYPE --}}
                            <div class="quote-field">

                                <label for="buildingType">
                                    Building Type
                                    <span>*</span>
                                </label>

                                <select
                                    name="building_type"
                                    id="buildingType"
                                    required
                                >
                                    <option value="">
                                        Select building type
                                    </option>

                                    @foreach([
                                        'Residential',
                                        'Commercial',
                                        'Hospital',
                                        'Hotel',
                                        'Industrial',
                                        'Institutional',
                                        'Other'
                                    ] as $buildingType)

                                        <option
                                            value="{{ $buildingType }}"
                                            @selected(
                                                old('building_type')
                                                === $buildingType
                                            )
                                        >
                                            {{ $buildingType }}
                                        </option>

                                    @endforeach

                                </select>

                                <small
                                    class="quote-field__error"
                                >
                                    @error('building_type')
                                        {{ $message }}
                                    @enderror
                                </small>

                            </div>


                            {{-- ELEVATOR TYPE --}}
                            <div class="quote-field">

                                <label for="elevatorType">
                                    Elevator Type
                                    <span>*</span>
                                </label>

                                <select
                                    name="elevator_type_id"
                                    id="elevatorType"
                                    required
                                >

                                    <option value="">
                                        Select elevator type
                                    </option>

                                    @foreach(
                                        $elevatorTypes
                                        as $elevatorType
                                    )

                                        <option
                                            value="{{ $elevatorType->id }}"
                                            @selected(
                                                (string)
                                                old('elevator_type_id')
                                                ===
                                                (string)
                                                $elevatorType->id
                                            )
                                        >
                                            {{ $elevatorType->name }}
                                        </option>

                                    @endforeach

                                </select>

                                <small
                                    class="quote-field__error"
                                >
                                    @error('elevator_type_id')
                                        {{ $message }}
                                    @enderror
                                </small>

                            </div>


                            {{-- FLOORS --}}
                            <div class="quote-field">

                                <label for="quoteFloors">
                                    Number of Floors
                                    <span>*</span>
                                </label>

                                <input
                                    type="number"
                                    name="floors"
                                    id="quoteFloors"
                                    value="{{ old('floors') }}"
                                    min="1"
                                    max="200"
                                    inputmode="numeric"
                                    placeholder="Example: 4"
                                    required
                                >

                                <small
                                    class="quote-field__error"
                                >
                                    @error('floors')
                                        {{ $message }}
                                    @enderror
                                </small>

                            </div>


                            {{-- CAPACITY --}}
                            <div class="quote-field">

                                <label for="quoteCapacity">
                                    Required Capacity
                                </label>

                                <select
                                    name="capacity"
                                    id="quoteCapacity"
                                >

                                    <option value="">
                                        Select capacity
                                    </option>

                                    @foreach([
                                        '4 Persons',
                                        '6 Persons',
                                        '8 Persons',
                                        '10 Persons',
                                        '13 Persons',
                                        '16 Persons',
                                        'Goods / Custom Capacity',
                                        'Not Sure'
                                    ] as $capacity)

                                        <option
                                            value="{{ $capacity }}"
                                            @selected(
                                                old('capacity')
                                                === $capacity
                                            )
                                        >
                                            {{ $capacity }}
                                        </option>

                                    @endforeach

                                </select>

                                <small
                                    class="quote-field__error"
                                >
                                    @error('capacity')
                                        {{ $message }}
                                    @enderror
                                </small>

                            </div>


                            {{-- PROJECT STAGE --}}
                            <div
                                class="
                                    quote-field
                                    quote-field--full
                                "
                            >

                                <label for="projectStage">
                                    Project Stage
                                    <span>*</span>
                                </label>

                                <select
                                    name="project_stage"
                                    id="projectStage"
                                    required
                                >

                                    <option value="">
                                        Select project stage
                                    </option>

                                    @foreach([
                                        'Planning Stage',
                                        'Under Construction',
                                        'Ready Building',
                                        'Existing Elevator Replacement',
                                        'Modernization Requirement',
                                        'Not Sure'
                                    ] as $stage)

                                        <option
                                            value="{{ $stage }}"
                                            @selected(
                                                old('project_stage')
                                                === $stage
                                            )
                                        >
                                            {{ $stage }}
                                        </option>

                                    @endforeach

                                </select>

                                <small
                                    class="quote-field__error"
                                >
                                    @error('project_stage')
                                        {{ $message }}
                                    @enderror
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- MESSAGE --}}
                    <div class="quote-form-group">

                        <div class="quote-form-group__heading">

                            <span>03</span>

                            <div>
                                <strong>
                                    Additional Requirement
                                </strong>

                                <small>
                                    Optional project information.
                                </small>
                            </div>

                        </div>


                        <div class="quote-field">

                            <label for="quoteMessage">
                                Message
                            </label>

                            <textarea
                                name="message"
                                id="quoteMessage"
                                rows="6"
                                maxlength="2000"
                                placeholder="Tell us any additional requirement, preferred features or project details..."
                            >{{ old('message') }}</textarea>


                            <div class="quote-field__footer">

                                <small
                                    class="quote-field__error"
                                >
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </small>

                                <small
                                    id="quoteMessageCount"
                                    class="quote-field__count"
                                >
                                    0 / 2000
                                </small>

                            </div>

                        </div>

                    </div>


                    <button
                        type="submit"
                        class="quote-form-submit"
                    >
                        <span>
                            Request Free Quote
                        </span>

                        <strong>→</strong>
                    </button>


                    <p class="quote-form-note">
                        Your project information will
                        only be used to respond to your
                        quote request.
                    </p>

                </form>

            </div>

        </div>

    </div>

</section>