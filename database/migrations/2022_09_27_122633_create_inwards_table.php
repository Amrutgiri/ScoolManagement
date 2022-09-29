<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inwards', function (Blueprint $table) {
            $table->id();
            $table->string('Date')->default(date('d-m-Y'));
            $table->string('RecieveFrom')->nullable()->default('text');
            $table->string('Title')->nullable()->default('text');
            $table->string('Document')->nullable()->default('text');
            $table->longText('description')->nullable()->default('text');
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
        Schema::dropIfExists('inwards');
    }
}
