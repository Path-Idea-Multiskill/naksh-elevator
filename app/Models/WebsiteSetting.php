<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [

        'company_name',
        'short_name',
        'footer_description',

        'primary_phone',
        'secondary_phone',
        'email',
        'whatsapp_number',

        'address',
        'city',
        'state',
        'pincode',

        'logo',
        'favicon',

        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'youtube_url',

        'business_hours',

        'meta_title',
        'meta_description',

    ];
}