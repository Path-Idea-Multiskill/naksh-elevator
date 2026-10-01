@extends('layouts.admin')

@section('title', 'Quote Requests')
@section('page-title', 'Quote Requests')

@push('styles')
<link
    rel="stylesheet"
    href="{{ asset(
        'assets/admin/css/quote-requests.css'
    ) }}"
>
@endpush


@section('content')

<div class="quote-page">

    {{-- HEADER --}}
    <div class="quote-page-header">

        <div>

            <span class="quote-eyebrow">
                SALES LEADS
            </span>

            <h2>
                Quote Requests
            </h2>

            <p>
                Review and manage elevator quotation
                requests received from potential customers.
            </p>

        </div>

    </div>


    {{-- STATS --}}
    <div class="quote-stats">

        <div class="quote-stat">
            <span>Total Requests</span>
            <strong>{{ $totalQuoteRequests }}</strong>
        </div>


        <div class="quote-stat new">
            <span>New</span>
            <strong>{{ $newQuoteRequests }}</strong>
        </div>


        <div class="quote-stat contacted">
            <span>Contacted</span>
            <strong>{{ $contactedQuoteRequests }}</strong>
        </div>


        <div class="quote-stat quoted">
            <span>Quoted</span>
            <strong>{{ $quotedQuoteRequests }}</strong>
        </div>


        <div class="quote-stat closed">
            <span>Closed</span>
            <strong>{{ $closedQuoteRequests }}</strong>
        </div>

    </div>


    {{-- FILTER --}}
    <form
        action="{{ route(
            'admin.quote-requests.index'
        ) }}"
        method="GET"
        id="quoteFilterForm"
        class="quote-filter"
        novalidate
    >

        <input
            type="search"
            id="quoteSearch"
            name="search"
            value="{{ request('search') }}"
            maxlength="150"
            placeholder="Search customer, phone, email or location..."
        >


        <select
            name="status"
            id="quoteStatusFilter"
        >

            <option value="">
                All Statuses
            </option>

            @foreach([
                'new' => 'New',
                'read' => 'Read',
                'contacted' => 'Contacted',
                'quoted' => 'Quoted',
                'closed' => 'Closed'
            ] as $value => $label)

                <option
                    value="{{ $value }}"
                    @selected(
                        request('status') === $value
                    )
                >
                    {{ $label }}
                </option>

            @endforeach

        </select>


        <button type="submit">
            Filter
        </button>


        @if(
            request()->filled('search') ||
            request()->filled('status')
        )

            <a
                href="{{ route(
                    'admin.quote-requests.index'
                ) }}"
            >
                Reset
            </a>

        @endif

    </form>


    @if($quoteRequests->count())


        {{-- DESKTOP TABLE --}}
        <div class="quote-table-wrapper">

            <table class="quote-table">

                <thead>

                    <tr>
                        <th>Customer</th>
                        <th>Requirement</th>
                        <th>Building</th>
                        <th>Location</th>
                        <th>Received</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>


                <tbody>

                @foreach($quoteRequests as $quote)

                    <tr
                        class="{{
                            $quote->status === 'new'
                                ? 'is-new'
                                : ''
                        }}"
                    >

                        <td>

                            <div class="quote-customer">

                                <div class="quote-avatar">

                                    {{ strtoupper(
                                        substr(
                                            $quote->name,
                                            0,
                                            1
                                        )
                                    ) }}

                                </div>


                                <div>

                                    <strong>
                                        {{ $quote->name }}
                                    </strong>

                                    <small>
                                        {{ $quote->phone }}
                                    </small>

                                </div>

                            </div>

                        </td>


                        <td>

                            <strong>
                                {{ $quote->elevatorType?->name
                                    ?? 'Not specified'
                                }}
                            </strong>

                            <small>
                                {{ $quote->floors }}
                                floor{{ $quote->floors == 1 ? '' : 's' }}

                                @if($quote->capacity)
                                    · {{ $quote->capacity }}
                                @endif
                            </small>

                        </td>


                        <td>
                            {{ $quote->building_type }}
                        </td>


                        <td>
                            {{ $quote->location }}
                        </td>


                        <td>

                            <strong>
                                {{ $quote->created_at
                                    ->format('d M Y') }}
                            </strong>

                            <small>
                                {{ $quote->created_at
                                    ->format('h:i A') }}
                            </small>

                        </td>


                        <td>

                            <span
                                class="quote-status quote-status-{{
                                    $quote->status
                                }}"
                            >
                                {{ ucfirst(
                                    $quote->status
                                ) }}
                            </span>

                        </td>


                        <td>

                            <a
                                href="{{ route(
                                    'admin.quote-requests.show',
                                    $quote
                                ) }}"
                                class="quote-view-btn"
                            >
                                View
                            </a>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>


        {{-- MOBILE --}}
        <div class="quote-mobile-list">

            @foreach($quoteRequests as $quote)

                <article
                    class="quote-mobile-card {{
                        $quote->status === 'new'
                            ? 'is-new'
                            : ''
                    }}"
                >

                    <div class="quote-mobile-top">

                        <div class="quote-customer">

                            <div class="quote-avatar">

                                {{ strtoupper(
                                    substr(
                                        $quote->name,
                                        0,
                                        1
                                    )
                                ) }}

                            </div>


                            <div>

                                <strong>
                                    {{ $quote->name }}
                                </strong>

                                <small>
                                    {{ $quote->phone }}
                                </small>

                            </div>

                        </div>


                        <span
                            class="quote-status quote-status-{{
                                $quote->status
                            }}"
                        >
                            {{ ucfirst(
                                $quote->status
                            ) }}
                        </span>

                    </div>


                    <div class="quote-mobile-details">

                        <div>
                            <span>Elevator</span>

                            <strong>
                                {{ $quote->elevatorType?->name
                                    ?? 'Not specified'
                                }}
                            </strong>
                        </div>


                        <div>
                            <span>Floors</span>

                            <strong>
                                {{ $quote->floors }}
                            </strong>
                        </div>


                        <div>
                            <span>Building</span>

                            <strong>
                                {{ $quote->building_type }}
                            </strong>
                        </div>


                        <div>
                            <span>Location</span>

                            <strong>
                                {{ $quote->location }}
                            </strong>
                        </div>

                    </div>


                    <a
                        href="{{ route(
                            'admin.quote-requests.show',
                            $quote
                        ) }}"
                        class="quote-mobile-view"
                    >
                        View Quote Request
                    </a>

                </article>

            @endforeach

        </div>


        @if($quoteRequests->hasPages())

            <div class="quote-pagination">

                {{ $quoteRequests->links() }}

            </div>

        @endif


    @else

        <div class="quote-empty">

            <div>₹</div>

            <h3>
                No Quote Requests Found
            </h3>

            <p>
                Customer quotation requests
                will appear here.
            </p>

        </div>

    @endif

</div>

@endsection


@push('scripts')
<script
    src="{{ asset(
        'assets/admin/js/quote-requests.js'
    ) }}"
></script>
@endpush