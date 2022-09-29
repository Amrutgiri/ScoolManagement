<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLetterpadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letterpads', function (Blueprint $table) {
            $table->id();
            $table->string('header_name');
            $table->tinyInteger('border')->default('0');
            $table->string('bgimage')->nullable()->default('text');
            $table->string('bgwatermark')->nullable()->default('text');
            $table->longText('report')->nullable()->default('text');
            $table->tinyInteger('trash')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letterpads');
    }
}
