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
        Schema::create('elevator_types', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('slug')->unique();

            $table->string('short_description', 500)
                ->nullable();

            $table->longText('description')
                ->nullable();

            $table->string('image')
                ->nullable();

            $table->json('features')
                ->nullable();

            $table->boolean('status')
                ->default(true);

            $table->unsignedInteger('sort_order')
                ->default(0);

            $table->string('meta_title')
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
        Schema::dropIfExists('elevator_types');
    }
};
