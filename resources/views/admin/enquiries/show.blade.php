@extends('layouts.admin')

@section('title', 'Enquiry Details')
@section('page-title', 'Enquiry Details')

@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/enquiries.css') }}"
>
@endpush


@section('content')

<div class="enquiry-page enquiry-show-page">

    {{-- ==========================================
         PAGE HEADER
    =========================================== --}}
    <div class="enquiry-show-header">

        <div>

            <span class="enquiry-eyebrow">
                CUSTOMER ENQUIRY
            </span>

            <h2>
                Enquiry #{{ $enquiry->id }}
            </h2>

            <p>
                Received on
                {{ $enquiry->created_at->format('d M Y') }}
                at
                {{ $enquiry->created_at->format('h:i A') }}
            </p>

        </div>


        <a
            href="{{ route('admin.enquiries.index') }}"
            class="enquiry-back-btn"
        >
            ← Back to Enquiries
        </a>

    </div>


    <div class="enquiry-show-layout">

        {{-- ======================================
             LEFT SIDE
        ======================================= --}}
        <div class="enquiry-show-main">

            {{-- CUSTOMER DETAILS --}}
            <section class="enquiry-detail-card">

                <div class="enquiry-card-header">

                    <div>
                        <span>CUSTOMER</span>
                        <h3>Contact Information</h3>
                    </div>


                    <span
                        class="enquiry-status enquiry-status-{{
                            $enquiry->status
                        }}"
                    >
                        {{ ucfirst($enquiry->status) }}
                    </span>

                </div>


                <div class="enquiry-card-body">

                    <div class="enquiry-customer-profile">

                        <div class="enquiry-profile-avatar">

                            {{ strtoupper(
                                substr(
                                    $enquiry->name,
                                    0,
                                    1
                                )
                            ) }}

                        </div>


                        <div>

                            <h3>
                                {{ $enquiry->name }}
                            </h3>

                            <span>
                                Customer Enquiry
                            </span>

                        </div>

                    </div>


                    <div class="enquiry-contact-grid">

                        <div class="enquiry-info-box">

                            <span>
                                Phone Number
                            </span>

                            <strong>
                                {{ $enquiry->phone }}
                            </strong>

                            <a
                                href="tel:{{ $enquiry->phone }}"
                            >
                                Call Customer
                            </a>

                        </div>


                        <div class="enquiry-info-box">

                            <span>
                                Email Address
                            </span>

                            @if($enquiry->email)

                                <strong>
                                    {{ $enquiry->email }}
                                </strong>

                                <a
                                    href="mailto:{{ $enquiry->email }}"
                                >
                                    Send Email
                                </a>

                            @else

                                <strong>
                                    Not provided
                                </strong>

                            @endif

                        </div>

                    </div>

                </div>

            </section>


            {{-- ENQUIRY MESSAGE --}}
            <section class="enquiry-detail-card">

                <div class="enquiry-card-header">

                    <div>
                        <span>MESSAGE</span>
                        <h3>Enquiry Details</h3>
                    </div>

                </div>


                <div class="enquiry-card-body">

                    <div class="enquiry-detail-grid">

                        <div>

                            <span>
                                Subject
                            </span>

                            <strong>
                                {{ $enquiry->subject
                                    ?: 'General Enquiry'
                                }}
                            </strong>

                        </div>


                        <div>

                            <span>
                                Service
                            </span>

                            <strong>
                                {{ $enquiry->service
                                    ?: 'Not specified'
                                }}
                            </strong>

                        </div>

                    </div>


                    <div class="enquiry-message-box">

                        <span>
                            Customer Message
                        </span>

                        <p>
                            {{ $enquiry->message }}
                        </p>

                    </div>

                </div>

            </section>


            {{-- ADMIN NOTES --}}
            <section
                class="enquiry-detail-card"
                id="adminNotesSection"
            >

                <div class="enquiry-card-header">

                    <div>
                        <span>INTERNAL</span>
                        <h3>Admin Notes</h3>
                    </div>

                </div>


                <div class="enquiry-card-body">

                    <form
                        method="POST"
                        action="{{ route(
                            'admin.enquiries.notes',
                            $enquiry
                        ) }}"
                        id="enquiryNotesForm"
                        novalidate
                    >

                        @csrf
                        @method('PATCH')


                        <div class="enquiry-field">

                            <div class="enquiry-label-row">

                                <label for="admin_notes">
                                    Notes
                                </label>

                                <span
                                    id="enquiryNotesCounter"
                                    class="enquiry-counter"
                                >
                                    0 / 2000
                                </span>

                            </div>


                            <textarea
                                name="admin_notes"
                                id="admin_notes"
                                class="enquiry-textarea"
                                rows="7"
                                maxlength="2000"
                                placeholder="Add internal follow-up notes, call details or customer requirements..."
                            >{{ old(
                                'admin_notes',
                                $enquiry->admin_notes
                            ) }}</textarea>


                            <small class="enquiry-field-help">
                                These notes are only visible
                                inside the admin panel.
                            </small>


                            <small
                                class="enquiry-client-error"
                                id="adminNotesError"
                            ></small>

                        </div>


                        <div class="enquiry-notes-actions">

                            <button
                                type="submit"
                                id="enquiryNotesSaveBtn"
                                class="enquiry-primary-btn"
                            >
                                Save Notes
                            </button>

                        </div>

                    </form>

                </div>

            </section>

        </div>


        {{-- ======================================
             RIGHT SIDE
        ======================================= --}}
        <aside class="enquiry-show-sidebar">

            {{-- STATUS --}}
            <section class="enquiry-side-card">

                <div class="enquiry-side-card-header">

                    <span>WORKFLOW</span>

                    <h3>
                        Enquiry Status
                    </h3>

                </div>


                <div class="enquiry-side-card-body">

                    <form
                        method="POST"
                        action="{{ route(
                            'admin.enquiries.status',
                            $enquiry
                        ) }}"
                        id="enquiryStatusForm"
                        novalidate
                    >

                        @csrf
                        @method('PATCH')


                        <div class="enquiry-field">

                            <label for="enquiryStatus">
                                Current Status
                            </label>


                            <select
                                name="status"
                                id="enquiryStatus"
                                class="enquiry-select"
                            >

                                <option
                                    value="new"
                                    @selected(
                                        $enquiry->status === 'new'
                                    )
                                >
                                    New
                                </option>

                                <option
                                    value="read"
                                    @selected(
                                        $enquiry->status === 'read'
                                    )
                                >
                                    Read
                                </option>

                                <option
                                    value="contacted"
                                    @selected(
                                        $enquiry->status === 'contacted'
                                    )
                                >
                                    Contacted
                                </option>

                                <option
                                    value="closed"
                                    @selected(
                                        $enquiry->status === 'closed'
                                    )
                                >
                                    Closed
                                </option>

                            </select>


                            <small
                                class="enquiry-client-error"
                                id="enquiryStatusError"
                            ></small>

                        </div>


                        <button
                            type="submit"
                            id="enquiryStatusSaveBtn"
                            class="enquiry-primary-btn enquiry-full-btn"
                        >
                            Update Status
                        </button>

                    </form>

                </div>

            </section>


            {{-- TIMELINE --}}
            <section class="enquiry-side-card">

                <div class="enquiry-side-card-header">

                    <span>ACTIVITY</span>

                    <h3>
                        Enquiry Information
                    </h3>

                </div>


                <div class="enquiry-side-card-body">

                    <div class="enquiry-meta-list">

                        <div>

                            <span>
                                Enquiry ID
                            </span>

                            <strong>
                                #{{ $enquiry->id }}
                            </strong>

                        </div>


                        <div>

                            <span>
                                Received
                            </span>

                            <strong>
                                {{ $enquiry->created_at
                                    ->format('d M Y, h:i A') }}
                            </strong>

                        </div>


                        <div>

                            <span>
                                First Read
                            </span>

                            <strong>
                                {{ $enquiry->read_at
                                    ? $enquiry->read_at
                                        ->format('d M Y, h:i A')
                                    : 'Not read yet'
                                }}
                            </strong>

                        </div>


                        <div>

                            <span>
                                Last Updated
                            </span>

                            <strong>
                                {{ $enquiry->updated_at
                                    ->format('d M Y, h:i A') }}
                            </strong>

                        </div>

                    </div>

                </div>

            </section>


            {{-- DELETE --}}
            <section class="enquiry-side-card enquiry-danger-card">

                <div class="enquiry-side-card-header">

                    <span>DANGER ZONE</span>

                    <h3>
                        Delete Enquiry
                    </h3>

                </div>


                <div class="enquiry-side-card-body">

                    <p class="enquiry-danger-text">
                        Permanently remove this enquiry
                        from the admin panel.
                    </p>


                    <form
                        method="POST"
                        action="{{ route(
                            'admin.enquiries.destroy',
                            $enquiry
                        ) }}"
                        id="enquiryDeleteForm"
                    >

                        @csrf
                        @method('DELETE')


                        <button
                            type="submit"
                            class="enquiry-delete-btn"
                        >
                            Delete Enquiry
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
    src="{{ asset('assets/admin/js/enquiries.js') }}"
></script>
@endpush