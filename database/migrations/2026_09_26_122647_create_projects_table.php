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
        Schema::create('projects', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('slug')->unique();

            $table->string('client_name')->nullable();

            $table->string('location')->nullable();

            $table->foreignId('elevator_type_id')
                ->nullable()
                ->constrained('elevator_types')
                ->nullOnDelete();

            $table->string('project_category')->nullable();

            $table->date('completion_date')->nullable();

            $table->string('cover_image')->nullable();

            $table->json('gallery_images')->nullable();

            $table->string(
                'short_description',
                500
            )->nullable();

            $table->longText('description')->nullable();

            $table->json('highlights')->nullable();

            $table->boolean('status')->default(true);

            $table->unsignedInteger('sort_order')
                ->default(0);

            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
