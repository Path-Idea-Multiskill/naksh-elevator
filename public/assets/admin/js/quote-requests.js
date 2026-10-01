document.addEventListener(
    "DOMContentLoaded",
    function () {

        /* =================================================
           LISTING SEARCH
        ================================================= */

        const filterForm =
            document.getElementById(
                "quoteFilterForm"
            );

        const search =
            document.getElementById(
                "quoteSearch"
            );


        if (filterForm) {

            filterForm.addEventListener(
                "submit",
                function (event) {

                    if (!search) {
                        return;
                    }


                    const value =
                        search.value.trim();


                    if (value.length > 150) {

                        event.preventDefault();

                        alert(
                            "Search text must not exceed 150 characters."
                        );

                        search.focus();

                        return false;
                    }


                    search.value = value;

                    return true;
                }
            );
        }


        /* =================================================
           ADMIN NOTES
        ================================================= */

        const notesForm =
            document.getElementById(
                "quoteNotesForm"
            );

        const notes =
            document.getElementById(
                "quoteAdminNotes"
            );

        const notesCounter =
            document.getElementById(
                "quoteNotesCounter"
            );

        const notesError =
            document.getElementById(
                "quoteNotesError"
            );

        const notesSaveButton =
            document.getElementById(
                "quoteNotesSaveBtn"
            );


        function updateNotesCounter() {

            if (
                !notes ||
                !notesCounter
            ) {
                return;
            }


            const length =
                notes.value.length;


            notesCounter.textContent =
                length + " / 2000";


            notesCounter.classList.remove(
                "warning",
                "limit"
            );


            if (length >= 2000) {

                notesCounter.classList.add(
                    "limit"
                );

            } else if (length >= 1750) {

                notesCounter.classList.add(
                    "warning"
                );
            }
        }


        function clearNotesError() {

            if (notes) {

                notes.classList.remove(
                    "has-error"
                );
            }


            if (notesError) {

                notesError.textContent = "";

                notesError.classList.remove(
                    "show"
                );
            }
        }


        function showNotesError(message) {

            if (notes) {

                notes.classList.add(
                    "has-error"
                );
            }


            if (notesError) {

                notesError.textContent =
                    message;

                notesError.classList.add(
                    "show"
                );
            }
        }


        updateNotesCounter();


        if (notes) {

            notes.addEventListener(
                "input",
                function () {

                    updateNotesCounter();


                    if (
                        this.value.length <= 2000
                    ) {

                        clearNotesError();
                    }
                }
            );
        }


        if (notesForm) {

            notesForm.addEventListener(
                "submit",
                function (event) {

                    clearNotesError();


                    if (
                        notes &&
                        notes.value.length > 2000
                    ) {

                        event.preventDefault();


                        showNotesError(
                            "Admin notes must not exceed 2000 characters."
                        );


                        notes.scrollIntoView({
                            behavior: "smooth",
                            block: "center"
                        });


                        setTimeout(
                            function () {

                                notes.focus();

                            },
                            300
                        );


                        return false;
                    }


                    if (notesSaveButton) {

                        notesSaveButton.disabled =
                            true;

                        notesSaveButton.textContent =
                            "Saving...";
                    }


                    return true;
                }
            );
        }


        /* =================================================
           STATUS
        ================================================= */

        const statusForm =
            document.getElementById(
                "quoteStatusForm"
            );

        const statusSelect =
            document.getElementById(
                "quoteStatus"
            );

        const statusError =
            document.getElementById(
                "quoteStatusError"
            );

        const statusSaveButton =
            document.getElementById(
                "quoteStatusSaveBtn"
            );


        const allowedStatuses = [
            "new",
            "read",
            "contacted",
            "quoted",
            "closed"
        ];


        function clearStatusError() {

            if (statusSelect) {

                statusSelect.classList.remove(
                    "has-error"
                );
            }


            if (statusError) {

                statusError.textContent = "";

                statusError.classList.remove(
                    "show"
                );
            }
        }


        if (statusSelect) {

            statusSelect.addEventListener(
                "change",
                function () {

                    if (
                        allowedStatuses.includes(
                            this.value
                        )
                    ) {

                        clearStatusError();
                    }
                }
            );
        }


        if (statusForm) {

            statusForm.addEventListener(
                "submit",
                function (event) {

                    clearStatusError();


                    if (
                        !statusSelect ||
                        !allowedStatuses.includes(
                            statusSelect.value
                        )
                    ) {

                        event.preventDefault();


                        if (statusSelect) {

                            statusSelect.classList.add(
                                "has-error"
                            );
                        }


                        if (statusError) {

                            statusError.textContent =
                                "Please select a valid quote request status.";

                            statusError.classList.add(
                                "show"
                            );
                        }


                        if (statusSelect) {

                            statusSelect.focus();
                        }


                        return false;
                    }


                    if (statusSaveButton) {

                        statusSaveButton.disabled =
                            true;

                        statusSaveButton.textContent =
                            "Updating...";
                    }


                    return true;
                }
            );
        }


        /* =================================================
           DELETE
        ================================================= */

        const deleteForm =
            document.getElementById(
                "quoteDeleteForm"
            );


        if (deleteForm) {

            deleteForm.addEventListener(
                "submit",
                function (event) {

                    const confirmed =
                        window.confirm(
                            "Are you sure you want to permanently delete this quote request?"
                        );


                    if (!confirmed) {

                        event.preventDefault();

                        return false;
                    }


                    return true;
                }
            );
        }

    }
);