<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateService($request);

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['title']
        );

        $validated['features'] = $this->cleanFeatures(
            $validated['features'] ?? []
        );

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('services', 'public');
        }

        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service added successfully.');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $this->validateService(
            $request,
            $service
        );

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['title'],
            $service->id
        );

        $validated['features'] = $this->cleanFeatures(
            $validated['features'] ?? []
        );

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {

            if (
                $service->image &&
                Storage::disk('public')->exists($service->image)
            ) {
                Storage::disk('public')->delete($service->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('services', 'public');
        }

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if (
            $service->image &&
            Storage::disk('public')->exists($service->image)
        ) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    public function toggleStatus(Service $service)
    {
        $service->update([
            'status' => !$service->status,
        ]);

        return back()->with(
            'success',
            $service->status
                ? 'Service activated successfully.'
                : 'Service deactivated successfully.'
        );
    }

    private function validateService(
        Request $request,
        ?Service $service = null
    ): array {
        $uniqueTitle = 'unique:services,title';

        if ($service) {
            $uniqueTitle .= ',' . $service->id;
        }

        return $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                $uniqueTitle,
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

    private function cleanFeatures(array $features): array
    {
        return array_values(
            array_filter(
                $features,
                fn ($feature) => filled($feature)
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

            $query = Service::where('slug', $slug);

            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }

            if (!$query->exists()) {
                break;
            }

            $slug = $baseSlug . '-' . $counter;

            $counter++;
        }

        return $slug;
    }
}