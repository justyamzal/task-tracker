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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');

            $table->string('title');
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index(['title']);
            $table->index(['due_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
