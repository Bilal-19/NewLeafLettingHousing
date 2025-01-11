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
        Schema::create('tenant_feedback', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name');
            $table->string('tenant_email');
            $table->string('tenant_country');
            $table->text('tenant_message');
            $table->string('visibile')->default('Yes');

            $table->unsignedBigInteger('property_id');

            $table->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_feedback');
    }
};
