<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skillModel extends Model
{
    use HasFactory;
    protected $table = "skills";
    protected $fillable = [
        'skill_name',
        'skill_description',
    ];
}
