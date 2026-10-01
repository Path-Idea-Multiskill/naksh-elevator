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
        Schema::create('quote_requests', function (Blueprint $table) {

            $table->id();

            $table->string('name', 150);

            $table->string('phone', 20);

            $table->string('email', 150)
                ->nullable();

            $table->string('location', 150);

            $table->string('building_type', 100);

            $table->foreignId('elevator_type_id')
                ->nullable()
                ->constrained('elevator_types')
                ->nullOnDelete();

            $table->unsignedInteger('floors');

            $table->string('capacity', 100)
                ->nullable();

            $table->string('project_stage', 100)
                ->nullable();

            $table->text('message')
                ->nullable();

            $table->enum('status', [
                'new',
                'read',
                'contacted',
                'quoted',
                'closed',
            ])->default('new');

            $table->text('admin_notes')
                ->nullable();

            $table->timestamp('read_at')
                ->nullable();

            $table->timestamps();

            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
