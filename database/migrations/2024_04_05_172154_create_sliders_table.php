<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
    //  * 
     */
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle');
            $table->string('description');
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->text('image');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
