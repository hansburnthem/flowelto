<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flower_category_id');
            $table->string('flower_name');
            $table->string('flower_price');
            $table->string('flower_desc');
            $table->string('flower_img')->nullable();
            $table->timestamps();

            $table->foreign('flower_category_id')->references('id')->on('flower_categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flowers');
    }
}
