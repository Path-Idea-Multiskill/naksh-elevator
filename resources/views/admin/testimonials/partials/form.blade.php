@php
    $isEdit = isset($testimonial);
@endphp


{{-- =============================================
CUSTOMER INFORMATION
============================================= --}}
<section class="testimonial-form-card">

    <div class="testimonial-form-card-header">
        <span>CUSTOMER DETAILS</span>
        <h3>Customer Information</h3>
        <p>
            Enter the customer information displayed
            with this testimonial.
        </p>
    </div>


    <div class="testimonial-form-card-body">

        {{-- CUSTOMER NAME --}}
        <div class="testimonial-field">

            <label for="customer_name">
                Customer Name <span>*</span>
            </label>

            <input type="text" id="customer_name" name="customer_name" class="testimonial-input" value="{{ old(
    'customer_name',
    $testimonial->customer_name ?? ''
) }}" maxlength="150" placeholder="e.g. Rajesh Sharma" autocomplete="name">

            <small class="testimonial-client-error" data-error-for="customer_name"></small>

        </div>


        <div class="testimonial-two-column">

            {{-- DESIGNATION --}}
            <div class="testimonial-field">

                <label for="designation">
                    Designation / Company
                </label>

                <input type="text" id="designation" name="designation" class="testimonial-input" value="{{ old(
    'designation',
    $testimonial->designation ?? ''
) }}" maxlength="150" placeholder="e.g. Home Owner">

                <small class="testimonial-client-error" data-error-for="designation"></small>

            </div>


            {{-- LOCATION --}}
            <div class="testimonial-field">

                <label for="location">
                    Location
                </label>

                <input type="text" id="location" name="location" class="testimonial-input" value="{{ old(
    'location',
    $testimonial->location ?? ''
) }}" maxlength="150" placeholder="e.g. Raipur, Chhattisgarh">

                <small class="testimonial-client-error" data-error-for="location"></small>

            </div>

        </div>

    </div>

</section>


{{-- =============================================
CUSTOMER PHOTO
============================================= --}}
<section class="testimonial-form-card">

    <div class="testimonial-form-card-header">
        <span>CUSTOMER PHOTO</span>
        <h3>Profile Image</h3>
        <p>
            Customer photo is optional. JPG, PNG and
            WEBP images are supported.
        </p>
    </div>


    <div class="testimonial-form-card-body">

        <div class="testimonial-image-area">

            <div class="testimonial-image-preview" id="testimonialImagePreview">

                @if(
                                    $isEdit &&
                                    $testimonial->customer_image
                                )

                                <img src="{{ asset(
                        'storage/' .
                        $testimonial->customer_image
                    ) }}" id="testimonialPreviewImage" data-existing-image="{{ asset(
                        'storage/' .
                        $testimonial->customer_image
                    ) }}" alt="{{ $testimonial->customer_name }}">

                                <div class="testimonial-image-placeholder" id="testimonialImagePlaceholder" hidden>
                                    <span class="testimonial-placeholder-avatar">
                                        👤
                                    </span>

                                    <strong>
                                        Customer Photo
                                    </strong>
                                </div>

                @else

                    <img src="" id="testimonialPreviewImage" alt="" hidden>

                    <div class="testimonial-image-placeholder" id="testimonialImagePlaceholder">
                        <span class="testimonial-placeholder-avatar">
                            👤
                        </span>

                        <strong>
                            Customer Photo
                        </strong>

                        <small>
                            Optional
                        </small>
                    </div>

                @endif

            </div>


            <div class="testimonial-image-controls">

                <input type="file" id="testimonialImageInput" name="customer_image" class="testimonial-file-input"
                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">


                <label for="testimonialImageInput" class="testimonial-image-select-btn">
                    Choose Photo
                </label>


                <button type="button" id="testimonialImageClear" class="testimonial-image-clear-btn" hidden>
                    Clear Selection
                </button>


                <small class="testimonial-image-help">
                    JPG, JPEG, PNG or WEBP · Maximum 4 MB
                </small>


                <small class="testimonial-client-error" data-error-for="customer_image"></small>

            </div>

        </div>

    </div>

</section>


{{-- =============================================
REVIEW
============================================= --}}
<section class="testimonial-form-card testimonial-form-full">

    <div class="testimonial-form-card-header">
        <span>TESTIMONIAL</span>
        <h3>Customer Review</h3>
        <p>
            Add the rating and customer feedback that
            will appear on the website.
        </p>
    </div>


    <div class="testimonial-form-card-body">

        {{-- RATING --}}
        <div class="testimonial-field">

            <label>
                Rating <span>*</span>
            </label>


            <div class="testimonial-rating-selector" id="testimonialRatingSelector" role="radiogroup"
                aria-label="Customer rating">

                @for($rating = 1; $rating <= 5; $rating++)

                    <button type="button" class="testimonial-rating-star" data-rating="{{ $rating }}"
                        aria-label="{{ $rating }} star rating">
                        ★
                    </button>

                @endfor

            </div>


            <input type="hidden" id="rating" name="rating" value="{{ old(
    'rating',
    $testimonial->rating ?? 5
) }}">


            <div class="testimonial-rating-text">
                <strong id="testimonialRatingValue">
                    {{ old(
    'rating',
    $testimonial->rating ?? 5
) }}
                </strong>
                <span>/ 5</span>
            </div>


            <small class="testimonial-client-error" data-error-for="rating"></small>

        </div>


        {{-- REVIEW --}}
        <div class="testimonial-field">

            <div class="testimonial-label-row">

                <label for="review">
                    Review <span>*</span>
                </label>

                <small id="testimonialReviewCounter" class="testimonial-character-counter">
                    0 / 1500
                </small>

            </div>


            <textarea id="review" name="review" class="testimonial-input testimonial-textarea" rows="7" maxlength="1500"
                placeholder="Write the customer's experience with Naksh Elevator...">{{ old(
    'review',
    $testimonial->review ?? ''
) }}</textarea>


            <div class="testimonial-review-help">
                Minimum 10 characters · Maximum 1500 characters
            </div>


            <small class="testimonial-client-error" data-error-for="review"></small>

        </div>

    </div>

</section>


{{-- =============================================
PUBLISHING
============================================= --}}
<section class="testimonial-form-card testimonial-form-full">

    <div class="testimonial-form-card-header">
        <span>PUBLISHING</span>
        <h3>Display Settings</h3>
        <p>
            Control testimonial visibility and
            website display order.
        </p>
    </div>


    <div class="testimonial-form-card-body">

        <div class="testimonial-two-column">

            {{-- STATUS --}}
            <div class="testimonial-field">

                <label for="status">
                    Status <span>*</span>
                </label>

                <select id="status" name="status" class="testimonial-input">

                    <option value="1" @selected(
                        (int) old(
                            'status',
                            $isEdit
                            ? $testimonial->status
                            : 1
                        ) === 1
                    )>
                        Active
                    </option>


                    <option value="0" @selected(
                        (int) old(
                            'status',
                            $isEdit
                            ? $testimonial->status
                            : 1
                        ) === 0
                    )>
                        Inactive
                    </option>

                </select>


                <small class="testimonial-client-error" data-error-for="status"></small>

            </div>


            {{-- SORT ORDER --}}
            <div class="testimonial-field">

                <label for="sort_order">
                    Display Order
                </label>

                <input type="number" id="sort_order" name="sort_order" class="testimonial-input" value="{{ old(
    'sort_order',
    $testimonial->sort_order ?? 0
) }}" min="0" step="1" inputmode="numeric">


                <small class="testimonial-field-help">
                    Lower numbers appear first.
                </small>


                <small class="testimonial-client-error" data-error-for="sort_order"></small>

            </div>

        </div>

    </div>

</section>