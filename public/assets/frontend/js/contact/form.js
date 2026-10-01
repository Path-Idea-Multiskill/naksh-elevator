document.addEventListener(
    "DOMContentLoaded",
    function () {

        const form =
            document.getElementById(
                "contactEnquiryForm"
            );

        if (!form) {
            return;
        }


        const name =
            form.querySelector(
                '[name="name"]'
            );

        const phone =
            form.querySelector(
                '[name="phone"]'
            );

        const email =
            form.querySelector(
                '[name="email"]'
            );

        const subject =
            form.querySelector(
                '[name="subject"]'
            );

        const message =
            form.querySelector(
                '[name="message"]'
            );

        const submitButton =
            form.querySelector(
                '[type="submit"]'
            );

        const messageCount =
            document.getElementById(
                "contactMessageCount"
            );


        function setError(
            input,
            text
        ) {

            const field =
                input.closest(
                    ".contact-field"
                );

            if (!field) {
                return;
            }

            field.classList.add(
                "is-invalid"
            );

            const error =
                field.querySelector(
                    ".contact-field__error"
                );

            if (error) {
                error.textContent = text;
            }

        }


        function clearError(input) {

            const field =
                input.closest(
                    ".contact-field"
                );

            if (!field) {
                return;
            }

            field.classList.remove(
                "is-invalid"
            );

            const error =
                field.querySelector(
                    ".contact-field__error"
                );

            if (error) {
                error.textContent = "";
            }

        }


        function validEmail(value) {

            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/
                .test(value);

        }


        function validPhone(value) {

            const digits =
                value.replace(/\D/g, "");

            return (
                digits.length >= 10 &&
                digits.length <= 15
            );

        }


        function updateMessageCount() {

            if (
                !message ||
                !messageCount
            ) {
                return;
            }

            messageCount.textContent =
                message.value.length +
                " / 2000";

        }


        if (message) {

            updateMessageCount();

            message.addEventListener(
                "input",
                updateMessageCount
            );

        }


        [
            name,
            phone,
            email,
            subject,
            message
        ].forEach(
            function (input) {

                if (!input) {
                    return;
                }

                input.addEventListener(
                    "input",
                    function () {

                        clearError(input);

                    }
                );

            }
        );


        form.addEventListener(
            "submit",
            function (event) {

                let valid = true;


                if (
                    !name.value.trim()
                ) {

                    setError(
                        name,
                        "Please enter your name."
                    );

                    valid = false;

                }


                if (
                    !phone.value.trim()
                ) {

                    setError(
                        phone,
                        "Please enter your phone number."
                    );

                    valid = false;

                } else if (
                    !validPhone(
                        phone.value
                    )
                ) {

                    setError(
                        phone,
                        "Please enter a valid phone number."
                    );

                    valid = false;

                }


                if (
                    email.value.trim() &&
                    !validEmail(
                        email.value.trim()
                    )
                ) {

                    setError(
                        email,
                        "Please enter a valid email address."
                    );

                    valid = false;

                }


                if (
                    !subject.value.trim()
                ) {

                    setError(
                        subject,
                        "Please enter a subject."
                    );

                    valid = false;

                }


                if (
                    !message.value.trim()
                ) {

                    setError(
                        message,
                        "Please enter your requirement."
                    );

                    valid = false;

                }


                if (!valid) {

                    event.preventDefault();

                    const firstInvalid =
                        form.querySelector(
                            ".contact-field.is-invalid"
                        );

                    if (firstInvalid) {

                        firstInvalid
                            .scrollIntoView({
                                behavior: "smooth",
                                block: "center"
                            });

                    }

                    return;

                }


                if (submitButton) {

                    submitButton.disabled =
                        true;

                    const text =
                        submitButton.querySelector(
                            "span"
                        );

                    if (text) {
                        text.textContent =
                            "Submitting...";
                    }

                }

            }
        );

    }
);