<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $fillable = [
        'USER_ID',
        'NAME', 
        'COMPANY',
        'SALARY',
        'POSITION',
        'EXPERIENCE',
        'REQUIREMENTS',
        'RESPONSIBILITY',
        'BENEFIT',
        'TIME',
        'ADDRESS',
        'LOGO',
        'LINK',
    ];
    protected $table = 'jobs';
    protected $primaryKey = 'JOB_ID';
}
