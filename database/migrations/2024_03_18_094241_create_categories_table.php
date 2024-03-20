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
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->text('image')->nullable();
            $table->integer('is_parent')->default(0)->comment('0 for parent,Any value for for child');
            $table->integer('featured')->default(0)->comment('0 for normal,1 for featured');
            $table->string('icon_class')->nullable();
            $table->integer('status')->comment('0 for Inactive,1 for active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
