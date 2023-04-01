<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'school_name',
        'school_city' ,
        'school_state',
        'school_country',
        'certification',
        'startschool_date',
        'endschool_date',
        'school_description',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
