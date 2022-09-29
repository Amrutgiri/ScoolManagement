<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('Designation');
            $table->string('Branch')->nullable();
            $table->string('Surname');
            $table->string('FirstName');
            $table->string('FatherHusbandName');
            $table->string('AllowedBranch')->default('No Select');
            $table->string('AllowedStandard')->default('No Select');
            $table->string('ClassBranch')->nullable();
            $table->string('ClassStandard')->nullable();
            $table->string('ClassDivision')->nullable();
            $table->string('AttBranch')->nullable();
            $table->string('AttStandard')->nullable();
            $table->string('AttDivision')->nullable();
            $table->string('Shift')->nullable();
            $table->string('Senior')->nullable();
            $table->string('AttendenceType')->nullable()->default('Entry-Exit');
            $table->string('Gender')->nullable()->default('Male');
            $table->string('Birthdate')->nullable();
            $table->string('BloodGroup')->nullable();
            $table->string('MotherTongue')->nullable();
            $table->string('PersonType')->nullable()->default('School');
            $table->string('MaritalStatus')->nullable()->default('Unmarried');
            $table->string('Remark')->nullable()->default('text');
            $table->string('Mobileno1');
            $table->string('Mobileno2')->nullable();
            $table->string('WhatsApp')->nullable();
            $table->string('AddharNumber')->nullable();
            $table->string('District')->nullable();
            $table->string('State')->nullable();
            $table->string('Country')->nullable();
            $table->string('Pincode')->nullable();
            $table->string('NativeVillage')->nullable();
            $table->string('NativeTaluka')->nullable();
            $table->string('NativeDistrict')->nullable();
            $table->string('Email');
            $table->string('JoiningDate')->nullable();
            $table->string('JobLeavingDate')->nullable();
            $table->string('PaymentType')->nullable();
            $table->string('EmployeeNo')->nullable();
            $table->string('BankName')->nullable();
            $table->string('AccountNo')->nullable();
            $table->string('BankBranch')->nullable();
            $table->string('IFSCCode')->nullable();
            $table->tinyInteger('ApplyPF')->default(0);
            $table->tinyInteger('ApplyTDS')->default(0);
            $table->tinyInteger('ApplyTax')->default(0);
            $table->string('PFNumber')->nullable();
            $table->string('Username');
            $table->string('Password');
            $table->tinyInteger('Status')->default(1);
            $table->tinyInteger('Trash')->default(1);
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
        Schema::dropIfExists('staff');
    }
}
