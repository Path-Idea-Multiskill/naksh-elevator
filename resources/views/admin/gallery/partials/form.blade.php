@php
    $isEdit = isset($gallery);

    $categories = [
        'Elevator Installation',
        'Residential',
        'Commercial',
        'Cabin Interior',
        'Modernization',
        'Completed Projects',
        'Other',
    ];
@endphp


{{-- BASIC INFORMATION --}}
<section class="gallery-form-card">

    <div class="gallery-form-card-header">

        <span>GALLERY DETAILS</span>

        <h3>Basic Information</h3>

        <p>
            Enter the main information for this gallery image.
        </p>

    </div>


    <div class="gallery-form-card-body">

        <div class="gallery-field">

            <label for="title">
                Title <span>*</span>
            </label>

            <input
                type="text"
                id="title"
                name="title"
                class="gallery-input"
                value="{{ old(
                    'title',
                    $gallery->title ?? ''
                ) }}"
                maxlength="255"
                placeholder="e.g. Premium Residential Elevator"
                required
            >

            <small
                class="gallery-client-error"
                data-error-for="title"
            ></small>

        </div>


        <div class="gallery-two-column">

            <div class="gallery-field">

                <label for="category">
                    Category <span>*</span>
                </label>

                <select
                    id="category"
                    name="category"
                    class="gallery-input"
                    required
                >

                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category }}"
                            @selected(
                                old(
                                    'category',
                                    $gallery->category ?? ''
                                ) === $category
                            )
                        >
                            {{ $category }}
                        </option>

                    @endforeach

                </select>

                <small
                    class="gallery-client-error"
                    data-error-for="category"
                ></small>

            </div>


            <div class="gallery-field">

                <label for="project_id">
                    Related Project
                </label>

                <select
                    id="project_id"
                    name="project_id"
                    class="gallery-input"
                >

                    <option value="">
                        Not Linked
                    </option>

                    @foreach($projects as $project)

                        <option
                            value="{{ $project->id }}"
                            @selected(
                                old(
                                    'project_id',
                                    $gallery->project_id ?? ''
                                ) == $project->id
                            )
                        >
                            {{ $project->title }}
                        </option>

                    @endforeach

                </select>

            </div>

        </div>


        <div class="gallery-field">

            <label for="alt_text">
                Image Alt Text
            </label>

            <input
                type="text"
                id="alt_text"
                name="alt_text"
                class="gallery-input"
                maxlength="255"
                value="{{ old(
                    'alt_text',
                    $gallery->alt_text ?? ''
                ) }}"
                placeholder="Describe the image for accessibility and SEO"
            >

            <small
                class="gallery-client-error"
                data-error-for="alt_text"
            ></small>

        </div>

    </div>

</section>


{{-- IMAGE --}}
<section class="gallery-form-card">

    <div class="gallery-form-card-header">

        <span>MEDIA</span>

        <h3>Gallery Image</h3>

        <p>
            Upload a high-quality elevator or project image.
        </p>

    </div>


    <div class="gallery-form-card-body">

        <div
            class="gallery-image-preview"
            id="galleryImagePreview"
        >

            @if($isEdit && $gallery->image)

                <img
                    src="{{ asset(
                        'storage/' . $gallery->image
                    ) }}"
                    id="galleryPreviewImage"
                    alt="{{ $gallery->title }}"
                >

                <div
                    class="gallery-image-placeholder"
                    id="galleryImagePlaceholder"
                    hidden
                >
                    Select Gallery Image
                </div>

            @else

                <img
                    src=""
                    id="galleryPreviewImage"
                    alt=""
                    hidden
                >

                <div
                    class="gallery-image-placeholder"
                    id="galleryImagePlaceholder"
                >
                    <strong>Upload Image</strong>
                    <span>JPG, PNG or WEBP</span>
                </div>

            @endif

        </div>


        <input
            type="file"
            id="galleryImageInput"
            name="image"
            class="gallery-file-input"
            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
            @required(!$isEdit)
        >


        <label
            for="galleryImageInput"
            class="gallery-image-select-btn"
        >
            Choose Image
        </label>


        <small class="gallery-help">
            JPG, PNG or WEBP · Maximum 4 MB
        </small>

        <small
            class="gallery-client-error"
            data-error-for="image"
        ></small>

    </div>

</section>


{{-- PUBLISH --}}
<section class="gallery-form-card gallery-form-full">

    <div class="gallery-form-card-header">

        <span>PUBLISHING</span>

        <h3>Display Settings</h3>

        <p>
            Control gallery visibility and display order.
        </p>

    </div>


    <div class="gallery-form-card-body">

        <div class="gallery-two-column">

            <div class="gallery-field">

                <label for="status">
                    Status <span>*</span>
                </label>

                <select
                    id="status"
                    name="status"
                    class="gallery-input"
                    required
                >

                    <option
                        value="1"
                        @selected(
                            (int) old(
                                'status',
                                $isEdit
                                    ? $gallery->status
                                    : 1
                            ) === 1
                        )
                    >
                        Active
                    </option>

                    <option
                        value="0"
                        @selected(
                            (int) old(
                                'status',
                                $isEdit
                                    ? $gallery->status
                                    : 1
                            ) === 0
                        )
                    >
                        Inactive
                    </option>

                </select>

            </div>


            <div class="gallery-field">

                <label for="sort_order">
                    Display Order
                </label>

                <input
                    type="number"
                    id="sort_order"
                    name="sort_order"
                    class="gallery-input"
                    min="0"
                    step="1"
                    value="{{ old(
                        'sort_order',
                        $gallery->sort_order ?? 0
                    ) }}"
                >

                <small
                    class="gallery-client-error"
                    data-error-for="sort_order"
                ></small>

            </div>

        </div>

    </div>

</section>