@php
    $isEdit = isset($project);

    $highlights = old(
        'highlights',
        $isEdit ? ($project->highlights ?? []) : ['']
    );
@endphp


{{-- BASIC INFORMATION --}}
<section class="project-form-card">

    <div class="project-form-card-header">
        <div>
            <span class="project-form-eyebrow">
                PROJECT DETAILS
            </span>

            <h3>Basic Information</h3>

            <p>
                Enter the main information about this elevator project.
            </p>
        </div>
    </div>

    <div class="project-form-card-body">

        <div class="project-field">
            <label for="title">
                Project Title <span>*</span>
            </label>

            <input
                type="text"
                id="title"
                name="title"
                class="project-input @error('title') has-error @enderror"
                value="{{ old('title', $project->title ?? '') }}"
                placeholder="e.g. Premium Residential Elevator Project"
                required
            >

            @error('title')
                <small class="project-error">
                    {{ $message }}
                </small>
            @enderror
        </div>


        <div class="project-form-two-column">

            <div class="project-field">
                <label for="client_name">
                    Client Name
                </label>

                <input
                    type="text"
                    id="client_name"
                    name="client_name"
                    class="project-input"
                    value="{{ old(
                        'client_name',
                        $project->client_name ?? ''
                    ) }}"
                    placeholder="Client / Company name"
                >
            </div>


            <div class="project-field">
                <label for="location">
                    Project Location
                </label>

                <input
                    type="text"
                    id="location"
                    name="location"
                    class="project-input"
                    value="{{ old(
                        'location',
                        $project->location ?? ''
                    ) }}"
                    placeholder="e.g. Raipur, Chhattisgarh"
                >
            </div>

        </div>


        <div class="project-form-two-column">

            <div class="project-field">

                <label for="elevator_type_id">
                    Elevator Type
                </label>

                <select
                    id="elevator_type_id"
                    name="elevator_type_id"
                    class="project-input"
                >

                    <option value="">
                        Select Elevator Type
                    </option>

                    @foreach($elevatorTypes as $type)

                        <option
                            value="{{ $type->id }}"
                            @selected(
                                old(
                                    'elevator_type_id',
                                    $project->elevator_type_id ?? ''
                                ) == $type->id
                            )
                        >
                            {{ $type->name }}
                        </option>

                    @endforeach

                </select>

                @error('elevator_type_id')
                    <small class="project-error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            <div class="project-field">

                <label for="project_category">
                    Project Category
                </label>

                <input
                    type="text"
                    id="project_category"
                    name="project_category"
                    class="project-input"
                    value="{{ old(
                        'project_category',
                        $project->project_category ?? ''
                    ) }}"
                    placeholder="e.g. Residential"
                >

            </div>

        </div>


        <div class="project-field">

            <label for="completion_date">
                Completion Date
            </label>

            <input
                type="date"
                id="completion_date"
                name="completion_date"
                class="project-input"
                value="{{ old(
                    'completion_date',
                    isset($project) &&
                    $project->completion_date
                        ? $project->completion_date->format('Y-m-d')
                        : ''
                ) }}"
            >

        </div>


        <div class="project-field">

            <label for="short_description">
                Short Description
            </label>

            <textarea
                id="short_description"
                name="short_description"
                class="project-input"
                rows="3"
                maxlength="500"
                placeholder="Write a short project summary..."
            >{{ old(
                'short_description',
                $project->short_description ?? ''
            ) }}</textarea>

        </div>


        <div class="project-field">

            <label for="description">
                Full Description
            </label>

            <textarea
                id="description"
                name="description"
                class="project-input"
                rows="8"
                placeholder="Enter complete project details..."
            >{{ old(
                'description',
                $project->description ?? ''
            ) }}</textarea>

        </div>

    </div>

</section>


{{-- PUBLISH + COVER --}}
<section class="project-form-card">

    <div class="project-form-card-header">
        <div>
            <span class="project-form-eyebrow">
                PUBLISH
            </span>

            <h3>Project Settings</h3>

            <p>
                Manage cover image, status and display order.
            </p>
        </div>
    </div>


    <div class="project-form-card-body">

        <div class="project-field">

            <label>Cover Image</label>

            <div
                class="project-cover-preview"
                id="projectCoverPreview"
            >

                @if($isEdit && $project->cover_image)

                    <img
                        id="projectCoverImage"
                        src="{{ asset(
                            'storage/' . $project->cover_image
                        ) }}"
                        alt="{{ $project->title }}"
                    >

                    <div
                        class="project-cover-placeholder"
                        id="projectCoverPlaceholder"
                        hidden
                    >
                        <strong>Project Cover</strong>
                        <span>JPG, PNG or WEBP</span>
                    </div>

                @else

                    <img
                        id="projectCoverImage"
                        src=""
                        alt=""
                        hidden
                    >

                    <div
                        class="project-cover-placeholder"
                        id="projectCoverPlaceholder"
                    >
                        <div class="project-upload-icon">
                            +
                        </div>

                        <strong>
                            Upload Cover Image
                        </strong>

                        <span>
                            JPG, PNG or WEBP
                        </span>
                    </div>

                @endif

            </div>


            <input
                type="file"
                id="projectCoverInput"
                name="cover_image"
                class="project-file-input"
                accept=".jpg,.jpeg,.png,.webp"
            >

            <label
                for="projectCoverInput"
                class="project-upload-btn"
            >
                Choose Cover Image
            </label>

            <small class="project-help">
                Maximum image size: 4 MB
            </small>

            @error('cover_image')
                <small class="project-error">
                    {{ $message }}
                </small>
            @enderror

        </div>


        <div class="project-form-two-column">

            <div class="project-field">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    class="project-input"
                    required
                >

                    <option
                        value="1"
                        @selected(
                            (int) old(
                                'status',
                                $isEdit
                                    ? $project->status
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
                                    ? $project->status
                                    : 1
                            ) === 0
                        )
                    >
                        Inactive
                    </option>

                </select>

            </div>


            <div class="project-field">

                <label for="sort_order">
                    Display Order
                </label>

                <input
                    type="number"
                    id="sort_order"
                    name="sort_order"
                    class="project-input"
                    min="0"
                    value="{{ old(
                        'sort_order',
                        $project->sort_order ?? 0
                    ) }}"
                >

            </div>

        </div>

    </div>

</section>


{{-- HIGHLIGHTS --}}
<section class="project-form-card project-form-full">

    <div class="project-form-card-header project-highlight-header">

        <div>
            <span class="project-form-eyebrow">
                PROJECT FEATURES
            </span>

            <h3>Project Highlights</h3>

            <p>
                Add important features and highlights of this project.
            </p>
        </div>


        <button
            type="button"
            id="projectAddHighlight"
            class="project-secondary-btn"
        >
            + Add Highlight
        </button>

    </div>


    <div class="project-form-card-body">

        <div id="projectHighlightsContainer">

            @foreach($highlights as $highlight)

                <div class="project-highlight-row">

                    <input
                        type="text"
                        name="highlights[]"
                        class="project-input"
                        value="{{ $highlight }}"
                        placeholder="e.g. Premium automatic doors"
                    >

                    <button
                        type="button"
                        class="project-remove-highlight"
                    >
                        Remove
                    </button>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- GALLERY --}}
<section class="project-form-card project-form-full">

    <div class="project-form-card-header">

        <div>
            <span class="project-form-eyebrow">
                PROJECT MEDIA
            </span>

            <h3>Project Gallery</h3>

            <p>
                Upload up to 10 project images.
            </p>
        </div>

    </div>


    <div class="project-form-card-body">

        <!-- @if(
            $isEdit &&
            !empty($project->gallery_images)
        )

            <div class="project-existing-gallery">

                @foreach(
                    $project->gallery_images as $image
                )

                    <div class="project-existing-image">

                        <img
                            src="{{ asset(
                                'storage/' . $image
                            ) }}"
                            alt="Project Gallery"
                        >

                    </div>

                @endforeach

            </div>

        @endif -->

        @if(
    $isEdit &&
    !empty($project->gallery_images)
)

    <div
        class="project-existing-gallery"
        id="projectExistingGallery"
    >

        @foreach(
            $project->gallery_images as $index => $image
        )

            <div
                class="project-existing-image"
                data-existing-image="{{ $index }}"
            >

                <img
                    src="{{ asset(
                        'storage/' . $image
                    ) }}"
                    alt="Project Gallery"
                >

                {{-- 
                    Hidden input tabhi submit hoga
                    jab user image ko remove karega.
                --}}

                <input
                    type="hidden"
                    class="project-remove-existing-input"
                    data-image-path="{{ $image }}"
                    disabled
                >

                <button
                    type="button"
                    class="project-existing-image-remove"
                    data-image-path="{{ $image }}"
                    title="Remove image"
                    aria-label="Remove gallery image"
                >
                    ×
                </button>

                <div class="project-existing-remove-label">
                    Remove
                </div>

            </div>

        @endforeach

    </div>

@endif

        <div class="project-gallery-upload">

            <input
                type="file"
                id="projectGalleryInput"
                name="gallery_images[]"
                class="project-file-input"
                accept=".jpg,.jpeg,.png,.webp"
                multiple
            >

            <label
                for="projectGalleryInput"
                class="project-gallery-select"
            >
                <span>+</span>

                <strong>
                    Select Gallery Images
                </strong>

                <small>
                    Maximum 10 images, 4 MB each
                </small>
            </label>

        </div>


        <div
            id="projectGalleryPreview"
            class="project-gallery-preview"
        ></div>


        @error('gallery_images')
            <small class="project-error">
                {{ $message }}
            </small>
        @enderror

        @error('gallery_images.*')
            <small class="project-error">
                {{ $message }}
            </small>
        @enderror

    </div>

</section>


{{-- SEO --}}
<section class="project-form-card project-form-full">

    <div class="project-form-card-header">

        <div>
            <span class="project-form-eyebrow">
                SEARCH ENGINE
            </span>

            <h3>SEO Settings</h3>

            <p>
                Optional search engine information.
            </p>
        </div>

    </div>


    <div class="project-form-card-body">

        <div class="project-field">

            <label for="meta_title">
                Meta Title
            </label>

            <input
                type="text"
                id="meta_title"
                name="meta_title"
                class="project-input"
                maxlength="255"
                value="{{ old(
                    'meta_title',
                    $project->meta_title ?? ''
                ) }}"
                placeholder="Project Name | Naksh Elevator"
            >

        </div>


        <div class="project-field">

            <label for="meta_description">
                Meta Description
            </label>

            <textarea
                id="meta_description"
                name="meta_description"
                class="project-input"
                rows="4"
                maxlength="1000"
                placeholder="Enter project SEO description..."
            >{{ old(
                'meta_description',
                $project->meta_description ?? ''
            ) }}</textarea>

        </div>

    </div>

</section>