@extends('layouts.admin')

@section('title', ucfirst($page) . ' Page Content')
@section('page-title', ucfirst($page) . ' Page Content')

@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/website-content.css') }}"
>
@endpush


@section('content')

<div class="website-content-page website-content-edit-page">

    {{-- HEADER --}}
    <div class="website-edit-header">

        <div>

            <span class="website-content-eyebrow">
                WEBSITE CONTENT
            </span>

            <h2>
                {{ ucfirst($page) }} Page
            </h2>

            <p>
                Manage the content displayed on the
                {{ ucfirst($page) }} page of the website.
            </p>

        </div>


        <a
            href="{{ route('admin.website-content.index') }}"
            class="website-back-btn"
        >
            ← Back to Website Content
        </a>

    </div>


    {{-- NO CONTENT --}}
    @if($contents->isEmpty())

        <div class="website-content-empty">

            <div>!</div>

            <h3>No Content Found</h3>

            <p>
                No editable content has been configured
                for this page.
            </p>

        </div>

    @else

        <form
            method="POST"
            action="{{ route(
                'admin.website-content.update',
                $page
            ) }}"
            id="websiteContentForm"
            novalidate
        >

            @csrf
            @method('PUT')


            {{-- VALIDATION SUMMARY --}}
            <div
                id="websiteValidationSummary"
                class="website-validation-summary"
            >

                <strong>
                    Please fix the following problems:
                </strong>

                <ul id="websiteValidationList"></ul>

            </div>


            {{-- SECTIONS --}}
            <div class="website-sections">

                @foreach($contents as $section => $items)

                    <section class="website-section-card">

                        <div class="website-section-header">

                            <div>

                                <span>
                                    PAGE SECTION
                                </span>

                                <h3>
                                    {{ ucwords(
                                        str_replace(
                                            '_',
                                            ' ',
                                            $section
                                        )
                                    ) }}
                                </h3>

                            </div>

                            <span class="website-section-count">
                                {{ $items->count() }}
                                {{ $items->count() === 1
                                    ? 'Field'
                                    : 'Fields'
                                }}
                            </span>

                        </div>


                        <div class="website-section-body">

                            @foreach($items as $content)

                                @php
                                    $fieldId =
                                        'content_' .
                                        $content->id;

                                    $fieldName =
                                        ucwords(
                                            str_replace(
                                                '_',
                                                ' ',
                                                $content->content_key
                                            )
                                        );

                                    $currentValue =
                                        old(
                                            'contents.' .
                                            $content->id,
                                            $content->content_value
                                        );
                                @endphp


                                <div class="website-form-group">

                                    <div class="website-label-row">

                                        <label
                                            for="{{ $fieldId }}"
                                        >
                                            {{ $fieldName }}
                                        </label>


                                        @if(
                                            $content->content_type
                                            === 'textarea'
                                        )

                                            <span
                                                class="website-character-counter"
                                                data-counter-for="{{ $fieldId }}"
                                            >
                                                0 / 5000
                                            </span>

                                        @endif

                                    </div>


                                    @if(
                                        $content->content_type
                                        === 'textarea'
                                    )

                                        <textarea
                                            name="contents[{{ $content->id }}]"
                                            id="{{ $fieldId }}"
                                            class="website-form-control website-content-field"
                                            rows="6"
                                            maxlength="5000"
                                            data-label="{{ $fieldName }}"
                                            data-type="textarea"
                                        >{{ $currentValue }}</textarea>

                                    @else

                                        <input
                                            type="text"
                                            name="contents[{{ $content->id }}]"
                                            id="{{ $fieldId }}"
                                            class="website-form-control website-content-field"
                                            value="{{ $currentValue }}"
                                            maxlength="5000"
                                            data-label="{{ $fieldName }}"
                                            data-type="text"
                                        >

                                    @endif


                                    <small
                                        class="website-field-error"
                                        data-error-for="{{ $fieldId }}"
                                    ></small>


                                    <small class="website-field-meta">

                                        Key:
                                        <code>
                                            {{ $content->content_key }}
                                        </code>

                                    </small>

                                </div>

                            @endforeach

                        </div>

                    </section>

                @endforeach

            </div>


            {{-- SAVE BAR --}}
            <div class="website-save-bar">

                <div>

                    <strong>
                        {{ ucfirst($page) }} Page Content
                    </strong>

                    <span>
                        Save your changes to update
                        the stored website content.
                    </span>

                </div>


                <button
                    type="submit"
                    id="websiteContentSaveBtn"
                    class="website-save-btn"
                >
                    Save Changes
                </button>

            </div>

        </form>

    @endif

</div>

@endsection


@push('scripts')
<script
    src="{{ asset('assets/admin/js/website-content.js') }}"
></script>
@endpush