<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resumelink extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'label',
        'url',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
