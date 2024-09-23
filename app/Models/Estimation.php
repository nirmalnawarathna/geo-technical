<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    protected $table = 'estimation';
    public $timestamps = false;

    public $fillable = ['id','first_name','mobile_no','email','job_id','location','message','image','created_at','created_by'];
}
