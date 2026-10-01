<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CabinDesign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CabinDesignController extends Controller
{
    public function index()
    {
        $cabinDesigns = CabinDesign::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(12);

        return view(
            'admin.cabin-designs.index',
            compact('cabinDesigns')
        );
    }

    public function create()
    {
        return view('admin.cabin-designs.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateDesign($request);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (CabinDesign::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $coverImage = $request->file('cover_image')
            ->store('cabin-designs/covers', 'public');

        $galleryImages = [];

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store(
                    'cabin-designs/gallery',
                    'public'
                );
            }
        }

        CabinDesign::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $validated['category'],
            'cover_image' => $coverImage,
            'gallery_images' => $galleryImages,
            'material_finish' => $validated['material_finish'] ?? null,
            'short_description' => $validated['short_description'] ?? null,
            'description' => $validated['description'] ?? null,
            'featured' => $request->boolean('featured'),
            'status' => $request->boolean('status'),
            'sort_order' => $validated['sort_order'] ?? 0,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ]);

        return redirect()
            ->route('admin.cabin-designs.index')
            ->with('success', 'Cabin design created successfully.');
    }

    public function edit(CabinDesign $cabinDesign)
    {
        return view(
            'admin.cabin-designs.edit',
            compact('cabinDesign')
        );
    }

    public function update(
        Request $request,
        CabinDesign $cabinDesign
    ) {
        $validated = $this->validateDesign(
            $request,
            false
        );

        $data = [
            'title' => $validated['title'],
            'category' => $validated['category'],
            'material_finish' => $validated['material_finish'] ?? null,
            'short_description' => $validated['short_description'] ?? null,
            'description' => $validated['description'] ?? null,
            'featured' => $request->boolean('featured'),
            'status' => $request->boolean('status'),
            'sort_order' => $validated['sort_order'] ?? 0,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ];

        if ($request->hasFile('cover_image')) {
            if ($cabinDesign->cover_image) {
                Storage::disk('public')
                    ->delete($cabinDesign->cover_image);
            }

            $data['cover_image'] = $request
                ->file('cover_image')
                ->store(
                    'cabin-designs/covers',
                    'public'
                );
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($cabinDesign->gallery_images ?? [] as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            $galleryImages = [];

            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store(
                    'cabin-designs/gallery',
                    'public'
                );
            }

            $data['gallery_images'] = $galleryImages;
        }

        $cabinDesign->update($data);

        return redirect()
            ->route('admin.cabin-designs.index')
            ->with('success', 'Cabin design updated successfully.');
    }

    public function destroy(CabinDesign $cabinDesign)
    {
        if ($cabinDesign->cover_image) {
            Storage::disk('public')
                ->delete($cabinDesign->cover_image);
        }

        foreach ($cabinDesign->gallery_images ?? [] as $image) {
            Storage::disk('public')->delete($image);
        }

        $cabinDesign->delete();

        return redirect()
            ->route('admin.cabin-designs.index')
            ->with('success', 'Cabin design deleted successfully.');
    }

    private function validateDesign(
        Request $request,
        bool $coverRequired = true
    ): array {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],

            'category' => [
                'required',
                'in:cabin-interiors,ceiling-designs,designer-sheets,wall-designs,glass-cabins,premium-finishes',
            ],

            'cover_image' => [
                $coverRequired ? 'required' : 'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'gallery_images' => ['nullable', 'array', 'max:10'],

            'gallery_images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'material_finish' => [
                'nullable',
                'string',
                'max:255',
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

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
                'max:500',
            ],
        ]);
    }
}