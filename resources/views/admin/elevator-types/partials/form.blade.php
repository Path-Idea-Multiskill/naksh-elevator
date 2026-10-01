@php
    $isEdit = isset($elevatorType);

    $features = old(
        'features',
        $isEdit ? ($elevatorType->features ?? []) : ['']
    );
@endphp


{{-- ===============================
     BASIC INFORMATION
================================ --}}

<div class="form-card">

    <div class="form-card-header">
        <div>
            <h3>Basic Information</h3>
            <p>
                Enter the main information about this elevator.
            </p>
        </div>
    </div>


    <div class="form-card-body">

        <div class="form-group">

            <label for="name">
                Elevator Name
                <span class="required">*</span>
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $elevatorType->name ?? '') }}"
                placeholder="e.g. Passenger Elevator"
                required
            >

            @error('name')
                <span class="field-error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        <div class="form-group">

            <label for="short_description">
                Short Description
            </label>

            <textarea
                id="short_description"
                name="short_description"
                class="form-control @error('short_description') is-invalid @enderror"
                rows="3"
                maxlength="500"
                placeholder="Write a short description..."
            >{{ old(
                'short_description',
                $elevatorType->short_description ?? ''
            ) }}</textarea>

            <div class="field-help">
                Maximum 500 characters.
            </div>

            @error('short_description')
                <span class="field-error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        <div class="form-group">

            <label for="description">
                Full Description
            </label>

            <textarea
                id="description"
                name="description"
                class="form-control @error('description') is-invalid @enderror"
                rows="8"
                placeholder="Enter complete elevator details..."
            >{{ old(
                'description',
                $elevatorType->description ?? ''
            ) }}</textarea>

            @error('description')
                <span class="field-error">
                    {{ $message }}
                </span>
            @enderror

        </div>

    </div>

</div>



{{-- ===============================
     PUBLISH SETTINGS
================================ --}}

<div class="form-card">

    <div class="form-card-header">

        <div>
            <h3>Publish Settings</h3>

            <p>
                Manage image, status and display position.
            </p>
        </div>

    </div>


    <div class="form-card-body">

        <div class="form-group">

            <label for="image">
                Elevator Image
            </label>


            <div class="image-upload-box">

                <div
                    class="image-preview"
                    id="imagePreview"
                >

                    @if(
                        $isEdit &&
                        $elevatorType->image
                    )

                        <img
                            id="previewImage"
                            src="{{ asset(
                                'storage/' .
                                $elevatorType->image
                            ) }}"
                            alt="{{ $elevatorType->name }}"
                        >

                        <div
                            class="image-placeholder"
                            id="imagePlaceholder"
                            style="display:none;"
                        >
                            <strong>Upload Image</strong>
                            <span>JPG, PNG or WEBP</span>
                        </div>

                    @else

                        <img
                            id="previewImage"
                            src=""
                            alt=""
                            style="display:none;"
                        >

                        <div
                            class="image-placeholder"
                            id="imagePlaceholder"
                        >
                            <strong>Upload Image</strong>
                            <span>JPG, PNG or WEBP</span>
                        </div>

                    @endif

                </div>


                <input
                    type="file"
                    id="image"
                    name="image"
                    class="file-input"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <label
                    for="image"
                    class="choose-image-btn"
                >
                    Choose Image
                </label>

                <small>
                    Recommended: clear landscape or square image.
                    Maximum 4 MB.
                </small>

            </div>


            @error('image')
                <span class="field-error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        <div class="form-row">

            <div class="form-group">

                <label for="status">
                    Status
                    <span class="required">*</span>
                </label>

                <select
                    id="status"
                    name="status"
                    class="form-control"
                    required
                >

                    <option
                        value="1"
                        @selected(
                            old(
                                'status',
                                isset($elevatorType)
                                    ? (int) $elevatorType->status
                                    : 1
                            ) === 1
                        )
                    >
                        Active
                    </option>

                    <option
                        value="0"
                        @selected(
                            old(
                                'status',
                                isset($elevatorType)
                                    ? (int) $elevatorType->status
                                    : 1
                            ) === 0
                        )
                    >
                        Inactive
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label for="sort_order">
                    Display Order
                </label>

                <input
                    type="number"
                    id="sort_order"
                    name="sort_order"
                    class="form-control"
                    min="0"
                    value="{{ old(
                        'sort_order',
                        $elevatorType->sort_order ?? 0
                    ) }}"
                >

            </div>

        </div>

    </div>

</div>



{{-- ===============================
     FEATURES
================================ --}}

<div class="form-card form-card-full">

    <div class="form-card-header feature-header">

        <div>

            <h3>Elevator Features</h3>

            <p>
                Add important features of this elevator.
            </p>

        </div>


        <button
            type="button"
            class="secondary-btn"
            id="addFeature"
        >
            + Add Feature
        </button>

    </div>


    <div class="form-card-body">

        <div
            class="features-container"
            id="featuresContainer"
        >

            @foreach($features as $feature)

                <div class="feature-row">

                    <input
                        type="text"
                        name="features[]"
                        class="form-control"
                        value="{{ $feature }}"
                        placeholder="e.g. Automatic Rescue Device"
                    >

                    <button
                        type="button"
                        class="remove-feature"
                        aria-label="Remove feature"
                    >
                        Remove
                    </button>

                </div>

            @endforeach

        </div>

    </div>

</div>



{{-- ===============================
     SEO
================================ --}}

<div class="form-card form-card-full">

    <div class="form-card-header">

        <div>

            <h3>SEO Settings</h3>

            <p>
                Optional search engine information.
            </p>

        </div>

    </div>


    <div class="form-card-body">

        <div class="form-group">

            <label for="meta_title">
                Meta Title
            </label>

            <input
                type="text"
                id="meta_title"
                name="meta_title"
                class="form-control"
                maxlength="255"
                value="{{ old(
                    'meta_title',
                    $elevatorType->meta_title ?? ''
                ) }}"
                placeholder="Passenger Elevator | Naksh Elevator"
            >

        </div>


        <div class="form-group">

            <label for="meta_description">
                Meta Description
            </label>

            <textarea
                id="meta_description"
                name="meta_description"
                class="form-control"
                rows="4"
                maxlength="1000"
                placeholder="Enter SEO description..."
            >{{ old(
                'meta_description',
                $elevatorType->meta_description ?? ''
            ) }}</textarea>

        </div>

    </div>

</div>