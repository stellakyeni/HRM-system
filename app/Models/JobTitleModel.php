<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitleModel extends Model
{
    use HasFactory;
    protected $table="job_titles";
    protected $fillable=[
        'job_title',
        'job_description',
        'job_specification',
        'notes'
    ];
}
