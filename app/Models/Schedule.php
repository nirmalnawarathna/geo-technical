<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    protected $table = 'schedules';
    public $timestamps = false;

    public $fillable = ['id','first_name','mobile_no','email','schedule_date','schedule_time','message','created_at'];
}
