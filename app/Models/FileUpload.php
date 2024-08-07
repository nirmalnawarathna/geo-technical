<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FileUpload
 * 
 * @property int $id
 * @property int $job_id
 * @property string|null $file_name
 * @property string|null $file_input
 * @property string|null $type
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property Carbon $updated_at
 * @property string|null $updated_by
 * 
 * @property Job $job
 *
 * @package App\Models
 */
class FileUpload extends Model
{
	protected $table = 'file_uploads';


	protected $casts = [
		'job_id' => 'int'
	];

	protected $fillable = [
		'job_id',
		'file_name',
		'file_type',
		'file_input',
		'created_by',
		'updated_by',
	];

	public function job()
	{
		return $this->belongsTo(Job::class);
	}
}
