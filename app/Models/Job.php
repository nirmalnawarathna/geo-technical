<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * 
 * @property int $id
 * @property string|null $lot
 * @property string|null $street_no
 * @property string|null $street_name
 * @property string|null $suburb
 * @property string|null $postal_code
 * @property string|null $email
 * @property string|null $mobile_no
 * @property string|null $name
 * @property string|null $job
 * @property string|null $soil_test
 * @property string|null $surveys
 * @property string|null $other_jobs
 * @property string|null $feature_surveys
 * @property int|null $required_ahd
 * @property string|null $ahd_ffl
 * @property int|null $footing_probe
 * @property int|null $bal
 * @property int|null $wind_rating
 * @property int|null $locked_gates
 * @property int|null $house_on_site
 * @property int|null $sub_un_con
 * @property string|null $description
 * @property string|null $reference
 * @property string|null $file_input
 * @property string|null $status
 * @property string|null $holdreason
 * @property Carbon|null $site_visit_date
 * @property Carbon|null $report_due_date
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 * @property bool|null $notify
 * @property bool|null $status_notify
 * 
 * @property Collection|FileUpload[] $file_uploads
 *
 * @package App\Models
 */
class Job extends Model
{
	protected $table = 'jobs';

	protected $casts = [
		'required_ahd' => 'int',
		'footing_probe' => 'int',
		'bal' => 'int',
		'wind_rating' => 'int',
		'locked_gates' => 'int',
		'house_on_site' => 'int',
		'sub_un_con' => 'int',
		'future_base' => 'int',
		'percolation_test' => 'int',
		'acid_sulfate_test' => 'int',
		'site_visit_date' => 'datetime',
		'report_due_date' => 'datetime',
		'notify' => 'bool',
		'status_notify' => 'bool'
	];

	protected $fillable = [
		'user_id',
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
		'future_base',
		'percolation_test',
		'acid_sulfate_test',
		'description',
		'reference',
		'file_input',
		'status',
		'holdreason',
		'site_visit_date',
		'report_due_date',
		'created_by',
		'updated_by',
		'notify',
		'status_notify',
	];

	public function file_uploads()
	{
		return $this->hasMany(FileUpload::class, 'job_id');
	}
}
