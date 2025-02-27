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
        Schema::create('tbl_colleges', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('address');
            //From research this stores both created_at and updated_at
            $table->timestamps();
            //alternative
            //$table->timestamp('created_at)->nullable();
            //$table->timestamp('updated_at)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_colleges');
    }
};
