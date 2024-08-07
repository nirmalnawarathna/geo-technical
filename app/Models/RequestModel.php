<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    protected $table = 'jobs';
    public $timestamps = false;

    public $fillable = [
        'id',
        'lot',
        'street_no',
        'street_name',
        'suburb',
        'postal_code',         
        'email',
        'mobile_no',
        'name',
        'job',
        'soil_test',
        'surveys',
        'other_jobs',
        'feature_surveys',
        'required_ahd',
        'ahd_ffl',
        'footing_probe',
        'bal',
        'wind_rating',
        'locked_gates',
        'house_on_site',
        'sub_un_con',
        'description',
        'reference',
        'file_input',
        'status',
        'site_visit_date',
        'report_due_date',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

      protected $dates = [
        'site_visit_date',
        'report_due_date',
        'created_at',
        'updated_at',
    ];
}
