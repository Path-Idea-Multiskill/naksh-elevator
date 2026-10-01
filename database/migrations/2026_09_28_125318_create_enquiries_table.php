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
        Schema::create('enquiries', function (Blueprint $table) {

            $table->id();

            $table->string('name', 150);

            $table->string('phone', 20);

            $table->string('email', 150)
                ->nullable();

            $table->string('subject', 255)
                ->nullable();

            $table->string('service', 150)
                ->nullable();

            $table->text('message');

            $table->enum('status', [
                'new',
                'read',
                'contacted',
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
        Schema::dropIfExists('enquiries');
    }
};
