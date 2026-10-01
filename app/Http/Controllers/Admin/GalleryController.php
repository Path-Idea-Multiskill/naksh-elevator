<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('project')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(12);

        return view(
            'admin.gallery.index',
            compact('galleries')
        );
    }


    public function create()
    {
        $projects = Project::where(
            'status',
            true
        )
            ->orderBy('title')
            ->get();

        return view(
            'admin.gallery.create',
            compact('projects')
        );
    }


    public function store(Request $request)
    {
        $validated =
            $this->validateGallery($request);


        $validated['slug'] =
            $this->generateUniqueSlug(
                $validated['title']
            );


        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        if ($request->hasFile('image')) {

            $validated['image'] =
                $request
                    ->file('image')
                    ->store(
                        'gallery',
                        'public'
                    );
        }


        Gallery::create($validated);


        return redirect()
            ->route('admin.gallery.index')
            ->with(
                'success',
                'Gallery image added successfully.'
            );
    }


    public function show(Gallery $gallery)
    {
        $gallery->load('project');

        return view(
            'admin.gallery.show',
            compact('gallery')
        );
    }


    public function edit(Gallery $gallery)
    {
        $projects = Project::where(
            'status',
            true
        )
            ->orWhere(
                'id',
                $gallery->project_id
            )
            ->orderBy('title')
            ->get();


        return view(
            'admin.gallery.edit',
            compact(
                'gallery',
                'projects'
            )
        );
    }


    public function update(
        Request $request,
        Gallery $gallery
    ) {

        $validated =
            $this->validateGallery(
                $request,
                $gallery
            );


        $validated['slug'] =
            $this->generateUniqueSlug(
                $validated['title'],
                $gallery->id
            );


        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        /*
        |--------------------------------------------------------------------------
        | Replace Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            if (
                $gallery->image &&
                Storage::disk('public')
                    ->exists($gallery->image)
            ) {

                Storage::disk('public')
                    ->delete($gallery->image);
            }


            $validated['image'] =
                $request
                    ->file('image')
                    ->store(
                        'gallery',
                        'public'
                    );
        }


        $gallery->update($validated);


        return redirect()
            ->route('admin.gallery.index')
            ->with(
                'success',
                'Gallery image updated successfully.'
            );
    }


    public function destroy(Gallery $gallery)
    {
        if (
            $gallery->image &&
            Storage::disk('public')
                ->exists($gallery->image)
        ) {

            Storage::disk('public')
                ->delete($gallery->image);
        }


        $gallery->delete();


        return redirect()
            ->route('admin.gallery.index')
            ->with(
                'success',
                'Gallery image deleted successfully.'
            );
    }


    public function toggleStatus(
        Gallery $gallery
    ) {

        $gallery->update([
            'status' => !$gallery->status,
        ]);


        return back()->with(
            'success',
            $gallery->status
                ? 'Gallery image activated successfully.'
                : 'Gallery image deactivated successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */

    private function validateGallery(
        Request $request,
        ?Gallery $gallery = null
    ): array {

        return $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'required',
                'string',
                'max:100',
            ],

            'project_id' => [
                'nullable',
                'exists:projects,id',
            ],

            'image' => [
                $gallery
                    ? 'nullable'
                    : 'required',

                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'alt_text' => [
                'nullable',
                'string',
                'max:255',
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

        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Unique Slug
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(
        string $title,
        ?int $ignoreId = null
    ): string {

        $baseSlug = Str::slug($title);

        $slug = $baseSlug;

        $counter = 1;


        while (true) {

            $query = Gallery::where(
                'slug',
                $slug
            );


            if ($ignoreId) {

                $query->where(
                    'id',
                    '!=',
                    $ignoreId
                );
            }


            if (!$query->exists()) {
                break;
            }


            $slug =
                $baseSlug . '-' . $counter;

            $counter++;
        }


        return $slug;
    }
}