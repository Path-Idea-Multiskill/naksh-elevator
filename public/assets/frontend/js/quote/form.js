document.addEventListener(
    "DOMContentLoaded",
    function () {

        const form =
            document.getElementById(
                "quoteRequestForm"
            );

        if (!form) {
            return;
        }


        const name =
            form.querySelector('[name="name"]');

        const phone =
            form.querySelector('[name="phone"]');

        const email =
            form.querySelector('[name="email"]');

        const location =
            form.querySelector('[name="location"]');

        const buildingType =
            form.querySelector('[name="building_type"]');

        const elevatorType =
            form.querySelector('[name="elevator_type_id"]');

        const floors =
            form.querySelector('[name="floors"]');

        const projectStage =
            form.querySelector('[name="project_stage"]');

        const message =
            form.querySelector('[name="message"]');

        const submitButton =
            form.querySelector('[type="submit"]');

        const messageCount =
            document.getElementById(
                "quoteMessageCount"
            );


        function getField(input) {

            return input
                ? input.closest(".quote-field")
                : null;

        }


        function setError(
            input,
            text
        ) {

            const field =
                getField(input);

            if (!field) {
                return;
            }

            field.classList.add(
                "is-invalid"
            );

            const error =
                field.querySelector(
                    ".quote-field__error"
                );

            if (error) {
                error.textContent = text;
            }

        }


        function clearError(input) {

            const field =
                getField(input);

            if (!field) {
                return;
            }

            field.classList.remove(
                "is-invalid"
            );

            const error =
                field.querySelector(
                    ".quote-field__error"
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


        function updateCount() {

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

            updateCount();

            message.addEventListener(
                "input",
                updateCount
            );

        }


        [
            name,
            phone,
            email,
            location,
            buildingType,
            elevatorType,
            floors,
            projectStage,
            message
        ].forEach(
            function (input) {

                if (!input) {
                    return;
                }

                const eventName =
                    input.tagName === "SELECT"
                        ? "change"
                        : "input";

                input.addEventListener(
                    eventName,
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


                if (!name.value.trim()) {

                    setError(
                        name,
                        "Please enter your name."
                    );

                    valid = false;
                }


                if (!phone.value.trim()) {

                    setError(
                        phone,
                        "Please enter your phone number."
                    );

                    valid = false;

                } else if (
                    !validPhone(phone.value)
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


                if (!location.value.trim()) {

                    setError(
                        location,
                        "Please enter project location."
                    );

                    valid = false;
                }


                if (!buildingType.value) {

                    setError(
                        buildingType,
                        "Please select building type."
                    );

                    valid = false;
                }


                if (!elevatorType.value) {

                    setError(
                        elevatorType,
                        "Please select elevator type."
                    );

                    valid = false;
                }


                const floorValue =
                    Number(floors.value);


                if (!floors.value) {

                    setError(
                        floors,
                        "Please enter number of floors."
                    );

                    valid = false;

                } else if (
                    !Number.isInteger(floorValue) ||
                    floorValue < 1 ||
                    floorValue > 200
                ) {

                    setError(
                        floors,
                        "Please enter a valid number of floors."
                    );

                    valid = false;
                }


                if (!projectStage.value) {

                    setError(
                        projectStage,
                        "Please select project stage."
                    );

                    valid = false;
                }


                if (!valid) {

                    event.preventDefault();

                    const firstInvalid =
                        form.querySelector(
                            ".quote-field.is-invalid"
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