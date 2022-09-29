<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standards', function (Blueprint $table) {
            $table->id();
            $table->Integer('branch_id');
            $table->string('std_name');
            $table->tinyInteger('sem')->default('1');
            $table->float('pass_percentage')->default(0.00);
            $table->string('grade');
            $table->Integer('age_limit')->nullable();
            $table->string('notes')->nullable();
            $table->Integer('max_limit')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('trash')->default(1);            
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
        Schema::dropIfExists('standards');
    }
}
