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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('adults');
            $table->string('childrens');
            $table->string('totalMonthsToStay');
            $table->string('account_title');
            $table->string('card_number');
            $table->string('cvc');
            $table->string('expiration_month');
            $table->string('expiration_year');

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
        Schema::dropIfExists('booking');
    }
};
