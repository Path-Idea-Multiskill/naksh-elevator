@extends('layouts.admin')

@section('title', 'Enquiries')
@section('page-title', 'Enquiries')


@push('styles')
<link
    rel="stylesheet"
    href="{{ asset('assets/admin/css/enquiries.css') }}"
>
@endpush


@section('content')

<div class="enquiry-page">

    {{-- HEADER --}}

    <div class="enquiry-page-header">

        <div>

            <span class="enquiry-eyebrow">
                CUSTOMER COMMUNICATION
            </span>

            <h2>
                Enquiries
            </h2>

            <p>
                View and manage enquiries received
                from the Naksh Elevator website.
            </p>

        </div>

    </div>


    {{-- STATS --}}

    <div class="enquiry-stats">

        <div class="enquiry-stat">

            <span>Total Enquiries</span>

            <strong>
                {{ $totalEnquiries }}
            </strong>

        </div>


        <div class="enquiry-stat new">

            <span>New</span>

            <strong>
                {{ $newEnquiries }}
            </strong>

        </div>


        <div class="enquiry-stat contacted">

            <span>Contacted</span>

            <strong>
                {{ $contactedEnquiries }}
            </strong>

        </div>


        <div class="enquiry-stat closed">

            <span>Closed</span>

            <strong>
                {{ $closedEnquiries }}
            </strong>

        </div>

    </div>


    {{-- SEARCH + FILTER --}}

    <form
        method="GET"
        action="{{ route('admin.enquiries.index') }}"
        class="enquiry-filter"
        id="enquiryFilterForm"
    >

        <div class="enquiry-search">

            <input
                type="search"
                name="search"
                id="enquirySearch"
                value="{{ request('search') }}"
                placeholder="Search name, phone, email or subject..."
                maxlength="150"
            >

        </div>


        <select
            name="status"
            id="enquiryStatusFilter"
        >

            <option value="">
                All Statuses
            </option>

            <option
                value="new"
                @selected(request('status') === 'new')
            >
                New
            </option>

            <option
                value="read"
                @selected(request('status') === 'read')
            >
                Read
            </option>

            <option
                value="contacted"
                @selected(request('status') === 'contacted')
            >
                Contacted
            </option>

            <option
                value="closed"
                @selected(request('status') === 'closed')
            >
                Closed
            </option>

        </select>


        <button
            type="submit"
            class="enquiry-filter-btn"
        >
            Filter
        </button>


        @if(
            request()->filled('search') ||
            request()->filled('status')
        )

            <a
                href="{{ route('admin.enquiries.index') }}"
                class="enquiry-reset-btn"
            >
                Reset
            </a>

        @endif

    </form>


    @if($enquiries->count())


        {{-- DESKTOP TABLE --}}

        <div class="enquiry-table-wrapper">

            <table class="enquiry-table">

                <thead>

                    <tr>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Subject / Service</th>
                        <th>Received</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($enquiries as $enquiry)

                        <tr
                            class="{{
                                $enquiry->status === 'new'
                                    ? 'is-new'
                                    : ''
                            }}"
                        >

                            <td>

                                <div class="enquiry-customer">

                                    <div class="enquiry-avatar">
                                        {{ strtoupper(
                                            substr(
                                                $enquiry->name,
                                                0,
                                                1
                                            )
                                        ) }}
                                    </div>

                                    <div>

                                        <strong>
                                            {{ $enquiry->name }}
                                        </strong>

                                        <small>
                                            #{{ $enquiry->id }}
                                        </small>

                                    </div>

                                </div>

                            </td>


                            <td>

                                <strong class="enquiry-phone">
                                    {{ $enquiry->phone }}
                                </strong>

                                @if($enquiry->email)

                                    <small class="enquiry-email">
                                        {{ $enquiry->email }}
                                    </small>

                                @endif

                            </td>


                            <td>

                                <strong class="enquiry-subject">
                                    {{ $enquiry->subject ?: 'General Enquiry' }}
                                </strong>

                                @if($enquiry->service)

                                    <small>
                                        {{ $enquiry->service }}
                                    </small>

                                @endif

                            </td>


                            <td>

                                <span class="enquiry-date">
                                    {{ $enquiry->created_at
                                        ->format('d M Y') }}
                                </span>

                                <small>
                                    {{ $enquiry->created_at
                                        ->format('h:i A') }}
                                </small>

                            </td>


                            <td>

                                <span
                                    class="enquiry-status enquiry-status-{{
                                        $enquiry->status
                                    }}"
                                >
                                    {{ ucfirst(
                                        $enquiry->status
                                    ) }}
                                </span>

                            </td>


                            <td>

                                <a
                                    href="{{ route(
                                        'admin.enquiries.show',
                                        $enquiry
                                    ) }}"
                                    class="enquiry-view-btn"
                                >
                                    View
                                </a>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        {{-- MOBILE CARDS --}}

        <div class="enquiry-mobile-list">

            @foreach($enquiries as $enquiry)

                <article
                    class="enquiry-mobile-card {{
                        $enquiry->status === 'new'
                            ? 'is-new'
                            : ''
                    }}"
                >

                    <div class="enquiry-mobile-top">

                        <div class="enquiry-customer">

                            <div class="enquiry-avatar">

                                {{ strtoupper(
                                    substr(
                                        $enquiry->name,
                                        0,
                                        1
                                    )
                                ) }}

                            </div>


                            <div>

                                <strong>
                                    {{ $enquiry->name }}
                                </strong>

                                <small>
                                    {{ $enquiry->created_at
                                        ->format('d M Y, h:i A') }}
                                </small>

                            </div>

                        </div>


                        <span
                            class="enquiry-status enquiry-status-{{
                                $enquiry->status
                            }}"
                        >
                            {{ ucfirst(
                                $enquiry->status
                            ) }}
                        </span>

                    </div>


                    <div class="enquiry-mobile-details">

                        <div>
                            <span>Phone</span>
                            <strong>
                                {{ $enquiry->phone }}
                            </strong>
                        </div>


                        <div>
                            <span>Subject</span>
                            <strong>
                                {{ $enquiry->subject ?: 'General Enquiry' }}
                            </strong>
                        </div>

                    </div>


                    <a
                        href="{{ route(
                            'admin.enquiries.show',
                            $enquiry
                        ) }}"
                        class="enquiry-mobile-view"
                    >
                        View Enquiry
                    </a>

                </article>

            @endforeach

        </div>


        @if($enquiries->hasPages())

            <div class="enquiry-pagination">
                {{ $enquiries->links() }}
            </div>

        @endif


    @else

        <div class="enquiry-empty">

            <div class="enquiry-empty-icon">
                ✉
            </div>

            <h3>
                No Enquiries Found
            </h3>

            <p>
                Website enquiries will appear here
                when customers contact Naksh Elevator.
            </p>

        </div>

    @endif

</div>

@endsection


@push('scripts')
<script
    src="{{ asset('assets/admin/js/enquiries.js') }}"
></script>
@endpush