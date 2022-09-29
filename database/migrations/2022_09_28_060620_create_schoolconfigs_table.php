<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolconfigs', function (Blueprint $table) {
            $table->id();
            $table->string('TermDate');
            $table->string('AgeCompareDate');
            $table->string('SenderName')->nullable()->default('text');
            $table->string('Username')->nullable();
            $table->string('Password')->nullable();
            $table->string('Email')->nullable();
            $table->tinyInteger('ShowBirthday')->default(1);
            $table->tinyInteger('ShowEvent')->default(1);
            $table->tinyInteger('ShowExam')->default(1);
            $table->tinyInteger('ShowAttend')->default(1);
            $table->integer('EventNotify')->unsigned()->nullable()->default(7);
            $table->longText('ReportHeader')->nullable()->default('text');
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
        Schema::dropIfExists('schoolconfigs');
    }
}
