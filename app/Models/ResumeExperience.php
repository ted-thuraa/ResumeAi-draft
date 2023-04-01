<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'employer',
        'job_city',
        'job_state',
        'job_country ',
        'startjob_date',
        'endjob_date',
        'description',
        'resume_id',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
