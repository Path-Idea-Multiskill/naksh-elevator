@extends('layouts.admin')

@section('title', 'Website Settings')
@section('page-title', 'Website Settings')


@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/settings.css') }}"
>
@endpush


@section('content')

<div class="settings-page">

    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}
    <div class="settings-page-header">

        <div>
            <span class="settings-eyebrow">
                WEBSITE MANAGEMENT
            </span>

            <h2>
                Website Settings
            </h2>

            <p>
                Manage global company information, contact
                details, branding, social links and default
                website SEO settings.
            </p>
        </div>

    </div>


    {{-- =====================================================
         SETTINGS FORM
    ====================================================== --}}
    <form
        action="{{ route('admin.settings.update') }}"
        method="POST"
        enctype="multipart/form-data"
        id="settingsForm"
        novalidate
    >

        @csrf
        @method('PUT')


        {{-- =================================================
             COMPANY INFORMATION
        ================================================== --}}
        <section class="settings-card">

            <div class="settings-card-header">

                <div>
                    <span>GENERAL</span>

                    <h3>
                        Company Information
                    </h3>
                </div>

            </div>


            <div class="settings-card-body">

                <div class="settings-grid">

                    <div class="settings-field">

                        <label for="company_name">
                            Company Name
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="company_name"
                            id="company_name"
                            class="settings-control"
                            maxlength="150"
                            value="{{ old(
                                'company_name',
                                $settings->company_name
                            ) }}"
                            placeholder="Naksh Elevator"
                        >

                        @error('company_name')
                            <small class="settings-server-error">
                                {{ $message }}
                            </small>
                        @enderror

                        <small
                            class="settings-client-error"
                            data-error-for="company_name"
                        ></small>

                    </div>


                    <div class="settings-field">

                        <label for="short_name">
                            Short Name
                        </label>

                        <input
                            type="text"
                            name="short_name"
                            id="short_name"
                            class="settings-control"
                            maxlength="100"
                            value="{{ old(
                                'short_name',
                                $settings->short_name
                            ) }}"
                            placeholder="Naksh"
                        >

                        @error('short_name')
                            <small class="settings-server-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <div class="settings-field settings-field-full">

                        <div class="settings-label-row">

                            <label for="footer_description">
                                Footer Description
                            </label>

                            <span
                                class="settings-counter"
                                data-counter-for="footer_description"
                            >
                                0 / 1000
                            </span>

                        </div>

                        <textarea
                            name="footer_description"
                            id="footer_description"
                            class="settings-control settings-textarea"
                            rows="4"
                            maxlength="1000"
                            placeholder="Short company description displayed in website footer..."
                        >{{ old(
                            'footer_description',
                            $settings->footer_description
                        ) }}</textarea>

                        @error('footer_description')
                            <small class="settings-server-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

            </div>

        </section>


        {{-- =================================================
             CONTACT INFORMATION
        ================================================== --}}
        <section class="settings-card">

            <div class="settings-card-header">

                <div>
                    <span>CONTACT</span>

                    <h3>
                        Contact Information
                    </h3>
                </div>

            </div>


            <div class="settings-card-body">

                <div class="settings-grid">

                    <div class="settings-field">

                        <label for="primary_phone">
                            Primary Phone
                        </label>

                        <input
                            type="text"
                            name="primary_phone"
                            id="primary_phone"
                            class="settings-control"
                            maxlength="30"
                            value="{{ old(
                                'primary_phone',
                                $settings->primary_phone
                            ) }}"
                            placeholder="+91 98765 43210"
                        >

                        @error('primary_phone')
                            <small class="settings-server-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <div class="settings-field">

                        <label for="secondary_phone">
                            Secondary Phone
                        </label>

                        <input
                            type="text"
                            name="secondary_phone"
                            id="secondary_phone"
                            class="settings-control"
                            maxlength="30"
                            value="{{ old(
                                'secondary_phone',
                                $settings->secondary_phone
                            ) }}"
                            placeholder="+91 98765 43210"
                        >

                        @error('secondary_phone')
                            <small class="settings-server-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <div class="settings-field">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="settings-control"
                            maxlength="150"
                            value="{{ old(
                                'email',
                                $settings->email
                            ) }}"
                            placeholder="contact@nakshelevator.com"
                        >

                        @error('email')
                            <small class="settings-server-error">
                                {{ $message }}
                            </small>
                        @enderror

                        <small
                            class="settings-client-error"
                            data-error-for="email"
                        ></small>

                    </div>


                    <div class="settings-field">

                        <label for="whatsapp_number">
                            WhatsApp Number
                        </label>

                        <input
                            type="text"
                            name="whatsapp_number"
                            id="whatsapp_number"
                            class="settings-control"
                            maxlength="30"
                            value="{{ old(
                                'whatsapp_number',
                                $settings->whatsapp_number
                            ) }}"
                            placeholder="+91 98765 43210"
                        >

                        @error('whatsapp_number')
                            <small class="settings-server-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

            </div>

        </section>


        {{-- =================================================
             ADDRESS
        ================================================== --}}
        <section class="settings-card">

            <div class="settings-card-header">

                <div>
                    <span>LOCATION</span>

                    <h3>
                        Business Address
                    </h3>
                </div>

            </div>


            <div class="settings-card-body">

                <div class="settings-grid">

                    <div class="settings-field settings-field-full">

                        <label for="address">
                            Address
                        </label>

                        <textarea
                            name="address"
                            id="address"
                            class="settings-control settings-textarea"
                            rows="3"
                            maxlength="1000"
                            placeholder="Enter complete business address..."
                        >{{ old(
                            'address',
                            $settings->address
                        ) }}</textarea>

                        @error('address')
                            <small class="settings-server-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <div class="settings-field">

                        <label for="city">
                            City
                        </label>

                        <input
                            type="text"
                            name="city"
                            id="city"
                            class="settings-control"
                            maxlength="100"
                            value="{{ old(
                                'city',
                                $settings->city
                            ) }}"
                            placeholder="Raipur"
                        >

                    </div>


                    <div class="settings-field">

                        <label for="state">
                            State
                        </label>

                        <input
                            type="text"
                            name="state"
                            id="state"
                            class="settings-control"
                            maxlength="100"
                            value="{{ old(
                                'state',
                                $settings->state
                            ) }}"
                            placeholder="Chhattisgarh"
                        >

                    </div>


                    <div class="settings-field">

                        <label for="pincode">
                            Pincode
                        </label>

                        <input
                            type="text"
                            name="pincode"
                            id="pincode"
                            class="settings-control"
                            maxlength="10"
                            value="{{ old(
                                'pincode',
                                $settings->pincode
                            ) }}"
                            placeholder="492001"
                        >

                    </div>

                </div>

            </div>

        </section>


        {{-- =================================================
             BRANDING
        ================================================== --}}
        <section class="settings-card">

            <div class="settings-card-header">

                <div>
                    <span>BRANDING</span>

                    <h3>
                        Logo & Favicon
                    </h3>
                </div>

            </div>


            <div class="settings-card-body">

                <div class="settings-upload-grid">

                    {{-- LOGO --}}
                    <div class="settings-upload-box">

                        <div class="settings-upload-heading">

                            <div>
                                <h4>Website Logo</h4>

                                <p>
                                    JPG, PNG or WEBP.
                                    Maximum 4 MB.
                                </p>
                            </div>

                        </div>


                        <div class="settings-image-preview">

                            <img
                                id="logoPreview"
                                src="{{
                                    $settings->logo
                                        ? asset(
                                            'storage/' .
                                            $settings->logo
                                        )
                                        : asset(
                                            'images/logo/naksh-logo.png'
                                        )
                                }}"
                                alt="Website Logo"
                            >

                        </div>


                        <input
                            type="file"
                            name="logo"
                            id="logo"
                            class="settings-file-input"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small
                            class="settings-client-error"
                            data-error-for="logo"
                        ></small>

                        @error('logo')
                            <small class="settings-server-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- FAVICON --}}
                    <div class="settings-upload-box">

                        <div class="settings-upload-heading">

                            <div>
                                <h4>Favicon</h4>

                                <p>
                                    PNG, ICO, JPG or WEBP.
                                    Maximum 2 MB.
                                </p>
                            </div>

                        </div>


                        <div
                            class="settings-image-preview settings-favicon-preview"
                        >

                            @if($settings->favicon)

                                <img
                                    id="faviconPreview"
                                    src="{{ asset(
                                        'storage/' .
                                        $settings->favicon
                                    ) }}"
                                    alt="Favicon"
                                >

                            @else

                                <div
                                    id="faviconPlaceholder"
                                    class="settings-favicon-placeholder"
                                >
                                    N
                                </div>

                                <img
                                    id="faviconPreview"
                                    src=""
                                    alt="Favicon"
                                    hidden
                                >

                            @endif

                        </div>


                        <input
                            type="file"
                            name="favicon"
                            id="favicon"
                            class="settings-file-input"
                            accept=".png,.ico,.jpg,.jpeg,.webp"
                        >

                        <small
                            class="settings-client-error"
                            data-error-for="favicon"
                        ></small>

                        @error('favicon')
                            <small class="settings-server-error">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

            </div>

        </section>


        {{-- =================================================
             SOCIAL MEDIA
        ================================================== --}}
        <section class="settings-card">

            <div class="settings-card-header">

                <div>
                    <span>SOCIAL</span>

                    <h3>
                        Social Media Links
                    </h3>
                </div>

            </div>


            <div class="settings-card-body">

                <div class="settings-grid">

                    @foreach([
                        'facebook_url' => 'Facebook URL',
                        'instagram_url' => 'Instagram URL',
                        'linkedin_url' => 'LinkedIn URL',
                        'youtube_url' => 'YouTube URL',
                    ] as $field => $label)

                        <div class="settings-field">

                            <label for="{{ $field }}">
                                {{ $label }}
                            </label>

                            <input
                                type="url"
                                name="{{ $field }}"
                                id="{{ $field }}"
                                class="settings-control settings-url-field"
                                maxlength="255"
                                value="{{ old(
                                    $field,
                                    $settings->{$field}
                                ) }}"
                                placeholder="https://..."
                            >

                            <small
                                class="settings-client-error"
                                data-error-for="{{ $field }}"
                            ></small>

                            @error($field)
                                <small class="settings-server-error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    @endforeach

                </div>

            </div>

        </section>


        {{-- =================================================
             BUSINESS HOURS
        ================================================== --}}
        <section class="settings-card">

            <div class="settings-card-header">

                <div>
                    <span>BUSINESS</span>

                    <h3>
                        Business Information
                    </h3>
                </div>

            </div>


            <div class="settings-card-body">

                <div class="settings-grid">

                    <div class="settings-field settings-field-full">

                        <label for="business_hours">
                            Business Hours
                        </label>

                        <input
                            type="text"
                            name="business_hours"
                            id="business_hours"
                            class="settings-control"
                            maxlength="255"
                            value="{{ old(
                                'business_hours',
                                $settings->business_hours
                            ) }}"
                            placeholder="Monday - Saturday, 9:00 AM - 7:00 PM"
                        >

                    </div>

                </div>

            </div>

        </section>


        {{-- =================================================
             SEO
        ================================================== --}}
        <section class="settings-card">

            <div class="settings-card-header">

                <div>
                    <span>SEO</span>

                    <h3>
                        Default SEO Settings
                    </h3>
                </div>

            </div>


            <div class="settings-card-body">

                <div class="settings-grid">

                    <div class="settings-field settings-field-full">

                        <label for="meta_title">
                            Default Meta Title
                        </label>

                        <input
                            type="text"
                            name="meta_title"
                            id="meta_title"
                            class="settings-control"
                            maxlength="255"
                            value="{{ old(
                                'meta_title',
                                $settings->meta_title
                            ) }}"
                            placeholder="Naksh Elevator"
                        >

                    </div>


                    <div class="settings-field settings-field-full">

                        <div class="settings-label-row">

                            <label for="meta_description">
                                Default Meta Description
                            </label>

                            <span
                                class="settings-counter"
                                data-counter-for="meta_description"
                            >
                                0 / 1000
                            </span>

                        </div>

                        <textarea
                            name="meta_description"
                            id="meta_description"
                            class="settings-control settings-textarea"
                            rows="4"
                            maxlength="1000"
                            placeholder="Default website SEO description..."
                        >{{ old(
                            'meta_description',
                            $settings->meta_description
                        ) }}</textarea>

                    </div>

                </div>

            </div>

        </section>


        {{-- =================================================
             SAVE BAR
        ================================================== --}}
        <div class="settings-save-bar">

            <div>
                <strong>
                    Website Settings
                </strong>

                <span>
                    Save changes to update global
                    website information.
                </span>
            </div>


            <button
                type="submit"
                id="settingsSaveButton"
                class="settings-save-button"
            >
                Save Settings
            </button>

        </div>

    </form>

</div>

@endsection


@push('scripts')
<script
    src="{{ asset('assets/admin/js/settings.js') }}"
></script>
@endpush