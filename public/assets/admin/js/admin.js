document.addEventListener("DOMContentLoaded", function () {

    const sidebar = document.getElementById("adminSidebar");
    const menuToggle = document.getElementById("menuToggle");
    const sidebarClose = document.getElementById("sidebarClose");
    const overlay = document.getElementById("sidebarOverlay");


    function openSidebar() {

        if (!sidebar) return;

        sidebar.classList.add("open");

        if (overlay) {
            overlay.classList.add("show");
        }

        document.body.style.overflow = "hidden";
    }


    function closeSidebar() {

        if (!sidebar) return;

        sidebar.classList.remove("open");

        if (overlay) {
            overlay.classList.remove("show");
        }

        document.body.style.overflow = "";
    }


    if (menuToggle) {
        menuToggle.addEventListener("click", openSidebar);
    }


    if (sidebarClose) {
        sidebarClose.addEventListener("click", closeSidebar);
    }


    if (overlay) {
        overlay.addEventListener("click", closeSidebar);
    }


    window.addEventListener("resize", function () {

        if (window.innerWidth > 1024) {
            closeSidebar();
        }

    });

});

/* ======================================================
   ELEVATOR FORM
====================================================== */

document.addEventListener("DOMContentLoaded", function () {

    /*
    |--------------------------------------------------------------------------
    | Dynamic Features
    |--------------------------------------------------------------------------
    */

    const addFeature =
        document.getElementById("addFeature");

    const featuresContainer =
        document.getElementById("featuresContainer");


    if (addFeature && featuresContainer) {

        addFeature.addEventListener(
            "click",
            function () {

                const row =
                    document.createElement("div");

                row.className = "feature-row";

                row.innerHTML = `
                    <input
                        type="text"
                        name="features[]"
                        class="form-control"
                        placeholder="e.g. Emergency Rescue System"
                    >

                    <button
                        type="button"
                        class="remove-feature"
                    >
                        Remove
                    </button>
                `;

                featuresContainer.appendChild(row);

                row.querySelector("input").focus();

            }
        );


        featuresContainer.addEventListener(
            "click",
            function (event) {

                if (
                    event.target.classList.contains(
                        "remove-feature"
                    )
                ) {

                    const rows =
                        featuresContainer.querySelectorAll(
                            ".feature-row"
                        );


                    /*
                     * At least one empty field remains.
                     */

                    if (rows.length === 1) {

                        rows[0]
                            .querySelector("input")
                            .value = "";

                        return;
                    }


                    event.target
                        .closest(".feature-row")
                        .remove();
                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Image Preview
    |--------------------------------------------------------------------------
    */

    const imageInput =
        document.getElementById("image");

    const previewImage =
        document.getElementById("previewImage");

    const imagePlaceholder =
        document.getElementById("imagePlaceholder");


    if (
        imageInput &&
        previewImage
    ) {

        imageInput.addEventListener(
            "change",
            function () {

                const file = this.files[0];

                if (!file) {
                    return;
                }


                const allowedTypes = [
                    "image/jpeg",
                    "image/png",
                    "image/webp"
                ];


                if (!allowedTypes.includes(file.type)) {

                    alert(
                        "Please select a JPG, PNG or WEBP image."
                    );

                    this.value = "";

                    return;
                }


                const maxSize =
                    4 * 1024 * 1024;


                if (file.size > maxSize) {

                    alert(
                        "Image size must be less than 4 MB."
                    );

                    this.value = "";

                    return;
                }


                const reader =
                    new FileReader();


                reader.onload =
                    function (event) {

                        previewImage.src =
                            event.target.result;

                        previewImage.style.display =
                            "block";


                        if (imagePlaceholder) {

                            imagePlaceholder.style.display =
                                "none";

                        }

                    };


                reader.readAsDataURL(file);

            }
        );

    }

});