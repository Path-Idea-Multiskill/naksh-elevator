document.addEventListener(
    "DOMContentLoaded",
    function () {

        const form =
            document.getElementById(
                "galleryForm"
            );

        if (!form) {
            return;
        }


        const title =
            document.getElementById("title");

        const category =
            document.getElementById("category");

        const altText =
            document.getElementById("alt_text");

        const sortOrder =
            document.getElementById("sort_order");

        const imageInput =
            document.getElementById(
                "galleryImageInput"
            );

        const previewImage =
            document.getElementById(
                "galleryPreviewImage"
            );

        const placeholder =
            document.getElementById(
                "galleryImagePlaceholder"
            );

        const saveButton =
            document.getElementById(
                "gallerySaveBtn"
            );

        const summary =
            document.getElementById(
                "galleryValidationSummary"
            );

        const summaryMessage =
            document.getElementById(
                "galleryValidationMessage"
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
                    ".gallery-input.has-error"
                )
                .forEach(function (field) {

                    field.classList.remove(
                        "has-error"
                    );
                });


            document
                .querySelectorAll(
                    ".gallery-client-error"
                )
                .forEach(function (error) {

                    error.textContent = "";

                    error.classList.remove(
                        "show"
                    );
                });


            if (summary) {
                summary.hidden = true;
            }
        }


        /* =========================================
           IMAGE VALIDATION
        ========================================= */

        function validateImage() {

            clearError(
                imageInput,
                "image"
            );


            if (
                !imageInput ||
                !imageInput.files ||
                imageInput.files.length === 0
            ) {

                if (!isEdit) {

                    setError(
                        imageInput,
                        "image",
                        "Please select a gallery image."
                    );

                    return false;
                }

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
                    "image",
                    "Only JPG, JPEG, PNG and WEBP images are allowed."
                );

                return false;
            }


            if (
                file.size >
                maxImageSize
            ) {

                const sizeMB =
                    (
                        file.size /
                        1024 /
                        1024
                    ).toFixed(2);


                setError(
                    imageInput,
                    "image",
                    "Image is " +
                    sizeMB +
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
                        "image"
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

                            if (!previewImage) {
                                return;
                            }

                            previewImage.src =
                                event.target.result;

                            previewImage.hidden =
                                false;


                            if (placeholder) {

                                placeholder.hidden =
                                    true;
                            }
                        };


                    reader.readAsDataURL(file);

                }
            );
        }


        /* =========================================
           LIVE ERROR CLEARING
        ========================================= */

        if (title) {

            title.addEventListener(
                "input",
                function () {

                    if (
                        this.value.trim()
                    ) {

                        clearError(
                            title,
                            "title"
                        );
                    }
                }
            );
        }


        if (category) {

            category.addEventListener(
                "change",
                function () {

                    if (this.value) {

                        clearError(
                            category,
                            "category"
                        );
                    }
                }
            );
        }


        if (altText) {

            altText.addEventListener(
                "input",
                function () {

                    if (
                        this.value.length <= 255
                    ) {

                        clearError(
                            altText,
                            "alt_text"
                        );
                    }
                }
            );
        }


        if (sortOrder) {

            sortOrder.addEventListener(
                "input",
                function () {

                    if (
                        this.value === "" ||
                        (
                            Number.isInteger(
                                Number(this.value)
                            ) &&
                            Number(this.value) >= 0
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


                /* TITLE */

                if (
                    !title ||
                    !title.value.trim()
                ) {

                    setError(
                        title,
                        "title",
                        "Title is required."
                    );

                    firstInvalidField =
                        firstInvalidField ||
                        title;

                    valid = false;

                } else if (
                    title.value.trim()
                        .length > 255
                ) {

                    setError(
                        title,
                        "title",
                        "Title must not exceed 255 characters."
                    );

                    firstInvalidField =
                        firstInvalidField ||
                        title;

                    valid = false;
                }


                /* CATEGORY */

                if (
                    !category ||
                    !category.value
                ) {

                    setError(
                        category,
                        "category",
                        "Please select a category."
                    );

                    firstInvalidField =
                        firstInvalidField ||
                        category;

                    valid = false;
                }


                /* ALT TEXT */

                if (
                    altText &&
                    altText.value.length > 255
                ) {

                    setError(
                        altText,
                        "alt_text",
                        "Alt text must not exceed 255 characters."
                    );

                    firstInvalidField =
                        firstInvalidField ||
                        altText;

                    valid = false;
                }


                /* DISPLAY ORDER */

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


                /* IMAGE */

                if (!validateImage()) {

                    firstInvalidField =
                        firstInvalidField ||
                        imageInput;

                    valid = false;
                }


                /* STOP REQUEST */

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
                                behavior:
                                    "smooth",

                                block:
                                    "center"
                            });


                        setTimeout(
                            function () {

                                try {
                                    firstInvalidField
                                        .focus();
                                } catch (error) {
                                    // Ignore focus failure.
                                }

                            },
                            350
                        );
                    }


                    return false;
                }


                /* VALIDATION PASSED */

                if (saveButton) {

                    saveButton.disabled =
                        true;

                    saveButton.dataset
                        .originalText =
                        saveButton.textContent;


                    saveButton.textContent =
                        isEdit
                            ? "Updating..."
                            : "Saving...";
                }


                /*
                 * No preventDefault().
                 * Valid request can now go
                 * to Laravel.
                 */

                return true;
            }
        );

    }
);