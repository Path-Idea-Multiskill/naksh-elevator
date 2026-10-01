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
        Schema::create('website_contents', function (Blueprint $table) {

            $table->id();

            $table->string('page', 100);

            $table->string('section', 100);

            $table->string('content_key', 150);

            $table->longText('content_value')
                ->nullable();

            $table->string('content_type', 50)
                ->default('text');

            $table->unsignedInteger('sort_order')
                ->default(0);

            $table->timestamps();

            $table->unique([
                'page',
                'section',
                'content_key'
            ]);

            $table->index([
                'page',
                'section'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_contents');
    }
};
