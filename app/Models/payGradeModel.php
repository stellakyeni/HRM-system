<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payGradeModel extends Model
{
    use HasFactory;
    protected $table="pay_grades";
    protected $fillable=[
        'country_name',
        'currency_name',
    ];
}
