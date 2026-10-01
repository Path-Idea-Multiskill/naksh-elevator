<?php

namespace Database\Seeders;

use App\Models\WebsiteContent;
use Illuminate\Database\Seeder;

class WebsiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [

            /*
            |--------------------------------------------------------------------------
            | HOME - HERO
            |--------------------------------------------------------------------------
            */

            [
                'page' => 'home',
                'section' => 'hero',
                'content_key' => 'badge',
                'content_value' => 'WELCOME TO NAKSH ELEVATOR',
                'content_type' => 'text',
                'sort_order' => 1,
            ],

            [
                'page' => 'home',
                'section' => 'hero',
                'content_key' => 'title',
                'content_value' =>
                    'Safe, Reliable & Modern Elevator Solutions',
                'content_type' => 'text',
                'sort_order' => 2,
            ],

            [
                'page' => 'home',
                'section' => 'hero',
                'content_key' => 'description',
                'content_value' =>
                    'Professional elevator solutions for residential, commercial and industrial buildings.',
                'content_type' => 'textarea',
                'sort_order' => 3,
            ],

            [
                'page' => 'home',
                'section' => 'hero',
                'content_key' => 'primary_button',
                'content_value' => 'Get Free Quote',
                'content_type' => 'text',
                'sort_order' => 4,
            ],

            [
                'page' => 'home',
                'section' => 'hero',
                'content_key' => 'secondary_button',
                'content_value' => 'Explore Services',
                'content_type' => 'text',
                'sort_order' => 5,
            ],


            /*
            |--------------------------------------------------------------------------
            | HOME - ABOUT
            |--------------------------------------------------------------------------
            */

            [
                'page' => 'home',
                'section' => 'about',
                'content_key' => 'badge',
                'content_value' => 'ABOUT NAKSH ELEVATOR',
                'content_type' => 'text',
                'sort_order' => 1,
            ],

            [
                'page' => 'home',
                'section' => 'about',
                'content_key' => 'title',
                'content_value' =>
                    'Reliable Elevator Solutions Built Around Safety',
                'content_type' => 'text',
                'sort_order' => 2,
            ],

            [
                'page' => 'home',
                'section' => 'about',
                'content_key' => 'description',
                'content_value' =>
                    'Naksh Elevator provides professional elevator installation, maintenance and modernization solutions with a focus on safety, reliability and quality service.',
                'content_type' => 'textarea',
                'sort_order' => 3,
            ],


            /*
            |--------------------------------------------------------------------------
            | HOME - WHY CHOOSE US
            |--------------------------------------------------------------------------
            */

            [
                'page' => 'home',
                'section' => 'why_choose_us',
                'content_key' => 'badge',
                'content_value' => 'WHY CHOOSE US',
                'content_type' => 'text',
                'sort_order' => 1,
            ],

            [
                'page' => 'home',
                'section' => 'why_choose_us',
                'content_key' => 'title',
                'content_value' =>
                    'Professional Service You Can Rely On',
                'content_type' => 'text',
                'sort_order' => 2,
            ],

            [
                'page' => 'home',
                'section' => 'why_choose_us',
                'content_key' => 'description',
                'content_value' =>
                    'From planning and installation to maintenance and support, our team focuses on dependable elevator solutions.',
                'content_type' => 'textarea',
                'sort_order' => 3,
            ],


            /*
            |--------------------------------------------------------------------------
            | HOME - CTA
            |--------------------------------------------------------------------------
            */

            [
                'page' => 'home',
                'section' => 'cta',
                'content_key' => 'title',
                'content_value' =>
                    'Looking for the Right Elevator Solution?',
                'content_type' => 'text',
                'sort_order' => 1,
            ],

            [
                'page' => 'home',
                'section' => 'cta',
                'content_key' => 'description',
                'content_value' =>
                    'Tell us about your project and our team will help you find a suitable elevator solution.',
                'content_type' => 'textarea',
                'sort_order' => 2,
            ],

            [
                'page' => 'home',
                'section' => 'cta',
                'content_key' => 'button_text',
                'content_value' => 'Request a Quote',
                'content_type' => 'text',
                'sort_order' => 3,
            ],


            /*
            |--------------------------------------------------------------------------
            | ABOUT PAGE
            |--------------------------------------------------------------------------
            */

            [
                'page' => 'about',
                'section' => 'intro',
                'content_key' => 'title',
                'content_value' => 'About Naksh Elevator',
                'content_type' => 'text',
                'sort_order' => 1,
            ],

            [
                'page' => 'about',
                'section' => 'intro',
                'content_key' => 'description',
                'content_value' =>
                    'Naksh Elevator delivers professional elevator solutions designed for safety, reliability and long-term performance.',
                'content_type' => 'textarea',
                'sort_order' => 2,
            ],

            [
                'page' => 'about',
                'section' => 'mission',
                'content_key' => 'title',
                'content_value' => 'Our Mission',
                'content_type' => 'text',
                'sort_order' => 1,
            ],

            [
                'page' => 'about',
                'section' => 'mission',
                'content_key' => 'description',
                'content_value' =>
                    'To provide dependable elevator solutions backed by professional service, quality workmanship and customer support.',
                'content_type' => 'textarea',
                'sort_order' => 2,
            ],

            [
                'page' => 'about',
                'section' => 'vision',
                'content_key' => 'title',
                'content_value' => 'Our Vision',
                'content_type' => 'text',
                'sort_order' => 1,
            ],

            [
                'page' => 'about',
                'section' => 'vision',
                'content_key' => 'description',
                'content_value' =>
                    'To become a trusted elevator solutions provider known for safety, reliability and service excellence.',
                'content_type' => 'textarea',
                'sort_order' => 2,
            ],


            /*
            |--------------------------------------------------------------------------
            | CONTACT PAGE
            |--------------------------------------------------------------------------
            */

            [
                'page' => 'contact',
                'section' => 'intro',
                'content_key' => 'title',
                'content_value' => 'Contact Naksh Elevator',
                'content_type' => 'text',
                'sort_order' => 1,
            ],

            [
                'page' => 'contact',
                'section' => 'intro',
                'content_key' => 'description',
                'content_value' =>
                    'Contact our team for elevator installation, maintenance, modernization or project requirements.',
                'content_type' => 'textarea',
                'sort_order' => 2,
            ],

        ];


        foreach ($contents as $content) {

            WebsiteContent::updateOrCreate(

                [
                    'page' =>
                        $content['page'],

                    'section' =>
                        $content['section'],

                    'content_key' =>
                        $content['content_key'],
                ],

                [
                    'content_value' =>
                        $content['content_value'],

                    'content_type' =>
                        $content['content_type'],

                    'sort_order' =>
                        $content['sort_order'],
                ]

            );
        }
    }
}