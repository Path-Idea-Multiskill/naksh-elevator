document.addEventListener("DOMContentLoaded", function () {

    /* ==========================================
       DYNAMIC SERVICE FEATURES
    ========================================== */

    const addFeature =
        document.getElementById("serviceAddFeature");

    const featuresContainer =
        document.getElementById("serviceFeaturesContainer");


    if (addFeature && featuresContainer) {

        addFeature.addEventListener("click", function () {

            const row = document.createElement("div");

            row.className = "service-feature-row";

            row.innerHTML = `
                <input
                    type="text"
                    name="features[]"
                    class="service-input"
                    placeholder="e.g. Preventive maintenance support"
                >

                <button
                    type="button"
                    class="service-remove-feature"
                >
                    Remove
                </button>
            `;

            featuresContainer.appendChild(row);

            const input = row.querySelector("input");

            if (input) {
                input.focus();
            }
        });


        featuresContainer.addEventListener(
            "click",
            function (event) {

                if (
                    !event.target.classList.contains(
                        "service-remove-feature"
                    )
                ) {
                    return;
                }


                const rows =
                    featuresContainer.querySelectorAll(
                        ".service-feature-row"
                    );


                if (rows.length === 1) {

                    const input =
                        rows[0].querySelector("input");

                    if (input) {
                        input.value = "";
                    }

                    return;
                }


                const row =
                    event.target.closest(
                        ".service-feature-row"
                    );

                if (row) {
                    row.remove();
                }
            }
        );
    }


    /* ==========================================
       IMAGE PREVIEW
    ========================================== */

    const imageInput =
        document.getElementById("serviceImage");

    const previewImage =
        document.getElementById("servicePreviewImage");

    const placeholder =
        document.getElementById("serviceImagePlaceholder");


    if (imageInput && previewImage) {

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
                        "Please select JPG, PNG or WEBP image."
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


                const reader = new FileReader();


                reader.onload = function (event) {

                    previewImage.src =
                        event.target.result;

                    previewImage.hidden = false;


                    if (placeholder) {
                        placeholder.hidden = true;
                    }

                };


                reader.readAsDataURL(file);
            }
        );
    }

});