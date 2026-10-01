@extends('layouts.admin')

@section('title', 'Elevator Types')

@section('page-title', 'Elevator Types')

@section(
    'page-description',
    'Manage elevator solutions offered by Naksh Elevator'
)

@section('content')

    <div class="module-page">

        <div class="module-heading">

            <div>
                <h2>Elevator Types</h2>

                <p>
                    Add, update and manage all elevator solutions.
                </p>
            </div>

            <a href="{{ route('admin.elevator-types.create') }}" class="primary-btn">
                <span>+</span>
                Add Elevator
            </a>

        </div>


        <div class="data-card">

            {{-- DESKTOP / TABLET TABLE --}}

            <div class="table-wrapper">

                <table class="admin-table">

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Elevator</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Updated</th>
                            <th class="action-heading">
                                Actions
                            </th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($elevatorTypes as $elevator)

                                            <tr>

                                                <td>
                                                    {{ $elevatorTypes->firstItem() + $loop->index }}
                                                </td>


                                                <td>

                                                    <div class="elevator-info">

                                                        <div class="elevator-thumb">

                                                            @if($elevator->image)

                                                                <img src="{{ asset('storage/' . $elevator->image) }}" alt="{{ $elevator->name }}">

                                                            @else

                                                                <span>↕</span>

                                                            @endif

                                                        </div>


                                                        <div>

                                                            <strong>
                                                                {{ $elevator->name }}
                                                            </strong>

                                                            <small>
                                                                {{ \Illuminate\Support\Str::limit(
                                $elevator->short_description,
                                55
                            ) }}
                                                            </small>

                                                        </div>

                                                    </div>

                                                </td>


                                                <td>
                                                    {{ $elevator->sort_order }}
                                                </td>


                                                <td>

                                                    <form method="POST" action="{{ route(
                                'admin.elevator-types.toggle-status',
                                $elevator
                            ) }}" class="status-form">

                                                        @csrf
                                                        @method('PATCH')


                                                        <button type="submit" class="status-toggle
                                {{ $elevator->status
                                ? 'is-active'
                                : 'is-inactive' }}" title="Click to change status">

                                                            <span class="status-dot"></span>

                                                            {{ $elevator->status
                                ? 'Active'
                                : 'Inactive' }}

                                                        </button>

                                                    </form>

                                                </td>


                                                <td>
                                                    {{ $elevator->updated_at->format('d M Y') }}
                                                </td>


                                                <td>

                                                    <div class="action-buttons">

                                                        <a href="{{ route(
                                'admin.elevator-types.show',
                                $elevator
                            ) }}" class="action-btn view">
                                                            View
                                                        </a>


                                                        <a href="{{ route(
                                'admin.elevator-types.edit',
                                $elevator
                            ) }}" class="action-btn edit">
                                                            Edit
                                                        </a>


                                                        <form method="POST" action="{{ route(
                                'admin.elevator-types.destroy',
                                $elevator
                            ) }}" onsubmit="
                                                                return confirm(
                                                                    'Are you sure you want to delete this elevator?'
                                                                )
                                                            ">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="action-btn delete">
                                                                Delete
                                                            </button>

                                                        </form>

                                                    </div>

                                                </td>

                                            </tr>


                        @empty

                                            <tr>

                                                <td colspan="6" class="empty-table">

                                                    No elevator types added yet.

                                                    <a href="{{ route(
                                'admin.elevator-types.create'
                            ) }}">
                                                        Add your first elevator
                                                    </a>

                                                </td>

                                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- MOBILE CARDS --}}

            <div class="mobile-data-list">

                @foreach($elevatorTypes as $elevator)

                            <article class="mobile-data-card">

                                <div class="mobile-card-top">

                                    <div class="elevator-thumb">

                                        @if($elevator->image)

                                                            <img src="{{ asset(
                                                'storage/' . $elevator->image
                                            ) }}" alt="{{ $elevator->name }}">

                                        @else

                                            <span>↕</span>

                                        @endif

                                    </div>


                                    <div class="mobile-card-title">

                                        <h3>
                                            {{ $elevator->name }}
                                        </h3>

                                        @if($elevator->status)

                                            <span class="status-badge active">
                                                Active
                                            </span>

                                        @else

                                            <span class="status-badge inactive">
                                                Inactive
                                            </span>

                                        @endif

                                    </div>

                                </div>


                                <div class="mobile-meta">

                                    <div>
                                        <span>Display Order</span>
                                        <strong>
                                            {{ $elevator->sort_order }}
                                        </strong>
                                    </div>

                                    <div>
                                        <span>Updated</span>
                                        <strong>
                                            {{ $elevator->updated_at->format('d M Y') }}
                                        </strong>
                                    </div>

                                </div>


                                <div class="mobile-actions">

                                    <a href="{{ route(
                        'admin.elevator-types.show',
                        $elevator
                    ) }}" class="action-btn view">
                                        View
                                    </a>

                                    <a href="{{ route(
                        'admin.elevator-types.edit',
                        $elevator
                    ) }}" class="action-btn edit">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route(
                        'admin.elevator-types.destroy',
                        $elevator
                    ) }}" onsubmit="
                                                return confirm(
                                                    'Are you sure you want to delete this elevator?'
                                                )
                                            ">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="action-btn delete">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </article>

                @endforeach

            </div>

        </div>


        @if($elevatorTypes->hasPages())

            <div class="pagination-area">
                {{ $elevatorTypes->links() }}
            </div>

        @endif

    </div>

@endsection