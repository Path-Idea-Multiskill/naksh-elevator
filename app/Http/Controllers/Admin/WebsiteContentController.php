<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteContent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WebsiteContentController extends Controller
{
    private array $allowedPages = [
        'home',
        'about',
        'contact',
    ];


    public function index()
    {
        $pages = [
            'home' => [
                'title' => 'Home Page',
                'description' =>
                    'Manage homepage headings, descriptions and CTA content.',
            ],

            'about' => [
                'title' => 'About Page',
                'description' =>
                    'Manage company introduction, mission and vision content.',
            ],

            'contact' => [
                'title' => 'Contact Page',
                'description' =>
                    'Manage contact page headings and introductory content.',
            ],
        ];


        return view(
            'admin.website-content.index',
            compact('pages')
        );
    }


    // public function edit(string $page)
    // {
    //     abort_unless(
    //         in_array(
    //             $page,
    //             $this->allowedPages,
    //             true
    //         ),
    //         404
    //     );


    //     $contents =
    //         WebsiteContent::where(
    //             'page',
    //             $page
    //         )
    //         ->orderBy('section')
    //         ->orderBy('sort_order')
    //         ->get()
    //         ->groupBy('section');


    //     return view(
    //         'admin.website-content.edit',
    //         compact(
    //             'page',
    //             'contents'
    //         )
    //     );
    // }


    public function edit(string $page)
    {
        abort_unless(
            in_array(
                $page,
                $this->allowedPages,
                true
            ),
            404
        );


        $records =
            WebsiteContent::where(
                'page',
                $page
            )
                ->orderBy('sort_order')
                ->get();


        $sectionOrders = [

            'home' => [
                'hero',
                'about',
                'why_choose_us',
                'cta',
            ],

            'about' => [
                'intro',
                'mission',
                'vision',
            ],

            'contact' => [
                'intro',
            ],

        ];


        $grouped =
            $records->groupBy('section');


        $contents =
            collect();


        foreach (
            $sectionOrders[$page] ?? []
            as $section
        ) {

            if ($grouped->has($section)) {

                $contents->put(
                    $section,
                    $grouped->get($section)
                );
            }
        }


        /*
         * Safety:
         * Any future section not present in
         * sectionOrders will still be shown.
         */

        foreach (
            $grouped
            as $section => $items
        ) {

            if (!$contents->has($section)) {

                $contents->put(
                    $section,
                    $items
                );
            }
        }


        return view(
            'admin.website-content.edit',
            compact(
                'page',
                'contents'
            )
        );
    }

    public function update(
        Request $request,
        string $page
    ) {
        abort_unless(
            in_array(
                $page,
                $this->allowedPages,
                true
            ),
            404
        );


        /*
         * Only existing content IDs belonging
         * to this page can be updated.
         */

        $existingContents =
            WebsiteContent::where(
                'page',
                $page
            )
                ->get()
                ->keyBy('id');


        $validated =
            $request->validate([

                'contents' => [
                    'required',
                    'array',
                ],

                'contents.*' => [
                    'nullable',
                    'string',
                    'max:5000',
                ],

            ]);


        foreach (
            $validated['contents']
            as $id => $value
        ) {

            $content =
                $existingContents->get(
                    (int) $id
                );


            if (!$content) {
                continue;
            }


            $content->update([
                'content_value' =>
                    trim($value ?? ''),
            ]);
        }


        return redirect()
            ->route(
                'admin.website-content.edit',
                $page
            )
            ->with(
                'success',
                ucfirst($page) .
                ' page content updated successfully.'
            );
    }
}