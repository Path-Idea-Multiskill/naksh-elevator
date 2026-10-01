@extends('layouts.admin')

@section('title', 'Quote Request Details')
@section('page-title', 'Quote Request Details')

@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/quote-requests.css') }}"
>
@endpush


@section('content')

<div class="quote-page quote-show-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="quote-show-header">

        <div>

            <span class="quote-eyebrow">
                SALES LEAD
            </span>

            <h2>
                Quote Request #{{ $quoteRequest->id }}
            </h2>

            <p>
                Received on
                {{ $quoteRequest->created_at->format('d M Y') }}
                at
                {{ $quoteRequest->created_at->format('h:i A') }}
            </p>

        </div>


        <a
            href="{{ route('admin.quote-requests.index') }}"
            class="quote-back-btn"
        >
            ← Back to Quote Requests
        </a>

    </div>


    <div class="quote-show-layout">

        {{-- =================================================
             LEFT CONTENT
        ================================================== --}}
        <div class="quote-show-main">


            {{-- CUSTOMER INFORMATION --}}
            <section class="quote-detail-card">

                <div class="quote-card-header">

                    <div>

                        <span>
                            CUSTOMER
                        </span>

                        <h3>
                            Contact Information
                        </h3>

                    </div>


                    <span
                        class="quote-status quote-status-{{
                            $quoteRequest->status
                        }}"
                    >
                        {{ ucfirst($quoteRequest->status) }}
                    </span>

                </div>


                <div class="quote-card-body">

                    <div class="quote-customer-profile">

                        <div class="quote-profile-avatar">

                            {{ strtoupper(
                                substr(
                                    $quoteRequest->name,
                                    0,
                                    1
                                )
                            ) }}

                        </div>


                        <div>

                            <h3>
                                {{ $quoteRequest->name }}
                            </h3>

                            <span>
                                Quotation Lead
                            </span>

                        </div>

                    </div>


                    <div class="quote-contact-grid">

                        {{-- PHONE --}}
                        <div class="quote-info-box">

                            <span>
                                Phone Number
                            </span>

                            <strong>
                                {{ $quoteRequest->phone }}
                            </strong>

                            <a
                                href="tel:{{ $quoteRequest->phone }}"
                            >
                                Call Customer
                            </a>

                        </div>


                        {{-- EMAIL --}}
                        <div class="quote-info-box">

                            <span>
                                Email Address
                            </span>

                            @if($quoteRequest->email)

                                <strong>
                                    {{ $quoteRequest->email }}
                                </strong>

                                <a
                                    href="mailto:{{ $quoteRequest->email }}"
                                >
                                    Send Email
                                </a>

                            @else

                                <strong>
                                    Not provided
                                </strong>

                            @endif

                        </div>


                        {{-- LOCATION --}}
                        <div class="quote-info-box quote-info-full">

                            <span>
                                Project Location
                            </span>

                            <strong>
                                {{ $quoteRequest->location }}
                            </strong>

                        </div>

                    </div>

                </div>

            </section>


            {{-- =================================================
                 ELEVATOR REQUIREMENT
            ================================================== --}}
            <section class="quote-detail-card">

                <div class="quote-card-header">

                    <div>

                        <span>
                            REQUIREMENT
                        </span>

                        <h3>
                            Elevator Requirement
                        </h3>

                    </div>

                </div>


                <div class="quote-card-body">

                    <div class="quote-requirement-grid">


                        <div class="quote-requirement-item">

                            <span>
                                Building Type
                            </span>

                            <strong>
                                {{ $quoteRequest->building_type }}
                            </strong>

                        </div>


                        <div class="quote-requirement-item">

                            <span>
                                Elevator Type
                            </span>

                            <strong>
                                {{ $quoteRequest->elevatorType?->name
                                    ?? 'Not specified'
                                }}
                            </strong>

                        </div>


                        <div class="quote-requirement-item">

                            <span>
                                Number of Floors
                            </span>

                            <strong>
                                {{ $quoteRequest->floors }}
                            </strong>

                        </div>


                        <div class="quote-requirement-item">

                            <span>
                                Required Capacity
                            </span>

                            <strong>
                                {{ $quoteRequest->capacity
                                    ?: 'Not specified'
                                }}
                            </strong>

                        </div>


                        <div class="quote-requirement-item">

                            <span>
                                Project Stage
                            </span>

                            <strong>
                                {{ $quoteRequest->project_stage
                                    ?: 'Not specified'
                                }}
                            </strong>

                        </div>


                        <div class="quote-requirement-item">

                            <span>
                                Current Status
                            </span>

                            <strong>
                                {{ ucfirst(
                                    $quoteRequest->status
                                ) }}
                            </strong>

                        </div>

                    </div>

                </div>

            </section>


            {{-- =================================================
                 CUSTOMER MESSAGE
            ================================================== --}}

            @if($quoteRequest->message)

                <section class="quote-detail-card">

                    <div class="quote-card-header">

                        <div>

                            <span>
                                MESSAGE
                            </span>

                            <h3>
                                Customer Message
                            </h3>

                        </div>

                    </div>


                    <div class="quote-card-body">

                        <div class="quote-message-box">

                            <p>
                                {{ $quoteRequest->message }}
                            </p>

                        </div>

                    </div>

                </section>

            @endif


            {{-- =================================================
                 ADMIN NOTES
            ================================================== --}}
            <section
                class="quote-detail-card"
                id="quoteAdminNotesSection"
            >

                <div class="quote-card-header">

                    <div>

                        <span>
                            INTERNAL
                        </span>

                        <h3>
                            Admin Notes
                        </h3>

                    </div>

                </div>


                <div class="quote-card-body">

                    <form
                        method="POST"
                        action="{{ route(
                            'admin.quote-requests.notes',
                            $quoteRequest
                        ) }}"
                        id="quoteNotesForm"
                        novalidate
                    >

                        @csrf
                        @method('PATCH')


                        <div class="quote-field">

                            <div class="quote-label-row">

                                <label for="quoteAdminNotes">
                                    Notes
                                </label>


                                <span
                                    id="quoteNotesCounter"
                                    class="quote-counter"
                                >
                                    0 / 2000
                                </span>

                            </div>


                            <textarea
                                name="admin_notes"
                                id="quoteAdminNotes"
                                class="quote-textarea"
                                rows="7"
                                maxlength="2000"
                                placeholder="Add customer discussion, site visit details, quotation notes or follow-up information..."
                            >{{ old(
                                'admin_notes',
                                $quoteRequest->admin_notes
                            ) }}</textarea>


                            <small class="quote-field-help">
                                Internal note. This information
                                is not shown to the customer.
                            </small>


                            <small
                                id="quoteNotesError"
                                class="quote-client-error"
                            ></small>

                        </div>


                        <div class="quote-notes-actions">

                            <button
                                type="submit"
                                id="quoteNotesSaveBtn"
                                class="quote-primary-btn"
                            >
                                Save Notes
                            </button>

                        </div>

                    </form>

                </div>

            </section>

        </div>


        {{-- =================================================
             RIGHT SIDEBAR
        ================================================== --}}
        <aside class="quote-show-sidebar">


            {{-- STATUS MANAGEMENT --}}
            <section class="quote-side-card">

                <div class="quote-side-header">

                    <span>
                        WORKFLOW
                    </span>

                    <h3>
                        Quote Status
                    </h3>

                </div>


                <div class="quote-side-body">

                    <form
                        method="POST"
                        action="{{ route(
                            'admin.quote-requests.status',
                            $quoteRequest
                        ) }}"
                        id="quoteStatusForm"
                        novalidate
                    >

                        @csrf
                        @method('PATCH')


                        <div class="quote-field">

                            <label for="quoteStatus">
                                Current Status
                            </label>


                            <select
                                name="status"
                                id="quoteStatus"
                                class="quote-select"
                            >

                                <option
                                    value="new"
                                    @selected(
                                        $quoteRequest->status === 'new'
                                    )
                                >
                                    New
                                </option>


                                <option
                                    value="read"
                                    @selected(
                                        $quoteRequest->status === 'read'
                                    )
                                >
                                    Read
                                </option>


                                <option
                                    value="contacted"
                                    @selected(
                                        $quoteRequest->status === 'contacted'
                                    )
                                >
                                    Contacted
                                </option>


                                <option
                                    value="quoted"
                                    @selected(
                                        $quoteRequest->status === 'quoted'
                                    )
                                >
                                    Quoted
                                </option>


                                <option
                                    value="closed"
                                    @selected(
                                        $quoteRequest->status === 'closed'
                                    )
                                >
                                    Closed
                                </option>

                            </select>


                            <small
                                id="quoteStatusError"
                                class="quote-client-error"
                            ></small>

                        </div>


                        <button
                            type="submit"
                            id="quoteStatusSaveBtn"
                            class="quote-primary-btn quote-full-btn"
                        >
                            Update Status
                        </button>

                    </form>

                </div>

            </section>


            {{-- REQUEST INFORMATION --}}
            <section class="quote-side-card">

                <div class="quote-side-header">

                    <span>
                        ACTIVITY
                    </span>

                    <h3>
                        Request Information
                    </h3>

                </div>


                <div class="quote-side-body">

                    <div class="quote-meta-list">

                        <div>

                            <span>
                                Request ID
                            </span>

                            <strong>
                                #{{ $quoteRequest->id }}
                            </strong>

                        </div>


                        <div>

                            <span>
                                Received
                            </span>

                            <strong>
                                {{ $quoteRequest->created_at
                                    ->format(
                                        'd M Y, h:i A'
                                    )
                                }}
                            </strong>

                        </div>


                        <div>

                            <span>
                                First Read
                            </span>

                            <strong>
                                {{ $quoteRequest->read_at
                                    ? $quoteRequest->read_at
                                        ->format(
                                            'd M Y, h:i A'
                                        )
                                    : 'Not read yet'
                                }}
                            </strong>

                        </div>


                        <div>

                            <span>
                                Last Updated
                            </span>

                            <strong>
                                {{ $quoteRequest->updated_at
                                    ->format(
                                        'd M Y, h:i A'
                                    )
                                }}
                            </strong>

                        </div>

                    </div>

                </div>

            </section>


            {{-- WORKFLOW GUIDE --}}
            <section class="quote-side-card">

                <div class="quote-side-header">

                    <span>
                        PROCESS
                    </span>

                    <h3>
                        Lead Workflow
                    </h3>

                </div>


                <div class="quote-side-body">

                    <div class="quote-workflow">

                        <div>
                            <span>1</span>
                            <p>
                                <strong>New</strong>
                                New quote request received.
                            </p>
                        </div>


                        <div>
                            <span>2</span>
                            <p>
                                <strong>Read</strong>
                                Request reviewed by admin.
                            </p>
                        </div>


                        <div>
                            <span>3</span>
                            <p>
                                <strong>Contacted</strong>
                                Customer contacted.
                            </p>
                        </div>


                        <div>
                            <span>4</span>
                            <p>
                                <strong>Quoted</strong>
                                Quotation shared.
                            </p>
                        </div>


                        <div>
                            <span>5</span>
                            <p>
                                <strong>Closed</strong>
                                Lead process completed.
                            </p>
                        </div>

                    </div>

                </div>

            </section>


            {{-- DELETE --}}
            <section class="quote-side-card quote-danger-card">

                <div class="quote-side-header">

                    <span>
                        DANGER ZONE
                    </span>

                    <h3>
                        Delete Request
                    </h3>

                </div>


                <div class="quote-side-body">

                    <p class="quote-danger-text">
                        Permanently remove this quote
                        request from the system.
                    </p>


                    <form
                        method="POST"
                        action="{{ route(
                            'admin.quote-requests.destroy',
                            $quoteRequest
                        ) }}"
                        id="quoteDeleteForm"
                    >

                        @csrf
                        @method('DELETE')


                        <button
                            type="submit"
                            class="quote-delete-btn"
                        >
                            Delete Quote Request
                        </button>

                    </form>

                </div>

            </section>

        </aside>

    </div>

</div>

@endsection


@push('scripts')
<script
    src="{{ asset('assets/admin/js/quote-requests.js') }}"
></script>
@endpush