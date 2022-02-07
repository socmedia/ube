<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contacts_id');
            $table->string('attribute')->nullable();
            $table->text('value')->nullable();
            $table->timestamps();

            $table->foreign('contacts_id')->references('id')->on('contacts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts_attributes');
    }
}