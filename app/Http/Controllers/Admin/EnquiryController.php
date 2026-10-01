<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Enquiry::query()
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
                        'subject',
                        'like',
                        "%{$search}%"
                    );
                }
            );
        }


        $enquiries = $query
            ->paginate(15)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalEnquiries =
            Enquiry::count();

        $newEnquiries =
            Enquiry::where(
                'status',
                'new'
            )->count();

        $contactedEnquiries =
            Enquiry::where(
                'status',
                'contacted'
            )->count();

        $closedEnquiries =
            Enquiry::where(
                'status',
                'closed'
            )->count();


        return view(
            'admin.enquiries.index',
            compact(
                'enquiries',
                'totalEnquiries',
                'newEnquiries',
                'contactedEnquiries',
                'closedEnquiries'
            )
        );
    }


    public function show(Enquiry $enquiry)
    {
        /*
         * Opening a new enquiry automatically
         * marks it as read.
         */

        if ($enquiry->status === 'new') {

            $enquiry->update([
                'status' => 'read',
                'read_at' => now(),
            ]);
        }


        return view(
            'admin.enquiries.show',
            compact('enquiry')
        );
    }


    public function updateStatus(
        Request $request,
        Enquiry $enquiry
    ) {
        $validated =
            $request->validate([

                'status' => [
                    'required',
                    'in:new,read,contacted,closed',
                ],

            ]);


        $enquiry->update([
            'status' => $validated['status'],

            'read_at' =>
                $validated['status'] === 'new'
                    ? null
                    : (
                        $enquiry->read_at
                        ?? now()
                    ),
        ]);


        return back()->with(
            'success',
            'Enquiry status updated successfully.'
        );
    }


    public function updateNotes(
        Request $request,
        Enquiry $enquiry
    ) {
        $validated =
            $request->validate([

                'admin_notes' => [
                    'nullable',
                    'string',
                    'max:2000',
                ],

            ]);


        $enquiry->update([
            'admin_notes' =>
                $validated['admin_notes']
                ?? null,
        ]);


        return back()->with(
            'success',
            'Admin notes updated successfully.'
        );
    }


    public function destroy(
        Enquiry $enquiry
    ) {
        $enquiry->delete();


        return redirect()
            ->route('admin.enquiries.index')
            ->with(
                'success',
                'Enquiry deleted successfully.'
            );
    }
}