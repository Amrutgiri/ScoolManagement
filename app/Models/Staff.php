<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table='staff';

    protected $fillable=[
        'Designation','Branch','Surname','FirstName','FatherHusbandName',
        'AllowedBranch','AllowedStandard','ClassBranch','ClassStandard','ClassDivision',
        'AttBranch','AttStandard','AttDivision','Shift','Senior',
        'AttendenceType','Gender','Birthdate','BloodGroup','MotherTongue',
        'PersonType','MaritalStatus','Remark','Mobileno1','Mobileno2',
        'WhatsApp','AddharNumber','District','State','Country',
        'Pincode','NativeVillage','NativeTaluka','NativeDistrict','Email','JoiningDate','JobLeavingDate',
        'PaymentType','EmployeeNo','BankName',
        'AccountNo','BankBranch','IFSCCode','ApplyPF','ApplyTDS','ApplyTax',
        'PFNumber','Username','Password','Status',
        'Trash'
    ];
}
