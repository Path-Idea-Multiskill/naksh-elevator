document.addEventListener(
    "DOMContentLoaded",
    function () {

        const form =
            document.getElementById("settingsForm");

        if (!form) {
            return;
        }


        const saveButton =
            document.getElementById(
                "settingsSaveButton"
            );


        /* =================================================
           HELPERS
        ================================================= */

        function getErrorElement(fieldId) {

            return document.querySelector(
                '[data-error-for="' +
                fieldId +
                '"]'
            );
        }


        function clearError(field) {

            if (!field) {
                return;
            }

            field.classList.remove(
                "has-error"
            );


            const error =
                getErrorElement(field.id);


            if (error) {

                error.textContent = "";

                error.classList.remove(
                    "show"
                );
            }
        }


        function showError(
            field,
            message
        ) {

            if (!field) {
                return;
            }


            field.classList.add(
                "has-error"
            );


            const error =
                getErrorElement(field.id);


            if (error) {

                error.textContent =
                    message;

                error.classList.add(
                    "show"
                );
            }
        }


        /* =================================================
           CHARACTER COUNTERS
        ================================================= */

        function updateCounter(
            fieldId,
            maxLength
        ) {

            const field =
                document.getElementById(
                    fieldId
                );


            const counter =
                document.querySelector(
                    '[data-counter-for="' +
                    fieldId +
                    '"]'
                );


            if (!field || !counter) {
                return;
            }


            const length =
                field.value.length;


            counter.textContent =
                length +
                " / " +
                maxLength;


            counter.classList.remove(
                "warning",
                "limit"
            );


            if (length >= maxLength) {

                counter.classList.add(
                    "limit"
                );

            } else if (
                length >=
                maxLength * 0.85
            ) {

                counter.classList.add(
                    "warning"
                );
            }
        }


        const footerDescription =
            document.getElementById(
                "footer_description"
            );


        const metaDescription =
            document.getElementById(
                "meta_description"
            );


        if (footerDescription) {

            updateCounter(
                "footer_description",
                1000
            );


            footerDescription.addEventListener(
                "input",
                function () {

                    updateCounter(
                        "footer_description",
                        1000
                    );
                }
            );
        }


        if (metaDescription) {

            updateCounter(
                "meta_description",
                1000
            );


            metaDescription.addEventListener(
                "input",
                function () {

                    updateCounter(
                        "meta_description",
                        1000
                    );
                }
            );
        }


        /* =================================================
           EMAIL VALIDATION
        ================================================= */

        const email =
            document.getElementById(
                "email"
            );


        function validEmail(value) {

            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/
                .test(value);
        }


        if (email) {

            email.addEventListener(
                "input",
                function () {

                    clearError(email);
                }
            );
        }


        /* =================================================
           URL VALIDATION
        ================================================= */

        const urlFields =
            Array.from(
                document.querySelectorAll(
                    ".settings-url-field"
                )
            );


        function validUrl(value) {

            try {

                const url =
                    new URL(value);


                return (
                    url.protocol === "http:" ||
                    url.protocol === "https:"
                );

            } catch (error) {

                return false;
            }
        }


        urlFields.forEach(
            function (field) {

                field.addEventListener(
                    "input",
                    function () {

                        clearError(field);
                    }
                );
            }
        );


        /* =================================================
           LOGO PREVIEW + VALIDATION
        ================================================= */

        const logoInput =
            document.getElementById(
                "logo"
            );


        const logoPreview =
            document.getElementById(
                "logoPreview"
            );


        const allowedLogoTypes = [
            "image/jpeg",
            "image/png",
            "image/webp"
        ];


        if (logoInput) {

            logoInput.addEventListener(
                "change",
                function () {

                    clearError(logoInput);


                    const file =
                        this.files[0];


                    if (!file) {
                        return;
                    }


                    if (
                        !allowedLogoTypes.includes(
                            file.type
                        )
                    ) {

                        showError(
                            logoInput,
                            "Logo must be a JPG, PNG or WEBP image."
                        );

                        this.value = "";

                        return;
                    }


                    const maxSize =
                        4 * 1024 * 1024;


                    if (file.size > maxSize) {

                        showError(
                            logoInput,
                            "Logo image must not exceed 4 MB."
                        );

                        this.value = "";

                        return;
                    }


                    if (logoPreview) {

                        const reader =
                            new FileReader();


                        reader.onload =
                            function (event) {

                                logoPreview.src =
                                    event.target.result;
                            };


                        reader.readAsDataURL(
                            file
                        );
                    }
                }
            );
        }


        /* =================================================
           FAVICON PREVIEW + VALIDATION
        ================================================= */

        const faviconInput =
            document.getElementById(
                "favicon"
            );


        const faviconPreview =
            document.getElementById(
                "faviconPreview"
            );


        const faviconPlaceholder =
            document.getElementById(
                "faviconPlaceholder"
            );


        const allowedFaviconTypes = [
            "image/png",
            "image/x-icon",
            "image/vnd.microsoft.icon",
            "image/jpeg",
            "image/webp"
        ];


        if (faviconInput) {

            faviconInput.addEventListener(
                "change",
                function () {

                    clearError(
                        faviconInput
                    );


                    const file =
                        this.files[0];


                    if (!file) {
                        return;
                    }


                    /*
                     * Some browsers may not provide
                     * a reliable MIME type for .ico.
                     * Extension is also checked.
                     */

                    const fileName =
                        file.name.toLowerCase();


                    const validExtension =
                        /\.(png|ico|jpg|jpeg|webp)$/
                            .test(fileName);


                    if (
                        !validExtension ||
                        (
                            file.type &&
                            !allowedFaviconTypes.includes(
                                file.type
                            )
                        )
                    ) {

                        showError(
                            faviconInput,
                            "Favicon must be PNG, ICO, JPG or WEBP."
                        );

                        this.value = "";

                        return;
                    }


                    const maxSize =
                        2 * 1024 * 1024;


                    if (file.size > maxSize) {

                        showError(
                            faviconInput,
                            "Favicon must not exceed 2 MB."
                        );

                        this.value = "";

                        return;
                    }


                    if (faviconPreview) {

                        const reader =
                            new FileReader();


                        reader.onload =
                            function (event) {

                                faviconPreview.src =
                                    event.target.result;

                                faviconPreview.hidden =
                                    false;


                                if (
                                    faviconPlaceholder
                                ) {

                                    faviconPlaceholder.style.display =
                                        "none";
                                }
                            };


                        reader.readAsDataURL(
                            file
                        );
                    }
                }
            );
        }


        /* =================================================
           COMPANY NAME
        ================================================= */

        const companyName =
            document.getElementById(
                "company_name"
            );


        if (companyName) {

            companyName.addEventListener(
                "input",
                function () {

                    clearError(
                        companyName
                    );
                }
            );
        }


        /* =================================================
           FORM SUBMIT
        ================================================= */

        form.addEventListener(
            "submit",
            function (event) {

                let firstInvalid =
                    null;


                /*
                 * COMPANY NAME
                 */

                if (companyName) {

                    clearError(
                        companyName
                    );


                    companyName.value =
                        companyName.value.trim();


                    if (
                        companyName.value === ""
                    ) {

                        event.preventDefault();


                        showError(
                            companyName,
                            "Company name is required."
                        );


                        firstInvalid =
                            companyName;

                    } else if (
                        companyName.value.length >
                        150
                    ) {

                        event.preventDefault();


                        showError(
                            companyName,
                            "Company name must not exceed 150 characters."
                        );


                        firstInvalid =
                            companyName;
                    }
                }


                /*
                 * EMAIL
                 */

                if (email) {

                    clearError(email);


                    email.value =
                        email.value.trim();


                    if (
                        email.value !== "" &&
                        !validEmail(
                            email.value
                        )
                    ) {

                        event.preventDefault();


                        showError(
                            email,
                            "Please enter a valid email address."
                        );


                        if (!firstInvalid) {

                            firstInvalid =
                                email;
                        }
                    }
                }


                /*
                 * SOCIAL URLS
                 */

                urlFields.forEach(
                    function (field) {

                        clearError(field);


                        field.value =
                            field.value.trim();


                        if (
                            field.value !== "" &&
                            !validUrl(
                                field.value
                            )
                        ) {

                            event.preventDefault();


                            showError(
                                field,
                                "Please enter a complete URL starting with http:// or https://."
                            );


                            if (
                                !firstInvalid
                            ) {

                                firstInvalid =
                                    field;
                            }
                        }
                    }
                );


                /*
                 * STOP BEFORE BACKEND
                 */

                if (firstInvalid) {

                    firstInvalid.scrollIntoView({
                        behavior: "smooth",
                        block: "center"
                    });


                    setTimeout(
                        function () {

                            firstInvalid.focus();

                        },
                        300
                    );


                    return false;
                }


                /*
                 * VALID REQUEST
                 */

                if (saveButton) {

                    saveButton.disabled =
                        true;


                    saveButton.textContent =
                        "Saving...";
                }


                return true;
            }
        );

    }
);