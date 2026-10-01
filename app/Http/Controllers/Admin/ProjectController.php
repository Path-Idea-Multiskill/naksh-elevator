<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ElevatorType;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('elevatorType')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10);

        return view(
            'admin.projects.index',
            compact('projects')
        );
    }


    public function create()
    {
        $elevatorTypes = ElevatorType::where(
            'status',
            true
        )
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.projects.create',
            compact('elevatorTypes')
        );
    }


    public function store(Request $request)
    {
        $validated = $this->validateProject(
            $request
        );

        $validated['slug'] =
            $this->generateUniqueSlug(
                $validated['title']
            );


        $validated['highlights'] =
            $this->cleanArray(
                $validated['highlights'] ?? []
            );


        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('cover_image')) {

            $validated['cover_image'] =
                $request
                    ->file('cover_image')
                    ->store(
                        'projects/covers',
                        'public'
                    );
        }


        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = [];

        if ($request->hasFile('gallery_images')) {

            foreach (
                $request->file('gallery_images')
                as $image
            ) {

                $galleryImages[] =
                    $image->store(
                        'projects/gallery',
                        'public'
                    );
            }
        }

        $validated['gallery_images'] =
            $galleryImages;


        Project::create($validated);


        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'Project added successfully.'
            );
    }


    public function show(Project $project)
    {
        $project->load('elevatorType');

        return view(
            'admin.projects.show',
            compact('project')
        );
    }


    public function edit(Project $project)
    {
        $elevatorTypes = ElevatorType::where(
            'status',
            true
        )
            ->orWhere(
                'id',
                $project->elevator_type_id
            )
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();


        return view(
            'admin.projects.edit',
            compact(
                'project',
                'elevatorTypes'
            )
        );
    }


    public function update(
        Request $request,
        Project $project
    ) {
        $validated =
            $this->validateProject(
                $request,
                $project
            );


        $validated['slug'] =
            $this->generateUniqueSlug(
                $validated['title'],
                $project->id
            );


        $validated['highlights'] =
            $this->cleanArray(
                $validated['highlights'] ?? []
            );


        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        /*
        |--------------------------------------------------------------------------
        | Replace Cover Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('cover_image')) {

            if (
                $project->cover_image &&
                Storage::disk('public')
                    ->exists(
                        $project->cover_image
                    )
            ) {

                Storage::disk('public')
                    ->delete(
                        $project->cover_image
                    );
            }


            $validated['cover_image'] =
                $request
                    ->file('cover_image')
                    ->store(
                        'projects/covers',
                        'public'
                    );
        }


        /*
        |--------------------------------------------------------------------------
        | Existing Gallery
        |--------------------------------------------------------------------------
        */

        // $galleryImages =
        //     $project->gallery_images ?? [];

        /*
|--------------------------------------------------------------------------
| Existing Gallery
|--------------------------------------------------------------------------
*/

        $galleryImages =
            $project->gallery_images ?? [];


        /*
        |--------------------------------------------------------------------------
        | Remove Existing Gallery Images
        |--------------------------------------------------------------------------
        */

        $removeGalleryImages =
            $validated['remove_gallery_images'] ?? [];


        /*
         * Security:
         * Only allow deletion of images that
         * actually belong to this project.
         */

        $removeGalleryImages =
            array_values(
                array_intersect(
                    $removeGalleryImages,
                    $galleryImages
                )
            );


        foreach (
            $removeGalleryImages as $image
        ) {

            if (
                Storage::disk('public')
                    ->exists($image)
            ) {

                Storage::disk('public')
                    ->delete($image);
            }
        }


        /*
         * Remove deleted paths from database array.
         */

        $galleryImages =
            array_values(
                array_diff(
                    $galleryImages,
                    $removeGalleryImages
                )
            );


        /*
         * This is only a request helper field.
         * It is not a Project database column.
         */

        unset(
            $validated['remove_gallery_images']
        );


        /*
        |--------------------------------------------------------------------------
        | New Gallery Images
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gallery_images')) {

            foreach (
                $request->file('gallery_images')
                as $image
            ) {

                $galleryImages[] =
                    $image->store(
                        'projects/gallery',
                        'public'
                    );
            }
        }


        $validated['gallery_images'] =
            $galleryImages;


        $project->update($validated);


        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'Project updated successfully.'
            );
    }


    public function destroy(Project $project)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Cover
        |--------------------------------------------------------------------------
        */

        if (
            $project->cover_image &&
            Storage::disk('public')
                ->exists(
                    $project->cover_image
                )
        ) {

            Storage::disk('public')
                ->delete(
                    $project->cover_image
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Gallery
        |--------------------------------------------------------------------------
        */

        foreach (
            $project->gallery_images ?? []
            as $image
        ) {

            if (
                Storage::disk('public')
                    ->exists($image)
            ) {

                Storage::disk('public')
                    ->delete($image);
            }
        }


        $project->delete();


        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'Project deleted successfully.'
            );
    }


    public function toggleStatus(Project $project)
    {
        $project->update([
            'status' => !$project->status,
        ]);


        return back()->with(
            'success',
            $project->status
            ? 'Project activated successfully.'
            : 'Project deactivated successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */

    private function validateProject(
        Request $request,
        ?Project $project = null
    ): array {

        return $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'client_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'elevator_type_id' => [
                'nullable',
                'exists:elevator_types,id',
            ],

            'project_category' => [
                'nullable',
                'string',
                'max:255',
            ],

            'completion_date' => [
                'nullable',
                'date',
            ],

            'cover_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'gallery_images' => [
                'nullable',
                'array',
                'max:10',
            ],

            'gallery_images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'remove_gallery_images' => [
                'nullable',
                'array',
            ],

            'remove_gallery_images.*' => [
                'nullable',
                'string',
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

            'highlights' => [
                'nullable',
                'array',
            ],

            'highlights.*' => [
                'nullable',
                'string',
                'max:255',
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
    }


    private function cleanArray(
        array $items
    ): array {

        return array_values(
            array_filter(
                $items,
                fn($item) => filled($item)
            )
        );
    }


    private function generateUniqueSlug(
        string $title,
        ?int $ignoreId = null
    ): string {

        $baseSlug = Str::slug($title);

        $slug = $baseSlug;

        $counter = 1;


        while (true) {

            $query = Project::where(
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