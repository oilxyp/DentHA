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
        Schema::create('elderlygroups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('HN');
            $table->integer('sex');
            $table->integer('old');
            $table->string('congenital_disease')->nullable();
            $table->string('gero')->nullable();
            $table->string('low_dependence')->nullable();
            $table->string('medium_dependence')->nullable();
            $table->string('endo')->nullable();
            $table->string('fillng')->nullable();
            $table->string('perio')->nullable();
            $table->string('prosth')->nullable();
            $table->string('extraction')->nullable();
            $table->string('year');

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elderlygroups');
    }
};
