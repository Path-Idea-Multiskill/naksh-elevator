<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('cabin_designs', function (Blueprint $table) {
        $table->id();

        $table->string('title');
        $table->string('slug')->unique();

        $table->string('category');

        $table->string('cover_image');
        $table->json('gallery_images')->nullable();

        $table->string('material_finish')->nullable();

        $table->text('short_description')->nullable();
        $table->longText('description')->nullable();

        $table->boolean('featured')->default(false);
        $table->boolean('status')->default(true);

        $table->unsignedInteger('sort_order')->default(0);

        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabin_designs');
    }
};
