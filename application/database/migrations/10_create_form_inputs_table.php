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
        Schema::create('form_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("form_id")->constrained();
            $table->foreignId("input_id")->constrained();
            $table->string("label", 255);
            $table->integer("weight");
            $table->unsignedInteger("width");
            $table->boolean("required");
            $table->mediumText("regex")->nullable();
            $table->integer("minimum")->nullable();
            $table->integer("maximum")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_inputs');
    }
};
