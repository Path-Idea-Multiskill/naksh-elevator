<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10);

        $totalTestimonials = Testimonial::count();

        $activeTestimonials = Testimonial::where(
            'status',
            true
        )->count();

        $inactiveTestimonials = Testimonial::where(
            'status',
            false
        )->count();

        return view(
            'admin.testimonials.index',
            compact(
                'testimonials',
                'totalTestimonials',
                'activeTestimonials',
                'inactiveTestimonials'
            )
        );
    }


    public function create()
    {
        return view(
            'admin.testimonials.create'
        );
    }


    public function store(Request $request)
    {
        $validated =
            $this->validateTestimonial($request);

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        if ($request->hasFile('customer_image')) {

            $validated['customer_image'] =
                $request
                    ->file('customer_image')
                    ->store(
                        'testimonials',
                        'public'
                    );
        }


        Testimonial::create($validated);


        return redirect()
            ->route('admin.testimonials.index')
            ->with(
                'success',
                'Testimonial added successfully.'
            );
    }


    public function show(
        Testimonial $testimonial
    ) {
        return view(
            'admin.testimonials.show',
            compact('testimonial')
        );
    }


    public function edit(
        Testimonial $testimonial
    ) {
        return view(
            'admin.testimonials.edit',
            compact('testimonial')
        );
    }


    public function update(
        Request $request,
        Testimonial $testimonial
    ) {
        $validated =
            $this->validateTestimonial(
                $request,
                $testimonial
            );

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        /*
        |--------------------------------------------------------------------------
        | Replace Customer Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('customer_image')) {

            /*
             * First store the new image.
             * Old image will only be deleted
             * after the new upload succeeds.
             */

            $newImage =
                $request
                    ->file('customer_image')
                    ->store(
                        'testimonials',
                        'public'
                    );


            if (
                $testimonial->customer_image &&
                Storage::disk('public')
                    ->exists(
                        $testimonial->customer_image
                    )
            ) {
                Storage::disk('public')
                    ->delete(
                        $testimonial->customer_image
                    );
            }


            $validated['customer_image'] =
                $newImage;
        }


        $testimonial->update($validated);


        return redirect()
            ->route('admin.testimonials.index')
            ->with(
                'success',
                'Testimonial updated successfully.'
            );
    }


    public function destroy(
        Testimonial $testimonial
    ) {
        if (
            $testimonial->customer_image &&
            Storage::disk('public')
                ->exists(
                    $testimonial->customer_image
                )
        ) {
            Storage::disk('public')
                ->delete(
                    $testimonial->customer_image
                );
        }


        $testimonial->delete();


        return redirect()
            ->route('admin.testimonials.index')
            ->with(
                'success',
                'Testimonial deleted successfully.'
            );
    }


    public function toggleStatus(
        Testimonial $testimonial
    ) {
        $testimonial->update([
            'status' => !$testimonial->status,
        ]);


        return back()->with(
            'success',
            $testimonial->status
                ? 'Testimonial activated successfully.'
                : 'Testimonial deactivated successfully.'
        );
    }


    private function validateTestimonial(
        Request $request,
        ?Testimonial $testimonial = null
    ): array {
        return $request->validate([

            'customer_name' => [
                'required',
                'string',
                'max:150',
            ],

            'designation' => [
                'nullable',
                'string',
                'max:150',
            ],

            'location' => [
                'nullable',
                'string',
                'max:150',
            ],

            'customer_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],

            'review' => [
                'required',
                'string',
                'min:10',
                'max:1500',
            ],

            'status' => [
                'required',
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

        ]);
    }
}