<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ElevatorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ElevatorTypeController extends Controller
{
    /**
     * Display all elevator types.
     */
    public function index()
    {
        $elevatorTypes = ElevatorType::orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10);

        return view(
            'admin.elevator-types.index',
            compact('elevatorTypes')
        );
    }


    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.elevator-types.create');
    }


    /**
     * Store new elevator.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:elevator_types,name',
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'features' => [
                'nullable',
                'array',
            ],

            'features.*' => [
                'nullable',
                'string',
                'max:255',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'status' => [
                'required',
                'boolean',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Generate unique slug
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($validated['name']);

        $slug = $baseSlug;

        $counter = 1;

        while (
            ElevatorType::where('slug', $slug)->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;


        /*
        |--------------------------------------------------------------------------
        | Remove empty features
        |--------------------------------------------------------------------------
        */

        $validated['features'] = array_values(
            array_filter(
                $validated['features'] ?? [],
                fn($feature) => filled($feature)
            )
        );


        /*
        |--------------------------------------------------------------------------
        | Upload image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $validated['image'] =
                $request->file('image')
                    ->store('elevators', 'public');
        }


        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        ElevatorType::create($validated);


        return redirect()
            ->route('admin.elevator-types.index')
            ->with(
                'success',
                'Elevator type added successfully.'
            );
    }


    /**
     * Display single elevator.
     */
    public function show(ElevatorType $elevatorType)
    {
        return view(
            'admin.elevator-types.show',
            compact('elevatorType')
        );
    }


    /**
     * Show edit form.
     */
    public function edit(ElevatorType $elevatorType)
    {
        return view(
            'admin.elevator-types.edit',
            compact('elevatorType')
        );
    }


    /**
     * Update elevator.
     */
    public function update(
        Request $request,
        ElevatorType $elevatorType
    ) {

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:elevator_types,name,' .
                $elevatorType->id,
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'features' => [
                'nullable',
                'array',
            ],

            'features.*' => [
                'nullable',
                'string',
                'max:255',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'status' => [
                'required',
                'boolean',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($validated['name']);

        $slug = $baseSlug;

        $counter = 1;

        while (
            ElevatorType::where('slug', $slug)
                ->where('id', '!=', $elevatorType->id)
                ->exists()
        ) {

            $slug = $baseSlug . '-' . $counter;

            $counter++;
        }

        $validated['slug'] = $slug;


        /*
        |--------------------------------------------------------------------------
        | Features
        |--------------------------------------------------------------------------
        */

        $validated['features'] = array_values(
            array_filter(
                $validated['features'] ?? [],
                fn($feature) => filled($feature)
            )
        );


        /*
        |--------------------------------------------------------------------------
        | Replace image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            if (
                $elevatorType->image &&
                Storage::disk('public')
                    ->exists($elevatorType->image)
            ) {

                Storage::disk('public')
                    ->delete($elevatorType->image);
            }


            $validated['image'] =
                $request->file('image')
                    ->store('elevators', 'public');
        }


        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        $elevatorType->update($validated);


        return redirect()
            ->route('admin.elevator-types.index')
            ->with(
                'success',
                'Elevator type updated successfully.'
            );
    }


    public function toggleStatus(
        ElevatorType $elevatorType
    ) {
        $elevatorType->update([
            'status' => !$elevatorType->status,
        ]);


        return back()->with(
            'success',
            $elevatorType->status
            ? 'Elevator activated successfully.'
            : 'Elevator deactivated successfully.'
        );
    }

    /**
     * Delete elevator.
     */
    public function destroy(ElevatorType $elevatorType)
    {
        if (
            $elevatorType->image &&
            Storage::disk('public')
                ->exists($elevatorType->image)
        ) {

            Storage::disk('public')
                ->delete($elevatorType->image);
        }


        $elevatorType->delete();


        return redirect()
            ->route('admin.elevator-types.index')
            ->with(
                'success',
                'Elevator type deleted successfully.'
            );
    }
}