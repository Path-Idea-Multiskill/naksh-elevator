document.addEventListener(
    "DOMContentLoaded",
    function () {

        const form =
            document.getElementById(
                "testimonialForm"
            );

        if (!form) {
            return;
        }


        /* =========================================
           ELEMENTS
        ========================================= */

        const customerName =
            document.getElementById(
                "customer_name"
            );

        const designation =
            document.getElementById(
                "designation"
            );

        const location =
            document.getElementById(
                "location"
            );

        const imageInput =
            document.getElementById(
                "testimonialImageInput"
            );

        const previewImage =
            document.getElementById(
                "testimonialPreviewImage"
            );

        const imagePlaceholder =
            document.getElementById(
                "testimonialImagePlaceholder"
            );

        const imageClearButton =
            document.getElementById(
                "testimonialImageClear"
            );

        const ratingInput =
            document.getElementById(
                "rating"
            );

        const ratingStars =
            document.querySelectorAll(
                ".testimonial-rating-star"
            );

        const ratingValue =
            document.getElementById(
                "testimonialRatingValue"
            );

        const review =
            document.getElementById(
                "review"
            );

        const reviewCounter =
            document.getElementById(
                "testimonialReviewCounter"
            );

        const status =
            document.getElementById(
                "status"
            );

        const sortOrder =
            document.getElementById(
                "sort_order"
            );

        const saveButton =
            document.getElementById(
                "testimonialSaveBtn"
            );

        const summary =
            document.getElementById(
                "testimonialValidationSummary"
            );

        const summaryMessage =
            document.getElementById(
                "testimonialValidationMessage"
            );


        const isEdit =
            form.dataset.editMode === "1";


        const allowedImageTypes = [
            "image/jpeg",
            "image/png",
            "image/webp"
        ];

        const maxImageSize =
            4 * 1024 * 1024;


        /* =========================================
           ERROR HELPERS
        ========================================= */

        function getErrorElement(name) {

            return document.querySelector(
                '[data-error-for="' +
                name +
                '"]'
            );
        }


        function setError(
            field,
            name,
            message
        ) {

            if (field) {

                field.classList.add(
                    "has-error"
                );
            }


            const error =
                getErrorElement(name);


            if (error) {

                error.textContent =
                    message;

                error.classList.add(
                    "show"
                );
            }
        }


        function clearError(
            field,
            name
        ) {

            if (field) {

                field.classList.remove(
                    "has-error"
                );
            }


            const error =
                getErrorElement(name);


            if (error) {

                error.textContent = "";

                error.classList.remove(
                    "show"
                );
            }
        }


        function clearAllErrors() {

            document
                .querySelectorAll(
                    ".testimonial-input.has-error"
                )
                .forEach(
                    function (field) {

                        field.classList.remove(
                            "has-error"
                        );
                    }
                );


            document
                .querySelectorAll(
                    ".testimonial-client-error"
                )
                .forEach(
                    function (error) {

                        error.textContent = "";

                        error.classList.remove(
                            "show"
                        );
                    }
                );


            if (summary) {
                summary.hidden = true;
            }
        }


        /* =========================================
           RATING
        ========================================= */

        function paintRating(value) {

            const rating =
                Number(value);


            ratingStars.forEach(
                function (star) {

                    const starValue =
                        Number(
                            star.dataset.rating
                        );


                    star.classList.toggle(
                        "active",
                        starValue <= rating
                    );
                }
            );


            if (ratingValue) {

                ratingValue.textContent =
                    rating;
            }
        }


        if (ratingInput) {

            paintRating(
                ratingInput.value
            );
        }


        ratingStars.forEach(
            function (star) {

                star.addEventListener(
                    "click",
                    function () {

                        const value =
                            Number(
                                this.dataset.rating
                            );


                        if (
                            value < 1 ||
                            value > 5
                        ) {
                            return;
                        }


                        ratingInput.value =
                            value;


                        paintRating(value);


                        clearError(
                            ratingInput,
                            "rating"
                        );
                    }
                );
            }
        );


        /* =========================================
           REVIEW COUNTER
        ========================================= */

        function updateReviewCounter() {

            if (
                !review ||
                !reviewCounter
            ) {
                return;
            }


            const length =
                review.value.length;


            reviewCounter.textContent =
                length + " / 1500";


            reviewCounter.classList.remove(
                "warning",
                "limit"
            );


            if (length >= 1500) {

                reviewCounter.classList.add(
                    "limit"
                );

            } else if (length >= 1300) {

                reviewCounter.classList.add(
                    "warning"
                );
            }
        }


        updateReviewCounter();


        if (review) {

            review.addEventListener(
                "input",
                function () {

                    updateReviewCounter();


                    const length =
                        this.value.trim().length;


                    if (
                        length >= 10 &&
                        this.value.length <= 1500
                    ) {

                        clearError(
                            review,
                            "review"
                        );
                    }
                }
            );
        }


        /* =========================================
           IMAGE VALIDATION
        ========================================= */

        function validateImage() {

            clearError(
                imageInput,
                "customer_image"
            );


            if (
                !imageInput ||
                !imageInput.files ||
                imageInput.files.length === 0
            ) {

                /*
                 * Customer image is optional
                 * on both create and edit.
                 */

                return true;
            }


            const file =
                imageInput.files[0];


            if (
                !allowedImageTypes.includes(
                    file.type
                )
            ) {

                setError(
                    imageInput,
                    "customer_image",
                    "Only JPG, JPEG, PNG and WEBP images are allowed."
                );

                return false;
            }


            if (
                file.size >
                maxImageSize
            ) {

                const fileSizeMB =
                    (
                        file.size /
                        1024 /
                        1024
                    ).toFixed(2);


                setError(
                    imageInput,
                    "customer_image",
                    "Selected image is " +
                    fileSizeMB +
                    " MB. Maximum allowed size is 4 MB."
                );

                return false;
            }


            return true;
        }


        /* =========================================
           IMAGE PREVIEW
        ========================================= */

        if (imageInput) {

            imageInput.addEventListener(
                "change",
                function () {

                    clearError(
                        imageInput,
                        "customer_image"
                    );


                    if (
                        !this.files ||
                        !this.files.length
                    ) {
                        return;
                    }


                    if (!validateImage()) {

                        this.value = "";

                        return;
                    }


                    const file =
                        this.files[0];


                    const reader =
                        new FileReader();


                    reader.onload =
                        function (event) {

                            if (previewImage) {

                                previewImage.src =
                                    event.target.result;

                                previewImage.hidden =
                                    false;
                            }


                            if (imagePlaceholder) {

                                imagePlaceholder.hidden =
                                    true;
                            }


                            if (imageClearButton) {

                                imageClearButton.hidden =
                                    false;
                            }
                        };


                    reader.readAsDataURL(file);
                }
            );
        }


        /* =========================================
           CLEAR NEW IMAGE SELECTION
        ========================================= */

        if (imageClearButton) {

            imageClearButton.addEventListener(
                "click",
                function () {

                    if (imageInput) {
                        imageInput.value = "";
                    }


                    /*
                     * On Edit:
                     * Clearing a newly selected image
                     * returns preview to the existing
                     * server image after page reload.
                     *
                     * It does NOT delete the saved image.
                     */

                    if (!isEdit) {

                        if (previewImage) {

                            const existingImage =
                                previewImage.dataset.existingImage;


                            if (
                                isEdit &&
                                existingImage
                            ) {

                                previewImage.src =
                                    existingImage;

                                previewImage.hidden =
                                    false;


                                if (imagePlaceholder) {

                                    imagePlaceholder.hidden =
                                        true;
                                }

                            } else {

                                previewImage.src = "";

                                previewImage.hidden =
                                    true;


                                if (imagePlaceholder) {

                                    imagePlaceholder.hidden =
                                        false;
                                }
                            }
                        }


                        if (imagePlaceholder) {

                            imagePlaceholder.hidden =
                                false;
                        }
                    }


                    this.hidden = true;


                    clearError(
                        imageInput,
                        "customer_image"
                    );
                }
            );
        }


        /* =========================================
           LIVE FIELD ERROR CLEARING
        ========================================= */

        if (customerName) {

            customerName.addEventListener(
                "input",
                function () {

                    const length =
                        this.value.trim().length;


                    if (
                        length > 0 &&
                        length <= 150
                    ) {

                        clearError(
                            customerName,
                            "customer_name"
                        );
                    }
                }
            );
        }


        if (designation) {

            designation.addEventListener(
                "input",
                function () {

                    if (
                        this.value.length <= 150
                    ) {

                        clearError(
                            designation,
                            "designation"
                        );
                    }
                }
            );
        }


        if (location) {

            location.addEventListener(
                "input",
                function () {

                    if (
                        this.value.length <= 150
                    ) {

                        clearError(
                            location,
                            "location"
                        );
                    }
                }
            );
        }


        if (sortOrder) {

            sortOrder.addEventListener(
                "input",
                function () {

                    const value =
                        Number(this.value);


                    if (
                        this.value === "" ||
                        (
                            Number.isInteger(value) &&
                            value >= 0
                        )
                    ) {

                        clearError(
                            sortOrder,
                            "sort_order"
                        );
                    }
                }
            );
        }


        /* =========================================
           SUBMIT VALIDATION
        ========================================= */

        form.addEventListener(
            "submit",
            function (event) {

                clearAllErrors();


                let valid = true;

                let firstInvalidField =
                    null;


                /*
                 * CUSTOMER NAME
                 */

                const nameValue =
                    customerName
                        ? customerName
                            .value
                            .trim()
                        : "";


                if (!nameValue) {

                    setError(
                        customerName,
                        "customer_name",
                        "Customer name is required."
                    );


                    firstInvalidField =
                        firstInvalidField ||
                        customerName;

                    valid = false;

                } else if (
                    nameValue.length > 150
                ) {

                    setError(
                        customerName,
                        "customer_name",
                        "Customer name must not exceed 150 characters."
                    );


                    firstInvalidField =
                        firstInvalidField ||
                        customerName;

                    valid = false;
                }


                /*
                 * DESIGNATION
                 */

                if (
                    designation &&
                    designation.value.length > 150
                ) {

                    setError(
                        designation,
                        "designation",
                        "Designation must not exceed 150 characters."
                    );


                    firstInvalidField =
                        firstInvalidField ||
                        designation;

                    valid = false;
                }


                /*
                 * LOCATION
                 */

                if (
                    location &&
                    location.value.length > 150
                ) {

                    setError(
                        location,
                        "location",
                        "Location must not exceed 150 characters."
                    );


                    firstInvalidField =
                        firstInvalidField ||
                        location;

                    valid = false;
                }


                /*
                 * RATING
                 */

                const rating =
                    ratingInput
                        ? Number(
                            ratingInput.value
                        )
                        : 0;


                if (
                    !Number.isInteger(rating) ||
                    rating < 1 ||
                    rating > 5
                ) {

                    setError(
                        ratingInput,
                        "rating",
                        "Please select a rating between 1 and 5."
                    );


                    firstInvalidField =
                        firstInvalidField ||
                        document.getElementById(
                            "testimonialRatingSelector"
                        );

                    valid = false;
                }


                /*
                 * REVIEW
                 */

                const reviewValue =
                    review
                        ? review.value.trim()
                        : "";


                if (!reviewValue) {

                    setError(
                        review,
                        "review",
                        "Customer review is required."
                    );


                    firstInvalidField =
                        firstInvalidField ||
                        review;

                    valid = false;

                } else if (
                    reviewValue.length < 10
                ) {

                    setError(
                        review,
                        "review",
                        "Review must contain at least 10 characters."
                    );


                    firstInvalidField =
                        firstInvalidField ||
                        review;

                    valid = false;

                } else if (
                    review.value.length > 1500
                ) {

                    setError(
                        review,
                        "review",
                        "Review must not exceed 1500 characters."
                    );


                    firstInvalidField =
                        firstInvalidField ||
                        review;

                    valid = false;
                }


                /*
                 * STATUS
                 */

                if (
                    !status ||
                    !["0", "1"].includes(
                        status.value
                    )
                ) {

                    setError(
                        status,
                        "status",
                        "Please select a valid status."
                    );


                    firstInvalidField =
                        firstInvalidField ||
                        status;

                    valid = false;
                }


                /*
                 * DISPLAY ORDER
                 */

                if (
                    sortOrder &&
                    sortOrder.value !== ""
                ) {

                    const order =
                        Number(
                            sortOrder.value
                        );


                    if (
                        !Number.isInteger(order) ||
                        order < 0
                    ) {

                        setError(
                            sortOrder,
                            "sort_order",
                            "Display order must be a whole number of 0 or greater."
                        );


                        firstInvalidField =
                            firstInvalidField ||
                            sortOrder;

                        valid = false;
                    }
                }


                /*
                 * IMAGE
                 */

                if (!validateImage()) {

                    firstInvalidField =
                        firstInvalidField ||
                        imageInput;

                    valid = false;
                }


                /* =================================
                   INVALID → STOP REQUEST
                ================================= */

                if (!valid) {

                    event.preventDefault();


                    if (summary) {

                        summary.hidden =
                            false;
                    }


                    if (summaryMessage) {

                        summaryMessage.textContent =
                            "The form was not submitted. Please fix the fields marked in red.";
                    }


                    if (firstInvalidField) {

                        firstInvalidField
                            .scrollIntoView({
                                behavior: "smooth",
                                block: "center"
                            });


                        setTimeout(
                            function () {

                                try {

                                    firstInvalidField
                                        .focus();

                                } catch (error) {

                                    // Ignore non-focusable element.
                                }

                            },
                            350
                        );
                    }


                    return false;
                }


                /* =================================
                   VALID → ALLOW BACKEND REQUEST
                ================================= */

                if (saveButton) {

                    saveButton.disabled =
                        true;


                    saveButton.textContent =
                        isEdit
                            ? "Updating..."
                            : "Saving...";
                }


                return true;
            }
        );

    }
);