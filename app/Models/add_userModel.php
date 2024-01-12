<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_userModel extends Model
{
    use HasFactory;
    protected $table = "add_users";
    protected $fillable = [
        'user_name',
        'user_role',
        'employee_name',
        'status'
    ];
}
