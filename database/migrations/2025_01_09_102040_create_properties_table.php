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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_name');
            $table->string('property_address');
            $table->string('property_type');
            $table->string('property_status');
            $table->string('monthly_rent');
            $table->text('property_description');
            $table->string('property_features');
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('reception');
            $table->string('square_feet_area');
            $table->string('property_thumbnail');
            $table->text('property_images');

            $table->unsignedBigInteger('user_id');

            // Foreign Key of User Who List Properties
            // If any user record delete, then its respective properties will also be deleted.
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
