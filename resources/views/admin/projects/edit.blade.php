@extends('layouts.admin')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section(
    'page-description',
    'Update Naksh Elevator project'
)

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/projects.css') }}">
@endpush


@section('content')

    <div class="naksh-projects-page project-form-page">

        <div class="project-form-page-header">

            <div>
                <span class="projects-eyebrow">
                    PROJECT MANAGEMENT
                </span>

                <h2>
                    Edit {{ $project->title }}
                </h2>

                <p>
                    Update project information,
                    images and publishing settings.
                </p>
            </div>


            <a href="{{ route('admin.projects.index') }}" class="project-back-btn">
                ← Back to Projects
            </a>

        </div>


        <!-- <form action="{{ route(
                'admin.projects.update',
                $project
            ) }}" method="POST" enctype="multipart/form-data" class="project-admin-form"> -->

        <form id="projectForm" action="{{ route(
        'admin.projects.update',
        $project
    ) }}" method="POST" enctype="multipart/form-data" class="project-admin-form">

            @csrf
            @method('PUT')

            <div id="projectUploadAlert" class="project-upload-alert" hidden role="alert">
                <div class="project-upload-alert-icon">
                    !
                </div>

                <div>
                    <strong id="projectUploadAlertTitle">
                        Upload Error
                    </strong>

                    <p id="projectUploadAlertMessage"></p>
                </div>

                <button type="button" id="projectUploadAlertClose" class="project-upload-alert-close" aria-label="Close">
                    ×
                </button>
            </div>


            <div class="project-form-grid">

                @include('admin.projects.partials.form')

            </div>


            <div class="project-form-submit">

                <a href="{{ route('admin.projects.index') }}" class="project-cancel-btn">
                    Cancel
                </a>

                <!-- <button type="submit" class="project-save-btn">
                    Update Project
                </button> -->

                <button type="submit" id="projectSaveBtn" class="project-save-btn">
                    Update Project
                </button>

            </div>

        </form>

    </div>

@endsection


@push('scripts')
    <script src="{{ asset('assets/admin/js/projects.js') }}"></script>
@endpush