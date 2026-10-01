@php
    $editing = isset($cabinDesign);
@endphp

<div class="cabin-form-grid">

    {{-- TITLE --}}
    <div class="form-group cabin-field-full">
        <label for="title">
            Design Title <span>*</span>
        </label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $cabinDesign->title ?? '') }}"
            placeholder="e.g. Premium Golden Mirror Cabin"
            required
        >

        @error('title')
            <small class="form-error">{{ $message }}</small>
        @enderror
    </div>

    {{-- CATEGORY --}}
    <div class="form-group">
        <label for="category">
            Category <span>*</span>
        </label>

        @php
            $selectedCategory = old(
                'category',
                $cabinDesign->category ?? ''
            );
        @endphp

        <select
            id="category"
            name="category"
            required
        >
            <option value="">Select Category</option>

            <option
                value="cabin-interiors"
                @selected($selectedCategory === 'cabin-interiors')
            >
                Cabin Interiors
            </option>

            <option
                value="ceiling-designs"
                @selected($selectedCategory === 'ceiling-designs')
            >
                Ceiling Designs
            </option>

            <option
                value="designer-sheets"
                @selected($selectedCategory === 'designer-sheets')
            >
                Designer Sheets
            </option>

            <option
                value="wall-designs"
                @selected($selectedCategory === 'wall-designs')
            >
                Cabin Wall Designs
            </option>

            <option
                value="glass-cabins"
                @selected($selectedCategory === 'glass-cabins')
            >
                Glass Cabins
            </option>

            <option
                value="premium-finishes"
                @selected($selectedCategory === 'premium-finishes')
            >
                Premium Finishes
            </option>
        </select>

        @error('category')
            <small class="form-error">{{ $message }}</small>
        @enderror
    </div>

    {{-- MATERIAL --}}
    <div class="form-group">
        <label for="material_finish">
            Material / Finish
        </label>

        <input
            type="text"
            id="material_finish"
            name="material_finish"
            value="{{ old(
                'material_finish',
                $cabinDesign->material_finish ?? ''
            ) }}"
            placeholder="e.g. Golden Mirror Stainless Steel"
        >

        @error('material_finish')
            <small class="form-error">{{ $message }}</small>
        @enderror
    </div>

    {{-- SHORT DESCRIPTION --}}
    <div class="form-group cabin-field-full">
        <label for="short_description">
            Short Description
        </label>

        <textarea
            id="short_description"
            name="short_description"
            rows="3"
            maxlength="500"
            placeholder="Enter a short description..."
        >{{ old(
            'short_description',
            $cabinDesign->short_description ?? ''
        ) }}</textarea>

        @error('short_description')
            <small class="form-error">{{ $message }}</small>
        @enderror
    </div>

    {{-- DESCRIPTION --}}
    <div class="form-group cabin-field-full">
        <label for="description">
            Full Description
        </label>

        <textarea
            id="description"
            name="description"
            rows="6"
            placeholder="Enter complete cabin design details..."
        >{{ old(
            'description',
            $cabinDesign->description ?? ''
        ) }}</textarea>

        @error('description')
            <small class="form-error">{{ $message }}</small>
        @enderror
    </div>

    {{-- COVER IMAGE --}}
    <div class="form-group">
        <label for="cover_image">
            Cover Image
            @if (!$editing)
                <span>*</span>
            @endif
        </label>

        <input
            type="file"
            id="cover_image"
            name="cover_image"
            accept=".jpg,.jpeg,.png,.webp"
            {{ !$editing ? 'required' : '' }}
        >

        <small class="form-help">
            JPG, PNG or WebP. Maximum 4 MB.
        </small>

        @error('cover_image')
            <small class="form-error">{{ $message }}</small>
        @enderror

        @if (
            $editing &&
            !empty($cabinDesign->cover_image)
        )
            <div class="current-cover">
                <p>Current Cover:</p>

                <img
                    src="{{ asset(
                        'storage/' .
                        $cabinDesign->cover_image
                    ) }}"
                    alt="{{ $cabinDesign->title }}"
                >
            </div>
        @endif
    </div>

    {{-- GALLERY --}}
    <div class="form-group">
        <label for="gallery_images">
            Gallery Images
        </label>

        <input
            type="file"
            id="gallery_images"
            name="gallery_images[]"
            accept=".jpg,.jpeg,.png,.webp"
            multiple
        >

        <small class="form-help">
            Maximum 10 images. Each image maximum 4 MB.
        </small>

        @error('gallery_images')
            <small class="form-error">{{ $message }}</small>
        @enderror

        @error('gallery_images.*')
            <small class="form-error">{{ $message }}</small>
        @enderror

        @if (
            $editing &&
            !empty($cabinDesign->gallery_images)
        )
            <div class="current-gallery">

                @foreach (
                    $cabinDesign->gallery_images
                    as $galleryImage
                )
                    <img
                        src="{{ asset(
                            'storage/' .
                            $galleryImage
                        ) }}"
                        alt="{{ $cabinDesign->title }}"
                    >
                @endforeach

            </div>
        @endif
    </div>

    {{-- DISPLAY ORDER --}}
    <div class="form-group">
        <label for="sort_order">
            Display Order
        </label>

        <input
            type="number"
            id="sort_order"
            name="sort_order"
            min="0"
            value="{{ old(
                'sort_order',
                $cabinDesign->sort_order ?? 0
            ) }}"
        >
    </div>

    {{-- OPTIONS --}}
    <div class="form-group cabin-options">

        <label class="check-item">
            <input
                type="checkbox"
                name="featured"
                value="1"
                @checked(
                    old(
                        'featured',
                        $cabinDesign->featured ?? false
                    )
                )
            >

            <span>Featured Design</span>
        </label>

        <label class="check-item">
            <input
                type="checkbox"
                name="status"
                value="1"
                @checked(
                    old(
                        'status',
                        $editing
                            ? $cabinDesign->status
                            : true
                    )
                )
            >

            <span>Active</span>
        </label>

    </div>

    {{-- SEO --}}
    <div class="cabin-form-section cabin-field-full">
        SEO Information
    </div>

    <div class="form-group cabin-field-full">
        <label for="meta_title">
            Meta Title
        </label>

        <input
            type="text"
            id="meta_title"
            name="meta_title"
            maxlength="255"
            value="{{ old(
                'meta_title',
                $cabinDesign->meta_title ?? ''
            ) }}"
            placeholder="SEO page title"
        >
    </div>

    <div class="form-group cabin-field-full">
        <label for="meta_description">
            Meta Description
        </label>

        <textarea
            id="meta_description"
            name="meta_description"
            rows="3"
            maxlength="500"
            placeholder="SEO meta description"
        >{{ old(
            'meta_description',
            $cabinDesign->meta_description ?? ''
        ) }}</textarea>
    </div>

</div>