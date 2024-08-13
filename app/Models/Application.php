<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    // protected $primaryKey = ['USER_ID', 'JOB_ID'];
    // protected $keyType = 'array';
    protected $primaryKey = 'USER_ID';
}
