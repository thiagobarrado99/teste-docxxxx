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
        Schema::create('zips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            
            $table->string('from_postcode', 32); 
            $table->string('to_postcode', 32);

            $table->decimal('from_weight', 10, 3);
            $table->decimal('to_weight', 10, 3);
            $table->decimal('cost', 8, 2); 

            $table->integer('branch_id');
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zips');
    }
};
