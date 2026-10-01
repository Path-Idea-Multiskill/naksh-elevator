@php
    $isEdit = isset($service);

    $features = old(
        'features',
        $isEdit ? ($service->features ?? []) : ['']
    );
@endphp


{{-- BASIC INFORMATION --}}
<section class="service-form-card service-basic-card">

    <div class="service-form-card-header">
        <div>
            <span class="service-form-label">
                SERVICE DETAILS
            </span>

            <h3>Basic Information</h3>

            <p>
                Enter the main information about this service.
            </p>
        </div>
    </div>


    <div class="service-form-card-body">

        <div class="service-field">

            <label for="title">
                Service Title
                <span>*</span>
            </label>

            <input
                type="text"
                id="title"
                name="title"
                class="service-input
                @error('title') has-error @enderror"
                value="{{ old(
                    'title',
                    $service->title ?? ''
                ) }}"
                placeholder="e.g. Elevator Installation"
                required
            >

            @error('title')
                <small class="service-error">
                    {{ $message }}
                </small>
            @enderror

        </div>


        <div class="service-field">

            <label for="short_description">
                Short Description
            </label>

            <textarea
                id="short_description"
                name="short_description"
                class="service-input"
                rows="3"
                maxlength="500"
                placeholder="Write a short service description..."
            >{{ old(
                'short_description',
                $service->short_description ?? ''
            ) }}</textarea>

            @error('short_description')
                <small class="service-error">
                    {{ $message }}
                </small>
            @enderror

        </div>


        <div class="service-field">

            <label for="description">
                Full Description
            </label>

            <textarea
                id="description"
                name="description"
                class="service-input"
                rows="8"
                placeholder="Enter complete service details..."
            >{{ old(
                'description',
                $service->description ?? ''
            ) }}</textarea>

            @error('description')
                <small class="service-error">
                    {{ $message }}
                </small>
            @enderror

        </div>

    </div>

</section>


{{-- PUBLISH SETTINGS --}}
<section class="service-form-card service-publish-card">

    <div class="service-form-card-header">

        <div>
            <span class="service-form-label">
                PUBLISH
            </span>

            <h3>Publish Settings</h3>

            <p>
                Manage image, visibility and display order.
            </p>
        </div>

    </div>


    <div class="service-form-card-body">

        <div class="service-field">

            <label>Service Image</label>


            <div class="service-image-upload">

                <div
                    class="service-image-preview"
                    id="serviceImagePreview"
                >

                    @if($isEdit && $service->image)

                        <img
                            id="servicePreviewImage"
                            src="{{ asset(
                                'storage/' . $service->image
                            ) }}"
                            alt="{{ $service->title }}"
                        >

                        <div
                            class="service-image-placeholder"
                            id="serviceImagePlaceholder"
                            hidden
                        >
                            <strong>Service Image</strong>
                            <span>JPG, PNG or WEBP</span>
                        </div>

                    @else

                        <img
                            id="servicePreviewImage"
                            src=""
                            alt=""
                            hidden
                        >

                        <div
                            class="service-image-placeholder"
                            id="serviceImagePlaceholder"
                        >
                            <div class="service-upload-symbol">
                                +
                            </div>

                            <strong>
                                Upload Service Image
                            </strong>

                            <span>
                                JPG, PNG or WEBP
                            </span>
                        </div>

                    @endif

                </div>


                <input
                    type="file"
                    id="serviceImage"
                    name="image"
                    class="service-file-input"
                    accept=".jpg,.jpeg,.png,.webp"
                >


                <label
                    for="serviceImage"
                    class="service-choose-image"
                >
                    Choose Image
                </label>


                <small class="service-field-help">
                    Maximum image size: 4 MB
                </small>

            </div>


            @error('image')
                <small class="service-error">
                    {{ $message }}
                </small>
            @enderror

        </div>


        <div class="service-publish-grid">

            <div class="service-field">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    class="service-input"
                    required
                >

                    <option
                        value="1"
                        @selected(
                            (int) old(
                                'status',
                                $isEdit
                                    ? $service->status
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
                                    ? $service->status
                                    : 1
                            ) === 0
                        )
                    >
                        Inactive
                    </option>

                </select>

            </div>


            <div class="service-field">

                <label for="sort_order">
                    Display Order
                </label>

                <input
                    type="number"
                    id="sort_order"
                    name="sort_order"
                    class="service-input"
                    min="0"
                    value="{{ old(
                        'sort_order',
                        $service->sort_order ?? 0
                    ) }}"
                >

            </div>

        </div>

    </div>

</section>


{{-- FEATURES --}}
<section class="service-form-card service-form-full">

    <div class="service-form-card-header service-feature-heading">

        <div>

            <span class="service-form-label">
                KEY BENEFITS
            </span>

            <h3>Service Features</h3>

            <p>
                Add the main features or benefits of this service.
            </p>

        </div>


        <button
            type="button"
            class="service-secondary-btn"
            id="serviceAddFeature"
        >
            + Add Feature
        </button>

    </div>


    <div class="service-form-card-body">

        <div
            id="serviceFeaturesContainer"
            class="service-features-container"
        >

            @foreach($features as $feature)

                <div class="service-feature-row">

                    <input
                        type="text"
                        name="features[]"
                        class="service-input"
                        value="{{ $feature }}"
                        placeholder="e.g. 24×7 technical support"
                    >

                    <button
                        type="button"
                        class="service-remove-feature"
                    >
                        Remove
                    </button>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- SEO --}}
<section class="service-form-card service-form-full">

    <div class="service-form-card-header">

        <div>

            <span class="service-form-label">
                SEARCH ENGINE
            </span>

            <h3>SEO Settings</h3>

            <p>
                Optional search engine information.
            </p>

        </div>

    </div>


    <div class="service-form-card-body">

        <div class="service-field">

            <label for="meta_title">
                Meta Title
            </label>

            <input
                type="text"
                id="meta_title"
                name="meta_title"
                class="service-input"
                maxlength="255"
                value="{{ old(
                    'meta_title',
                    $service->meta_title ?? ''
                ) }}"
                placeholder="Elevator Installation | Naksh Elevator"
            >

        </div>


        <div class="service-field">

            <label for="meta_description">
                Meta Description
            </label>

            <textarea
                id="meta_description"
                name="meta_description"
                class="service-input"
                rows="4"
                maxlength="1000"
                placeholder="Enter SEO description..."
            >{{ old(
                'meta_description',
                $service->meta_description ?? ''
            ) }}</textarea>

        </div>

    </div>

</section>