<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ElevatorType;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuoteController extends Controller
{
    public function index()
    {
        $elevatorTypes = ElevatorType::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'frontend.quote.index',
            compact('elevatorTypes')
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'location' => [
                'required',
                'string',
                'max:255',
            ],

            'building_type' => [
                'required',
                'string',
                'max:100',
            ],

            'elevator_type_id' => [
                'required',
                'integer',

                Rule::exists(
                    'elevator_types',
                    'id'
                )->where(
                    fn ($query) =>
                        $query->where(
                            'status',
                            true
                        )
                ),
            ],

            'floors' => [
                'required',
                'integer',
                'min:1',
                'max:200',
            ],

            'capacity' => [
                'nullable',
                'string',
                'max:100',
            ],

            'project_stage' => [
                'required',
                'string',
                'max:100',
            ],

            'message' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ]);


        QuoteRequest::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'location' => $validated['location'],
            'building_type' => $validated['building_type'],
            'elevator_type_id' => $validated['elevator_type_id'],
            'floors' => $validated['floors'],
            'capacity' => $validated['capacity'] ?? null,
            'project_stage' => $validated['project_stage'],
            'message' => $validated['message'] ?? null,
            'status' => 'new',
            'admin_notes' => null,
            'read_at' => null,
        ]);


        return redirect()
            ->route('quote.index')
            ->with(
                'success',
                'Thank you! Your quote request has been submitted successfully. Our team will contact you soon.'
            );
    }
}