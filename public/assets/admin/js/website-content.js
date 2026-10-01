document.addEventListener(
    "DOMContentLoaded",
    function () {

        const form =
            document.getElementById(
                "websiteContentForm"
            );

        if (!form) {
            return;
        }


        const fields =
            Array.from(
                form.querySelectorAll(
                    ".website-content-field"
                )
            );


        const saveButton =
            document.getElementById(
                "websiteContentSaveBtn"
            );


        const summary =
            document.getElementById(
                "websiteValidationSummary"
            );


        const summaryList =
            document.getElementById(
                "websiteValidationList"
            );


        /* =========================================
           CHARACTER COUNTERS
        ========================================= */

        function updateCounter(field) {

            if (
                field.dataset.type !==
                "textarea"
            ) {
                return;
            }


            const counter =
                document.querySelector(
                    '[data-counter-for="' +
                    field.id +
                    '"]'
                );


            if (!counter) {
                return;
            }


            const length =
                field.value.length;


            counter.textContent =
                length + " / 5000";


            counter.classList.remove(
                "warning",
                "limit"
            );


            if (length >= 5000) {

                counter.classList.add(
                    "limit"
                );

            } else if (length >= 4500) {

                counter.classList.add(
                    "warning"
                );
            }
        }


        fields.forEach(
            function (field) {

                updateCounter(field);


                field.addEventListener(
                    "input",
                    function () {

                        updateCounter(field);

                        clearFieldError(field);
                    }
                );
            }
        );


        /* =========================================
           ERRORS
        ========================================= */

        function getErrorElement(field) {

            return document.querySelector(
                '[data-error-for="' +
                field.id +
                '"]'
            );
        }


        function clearFieldError(field) {

            field.classList.remove(
                "has-error"
            );


            const errorElement =
                getErrorElement(field);


            if (errorElement) {

                errorElement.textContent = "";

                errorElement.classList.remove(
                    "show"
                );
            }
        }


        function showFieldError(
            field,
            message
        ) {

            field.classList.add(
                "has-error"
            );


            const errorElement =
                getErrorElement(field);


            if (errorElement) {

                errorElement.textContent =
                    message;

                errorElement.classList.add(
                    "show"
                );
            }
        }


        function clearAllErrors() {

            fields.forEach(
                function (field) {

                    clearFieldError(field);

                }
            );


            if (summary) {

                summary.classList.remove(
                    "show"
                );
            }


            if (summaryList) {

                summaryList.innerHTML = "";
            }
        }


        /* =========================================
           FORM VALIDATION
        ========================================= */

        form.addEventListener(
            "submit",
            function (event) {

                clearAllErrors();


                const errors = [];

                let firstInvalidField =
                    null;


                fields.forEach(
                    function (field) {

                        const value =
                            field.value.trim();

                        const label =
                            field.dataset.label
                            || "Content";


                        /*
                         * Current Website Content fields
                         * can technically be nullable,
                         * but a value above 5000 must
                         * never be submitted.
                         */

                        if (
                            value.length > 5000
                        ) {

                            const message =
                                label +
                                " must not exceed 5000 characters.";


                            showFieldError(
                                field,
                                message
                            );


                            errors.push(
                                message
                            );


                            if (
                                !firstInvalidField
                            ) {

                                firstInvalidField =
                                    field;
                            }
                        }


                        /*
                         * Trim values before submission.
                         */

                        field.value = value;

                    }
                );


                if (errors.length > 0) {

                    event.preventDefault();


                    if (
                        summary &&
                        summaryList
                    ) {

                        summaryList.innerHTML = "";


                        errors.forEach(
                            function (message) {

                                const item =
                                    document.createElement(
                                        "li"
                                    );


                                item.textContent =
                                    message;


                                summaryList.appendChild(
                                    item
                                );
                            }
                        );


                        summary.classList.add(
                            "show"
                        );


                        summary.scrollIntoView({
                            behavior: "smooth",
                            block: "center"
                        });
                    }


                    if (firstInvalidField) {

                        setTimeout(
                            function () {

                                firstInvalidField.focus();

                            },
                            350
                        );
                    }


                    return false;
                }


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