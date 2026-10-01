document.addEventListener("DOMContentLoaded", function () {

    /* =========================================
       COVER IMAGE PREVIEW
    ========================================= */

    const coverInput =
        document.getElementById("projectCoverInput");

    const coverImage =
        document.getElementById("projectCoverImage");

    const coverPlaceholder =
        document.getElementById("projectCoverPlaceholder");


    if (coverInput && coverImage) {

        coverInput.addEventListener("change", function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            const selectedCover =
                this.files[0];


            const galleryInputForTotal =
                document.getElementById(
                    "projectGalleryInput"
                );


            let galleryTotal = 0;


            if (
                galleryInputForTotal &&
                galleryInputForTotal.files
            ) {

                Array.from(
                    galleryInputForTotal.files
                ).forEach(function (file) {

                    galleryTotal += file.size;

                });
            }


            const combinedSize =
                selectedCover.size +
                galleryTotal;


            if (
                combinedSize >
                7 * 1024 * 1024
            ) {

                const totalMB =
                    (
                        combinedSize /
                        1024 /
                        1024
                    ).toFixed(2);


                alert(
                    "Selected project images are too large.\n\n" +

                    "Combined size: " +
                    totalMB +
                    " MB\n" +

                    "Maximum allowed total: 7 MB\n\n" +

                    "Please use a smaller cover image " +
                    "or fewer gallery images."
                );


                this.value = "";

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

            const maxSize = 4 * 1024 * 1024;

            if (file.size > maxSize) {

                alert(
                    "Cover image must be less than 4 MB."
                );

                this.value = "";

                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {

                coverImage.src = event.target.result;

                coverImage.hidden = false;

                if (coverPlaceholder) {
                    coverPlaceholder.hidden = true;
                }

            };

            reader.readAsDataURL(file);
        });
    }


    /* =========================================
       DYNAMIC HIGHLIGHTS
    ========================================= */

    const addHighlight =
        document.getElementById("projectAddHighlight");

    const highlightsContainer =
        document.getElementById(
            "projectHighlightsContainer"
        );


    if (addHighlight && highlightsContainer) {

        addHighlight.addEventListener(
            "click",
            function () {

                const row =
                    document.createElement("div");

                row.className =
                    "project-highlight-row";

                row.innerHTML = `
                    <input
                        type="text"
                        name="highlights[]"
                        class="project-input"
                        placeholder="e.g. Advanced safety system"
                    >

                    <button
                        type="button"
                        class="project-remove-highlight"
                    >
                        Remove
                    </button>
                `;

                highlightsContainer.appendChild(row);

                const input = row.querySelector("input");

                if (input) {
                    input.focus();
                }
            }
        );


        highlightsContainer.addEventListener(
            "click",
            function (event) {

                if (
                    !event.target.classList.contains(
                        "project-remove-highlight"
                    )
                ) {
                    return;
                }


                const rows =
                    highlightsContainer.querySelectorAll(
                        ".project-highlight-row"
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
                        ".project-highlight-row"
                    );

                if (row) {
                    row.remove();
                }

            }
        );
    }


    /* =========================================
       GALLERY PREVIEW
    ========================================= */

    // const galleryInput =
    //     document.getElementById(
    //         "projectGalleryInput"
    //     );

    // const galleryPreview =
    //     document.getElementById(
    //         "projectGalleryPreview"
    //     );


    // if (galleryInput && galleryPreview) {

    //     galleryInput.addEventListener(
    //         "change",
    //         function () {

    //             galleryPreview.innerHTML = "";

    //             const files =
    //                 Array.from(this.files);


    //             if (files.length > 10) {

    //                 const selectedTotalSize =
    //                     files.reduce(
    //                         (total, file) =>
    //                             total + file.size,
    //                         0
    //                     );

    //                 if (
    //                     selectedTotalSize >
    //                     40 * 1024 * 1024
    //                 ) {

    //                     alert(
    //                         "Selected gallery images are too large. " +
    //                         "Please keep the total upload below 40 MB."
    //                     );

    //                     this.value = "";

    //                     galleryPreview.innerHTML = "";

    //                     return;
    //                 }

    //                 alert(
    //                     "You can upload maximum 10 gallery images."
    //                 );

    //                 this.value = "";

    //                 return;
    //             }


    //             const allowedTypes = [
    //                 "image/jpeg",
    //                 "image/png",
    //                 "image/webp"
    //             ];

    //             const maxSize =
    //                 4 * 1024 * 1024;


    //             for (const file of files) {

    //                 if (
    //                     !allowedTypes.includes(
    //                         file.type
    //                     )
    //                 ) {

    //                     alert(
    //                         "Gallery images must be JPG, PNG or WEBP."
    //                     );

    //                     this.value = "";

    //                     galleryPreview.innerHTML = "";

    //                     return;
    //                 }


    //                 if (file.size > maxSize) {

    //                     alert(
    //                         "Each gallery image must be less than 4 MB."
    //                     );

    //                     this.value = "";

    //                     galleryPreview.innerHTML = "";

    //                     return;
    //                 }
    //             }


    //             files.forEach(function (file) {

    //                 const reader =
    //                     new FileReader();


    //                 reader.onload =
    //                     function (event) {

    //                         const item =
    //                             document.createElement(
    //                                 "div"
    //                             );

    //                         item.className =
    //                             "project-gallery-preview-item";

    //                         item.innerHTML = `
    //                             <img
    //                                 src="${event.target.result}"
    //                                 alt="Gallery Preview"
    //                             >
    //                         `;

    //                         galleryPreview.appendChild(
    //                             item
    //                         );
    //                     };


    //                 reader.readAsDataURL(file);
    //             });

    //         }
    //     );

    //     const galleryTotalSize =
    //         files.reduce(
    //             function (total, file) {
    //                 return total + file.size;
    //             },
    //             0
    //         );


    //     const coverInputForTotal =
    //         document.getElementById(
    //             "projectCoverInput"
    //         );


    //     let coverSize = 0;


    //     if (
    //         coverInputForTotal &&
    //         coverInputForTotal.files &&
    //         coverInputForTotal.files.length
    //     ) {

    //         coverSize =
    //             coverInputForTotal.files[0].size;
    //     }


    //     const combinedSize =
    //         galleryTotalSize + coverSize;


    //     if (
    //         combinedSize >
    //         7 * 1024 * 1024
    //     ) {

    //         const totalMB =
    //             (
    //                 combinedSize /
    //                 1024 /
    //                 1024
    //             ).toFixed(2);


    //         alert(
    //             "Selected project images are too large.\n\n" +

    //             "Combined size: " +
    //             totalMB +
    //             " MB\n" +

    //             "Maximum allowed total: 7 MB\n\n" +

    //             "Please select fewer or smaller images."
    //         );


    //         this.value = "";

    //         galleryPreview.innerHTML = "";

    //         return;
    //     }
    // }

    /* =========================================
     GALLERY SELECT + PREVIEW + REMOVE
  ========================================= */

    const galleryInput =
        document.getElementById("projectGalleryInput");

    const galleryPreview =
        document.getElementById("projectGalleryPreview");

    let selectedGalleryFiles = [];

    if (galleryInput && galleryPreview) {

        galleryInput.addEventListener("change", function () {

            const newFiles =
                Array.from(this.files || []);

            if (!newFiles.length) {
                return;
            }

            const allowedTypes = [
                "image/jpeg",
                "image/png",
                "image/webp"
            ];

            const MAX_SINGLE_SIZE =
                4 * 1024 * 1024;

            /* Validate new files */

            for (const file of newFiles) {

                if (!allowedTypes.includes(file.type)) {

                    alert(
                        file.name +
                        "\n\nOnly JPG, JPEG, PNG and WEBP images are allowed."
                    );

                    this.value = "";
                    return;
                }

                if (file.size > MAX_SINGLE_SIZE) {

                    const sizeMB =
                        (
                            file.size /
                            1024 /
                            1024
                        ).toFixed(2);

                    alert(
                        file.name +
                        " is too large.\n\n" +
                        "Size: " +
                        sizeMB +
                        " MB\n" +
                        "Maximum allowed: 4 MB."
                    );

                    this.value = "";
                    return;
                }
            }

            /*
             * Add files.
             * Duplicate file selection is ignored.
             */

            newFiles.forEach(function (file) {

                const alreadyExists =
                    selectedGalleryFiles.some(
                        function (existingFile) {

                            return (
                                existingFile.name === file.name &&
                                existingFile.size === file.size &&
                                existingFile.lastModified ===
                                file.lastModified
                            );
                        }
                    );

                if (!alreadyExists) {
                    selectedGalleryFiles.push(file);
                }
            });


            /* Maximum 10 */

            if (selectedGalleryFiles.length > 10) {

                alert(
                    "You can select maximum 10 gallery images."
                );

                selectedGalleryFiles =
                    selectedGalleryFiles.slice(0, 10);
            }


            /* Cover + gallery total validation */

            const coverInput =
                document.getElementById(
                    "projectCoverInput"
                );

            let coverSize = 0;

            if (
                coverInput &&
                coverInput.files &&
                coverInput.files.length
            ) {
                coverSize =
                    coverInput.files[0].size;
            }

            const gallerySize =
                selectedGalleryFiles.reduce(
                    function (total, file) {
                        return total + file.size;
                    },
                    0
                );

            const combinedSize =
                coverSize + gallerySize;

            const MAX_COMBINED_SIZE =
                7 * 1024 * 1024;

            if (combinedSize > MAX_COMBINED_SIZE) {

                const totalMB =
                    (
                        combinedSize /
                        1024 /
                        1024
                    ).toFixed(2);

                alert(
                    "Selected project images are too large.\n\n" +
                    "Cover + Gallery: " +
                    totalMB +
                    " MB\n\n" +
                    "Maximum combined size: 7 MB."
                );

                /*
                 * Don't keep newly selected files
                 * if they exceed limit.
                 */

                newFiles.forEach(function (newFile) {

                    selectedGalleryFiles =
                        selectedGalleryFiles.filter(
                            function (file) {

                                return !(
                                    file.name === newFile.name &&
                                    file.size === newFile.size &&
                                    file.lastModified ===
                                    newFile.lastModified
                                );
                            }
                        );
                });
            }

            updateGalleryInput();

            renderGalleryPreview();
        });


        /* =========================================
           REMOVE SELECTED IMAGE
        ========================================= */

        galleryPreview.addEventListener(
            "click",
            function (event) {

                const removeButton =
                    event.target.closest(
                        ".project-gallery-remove"
                    );

                if (!removeButton) {
                    return;
                }

                const index =
                    Number(
                        removeButton.dataset.index
                    );

                if (
                    Number.isNaN(index) ||
                    index < 0 ||
                    index >= selectedGalleryFiles.length
                ) {
                    return;
                }

                selectedGalleryFiles.splice(
                    index,
                    1
                );

                updateGalleryInput();

                renderGalleryPreview();
            }
        );
    }


    /* =========================================
       UPDATE REAL FILE INPUT
    ========================================= */

    function updateGalleryInput() {

        if (!galleryInput) {
            return;
        }

        const dataTransfer =
            new DataTransfer();

        selectedGalleryFiles.forEach(
            function (file) {

                dataTransfer.items.add(file);

            }
        );

        galleryInput.files =
            dataTransfer.files;
    }


    /* =========================================
       RENDER GALLERY PREVIEW
    ========================================= */

    function renderGalleryPreview() {

        if (!galleryPreview) {
            return;
        }

        galleryPreview.innerHTML = "";

        selectedGalleryFiles.forEach(
            function (file, index) {

                const reader =
                    new FileReader();

                reader.onload =
                    function (event) {

                        const item =
                            document.createElement(
                                "div"
                            );

                        item.className =
                            "project-gallery-preview-item";

                        item.innerHTML = `
                        <img
                            src="${event.target.result}"
                            alt="Gallery image"
                        >

                        <button
                            type="button"
                            class="project-gallery-remove"
                            data-index="${index}"
                            title="Remove image"
                            aria-label="Remove ${file.name}"
                        >
                            ×
                        </button>

                        <div class="project-gallery-file-info">
                            <span>
                                ${escapeGalleryText(file.name)}
                            </span>
                        </div>
                    `;

                        galleryPreview.appendChild(
                            item
                        );
                    };

                reader.readAsDataURL(file);
            }
        );
    }


    /* =========================================
       SAFE FILE NAME
    ========================================= */

    function escapeGalleryText(value) {

        const div =
            document.createElement("div");

        div.textContent = value;

        return div.innerHTML;
    }


    /* =========================================
   EXISTING GALLERY IMAGE REMOVE
   EDIT PAGE ONLY
========================================= */

    const existingGallery =
        document.getElementById(
            "projectExistingGallery"
        );

    if (existingGallery) {

        existingGallery.addEventListener(
            "click",
            function (event) {

                const removeButton =
                    event.target.closest(
                        ".project-existing-image-remove"
                    );

                if (!removeButton) {
                    return;
                }

                const imageCard =
                    removeButton.closest(
                        ".project-existing-image"
                    );

                if (!imageCard) {
                    return;
                }

                const imagePath =
                    removeButton.dataset.imagePath;

                if (!imagePath) {
                    return;
                }


                /*
                 * Ask before marking existing
                 * server image for deletion.
                 */

                const confirmed =
                    confirm(
                        "Remove this gallery image?\n\n" +
                        "The image will be permanently deleted " +
                        "when you click Update Project."
                    );

                if (!confirmed) {
                    return;
                }


                /*
                 * Find hidden input belonging
                 * to this image.
                 */

                const removeInput =
                    imageCard.querySelector(
                        ".project-remove-existing-input"
                    );

                if (removeInput) {

                    removeInput.name =
                        "remove_gallery_images[]";

                    removeInput.value =
                        imagePath;

                    removeInput.disabled =
                        false;
                }


                /*
                 * Do NOT remove the card from DOM.
                 * Hidden input must remain inside
                 * the form for submission.
                 */

                imageCard.classList.add(
                    "is-marked-for-removal"
                );

                removeButton.disabled = true;

                removeButton.textContent = "✓";

                removeButton.title =
                    "Marked for removal";


                const label =
                    imageCard.querySelector(
                        ".project-existing-remove-label"
                    );

                if (label) {
                    label.textContent =
                        "Will be removed";
                }

            }
        );
    }

    /* =========================================
   PROJECT FORM TOTAL UPLOAD VALIDATION
========================================= */

    // const projectForm =
    //     document.querySelector(".project-admin-form");

    const uploadAlert =
        document.getElementById("projectUploadAlert");

    const uploadAlertTitle =
        document.getElementById(
            "projectUploadAlertTitle"
        );

    const uploadAlertMessage =
        document.getElementById(
            "projectUploadAlertMessage"
        );

    const uploadAlertClose =
        document.getElementById(
            "projectUploadAlertClose"
        );


    function formatFileSize(bytes) {

        if (bytes === 0) {
            return "0 MB";
        }

        return (
            bytes / (1024 * 1024)
        ).toFixed(2) + " MB";
    }


    function showProjectUploadError(
        title,
        message
    ) {

        if (!uploadAlert) {
            alert(message);
            return;
        }

        uploadAlertTitle.textContent =
            title;

        uploadAlertMessage.textContent =
            message;

        uploadAlert.hidden = false;


        uploadAlert.scrollIntoView({
            behavior: "smooth",
            block: "center"
        });
    }


    function hideProjectUploadError() {

        if (uploadAlert) {
            uploadAlert.hidden = true;
        }

    }


    if (uploadAlertClose) {

        uploadAlertClose.addEventListener(
            "click",
            hideProjectUploadError
        );
    }


    // if (projectForm) {

    //     projectForm.addEventListener(
    //         "submit",
    //         function (event) {

    //             hideProjectUploadError();


    //             const coverInput =
    //                 document.getElementById(
    //                     "projectCoverInput"
    //                 );

    //             const galleryInput =
    //                 document.getElementById(
    //                     "projectGalleryInput"
    //                 );


    //             const maxSingleFile =
    //                 4 * 1024 * 1024;

    //             /*
    //              * Keep comfortably below
    //              * PHP post_max_size.
    //              *
    //              * Business rule:
    //              * max total NEW upload = 40 MB.
    //              */
    //             // const maxTotalUpload =
    //             //     40 * 1024 * 1024;


    //             let totalSize = 0;


    //             /* COVER */

    //             if (
    //                 coverInput &&
    //                 coverInput.files.length
    //             ) {

    //                 const cover =
    //                     coverInput.files[0];


    //                 if (
    //                     cover.size >
    //                     maxSingleFile
    //                 ) {

    //                     event.preventDefault();

    //                     showProjectUploadError(
    //                         "Cover image is too large",
    //                         "The cover image is " +
    //                         formatFileSize(
    //                             cover.size
    //                         ) +
    //                         ". Maximum allowed size is 4 MB."
    //                     );

    //                     return;
    //                 }


    //                 totalSize += cover.size;
    //             }


    //             /* GALLERY */

    //             if (
    //                 galleryInput &&
    //                 galleryInput.files.length
    //             ) {

    //                 if (
    //                     galleryInput.files.length >
    //                     10
    //                 ) {

    //                     event.preventDefault();

    //                     showProjectUploadError(
    //                         "Too many gallery images",
    //                         "You can upload a maximum of 10 gallery images."
    //                     );

    //                     return;
    //                 }


    //                 for (
    //                     const file of
    //                     galleryInput.files
    //                 ) {

    //                     if (
    //                         file.size >
    //                         maxSingleFile
    //                     ) {

    //                         event.preventDefault();

    //                         showProjectUploadError(
    //                             "Gallery image is too large",
    //                             file.name +
    //                             " is " +
    //                             formatFileSize(
    //                                 file.size
    //                             ) +
    //                             ". Each image must be 4 MB or smaller."
    //                         );

    //                         return;
    //                     }


    //                     totalSize += file.size;
    //                 }

    //             }


    //             /* TOTAL */

    //             // if (
    //             //     totalSize >
    //             //     maxTotalUpload
    //             // ) {

    //             //     event.preventDefault();

    //             //     showProjectUploadError(
    //             //         "Selected images are too large",
    //             //         "The selected images total " +
    //             //         formatFileSize(
    //             //             totalSize
    //             //         ) +
    //             //         ". Please reduce image sizes or select fewer images. Maximum total upload is 40 MB."
    //             //     );

    //             //     return;
    //             // }

    //         }
    //     );
    // }


    /* =========================================================
   FINAL PROJECT FORM VALIDATION
   Runs BEFORE backend request
========================================================= */

    const projectForm =
        document.getElementById("projectForm");

    const projectSaveBtn =
        document.getElementById("projectSaveBtn");


    if (projectForm) {

        projectForm.addEventListener(
            "submit",
            function (event) {

                /*
                 * IMPORTANT:
                 *
                 * PHP post_max_size = 8 MB.
                 *
                 * We intentionally allow only 7 MB
                 * of selected files so multipart/form-data,
                 * text fields and request overhead still
                 * have enough room.
                 */

                const MAX_REQUEST_FILE_SIZE =
                    7 * 1024 * 1024;

                const MAX_SINGLE_IMAGE_SIZE =
                    4 * 1024 * 1024;

                const MAX_GALLERY_IMAGES = 10;


                const coverInput =
                    document.getElementById(
                        "projectCoverInput"
                    );

                const galleryInput =
                    document.getElementById(
                        "projectGalleryInput"
                    );


                let totalFileSize = 0;


                /* =============================================
                   COVER IMAGE
                ============================================= */

                if (
                    coverInput &&
                    coverInput.files &&
                    coverInput.files.length > 0
                ) {

                    const coverFile =
                        coverInput.files[0];


                    /*
                     * Single image validation
                     */

                    if (
                        coverFile.size >
                        MAX_SINGLE_IMAGE_SIZE
                    ) {

                        event.preventDefault();

                        const sizeMB =
                            (
                                coverFile.size /
                                1024 /
                                1024
                            ).toFixed(2);


                        alert(
                            "Cover image is too large.\n\n" +

                            "Selected size: " +
                            sizeMB +
                            " MB\n" +

                            "Maximum allowed: 4 MB\n\n" +

                            "Please select a smaller image."
                        );

                        coverInput.focus();

                        return false;
                    }


                    totalFileSize +=
                        coverFile.size;
                }


                /* =============================================
                   GALLERY IMAGE COUNT
                ============================================= */

                if (
                    galleryInput &&
                    galleryInput.files
                ) {

                    const galleryFiles =
                        Array.from(
                            galleryInput.files
                        );


                    if (
                        galleryFiles.length >
                        MAX_GALLERY_IMAGES
                    ) {

                        event.preventDefault();


                        alert(
                            "Too many gallery images.\n\n" +

                            "Selected: " +
                            galleryFiles.length +
                            " images\n" +

                            "Maximum allowed: 10 images."
                        );


                        galleryInput.focus();

                        return false;
                    }


                    /* =========================================
                       EACH GALLERY IMAGE SIZE
                    ========================================= */

                    for (
                        let i = 0;
                        i < galleryFiles.length;
                        i++
                    ) {

                        const file =
                            galleryFiles[i];


                        if (
                            file.size >
                            MAX_SINGLE_IMAGE_SIZE
                        ) {

                            event.preventDefault();


                            const sizeMB =
                                (
                                    file.size /
                                    1024 /
                                    1024
                                ).toFixed(2);


                            alert(
                                "Gallery image is too large.\n\n" +

                                "File: " +
                                file.name +
                                "\n" +

                                "Size: " +
                                sizeMB +
                                " MB\n" +

                                "Maximum per image: 4 MB\n\n" +

                                "Please select a smaller image."
                            );


                            galleryInput.focus();

                            return false;
                        }


                        totalFileSize +=
                            file.size;
                    }
                }


                /* =============================================
                   TOTAL REQUEST FILE SIZE
                ============================================= */

                if (
                    totalFileSize >
                    MAX_REQUEST_FILE_SIZE
                ) {

                    event.preventDefault();


                    const totalMB =
                        (
                            totalFileSize /
                            1024 /
                            1024
                        ).toFixed(2);


                    alert(
                        "Project images are too large to upload.\n\n" +

                        "Total selected image size: " +
                        totalMB +
                        " MB\n\n" +

                        "Maximum combined image size: 7 MB\n\n" +

                        "Please reduce image sizes or select fewer " +
                        "gallery images, then click Save Project again."
                    );


                    return false;
                }


                /* =============================================
                   VALIDATION SUCCESS
                   Only now backend request is allowed.
                ============================================= */

                if (projectSaveBtn) {

                    projectSaveBtn.disabled = true;

                    projectSaveBtn.dataset.originalText =
                        projectSaveBtn.textContent;

                    projectSaveBtn.textContent =
                        "Saving Project...";
                }


                /*
                 * DO NOT call preventDefault here.
                 *
                 * Browser will now submit normally
                 * because all frontend validations passed.
                 */

                return true;

            }
        );
    }

});

