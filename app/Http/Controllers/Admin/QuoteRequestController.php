<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = QuoteRequest::with('elevatorType')
            ->latest();


        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('status') &&
            in_array(
                $request->status,
                [
                    'new',
                    'read',
                    'contacted',
                    'quoted',
                    'closed',
                ],
                true
            )
        ) {
            $query->where(
                'status',
                $request->status
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search =
                trim($request->search);


            $query->where(
                function ($q) use ($search) {

                    $q->where(
                        'name',
                        'like',
                        "%{$search}%"
                    )
                    ->orWhere(
                        'phone',
                        'like',
                        "%{$search}%"
                    )
                    ->orWhere(
                        'email',
                        'like',
                        "%{$search}%"
                    )
                    ->orWhere(
                        'location',
                        'like',
                        "%{$search}%"
                    );
                }
            );
        }


        $quoteRequests =
            $query
                ->paginate(15)
                ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalQuoteRequests =
            QuoteRequest::count();

        $newQuoteRequests =
            QuoteRequest::where(
                'status',
                'new'
            )->count();

        $contactedQuoteRequests =
            QuoteRequest::where(
                'status',
                'contacted'
            )->count();

        $quotedQuoteRequests =
            QuoteRequest::where(
                'status',
                'quoted'
            )->count();

        $closedQuoteRequests =
            QuoteRequest::where(
                'status',
                'closed'
            )->count();


        return view(
            'admin.quote-requests.index',
            compact(
                'quoteRequests',
                'totalQuoteRequests',
                'newQuoteRequests',
                'contactedQuoteRequests',
                'quotedQuoteRequests',
                'closedQuoteRequests'
            )
        );
    }


    public function show(
        QuoteRequest $quoteRequest
    ) {
        /*
         * First opening converts New → Read
         */

        if ($quoteRequest->status === 'new') {

            $quoteRequest->update([
                'status' => 'read',
                'read_at' => now(),
            ]);
        }


        $quoteRequest->load(
            'elevatorType'
        );


        return view(
            'admin.quote-requests.show',
            compact('quoteRequest')
        );
    }


    public function updateStatus(
        Request $request,
        QuoteRequest $quoteRequest
    ) {
        $validated =
            $request->validate([

                'status' => [
                    'required',
                    'in:new,read,contacted,quoted,closed',
                ],

            ]);


        $quoteRequest->update([

            'status' =>
                $validated['status'],

            'read_at' =>
                $validated['status'] === 'new'
                    ? null
                    : (
                        $quoteRequest->read_at
                        ?? now()
                    ),

        ]);


        return back()->with(
            'success',
            'Quote request status updated successfully.'
        );
    }


    public function updateNotes(
        Request $request,
        QuoteRequest $quoteRequest
    ) {
        $validated =
            $request->validate([

                'admin_notes' => [
                    'nullable',
                    'string',
                    'max:2000',
                ],

            ]);


        $quoteRequest->update([

            'admin_notes' =>
                $validated['admin_notes']
                ?? null,

        ]);


        return back()->with(
            'success',
            'Quote request notes updated successfully.'
        );
    }


    public function destroy(
        QuoteRequest $quoteRequest
    ) {
        $quoteRequest->delete();


        return redirect()
            ->route(
                'admin.quote-requests.index'
            )
            ->with(
                'success',
                'Quote request deleted successfully.'
            );
    }
}