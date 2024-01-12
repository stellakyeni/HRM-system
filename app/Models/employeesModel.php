<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeesModel extends Model
{
    use HasFactory;
    protected $table="employees";
    protected $fillable=[
        'first_name',
        'last_name',
        'employee_id',
        'national_id',


        'driving_license',
        'license_expiry',
        'snn',
        'sin',
        'military_service',
        'nationality',
        'marital_status',
        'gender',
        'blood_type',
       
       
        'country',
        'state',
        'city',
        'country_code',
        'phone_number',
        'email',

        'joined_date',
        'job_title',
        'job_categories',
        'sub_unit',
        'employment_status',
        

    ];
}
