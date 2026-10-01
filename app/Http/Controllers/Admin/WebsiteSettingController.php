<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteSettingController extends Controller
{
    public function edit()
    {
        $settings =
            WebsiteSetting::firstOrCreate(
                ['id' => 1],
                [
                    'company_name' =>
                        'Naksh Elevator',
                ]
            );

        return view(
            'admin.settings.edit',
            compact('settings')
        );
    }


    public function update(Request $request)
    {
        $settings =
            WebsiteSetting::firstOrCreate(
                ['id' => 1],
                [
                    'company_name' =>
                        'Naksh Elevator',
                ]
            );


        $validated = $request->validate([

            'company_name' => [
                'required',
                'string',
                'max:150',
            ],

            'short_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'footer_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'primary_phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'secondary_phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'email' => [
                'nullable',
                'email',
                'max:150',
            ],

            'whatsapp_number' => [
                'nullable',
                'string',
                'max:30',
            ],

            'address' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'city' => [
                'nullable',
                'string',
                'max:100',
            ],

            'state' => [
                'nullable',
                'string',
                'max:100',
            ],

            'pincode' => [
                'nullable',
                'string',
                'max:10',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'favicon' => [
                'nullable',
                'image',
                'mimes:png,ico,jpg,jpeg,webp',
                'max:2048',
            ],

            'facebook_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'instagram_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'linkedin_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'youtube_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'business_hours' => [
                'nullable',
                'string',
                'max:255',
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
        | Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            if ($settings->logo) {
                Storage::disk('public')
                    ->delete($settings->logo);
            }

            $validated['logo'] =
                $request->file('logo')
                    ->store(
                        'settings/logo',
                        'public'
                    );
        }


        /*
        |--------------------------------------------------------------------------
        | Favicon
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('favicon')) {

            if ($settings->favicon) {
                Storage::disk('public')
                    ->delete($settings->favicon);
            }

            $validated['favicon'] =
                $request->file('favicon')
                    ->store(
                        'settings/favicon',
                        'public'
                    );
        }


        $settings->update($validated);


        return redirect()
            ->route('admin.settings.edit')
            ->with(
                'success',
                'Website settings updated successfully.'
            );
    }
}