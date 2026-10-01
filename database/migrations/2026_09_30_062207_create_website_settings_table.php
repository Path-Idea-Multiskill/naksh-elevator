<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('website_settings', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Company
            |--------------------------------------------------------------------------
            */

            $table->string('company_name', 150)
                ->default('Naksh Elevator');

            $table->string('short_name', 100)
                ->nullable();

            $table->text('footer_description')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Contact
            |--------------------------------------------------------------------------
            */

            $table->string('primary_phone', 30)
                ->nullable();

            $table->string('secondary_phone', 30)
                ->nullable();

            $table->string('email', 150)
                ->nullable();

            $table->string('whatsapp_number', 30)
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Address
            |--------------------------------------------------------------------------
            */

            $table->text('address')
                ->nullable();

            $table->string('city', 100)
                ->nullable();

            $table->string('state', 100)
                ->nullable();

            $table->string('pincode', 10)
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Branding
            |--------------------------------------------------------------------------
            */

            $table->string('logo')
                ->nullable();

            $table->string('favicon')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Social Media
            |--------------------------------------------------------------------------
            */

            $table->string('facebook_url')
                ->nullable();

            $table->string('instagram_url')
                ->nullable();

            $table->string('linkedin_url')
                ->nullable();

            $table->string('youtube_url')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Business
            |--------------------------------------------------------------------------
            */

            $table->string('business_hours', 255)
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Default SEO
            |--------------------------------------------------------------------------
            */

            $table->string('meta_title', 255)
                ->nullable();

            $table->text('meta_description')
                ->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
